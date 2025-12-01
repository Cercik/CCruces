#!/bin/bash
# Script de deploy para CCruces en VPS (DigitalOcean/Linode)
# Ejecutar como root o con sudo

set -e

echo "🚀 Iniciando deploy de CCruces..."

# Colores para output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Variables
DOMAIN="ccruces.com"
REPO_URL="https://github.com/Cercik/CCruces.git"
APP_DIR="/opt/ccruces"
DOCKER_USERNAME="cercik"

# 1. Actualizar sistema
echo -e "${YELLOW}📦 Actualizando sistema...${NC}"
apt update && apt upgrade -y

# 2. Instalar dependencias
echo -e "${YELLOW}📦 Instalando dependencias...${NC}"
apt install -y curl git nginx certbot python3-certbot-nginx ufw

# 3. Instalar Docker
if ! command -v docker &> /dev/null; then
    echo -e "${YELLOW}🐳 Instalando Docker...${NC}"
    curl -fsSL https://get.docker.com -o get-docker.sh
    sh get-docker.sh
    rm get-docker.sh
else
    echo -e "${GREEN}✅ Docker ya está instalado${NC}"
fi

# 4. Instalar Docker Compose
if ! docker compose version &> /dev/null; then
    echo -e "${YELLOW}🐳 Instalando Docker Compose...${NC}"
    apt install -y docker-compose-plugin
else
    echo -e "${GREEN}✅ Docker Compose ya está instalado${NC}"
fi

# 5. Configurar Firewall
echo -e "${YELLOW}🔥 Configurando firewall...${NC}"
ufw allow 22/tcp
ufw allow 80/tcp
ufw allow 443/tcp
ufw --force enable

# 6. Clonar repositorio
echo -e "${YELLOW}📁 Clonando repositorio...${NC}"
if [ -d "$APP_DIR" ]; then
    echo "Directorio existe, haciendo pull..."
    cd $APP_DIR
    git pull
else
    git clone $REPO_URL $APP_DIR
    cd $APP_DIR
fi

# 7. Crear archivo .env
echo -e "${YELLOW}⚙️  Configurando variables de entorno...${NC}"
cat > .env << 'EOL'
# Database
DATABASE_URL=postgresql://ccruces_user:CHANGE_THIS_PASSWORD@db:5432/ccruces
POSTGRES_USER=ccruces_user
POSTGRES_PASSWORD=CHANGE_THIS_PASSWORD
POSTGRES_DB=ccruces

# SMTP (Configura con tus valores)
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USER=your-email@gmail.com
SMTP_PASS=your-app-password
CONTACT_EMAIL=your-email@gmail.com

# Metabase
MB_DB_TYPE=postgres
MB_DB_DBNAME=metabase
MB_DB_PORT=5432
MB_DB_USER=ccruces_user
MB_DB_PASS=CHANGE_THIS_PASSWORD
MB_DB_HOST=db

# Production
NODE_ENV=production
EOL

echo -e "${YELLOW}⚠️  IMPORTANTE: Edita el archivo .env con tus credenciales reales${NC}"
echo "nano $APP_DIR/.env"

# 8. Configurar Nginx para el sitio principal
echo -e "${YELLOW}🌐 Configurando Nginx para ccruces.com...${NC}"
cat > /etc/nginx/sites-available/ccruces << 'EOL'
server {
    listen 80;
    server_name ccruces.com www.ccruces.com;

    location / {
        proxy_pass http://localhost:3000;
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
        proxy_cache_bypass $http_upgrade;
    }
}
EOL

# 9. Configurar Nginx para demo1
cat > /etc/nginx/sites-available/demo1 << 'EOL'
server {
    listen 80;
    server_name demo1.ccruces.com;

    root /opt/ccruces/demos/demo1;
    index index.html;

    location / {
        try_files $uri $uri/ /index.html;
    }
}
EOL

# 10. Configurar Nginx para demo2
cat > /etc/nginx/sites-available/demo2 << 'EOL'
server {
    listen 80;
    server_name demo2.ccruces.com;

    root /opt/ccruces/demos/demo2;
    index index.html;

    location / {
        try_files $uri $uri/ /index.html;
    }
}
EOL

# 11. Configurar Nginx para Metabase
cat > /etc/nginx/sites-available/reportes << 'EOL'
server {
    listen 80;
    server_name reportes.ccruces.com;

    location / {
        proxy_pass http://localhost:3001;
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
        proxy_cache_bypass $http_upgrade;
    }
}
EOL

# 12. Activar sitios
echo -e "${YELLOW}🔗 Activando sitios en Nginx...${NC}"
ln -sf /etc/nginx/sites-available/ccruces /etc/nginx/sites-enabled/
ln -sf /etc/nginx/sites-available/demo1 /etc/nginx/sites-enabled/
ln -sf /etc/nginx/sites-available/demo2 /etc/nginx/sites-enabled/
ln -sf /etc/nginx/sites-available/reportes /etc/nginx/sites-enabled/

# Remover default si existe
rm -f /etc/nginx/sites-enabled/default

# 13. Verificar configuración de Nginx
nginx -t

# 14. Reiniciar Nginx
systemctl restart nginx

# 15. Iniciar servicios con Docker Compose
echo -e "${YELLOW}🐳 Iniciando servicios con Docker Compose...${NC}"
cd $APP_DIR
docker compose up -d

# 16. Esperar a que los servicios estén listos
echo -e "${YELLOW}⏳ Esperando a que los servicios inicien...${NC}"
sleep 10

# 17. Verificar estado
docker compose ps

echo ""
echo -e "${GREEN}✅ Deploy completado!${NC}"
echo ""
echo "📋 Próximos pasos:"
echo ""
echo "1. Edita las variables de entorno:"
echo "   nano $APP_DIR/.env"
echo ""
echo "2. Reinicia los servicios:"
echo "   cd $APP_DIR && docker compose down && docker compose up -d"
echo ""
echo "3. Configura SSL/HTTPS para todos los dominios:"
echo "   certbot --nginx -d ccruces.com -d www.ccruces.com"
echo "   certbot --nginx -d demo1.ccruces.com"
echo "   certbot --nginx -d demo2.ccruces.com"
echo "   certbot --nginx -d reportes.ccruces.com"
echo ""
echo "4. Configura los registros DNS:"
echo "   A     @           [IP_DE_TU_VPS]"
echo "   A     demo1       [IP_DE_TU_VPS]"
echo "   A     demo2       [IP_DE_TU_VPS]"
echo "   A     reportes    [IP_DE_TU_VPS]"
echo "   CNAME www         ccruces.com"
echo ""
echo "5. Verifica que todo funcione:"
echo "   http://ccruces.com"
echo "   http://demo1.ccruces.com"
echo "   http://demo2.ccruces.com"
echo "   http://reportes.ccruces.com"
echo ""
echo "🎉 Tu sitio estará disponible en ccruces.com"

#!/bin/bash
# Script de deploy para VPS sin dominio (usando solo IP)
# Ejecutar como root o con sudo

set -e

echo "🚀 Iniciando deploy de CCruces (sin dominio)..."

# Colores
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

# Variables
REPO_URL="https://github.com/Cercik/CCruces.git"
APP_DIR="/opt/ccruces"

# 1. Actualizar sistema
echo -e "${YELLOW}📦 Actualizando sistema...${NC}"
apt update && apt upgrade -y

# 2. Instalar dependencias
echo -e "${YELLOW}📦 Instalando dependencias...${NC}"
apt install -y curl git nginx ufw

# 3. Instalar Docker
if ! command -v docker &> /dev/null; then
    echo -e "${YELLOW}🐳 Instalando Docker...${NC}"
    curl -fsSL https://get.docker.com -o get-docker.sh
    sh get-docker.sh
    rm get-docker.sh
fi

# 4. Instalar Docker Compose
if ! docker compose version &> /dev/null; then
    echo -e "${YELLOW}🐳 Instalando Docker Compose...${NC}"
    apt install -y docker-compose-plugin
fi

# 5. Configurar Firewall
echo -e "${YELLOW}🔥 Configurando firewall...${NC}"
ufw allow 22/tcp
ufw allow 80/tcp
ufw --force enable

# 6. Clonar repositorio
echo -e "${YELLOW}📁 Clonando repositorio...${NC}"
if [ -d "$APP_DIR" ]; then
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

# 8. Configurar Nginx para acceso por IP
SERVER_IP=$(curl -s ifconfig.me)
echo -e "${YELLOW}🌐 Configurando Nginx para IP: $SERVER_IP${NC}"

cat > /etc/nginx/sites-available/ccruces << EOL
# Sitio principal
server {
    listen 80 default_server;
    server_name _;

    location / {
        proxy_pass http://localhost:3000;
        proxy_http_version 1.1;
        proxy_set_header Upgrade \$http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host \$host;
        proxy_set_header X-Real-IP \$remote_addr;
        proxy_set_header X-Forwarded-For \$proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto \$scheme;
        proxy_cache_bypass \$http_upgrade;
    }
}

# Demo 1
server {
    listen 8001;
    server_name _;

    root /opt/ccruces/demos/demo1;
    index index.html;

    location / {
        try_files \$uri \$uri/ /index.html;
    }
}

# Demo 2
server {
    listen 8002;
    server_name _;

    root /opt/ccruces/demos/demo2;
    index index.html;

    location / {
        try_files \$uri \$uri/ /index.html;
    }
}

# Metabase
server {
    listen 8003;
    server_name _;

    location / {
        proxy_pass http://localhost:3001;
        proxy_http_version 1.1;
        proxy_set_header Upgrade \$http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host \$host;
        proxy_set_header X-Real-IP \$remote_addr;
        proxy_set_header X-Forwarded-For \$proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto \$scheme;
        proxy_cache_bypass \$http_upgrade;
    }
}
EOL

# 9. Activar configuración
ln -sf /etc/nginx/sites-available/ccruces /etc/nginx/sites-enabled/
rm -f /etc/nginx/sites-enabled/default

# 10. Abrir puertos adicionales en firewall
ufw allow 8001/tcp
ufw allow 8002/tcp
ufw allow 8003/tcp

# 11. Verificar y reiniciar Nginx
nginx -t
systemctl restart nginx

# 12. Iniciar servicios con Docker Compose
echo -e "${YELLOW}🐳 Iniciando servicios con Docker Compose...${NC}"
cd $APP_DIR
docker compose up -d

# 13. Esperar a que los servicios estén listos
echo -e "${YELLOW}⏳ Esperando a que los servicios inicien...${NC}"
sleep 10

# 14. Verificar estado
docker compose ps

echo ""
echo -e "${GREEN}✅ Deploy completado!${NC}"
echo ""
echo "📋 Tu sitio está disponible en:"
echo ""
echo "🌐 Sitio principal:   http://$SERVER_IP"
echo "📊 Demo 1:            http://$SERVER_IP:8001"
echo "📈 Demo 2:            http://$SERVER_IP:8002"
echo "📉 Metabase:          http://$SERVER_IP:8003"
echo ""
echo "📝 Próximos pasos:"
echo ""
echo "1. Edita las variables de entorno:"
echo "   nano $APP_DIR/.env"
echo ""
echo "2. Reinicia los servicios:"
echo "   cd $APP_DIR && docker compose down && docker compose up -d"
echo ""
echo "3. Cuando tengas dominio, ejecuta el otro script (deploy.sh)"
echo ""

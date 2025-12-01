# Configuración de Deploy a Producción

## 🌐 Configuración DNS

### Registros DNS necesarios

Configurar en tu proveedor de DNS (GoDaddy, Cloudflare, etc.):

```
Tipo    Nombre          Valor                           TTL
----------------------------------------------------------------
A       @               [IP_DEL_SERVIDOR]              3600
CNAME   www             tudominio.com                   3600
CNAME   demo1           tudominio.com                   3600
CNAME   demo2           tudominio.com                   3600
CNAME   reportes        tudominio.com                   3600
```

**O si usas plataforma (Render/Fly):**

```
Tipo    Nombre          Valor                           TTL
----------------------------------------------------------------
CNAME   @               tu-app.onrender.com            3600
CNAME   www             tu-app.onrender.com            3600
```

---

## 🚀 Opción 1: Deploy con Render (Recomendado)

### Paso 1: Crear cuenta en Render
https://dashboard.render.com/register

### Paso 2: Crear Web Service

1. **New** → **Web Service**
2. **Connect Repository**: Selecciona `Cercik/CCruces`
3. **Configuración**:
   - Name: `ccruces-web`
   - Region: Closest to your users
   - Branch: `main`
   - Root Directory: `web`
   - Runtime: `Docker`
   - Instance Type: Free o Starter

### Paso 3: Variables de Entorno

En Render Dashboard → Environment:

```
NODE_ENV=production
DATABASE_URL=postgresql://user:pass@host:5432/dbname
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USER=tu-email@gmail.com
SMTP_PASS=tu-app-password
CONTACT_EMAIL=tu-email@gmail.com
```

### Paso 4: Configurar Dominio Personalizado

En Render → Settings → Custom Domain:
1. Add Custom Domain: `tudominio.com`
2. Add Custom Domain: `www.tudominio.com`
3. Copiar el CNAME que te da Render
4. Configurar en tu DNS provider

---

## 🚀 Opción 2: Deploy con Fly.io

### Instalación de Fly CLI

```powershell
iwr https://fly.io/install.ps1 -useb | iex
```

### Deploy

```powershell
cd C:\Users\CCruces\CCruces\web

# Login
fly auth login

# Crear app
fly launch --name ccruces-web --region mia

# Deploy
fly deploy

# Configurar dominio
fly certs add tudominio.com
fly certs add www.tudominio.com
```

### Variables de Entorno

```powershell
fly secrets set NODE_ENV=production
fly secrets set DATABASE_URL="postgresql://..."
fly secrets set SMTP_HOST=smtp.gmail.com
fly secrets set SMTP_USER=tu-email@gmail.com
fly secrets set SMTP_PASS=tu-app-password
```

---

## 🚀 Opción 3: VPS Propio (DigitalOcean/Linode/etc)

### Requisitos del servidor
- Ubuntu 22.04 LTS
- 2GB RAM mínimo
- Docker y Docker Compose instalados

### Pasos en el servidor

```bash
# Conectar por SSH
ssh root@tu-servidor-ip

# Instalar Docker
curl -fsSL https://get.docker.com -o get-docker.sh
sh get-docker.sh

# Instalar Docker Compose
apt install docker-compose-plugin

# Clonar repositorio
git clone https://github.com/Cercik/CCruces.git
cd CCruces

# Configurar variables
cp .env.example .env
nano .env  # Editar con tus valores

# Levantar servicios
docker-compose up -d

# Instalar Nginx (reverse proxy)
apt install nginx certbot python3-certbot-nginx

# Configurar Nginx
nano /etc/nginx/sites-available/ccruces
```

### Configuración Nginx

```nginx
server {
    listen 80;
    server_name tudominio.com www.tudominio.com;

    location / {
        proxy_pass http://localhost:3000;
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host $host;
        proxy_cache_bypass $http_upgrade;
    }
}
```

### SSL con Let's Encrypt

```bash
certbot --nginx -d tudominio.com -d www.tudominio.com
```

---

## 📊 Para Subdominios (demos)

### Si usas VPS con Nginx:

```nginx
# Demo 1
server {
    listen 80;
    server_name demo1.tudominio.com;
    
    location / {
        root /var/www/demos/demo1;
        try_files $uri $uri/ /index.html;
    }
}

# Demo 2
server {
    listen 80;
    server_name demo2.tudominio.com;
    
    location / {
        root /var/www/demos/demo2;
        try_files $uri $uri/ /index.html;
    }
}
```

### Si usas Render/Fly:

Crear servicios estáticos separados para cada demo.

---

## ✅ Checklist de Deploy

- [ ] Dominio configurado en DNS
- [ ] Servicio creado en plataforma/VPS
- [ ] Variables de entorno configuradas
- [ ] HTTPS/SSL configurado
- [ ] Base de datos PostgreSQL (si necesitas)
- [ ] Metabase configurado (si necesitas)
- [ ] Demos desplegadas
- [ ] Formulario de contacto probado en producción

---

## 🔍 Verificación Post-Deploy

```bash
# Verificar DNS
nslookup tudominio.com

# Verificar HTTPS
curl -I https://tudominio.com

# Verificar API de contacto
curl -X POST https://tudominio.com/api/contact \
  -H "Content-Type: application/json" \
  -d '{"name":"Test","email":"test@test.com","message":"Test"}'
```

---

**Dime:**
1. ¿Cuál es tu dominio?
2. ¿Qué opción prefieres? (Render, Fly, VPS propio)
3. ¿Ya tienes VPS o prefieres plataforma managed?

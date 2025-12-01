# 🚀 Deploy a VPS - Guía Completa para ccruces.com

## 📋 Requisitos Previos

- VPS con Ubuntu 22.04 (DigitalOcean/Linode)
- Acceso SSH root o sudo
- IP pública del servidor
- Dominio ccruces.com ya registrado

---

## 🔧 Paso 1: Conectar al VPS

```powershell
# Desde tu PowerShell local
ssh root@TU_IP_VPS
```

---

## 🚀 Paso 2: Ejecutar Script de Deploy Automático

```bash
# En el VPS, descargar el script
curl -o deploy.sh https://raw.githubusercontent.com/Cercik/CCruces/main/deploy.sh

# Dar permisos de ejecución
chmod +x deploy.sh

# Ejecutar
./deploy.sh
```

**O ejecutar paso a paso manualmente** (ver sección Manual más abajo).

---

## ⚙️ Paso 3: Configurar Variables de Entorno

Después de que el script termine, edita el archivo `.env`:

```bash
nano /opt/ccruces/.env
```

**Cambia estos valores:**

```env
# Database - Cambia la contraseña
POSTGRES_PASSWORD=TU_CONTRASEÑA_SEGURA_AQUI

# SMTP - Configura tu email
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USER=tu-email@gmail.com
SMTP_PASS=tu-app-password-de-gmail
CONTACT_EMAIL=tu-email@gmail.com
```

**Guarda con:** `Ctrl+O`, Enter, `Ctrl+X`

Luego reinicia los servicios:

```bash
cd /opt/ccruces
docker compose down
docker compose up -d
```

---

## 🌐 Paso 4: Configurar DNS

En tu proveedor de DNS (GoDaddy, Cloudflare, etc.), añade estos registros:

| Tipo | Nombre | Valor | TTL |
|------|--------|-------|-----|
| A | @ | [IP_DE_TU_VPS] | 3600 |
| A | demo1 | [IP_DE_TU_VPS] | 3600 |
| A | demo2 | [IP_DE_TU_VPS] | 3600 |
| A | reportes | [IP_DE_TU_VPS] | 3600 |
| CNAME | www | ccruces.com | 3600 |

**Ejemplo con IP 192.168.1.100:**
```
A     @           192.168.1.100
A     demo1       192.168.1.100
A     demo2       192.168.1.100
A     reportes    192.168.1.100
CNAME www         ccruces.com
```

**⏳ Espera 5-10 minutos** para que los DNS se propaguen.

---

## 🔒 Paso 5: Configurar SSL/HTTPS (Certificados Let's Encrypt)

```bash
# Para el sitio principal
certbot --nginx -d ccruces.com -d www.ccruces.com

# Para demo1
certbot --nginx -d demo1.ccruces.com

# Para demo2
certbot --nginx -d demo2.ccruces.com

# Para reportes
certbot --nginx -d reportes.ccruces.com
```

Durante el proceso, Certbot preguntará:
- **Email**: Tu email (para renovaciones)
- **Terms**: Acepta (Yes)
- **Redirect HTTP to HTTPS**: Sí (opción 2)

---

## ✅ Paso 6: Verificar que Todo Funcione

```bash
# Verificar servicios Docker
docker compose ps

# Verificar logs
docker compose logs -f web

# Verificar Nginx
systemctl status nginx

# Verificar certificados
certbot certificates
```

**Acceder desde el navegador:**
- https://ccruces.com (Sitio principal)
- https://demo1.ccruces.com (Dashboard)
- https://demo2.ccruces.com (Analytics)
- https://reportes.ccruces.com (Metabase)

---

## 🔄 Actualizar el Sitio (después del primer deploy)

```bash
cd /opt/ccruces
git pull
docker compose down
docker compose up -d --build
```

---

## 📊 Comandos Útiles

### Ver logs en tiempo real
```bash
cd /opt/ccruces
docker compose logs -f web        # Web app
docker compose logs -f db         # PostgreSQL
docker compose logs -f metabase   # Metabase
```

### Reiniciar servicios
```bash
cd /opt/ccruces
docker compose restart web
docker compose restart metabase
```

### Ver estado de servicios
```bash
docker compose ps
systemctl status nginx
```

### Backup de base de datos
```bash
docker compose exec db pg_dump -U ccruces_user ccruces > backup_$(date +%Y%m%d).sql
```

### Restaurar base de datos
```bash
docker compose exec -T db psql -U ccruces_user ccruces < backup.sql
```

---

## 🛠️ Deploy Manual (Paso a Paso)

Si prefieres hacerlo manualmente en lugar de usar el script:

### 1. Instalar Docker
```bash
curl -fsSL https://get.docker.com -o get-docker.sh
sh get-docker.sh
apt install -y docker-compose-plugin
```

### 2. Instalar Nginx y Certbot
```bash
apt install -y nginx certbot python3-certbot-nginx
```

### 3. Clonar repositorio
```bash
git clone https://github.com/Cercik/CCruces.git /opt/ccruces
cd /opt/ccruces
```

### 4. Crear .env
```bash
cp .env.example .env
nano .env  # Editar con tus valores
```

### 5. Configurar Nginx
```bash
# Copiar configuraciones del script deploy.sh
# O crear manualmente en /etc/nginx/sites-available/
```

### 6. Iniciar servicios
```bash
cd /opt/ccruces
docker compose up -d
```

### 7. Configurar SSL
```bash
certbot --nginx -d ccruces.com -d www.ccruces.com
```

---

## 🔐 Seguridad Adicional

### Configurar Firewall
```bash
ufw allow 22/tcp
ufw allow 80/tcp
ufw allow 443/tcp
ufw enable
```

### Crear usuario no-root
```bash
adduser deploy
usermod -aG sudo deploy
usermod -aG docker deploy
```

### Deshabilitar login root por SSH
```bash
nano /etc/ssh/sshd_config
# Cambiar: PermitRootLogin no
systemctl restart sshd
```

---

## 📈 Monitoreo

### Instalar herramientas de monitoreo (opcional)
```bash
# Htop para recursos
apt install htop

# Ctop para contenedores
wget https://github.com/bcicen/ctop/releases/download/v0.7.7/ctop-0.7.7-linux-amd64 -O /usr/local/bin/ctop
chmod +x /usr/local/bin/ctop
```

---

## 🆘 Troubleshooting

### Sitio no carga
```bash
# Verificar Nginx
nginx -t
systemctl status nginx

# Verificar Docker
docker compose ps
docker compose logs web
```

### SSL no funciona
```bash
certbot certificates
certbot renew --dry-run
```

### Base de datos no conecta
```bash
docker compose logs db
docker compose exec db psql -U ccruces_user -d ccruces
```

---

## 📝 Checklist Final

- [ ] VPS accesible por SSH
- [ ] Script de deploy ejecutado exitosamente
- [ ] Variables de entorno configuradas (.env)
- [ ] DNS apuntando a la IP del VPS
- [ ] Nginx configurado y funcionando
- [ ] SSL/HTTPS configurado para todos los dominios
- [ ] Servicios Docker corriendo (web, db, metabase)
- [ ] Sitio principal accesible en https://ccruces.com
- [ ] Demo1 accesible en https://demo1.ccruces.com
- [ ] Demo2 accesible en https://demo2.ccruces.com
- [ ] Metabase accesible en https://reportes.ccruces.com
- [ ] Formulario de contacto funcionando
- [ ] Backup configurado

---

## 🎉 ¡Listo!

Tu sitio está ahora en producción en:
- **Principal**: https://ccruces.com
- **Demo 1**: https://demo1.ccruces.com
- **Demo 2**: https://demo2.ccruces.com
- **Reportes**: https://reportes.ccruces.com

---

**Soporte**: Si algo falla, revisa los logs con `docker compose logs -f`

# 🧪 Testing y Configuración - CCruces

## ✅ Estado Actual del Proyecto

### **Componentes Funcionando:**
- ✅ Sitio web Next.js (http://localhost:3000)
- ✅ Formulario de contacto con API
- ✅ Demo 1: Dashboard interactivo
- ✅ Demo 2: Analytics en tiempo real
- ✅ Docker y docker-compose configurados
- ✅ GitHub Actions CI/CD configurado
- ✅ Repositorio en GitHub: https://github.com/Cercik/CCruces

### **Pendiente de Configurar:**
- ⏳ SMTP para envío de emails reales
- ⏳ Deploy a servidor (AWS pendiente 24h)
- ⏳ Docker Hub credentials (error en CI/CD)
- ⏳ SSL/HTTPS en producción
- ⏳ Base de datos PostgreSQL en producción

---

## 🧪 Testing Local

### **1. Iniciar servidor de desarrollo**

```powershell
cd C:\Users\CCruces\CCruces\web
npm run dev
```

Acceder a: http://localhost:3000

### **2. Probar demos**

```powershell
# Demo 1
cd demos/demo1
python -m http.server 3001
```
Acceder a: http://localhost:3001

```powershell
# Demo 2
cd demos/demo2
python -m http.server 3002
```
Acceder a: http://localhost:3002

### **3. Probar con Docker**

```powershell
cd C:\Users\CCruces\CCruces
docker-compose up
```

Acceder a:
- Web: http://localhost:3000
- Metabase: http://localhost:3001
- PostgreSQL: localhost:5432

### **4. Probar API de contacto**

```powershell
curl -X POST http://localhost:3000/api/contact `
  -H "Content-Type: application/json" `
  -d '{\"name\":\"Test\",\"email\":\"test@test.com\",\"message\":\"Test message\"}'
```

**Sin SMTP configurado**: El mensaje se imprime en la consola del servidor.

---

## ⚙️ Configuraciones Necesarias

### **A) Configurar SMTP (para emails reales)**

1. **Ir a Google Account**: https://myaccount.google.com/apppasswords

2. **Generar App Password**:
   - Verificación en 2 pasos debe estar activa
   - App Passwords → Create
   - App: Mail
   - Copiar la contraseña de 16 caracteres

3. **Crear archivo .env.local**:

```powershell
cd C:\Users\CCruces\CCruces\web
copy ..\\.env.local.example .env.local
notepad .env.local
```

4. **Editar con tus valores**:
```env
SMTP_USER=tu-email@gmail.com
SMTP_PASS=xxxx xxxx xxxx xxxx  # App Password de Gmail
CONTACT_EMAIL=tu-email@gmail.com
```

5. **Reiniciar servidor**:
```powershell
# Ctrl+C para detener
npm run dev
```

6. **Probar formulario** en http://localhost:3000 (sección Contacto)

---

### **B) Arreglar GitHub Actions (Docker Hub)**

**El problema**: Credenciales incorrectas o secrets mal configurados.

**Solución**:

1. **Verificar secrets en GitHub**:
   - https://github.com/Cercik/CCruces/settings/secrets/actions
   - Deben existir:
     - `DOCKERHUB_USERNAME` = `cercik`
     - `DOCKERHUB_TOKEN` = `dckr_pat_...`

2. **Si no funcionan, regenerar token**:
   - https://hub.docker.com/settings/security
   - Delete old token
   - Create new → Permissions: Read, Write, Delete
   - Update secret en GitHub

3. **Trigger CI/CD**:
```powershell
git commit --allow-empty -m "chore: test CI/CD"
git push
```

4. **Ver logs**: https://github.com/Cercik/CCruces/actions

---

### **C) Configurar DNS (cuando tengas servidor)**

En tu proveedor de DNS (donde está ccruces.com):

```
Tipo    Nombre      Valor               TTL
A       @           [IP_SERVIDOR]       3600
A       demo1       [IP_SERVIDOR]       3600
A       demo2       [IP_SERVIDOR]       3600
A       reportes    [IP_SERVIDOR]       3600
CNAME   www         ccruces.com         3600
```

---

## 🐛 Troubleshooting

### Sitio no carga en localhost:3000

```powershell
# Ver si el puerto está ocupado
netstat -ano | findstr :3000

# Matar proceso si es necesario
taskkill /PID [PID] /F

# Reiniciar servidor
cd web
npm run dev
```

### Formulario no envía emails

1. **Revisar consola del servidor** - debe mostrar el mensaje
2. **Verificar .env.local** existe y tiene valores correctos
3. **Verificar App Password** de Gmail es válido
4. **Reiniciar servidor** después de cambiar .env.local

### Docker no inicia

```powershell
# Ver logs
docker-compose logs

# Reiniciar servicios
docker-compose down
docker-compose up --build
```

### CI/CD falla en GitHub Actions

1. **Ver logs**: https://github.com/Cercik/CCruces/actions
2. **Verificar secrets** están configurados
3. **Regenerar Docker Hub token** si es necesario
4. **Verificar username** es exacto (minúsculas/mayúsculas)

---

## 📊 Checklist de Testing

### Antes de Deploy:
- [ ] Sitio carga en localhost:3000
- [ ] Todas las secciones visibles (Hero, Servicios, Portafolio, Demos, Contacto)
- [ ] Demo 1 funciona en localhost:3001
- [ ] Demo 2 funciona en localhost:3002
- [ ] Formulario de contacto muestra mensaje en consola
- [ ] Docker-compose levanta todos los servicios
- [ ] No hay errores de TypeScript
- [ ] No hay errores en consola del navegador

### Después de configurar SMTP:
- [ ] Formulario envía email real
- [ ] Email llega a tu buzón
- [ ] Usuario recibe email de confirmación
- [ ] No hay errores en logs del servidor

### Después de Deploy:
- [ ] Sitio accesible en https://ccruces.com
- [ ] HTTPS funciona (SSL válido)
- [ ] Demo 1 accesible en https://demo1.ccruces.com
- [ ] Demo 2 accesible en https://demo2.ccruces.com
- [ ] Metabase accesible en https://reportes.ccruces.com
- [ ] Formulario envía emails en producción
- [ ] GitHub Actions build exitoso
- [ ] Imagen en Docker Hub actualizada

---

## 🔍 Comandos Útiles

### Ver logs en desarrollo
```powershell
# Logs de Next.js
cd web
npm run dev

# Logs de Docker
docker-compose logs -f web
docker-compose logs -f db
docker-compose logs -f metabase
```

### Build de producción local
```powershell
cd web
npm run build
npm run start
```

### Limpiar y reinstalar
```powershell
cd web
Remove-Item -Recurse -Force node_modules
Remove-Item -Recurse -Force .next
npm install
```

### Verificar errores TypeScript
```powershell
cd web
npm run lint
```

---

## 📝 Notas

- **Modo desarrollo**: SMTP no es requerido, los mensajes se muestran en consola
- **Puerto 3000**: Next.js app principal
- **Puerto 3001**: Metabase (con docker-compose)
- **Puerto 5432**: PostgreSQL (con docker-compose)
- **GitHub Actions**: Se ejecuta automáticamente en cada push a main

---

**Última actualización**: 2 de Diciembre, 2025

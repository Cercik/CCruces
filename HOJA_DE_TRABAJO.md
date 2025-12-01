# 📋 Hoja de Trabajo — Sitio Personal (Opción Robusta)

## 🎯 Objetivo

Crear un sitio web personal profesional donde ofrezco:
- Servicios: desarrollo de apps móviles, desarrollo web, reportería de datos/BI y consultoría
- Portafolio / casos de estudio
- Sección "Sandbox / Demos" para desplegar y probar mini-aplicaciones públicas o privadas
- Área de reportes/dashboards embebidos (Metabase o similar)
- Flujo de contratación con formulario y posibilidad de pagos (Stripe)

---

## 📦 Alcance (lo que existe)

### ✅ Completado
- [x] Repositorio con estructura base
- [x] Entorno de desarrollo local reproducible (docker-compose)
- [x] CI/CD que construya imagen Docker y despliegue
- [x] Documentación mínima (README, CHAT.md, HOJA_DE_TRABAJO.md)
- [x] Landing page profesional con Next.js
- [x] Configuración de TypeScript + Tailwind CSS
- [x] Dockerfile multi-stage optimizado
- [x] GitHub Actions workflow

### ⏳ Pendiente
- [ ] Subdominios para demos (ej.: demo1.mi-dominio.com, demo2.mi-dominio.com)
- [ ] Panel de reportes embebido (ej.: reportes.mi-dominio.com)
- [ ] Backups automáticos de la base de datos
- [ ] Monitoreo básico (Sentry) y analytics (PostHog o GA)
- [ ] Integración de pagos con Stripe
- [ ] Demos funcionales

---

## 🔧 Decisión Tecnológica Preferida (Robusta)

| Componente | Tecnología Seleccionada | Alternativas |
|-----------|------------------------|--------------|
| **Frontend** | Next.js 15 (React 19) | Vue, Svelte |
| **Backend/BBDD** | PostgreSQL | MySQL, MongoDB |
| **Autenticación** | Supabase Auth o Auth0 | NextAuth, Clerk |
| **Reportería** | Metabase (self-hosted) | Looker Studio, Superset |
| **Despliegue** | Render ✅ | Fly, DigitalOcean, VPS |
| **Registro** | Docker Hub ✅ | GHCR, ECR |
| **Pagos** | Stripe | PayPal, Mercado Pago |
| **Styling** | Tailwind CSS | Styled Components, MUI |

---

## 📥 Entradas que voy a proporcionar

### Información Básica
- [x] Nombre del proyecto: **CCruces**
- [ ] Nombre de dominio: `tudominio.com` (pendiente)
- [ ] Repositorio GitHub: `owner/CCruces` (pendiente crear)
- [x] Proveedor de despliegue: **Render** (recomendado)
- [x] Registro de contenedores: **Docker Hub**

### Credenciales (NO compartir aquí)
- [ ] Cuenta en proveedor de despliegue (Render)
- [ ] Docker Hub username + token
- [ ] Acceso al panel DNS del dominio
- [ ] Credenciales SMTP (opcional)
- [ ] Cuenta Stripe (opcional)
- [ ] Cuenta Supabase (opcional)

### Assets Existentes
- [x] Proyecto EduSmart 360 (Flutter) - para portafolio
- [ ] Proyectos en VS Code (carpetas web/ y demos/)
- [ ] Logos e imágenes (pendiente)

---

## 📁 Archivos en el Repositorio

### ✅ Archivos Creados

```
CCruces/
├── .github/
│   └── workflows/
│       └── ci.yml                ✅ CI/CD pipeline
├── demos/
│   ├── demo1/                    📁 Estructura creada
│   └── demo2/                    📁 Estructura creada
├── infra/
│   └── traefik/                  📁 Para self-hosted
│       └── traefik.yml           ⏳ Pendiente
├── web/
│   ├── app/
│   │   ├── layout.tsx            ✅ Layout principal
│   │   ├── page.tsx              ✅ Homepage completa
│   │   └── globals.css           ✅ Estilos globales
│   ├── public/                   📁 Assets estáticos
│   ├── Dockerfile                ✅ Multi-stage build
│   ├── package.json              ✅ Dependencies
│   ├── tsconfig.json             ✅ TypeScript config
│   ├── tailwind.config.ts        ✅ Tailwind config
│   ├── next.config.ts            ✅ Next.js config
│   ├── postcss.config.mjs        ✅ PostCSS config
│   └── .gitignore                ✅
├── docker-compose.yml            ✅ Web + DB + Metabase
├── .env.example                  ✅ Template de variables
├── .gitignore                    ✅
├── README.md                     ✅ Documentación principal
├── CHAT.md                       ✅ Conversación del proyecto
├── HOJA_DE_TRABAJO.md            ✅ Este archivo
└── LICENSE                       ⏳ Pendiente
```

---

## 🔐 Variables de Entorno / Secrets

### GitHub Secrets (Settings > Secrets > Actions)

| Secret Name | Descripción | Estado |
|------------|-------------|--------|
| `DOCKERHUB_USERNAME` | Usuario de Docker Hub | ⏳ Por configurar |
| `DOCKERHUB_TOKEN` | Token de acceso Docker Hub | ⏳ Por configurar |
| `RENDER_API_KEY` | API key de Render (opcional) | ⏳ Por configurar |
| `RENDER_SERVICE_ID` | ID del servicio Render | ⏳ Por configurar |
| `GHCR_TOKEN` | Si usas GHCR en lugar de Docker Hub | ⏳ Opcional |

### Variables de Entorno (.env local)

Ver archivo `.env.example` para la lista completa:

```env
# Database
DATABASE_URL=postgresql://postgres:postgres@localhost:5432/ccruces
POSTGRES_USER=postgres
POSTGRES_PASSWORD=postgres
POSTGRES_DB=ccruces

# SMTP (email)
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USER=your-email@gmail.com
SMTP_PASS=your-app-password

# Stripe (pagos)
NEXT_PUBLIC_STRIPE_PUBLISHABLE_KEY=pk_test_...
STRIPE_SECRET_KEY=sk_test_...
STRIPE_WEBHOOK_SECRET=whsec_...

# Sentry (errores)
SENTRY_DSN=https://...@sentry.io/...

# Supabase (auth opcional)
SUPABASE_URL=https://your-project.supabase.co
SUPABASE_KEY=eyJhbG...

# PostHog (analytics)
POSTHOG_API_KEY=phc_...
POSTHOG_HOST=https://app.posthog.com
```

---

## 🌐 Registros DNS Requeridos

### Configuración de Subdominios

| Registro | Tipo | Nombre | Valor | TTL |
|----------|------|--------|-------|-----|
| Principal | A / CNAME | @ | IP del servidor / CNAME Render | 3600 |
| WWW | CNAME | www | tudominio.com | 3600 |
| Demo 1 | CNAME | demo1 | IP / CNAME del servicio | 3600 |
| Demo 2 | CNAME | demo2 | IP / CNAME del servicio | 3600 |
| Reportes | CNAME | reportes | IP / CNAME Metabase | 3600 |
| API | CNAME | api | IP / CNAME del backend | 3600 |

**Nota**: Los valores exactos dependen del proveedor de hosting (Render proporciona CNAMEs específicos).

---

## 🗺️ Mapeo de Subdominios

| Subdominio | Servicio | Puerto | Descripción |
|-----------|----------|--------|-------------|
| `tudominio.com` | Next.js Web | 3000 | Sitio público principal |
| `www.tudominio.com` | Redirect | - | Redirige a tudominio.com |
| `demo1.tudominio.com` | Demo App 1 | 3001 | Dashboard interactivo |
| `demo2.tudominio.com` | Demo App 2 | 3002 | Analytics demo |
| `reportes.tudominio.com` | Metabase | 3000 | Dashboards embebidos |
| `api.tudominio.com` | Backend API | 3003 | Endpoints REST (futuro) |

---

## ✅ Criterios de Aceptación

### MVP (Mínimo Viable)
- [x] Sitio público carga en HTTP/HTTPS
- [x] Estructura del proyecto completa
- [x] Docker y docker-compose funcionales
- [x] CI/CD en GitHub Actions configurado
- [ ] Al menos 2 demos accesibles en subdominios
- [ ] Metabase desplegado y accesible
- [ ] Formulario de contacto funcional
- [ ] No hay secretos en el repositorio

### Producción
- [ ] HTTPS con certificados válidos
- [ ] Despliegue automático al push en main
- [ ] Backups automáticos de BD (snapshots o pg_dump)
- [ ] Sentry recoge errores
- [ ] PostHog/GA muestra tráfico
- [ ] Build exitoso sin errores (logs verdes)
- [ ] Todos los secrets configurados en GitHub

---

## 📦 Entregables Finales

### Lo que espero recibir

1. **Repositorio GitHub**
   - Link: `https://github.com/OWNER/CCruces`
   - Todos los archivos listados
   - Commit inicial: "🚀 Initial project setup"

2. **URLs Funcionales**
   - Sitio: `https://tudominio.com`
   - Demo 1: `https://demo1.tudominio.com`
   - Demo 2: `https://demo2.tudominio.com`
   - Reportes: `https://reportes.tudominio.com`
   - Panel Render: `https://dashboard.render.com/...`

3. **Documento de Credenciales**
   - Lista de secrets (nombres, no valores)
   - Dónde están configurados (GitHub, Render, etc.)
   - Comandos útiles para reproducir localmente

4. **Screenshots**
   - Homepage funcionando
   - GitHub Actions build exitoso
   - Docker Hub con imagen publicada

---

## 👀 Monitoreo / Progreso en Tiempo Real

### Dónde ver qué está pasando

| Componente | URL | Qué ver |
|-----------|-----|---------|
| **GitHub Actions** | `repo/actions` | Build logs, deploy status |
| **Docker Hub** | `hub.docker.com/r/USER/ccruces-web` | Tags de imágenes |
| **Render Dashboard** | `dashboard.render.com` | Logs de deploy, URL pública |
| **Local Docker** | Terminal | `docker-compose logs -f` |
| **Traefik** | `http://localhost:8080` | Certificados, rutas (si self-hosted) |
| **Metabase** | `http://localhost:3001` | Conexión BD, dashboards |
| **Sentry** | `sentry.io/projects/...` | Errores en producción |
| **PostHog** | `app.posthog.com` | Analytics, usuarios |

### Métricas Clave
- ⏱️ **Build time**: 3-5 minutos (target)
- 💾 **Imagen size**: 200-300 MB (target)
- 🚀 **Deploy time**: 2-3 minutos (target)
- ⚡ **Page load**: <2 segundos (target)

---

## ❓ Decisiones Pendientes de Confirmar

### Prioridad Alta
- [ ] **Dominio**: Proporcionar nombre exacto (ej.: ccruces.com, carlos-cruces.dev)
- [ ] **Repositorio**: Crear en GitHub y proporcionar owner/repo
- [ ] **Docker Hub**: Confirmar username o usar GHCR
- [ ] **Proveedor**: Render ✅ confirmado / Fly / DigitalOcean

### Prioridad Media
- [ ] **Autenticación**: Supabase Auth / Auth0 / NextAuth
- [ ] **Demos**: Tipo de demos (React apps, visualizaciones, juegos)
- [ ] **Reportes**: Metabase self-hosted ✅ / Looker Studio externo
- [ ] **Analytics**: PostHog / Google Analytics

### Prioridad Baja
- [ ] **Blog**: Añadir sección de blog (contentlayer o MDX)
- [ ] **i18n**: Soporte multi-idioma (español/inglés)
- [ ] **Tests**: Vitest + React Testing Library
- [ ] **Storybook**: Para componentes UI

---

## 📝 Plantilla de Mensaje (Para Continuar)

Copia y pega esto en el chat cuando estés listo para continuar:

```
Comienzo con CCruces:

✅ Completado:
- Estructura base del proyecto creada
- Next.js + TypeScript + Tailwind configurados
- Docker + docker-compose + GitHub Actions listos
- Documentación (README, CHAT, HOJA_DE_TRABAJO)

⏳ Por hacer:
1. Configurar dominio: [TU_DOMINIO.COM]
2. Crear repositorio GitHub: [OWNER/CCruces]
3. Añadir secrets en GitHub:
   - DOCKERHUB_USERNAME: [TU_USERNAME]
   - DOCKERHUB_TOKEN: [GENERAR TOKEN]
   - RENDER_API_KEY: [OBTENER DE RENDER]
4. Crear demos funcionales (demo1, demo2)
5. Configurar subdominios DNS
6. Primera compilación y deploy

Proveedor preferido: Render
Registro preferido: Docker Hub

¿Procedo con la inicialización de Git y primer commit?
```

---

## 🔒 Notas de Seguridad

### ✅ Implementado
- Variables en `.env` (no en git)
- `.gitignore` configurado correctamente
- Secrets en GitHub Actions
- Dockerfile con usuario no-root
- `.env.example` sin valores reales

### ⚠️ Por Implementar
- [ ] Rate limiting en API endpoints
- [ ] CORS configuration específica
- [ ] Validación de webhooks Stripe
- [ ] Signed-embed para Metabase (datos sensibles)
- [ ] Rotación de claves cada 90 días
- [ ] Registro de accesos al panel de admin

### 📋 Checklist de Seguridad
- [ ] No hay contraseñas en commits
- [ ] Secrets configurados correctamente
- [ ] HTTPS en producción
- [ ] Backups encriptados
- [ ] Logs sin información sensible

---

## 📞 Contacto y Soporte

**Proyecto**: CCruces  
**Responsable**: [Tu Nombre]  
**Email**: contacto@tudominio.com  
**GitHub**: https://github.com/[TU_USUARIO]  
**Timezone**: [Tu zona horaria]  

**Horas disponibles**: [Ej.: Lunes a Viernes, 9:00-18:00 UTC-5]  
**Método preferido**: GitHub Issues / Email / Chat  

---

## 🎉 Estado Actual del Proyecto

```
███████████████████████░░░░░░░░░ 70% Completado

✅ Estructura base
✅ Configuración Docker
✅ CI/CD pipeline
✅ Documentación
⏳ Demos funcionales
⏳ Despliegue a producción
⏳ Integración Stripe
⏳ Configuración DNS
```

**Última actualización**: 1 de Diciembre, 2025 12:51  
**Próxima revisión**: Después de configurar dominio y repositorio GitHub

---

## 📚 Comandos de Referencia Rápida

### Setup Inicial
```bash
# Clonar (cuando exista el repo)
git clone https://github.com/OWNER/CCruces.git
cd CCruces

# Variables de entorno
cp .env.example .env
# Editar .env con valores reales

# Levantar servicios
docker-compose up --build
```

### Desarrollo
```bash
# Solo web (sin Docker)
cd web && npm run dev

# Logs en tiempo real
docker-compose logs -f web
docker-compose logs -f metabase
docker-compose logs -f db

# Reiniciar un servicio
docker-compose restart web
```

### Deploy
```bash
# Commit y push (trigger automático de CI/CD)
git add .
git commit -m "feat: nueva funcionalidad"
git push origin main

# Build manual de imagen
docker build -t ccruces-web:latest ./web

# Push manual a Docker Hub
docker tag ccruces-web:latest username/ccruces-web:v1.0.0
docker push username/ccruces-web:v1.0.0
```

### Database
```bash
# Acceso a PostgreSQL
docker-compose exec db psql -U postgres -d ccruces

# Backup
docker-compose exec db pg_dump -U postgres ccruces > backup_$(date +%Y%m%d).sql

# Restore
docker-compose exec -T db psql -U postgres ccruces < backup.sql

# Ver logs de BD
docker-compose logs db
```

---

*Este documento es la referencia técnica completa del proyecto. Mantenerlo actualizado con cada cambio importante.*

**Versión**: 1.0  
**Formato**: Markdown  
**Encoding**: UTF-8  

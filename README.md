# 🚀 CCruces - Sitio Web Personal

Sitio web personal profesional con servicios de desarrollo de apps, web, reportería de datos y consultoría tecnológica.

## 🎯 Características

- **Servicios Ofrecidos**:
  - 📱 Desarrollo de Apps Móviles (Flutter, React Native)
  - 🌐 Desarrollo Web (Next.js, React, Node.js)
  - 📊 Reportería de Datos & Business Intelligence
  - 💼 Consultoría Tecnológica

- **Secciones**:
  - Portafolio de proyectos
  - Sandbox/Demos interactivos
  - Reportes embebidos con Metabase
  - Formulario de contacto
  - Integración de pagos con Stripe

## 🏗️ Stack Tecnológico

- **Frontend**: Next.js 15 + React 19 + TypeScript + Tailwind CSS
- **Backend**: Node.js + PostgreSQL
- **Reportería**: Metabase (self-hosted)
- **Despliegue**: Docker + Docker Compose
- **CI/CD**: GitHub Actions
- **Registro**: Docker Hub / GitHub Container Registry
- **Hosting**: Render / Fly.io / DigitalOcean / VPS

## 📦 Estructura del Proyecto

```
CCruces/
├── .github/
│   └── workflows/
│       └── ci.yml          # GitHub Actions CI/CD
├── demos/
│   ├── demo1/              # Demo 1: Dashboard
│   └── demo2/              # Demo 2: Analytics
├── infra/
│   └── traefik/            # Traefik config (si self-hosted)
├── web/
│   ├── app/                # Next.js App Router
│   ├── public/             # Assets estáticos
│   ├── Dockerfile          # Docker build
│   ├── package.json        # Dependencies
│   └── ...
├── docker-compose.yml      # Servicios locales
├── .env.example            # Template de variables
├── README.md               # Este archivo
├── CHAT.md                 # Conversación del proyecto
└── HOJA_DE_TRABAJO.md      # Especificaciones técnicas
```

## 🚀 Inicio Rápido

### Prerrequisitos

- Node.js 20+
- Docker & Docker Compose
- Git

### Instalación Local

1. **Clonar repositorio**
```bash
git clone https://github.com/TU_USUARIO/CCruces.git
cd CCruces
```

2. **Configurar variables de entorno**
```bash
cp .env.example .env
# Editar .env con tus valores
```

3. **Levantar servicios con Docker**
```bash
docker-compose up --build
```

4. **Acceder a las aplicaciones**
- Web: http://localhost:3000
- Metabase: http://localhost:3001
- PostgreSQL: localhost:5432

### Desarrollo (sin Docker)

```bash
cd web
npm install
npm run dev
```

## 🔧 Configuración

### Variables de Entorno Requeridas

Ver `.env.example` para la lista completa. Las más importantes:

```env
DATABASE_URL=postgresql://...
STRIPE_SECRET_KEY=sk_...
SENTRY_DSN=https://...
```

### Secrets de GitHub Actions

Configurar en `Settings > Secrets and variables > Actions`:

- `DOCKERHUB_USERNAME`
- `DOCKERHUB_TOKEN`
- `RENDER_API_KEY` (opcional)
- `RENDER_SERVICE_ID` (opcional)

## 🌐 Despliegue

### Opción 1: Render (Recomendado)

1. Conectar repositorio en Render
2. Crear servicio Web Service
3. Configurar variables de entorno
4. Deploy automático al push a `main`

### Opción 2: VPS Self-Hosted

1. Configurar Traefik para TLS
2. Subir `docker-compose.yml`
3. Configurar subdominios en DNS
4. `docker-compose up -d`

### Opción 3: Fly.io / DigitalOcean

Similar a Render, seguir documentación del proveedor.

## 📊 Metabase Setup

1. Acceder a http://localhost:3001 (o tu dominio)
2. Completar setup inicial
3. Conectar a base de datos PostgreSQL
4. Crear dashboards
5. Configurar signed-embed para embeber en el sitio

## 🎨 Demos

Las demos están en `/demos/`. Cada una es una mini-aplicación independiente.

### Demo 1: Dashboard
```bash
cd demos/demo1
npm install
npm run dev
```

### Demo 2: Analytics
```bash
cd demos/demo2
npm install
npm run dev
```

## 🔐 Seguridad

- ✅ Variables de entorno en `.env` (no en git)
- ✅ Secrets en GitHub Actions
- ✅ HTTPS con certificados TLS
- ✅ Signed-embed para dashboards privados
- ✅ Validación de webhooks Stripe

## 📈 Monitoreo

- **Errores**: Sentry (`SENTRY_DSN`)
- **Analytics**: PostHog o Google Analytics
- **Logs**: Docker logs / Render dashboard
- **Uptime**: UptimeRobot / Pingdom

## 🤝 Contribución

Este es un proyecto personal, pero sugerencias son bienvenidas.

## 📝 Licencia

© 2025 CCruces - Todos los derechos reservados

## 📞 Contacto

- **Web**: https://tudominio.com
- **Email**: contacto@tudominio.com
- **GitHub**: https://github.com/TU_USUARIO

---

## ✅ Checklist de Despliegue

- [ ] Configurar dominio y DNS
- [ ] Crear repositorio GitHub
- [ ] Añadir secrets en GitHub
- [ ] Configurar Render/Fly/DO
- [ ] Push a `main` para trigger CI/CD
- [ ] Verificar build exitoso
- [ ] Configurar Metabase
- [ ] Añadir subdominios para demos
- [ ] Configurar Stripe webhooks
- [ ] Configurar monitoreo (Sentry)
- [ ] Backups automáticos de BD

---

**Estado**: 🚧 En desarrollo  
**Versión**: 1.0.0  
**Última actualización**: Diciembre 2025

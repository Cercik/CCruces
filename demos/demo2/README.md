# Demo 2 - Analytics en Tiempo Real

Demo de monitoreo de analytics con actualizaciones en vivo y feed de actividad.

## Características

- 📊 Métricas en tiempo real
- 🔄 Feed de actividad en vivo
- 📱 Diseño responsive
- 🎨 Efectos glassmorphism modernos
- 🌍 Distribución geográfica
- 📈 Top páginas visitadas

## Tecnologías

- HTML5
- Tailwind CSS (CDN)
- JavaScript Vanilla
- Animaciones CSS

## Cómo usar

### Opción 1: Servidor local simple
```bash
cd demos/demo2
python -m http.server 3002
```

Acceder a: http://localhost:3002

### Opción 2: Con Node.js
```bash
npx serve demos/demo2 -p 3002
```

### Opción 3: Abrir directamente
Abrir `index.html` en el navegador

## Simulación de Datos

Esta demo simula datos en tiempo real:
- Actualización de visitantes en vivo cada 2 segundos
- Nuevas actividades cada 3-7 segundos
- Incremento automático de páginas vistas
- Contador de tiempo promedio

## Deploy

Para desplegar en producción, copiar el contenido de `demos/demo2` a un hosting estático como:
- Vercel
- Netlify
- GitHub Pages
- Render Static Site

## Subdominio sugerido

`demo2.tudominio.com`

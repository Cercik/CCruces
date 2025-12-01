# Demo 1 - Dashboard Interactivo

Demo de un dashboard profesional con visualización de datos en tiempo real.

## Características

- 📊 Gráficos interactivos con Chart.js
- 🔄 Actualizaciones en tiempo real
- 📱 Diseño responsive
- 🎨 Gradientes y efectos glassmorphism
- 📈 3 tipos de gráficos: línea, barras y dona

## Tecnologías

- HTML5
- Tailwind CSS (CDN)
- Chart.js (CDN)
- JavaScript Vanilla

## Cómo usar

### Opción 1: Servidor local simple
```bash
cd demos/demo1
python -m http.server 3001
```

Acceder a: http://localhost:3001

### Opción 2: Con Node.js
```bash
npx serve demos/demo1 -p 3001
```

### Opción 3: Abrir directamente
Abrir `index.html` en el navegador

## Deploy

Para desplegar en producción, copiar el contenido de `demos/demo1` a un hosting estático como:
- Vercel
- Netlify
- GitHub Pages
- Render Static Site

## Subdominio sugerido

`demo1.tudominio.com`

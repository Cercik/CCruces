// Lee el proyecto a mostrar desde el query string (?proyecto=Bocado)
const params = new URLSearchParams(window.location.search);
const titulo = params.get('proyecto');

// Debe coincidir con el array de proyectos de script.js
const proyectos = [
    {
        titulo: "Bocado",
        descripcion: "Controlar el número exacto de raciones consumidas en el comedor de la empresa.",
        icono: "🚀",
        tags: ["App", "Comedor", "digital"],
        imagen: "img/Bocado Logo.png"
    },
    {
        titulo: "Proyecto 2",
        descripcion: "Descripción del segundo proyecto. Destaca las características principales.",
        icono: "💼",
        tags: ["React", "Node.js"]
    },
    {
        titulo: "Proyecto 3",
        descripcion: "Tu tercer proyecto increíble. Comparte los detalles importantes.",
        icono: "🎨",
        tags: ["Design", "UI/UX"]
    }
];

const proyecto = proyectos.find(p => p.titulo === titulo);

if (!proyecto) {
    document.getElementById('detalle-main').innerHTML = '<p>Proyecto no encontrado.</p>';
} else if (proyecto.titulo === "Bocado") {
    document.getElementById('detalle-main').innerHTML = `
        <section class="banner-bocado animate-fade-in">
            <div class="banner-img-block">
                <img src="img/Vista principal app.jpeg" alt="Vista principal Bocado" class="banner-img animate-pop" style="max-width:320px;border-radius:16px;box-shadow:0 6px 24px rgba(0,0,0,0.13);">
                <span class="aprobacion animate-bounce" title="Aprobado">👍</span>
            </div>
            <div class="banner-content">
                <h1 class="banner-title" style="font-size:2rem;margin-bottom:0.7rem;">Reduzca en un 15% el Desperdicio de Raciones:<br> <span style="color:var(--primary-color)">Control de Comedores Inteligente y Anti-Fraude.</span></h1>
                <a href="#" class="btn-primary animate-pulse" style="font-size:1.1rem;padding:0.7rem 2rem;margin-bottom:1rem;display:inline-block;">Solicite Demo</a>
                <div class="banner-resumen" style="margin-top:1rem;font-size:1.08rem;color:var(--text-dark);background:#f3f4f6;padding:1rem 1rem;border-radius:12px;max-width:480px;">
                    Optimice la gestión de raciones de su personal. <b>Bocado</b> integra control de comensales para pagar solo por lo que realmente se consume.
                </div>
            </div>
        </section>
        <section class="detalle-section cualidades-block animate-fade-in" style="margin-top:1.2rem;">
            <h2 class="detalle-section-title">Cualidades Destacadas</h2>
            <ul class="cualidades-list" style="list-style:disc inside;line-height:1.7;font-size:1.05rem;">
                <li><b>Velocidad QR/Código de Barras:</b> Escaneo ultrarrápido desde el fotocheck.</li>
                <li><b>Modo Offline:</b> Funciona sin señal en el campo. Sincroniza automáticamente.</li>
                <li><b>Semaforización Visual:</b> Pantalla completa en Verde (Apto) o Rojo (Denegado).</li>
                <li><b>Escalabilidad:</b> Integración sencilla con otros proyectos propios.</li>
                <li><b>Conexiones para reportería de datos:</b> Exporta y conecta con tus sistemas de análisis.</li>
            </ul>
        </section>
        <section class="detalle-section animate-fade-in" style="margin-top:1.2rem;">
            <h2 class="detalle-section-title">Preguntas y Respuestas</h2>
            <div class="faq-block">
                <div class="faq-item" style="margin-bottom:1rem;">
                    <b>¿Sabía que el 8% de sus raciones se pierden en desperdicio o fraude por falta de un control en tiempo real?</b>
                </div>
                <div class="faq-item" style="margin-bottom:1rem;">
                    <b>¡No más colas!</b> La validación manual le cuesta tiempo y productividad. <b>Bocado</b> reduce el tiempo de registro a 2 segundos por trabajador.
                </div>
                <div class="faq-item">
                    <b>Evite riesgos de salud laboral.</b> Asegure que los empleados con restricciones médicas reciban la ración correcta, validado por la data de su EMO.
                </div>
            </div>
        </section>
        <section class="indicador-ahorro animate-fade-in" style="margin-top:1.2rem;">
            <h2 class="detalle-section-title" style="margin-bottom:0.7rem;">Ahorro de Costos: 15% Menos Desperdicio</h2>
            <div class="indicador-grafico" style="background:#f3f4f6;padding:1.5rem 1.5rem;border-radius:16px;max-width:700px;">
                <canvas id="graficoAhorro" width="650" height="220" style="display:block;margin:0 auto;"></canvas>
                <div style="margin-top:1rem;font-size:1.08rem;color:var(--text-dark);text-align:center;">
                    <b>¡Ahorro sostenido!</b> Reduzca sus costos en <span style="color:#22c55e;font-weight:bold;">15%</span> desde el primer trimestre y manténgalo en el tiempo.
                </div>
            </div>
        </section>
    `;

    // Animaciones y gráfico dinámico
    setTimeout(() => {
        document.querySelectorAll('.animate-fade-in').forEach(el => {
            el.style.opacity = 1;
            el.style.transform = 'translateY(0)';
        });
    }, 100);

    // Gráfico realista con canvas
    const ctx = document.getElementById('graficoAhorro').getContext('2d');
    // Datos ejemplo: antes y 3 meses
    const datos = [180, 155, 150, 148];
    const labels = ['Antes', 'Mes 1', 'Mes 2', 'Mes 3+'];
    const colores = ['#6366f1', '#22c55e', '#22c55e', '#22c55e'];
    ctx.clearRect(0, 0, 650, 220);
    // Ejes
    ctx.strokeStyle = '#d1d5db';
    ctx.lineWidth = 1.5;
    ctx.beginPath();
    ctx.moveTo(60, 20);
    ctx.lineTo(60, 200);
    ctx.lineTo(630, 200);
    ctx.stroke();
    // Barras
    for (let i = 0; i < datos.length; i++) {
        const x = 120 + i * 130;
        const y = 200 - datos[i];
        ctx.fillStyle = colores[i];
        ctx.fillRect(x, y, 48, datos[i]);
        // Etiquetas
        ctx.fillStyle = '#6b7280';
        ctx.font = '16px Segoe UI, Arial';
        ctx.textAlign = 'center';
        ctx.fillText(labels[i], x + 24, 220);
        // Valor
        ctx.fillStyle = '#222';
        ctx.font = 'bold 18px Segoe UI, Arial';
        ctx.fillText(datos[i], x + 24, y - 10);
    }
    // Fin bloque Bocado
} else {
    document.getElementById('detalle-main').innerHTML = `
        <section class="detalle-header">
            <div>
                ${proyecto.imagen ? `<img src="${proyecto.imagen}" class="detalle-img" alt="${proyecto.titulo}">` : `<span class="detalle-img">${proyecto.icono}</span>`}
            </div>
            <div class="detalle-info">
                <h1 class="detalle-title">${proyecto.titulo}</h1>
                <div class="detalle-tags">
                    ${proyecto.tags.map(tag => `<span class="tag">${tag}</span>`).join('')}
                </div>
                <p style="margin-top:1rem;">${proyecto.descripcion}</p>
            </div>
        </section>
    `;
}

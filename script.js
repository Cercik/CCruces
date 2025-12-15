// Array de proyectos - Aquí puedes agregar tus proyectos
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

// Función para crear una tarjeta de proyecto
function crearTarjetaProyecto(proyecto) {
    return `
        <div class="project-card fade-in" data-titulo="${proyecto.titulo}">
            <div class="project-image">
                ${proyecto.imagen ? `<img src="${proyecto.imagen}" alt="${proyecto.titulo}" style="width:100%;height:200px;object-fit:contain;background:#fff;" loading="lazy" />` : proyecto.icono}
            </div>
            <div class="project-content">
                <h3 class="project-title">${proyecto.titulo}</h3>
                <p class="project-description">${proyecto.descripcion}</p>
                <div class="project-tags">
                    ${proyecto.tags.map(tag => `<span class="tag">${tag}</span>`).join('')}
                </div>
            </div>
        </div>
    `;
}

// Renderizar proyectos en el DOM
function renderizarProyectos() {
    const container = document.getElementById('projects-container');
    if (container) {
        container.innerHTML = proyectos.map(crearTarjetaProyecto).join('');
        // Agregar eventos a las tarjetas
        container.querySelectorAll('.project-card').forEach(card => {
            card.addEventListener('click', function() {
                const titulo = this.getAttribute('data-titulo');
                // Navegar a la vista de detalle
                window.location.href = `detalle.html?proyecto=${encodeURIComponent(titulo)}`;
            });
        });
    }
// Función para mostrar el modal de detalle de proyecto
// (El modal ya no se usa)
}

// Smooth scroll para navegación
document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
            const offsetTop = targetElement.offsetTop - 80;
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        }
        
        // Actualizar link activo
        document.querySelectorAll('.nav-links a').forEach(a => a.classList.remove('active'));
        this.classList.add('active');
    });
});

// Cambiar navegación al hacer scroll
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.style.boxShadow = '0 6px 12px rgba(0, 0, 0, 0.15)';
    } else {
        navbar.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
    }
    
    // Actualizar link activo según la sección visible
    const sections = document.querySelectorAll('section[id]');
    let current = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 100;
        const sectionHeight = section.clientHeight;
        
        if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
            current = section.getAttribute('id');
        }
    });
    
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});

// Inicializar al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    renderizarProyectos();
});

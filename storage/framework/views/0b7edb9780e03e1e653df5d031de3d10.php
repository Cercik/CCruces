

<?php $__env->startSection('title', 'Políticas de Privacidad - Nuestros Proyectos'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="gradient-bg text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <div class="inline-block p-4 bg-white/10 rounded-full backdrop-blur-sm mb-6">
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Políticas de Privacidad</h1>
            <p class="text-xl text-gray-100">
                Conoce nuestras políticas de privacidad y protección de datos para cada proyecto
            </p>
        </div>
    </div>
</section>

<!-- Content -->
<div class="container mx-auto px-4 py-16">
    <div class="max-w-6xl mx-auto">
        
        <div class="text-center mb-12">
            <p class="text-gray-600 text-lg">
                Selecciona un proyecto para ver su política de privacidad completa
            </p>
        </div>

        <!-- Proyectos Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Proyecto 1: Bocado -->
            <a href="/politicas/bocado" class="group">
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-blue-500">
                    <div class="flex items-center justify-center mb-6">
                        <div class="p-6 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl group-hover:scale-110 transition-transform">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3 text-center group-hover:text-orange-600 transition">
                        Bocado
                    </h3>
                    <p class="text-gray-600 text-center mb-4">
                        Aplicación móvil para registro de comedor institucional
                    </p>
                    <div class="flex items-center justify-center gap-2 text-blue-600 font-semibold">
                        <span>Ver política</span>
                        <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </div>
            </a>

            <!-- Proyecto 2: Placeholder -->
            <div class="bg-gradient-to-br from-gray-100 to-gray-200 rounded-3xl p-8 shadow-lg border-2 border-dashed border-gray-300 flex items-center justify-center">
                <div class="text-center">
                    <div class="inline-block p-4 bg-gray-300 rounded-full mb-4">
                        <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <p class="text-gray-500 font-semibold">Próximamente</p>
                </div>
            </div>

            <!-- Proyecto 3: Placeholder -->
            <div class="bg-gradient-to-br from-gray-100 to-gray-200 rounded-3xl p-8 shadow-lg border-2 border-dashed border-gray-300 flex items-center justify-center">
                <div class="text-center">
                    <div class="inline-block p-4 bg-gray-300 rounded-full mb-4">
                        <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <p class="text-gray-500 font-semibold">Próximamente</p>
                </div>
            </div>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\CCruces\CCruces v2\resources\views/politicas-seguridad.blade.php ENDPATH**/ ?>
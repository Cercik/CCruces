<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'CCruces V2'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="fixed w-full bg-white/95 backdrop-blur-sm shadow-lg z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="text-2xl font-bold gradient-text">
                    CCruces V2
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 transition font-medium">Inicio</a>
                    <a href="#servicios" class="text-gray-700 hover:text-blue-600 transition font-medium">Servicios</a>
                    <a href="#contacto" class="text-gray-700 hover:text-blue-600 transition font-medium">Contacto</a>
                    <a href="/politicas-seguridad" class="text-gray-700 hover:text-blue-600 transition font-medium">Políticas</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-2xl font-bold gradient-text mb-4">CCruces V2</h3>
                    <p class="text-gray-400">Soluciones tecnológicas innovadoras para tu negocio</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Enlaces</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="/" class="hover:text-white transition">Inicio</a></li>
                        <li><a href="#servicios" class="hover:text-white transition">Servicios</a></li>
                        <li><a href="/politicas-seguridad" class="hover:text-white transition">Políticas</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Contacto</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Email: contacto@ccruces.com</li>
                        <li>Teléfono: +51 999 888 777</li>
                        <li>Lima, Perú</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; <?php echo e(date('Y')); ?> CCruces V2. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
<?php /**PATH C:\Users\CCruces\CCruces v2\resources\views/layouts/app.blade.php ENDPATH**/ ?>
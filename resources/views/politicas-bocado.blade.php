@extends('layouts.app')

@section('title', 'Política de Privacidad - Bocado')

@section('content')
<!-- Hero Section -->
<section class="gradient-bg text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <a href="/politicas-seguridad" class="inline-flex items-center gap-2 text-white/80 hover:text-white mb-6 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver a proyectos
            </a>
            <div class="inline-block p-4 bg-orange-500/20 rounded-full backdrop-blur-sm mb-6">
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold mb-4">Bocado</h1>
            <p class="text-xl text-gray-100">Política de Privacidad</p>
            <p class="text-sm text-orange-200 mt-2">Registro de Comedor Institucional</p>
        </div>
    </div>
</section>

<!-- Contenido de la Política -->
<div class="container mx-auto px-4 py-16">
    <div class="max-w-4xl mx-auto">
        
        <!-- Fecha de Vigencia -->
        <div class="bg-orange-50 border-l-4 border-orange-500 p-6 rounded-r-xl mb-8">
            <p class="text-orange-900 font-semibold">
                📅 Fecha de entrada en vigor: <span class="font-bold">01 de enero del 2026</span>
            </p>
        </div>

        <!-- Introducción -->
        <div class="bg-white rounded-3xl p-8 md:p-10 shadow-lg mb-8">
            <p class="text-gray-700 leading-relaxed text-lg">
                Esta Política de Privacidad rige la forma en que la aplicación móvil <strong class="text-orange-600">Bocado</strong> 
                (en adelante, "la Aplicación") recopila, usa y protege la información.
            </p>
        </div>

        <!-- Sección 1: Alcance -->
        <section class="mb-8">
            <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-3xl p-8 md:p-10 shadow-xl">
                <div class="flex items-start gap-4 mb-6">
                    <div class="p-3 bg-blue-600 rounded-xl flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">1. Alcance de la Aplicación</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Bocado es una herramienta administrativa diseñada para ser utilizada por el personal autorizado 
                            de la institución o del comedor. Su objetivo principal es:
                        </p>
                        <div class="space-y-3 bg-white rounded-xl p-6">
                            <div class="flex items-start gap-3">
                                <span class="text-blue-600 font-bold text-lg">1.</span>
                                <p class="text-gray-700">
                                    Registrar la asistencia y el consumo de comidas (ej. almuerzo, cena) de los 
                                    estudiantes/usuarios a través de la lectura de códigos QR o el ingreso manual.
                                </p>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="text-blue-600 font-bold text-lg">2.</span>
                                <p class="text-gray-700">
                                    Sincronizar esta información con el sistema central de la institución.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección 2: Información Recopilada -->
        <section class="mb-8">
            <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div class="p-3 bg-purple-600 rounded-xl flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">2. Tipo de Información Recopilada</h2>
                        <p class="text-gray-700 leading-relaxed mb-6">
                            Dado que la Aplicación es una herramienta de registro de consumo, recopila y procesa la siguiente información:
                        </p>

                        <!-- 2.1 -->
                        <div class="bg-purple-50 rounded-xl p-6 mb-6">
                            <h3 class="text-xl font-bold text-purple-900 mb-4">2.1 Información de Registro de Consumo (Datos No Personales Directos)</h3>
                            <p class="text-gray-700 mb-4">
                                Esta información es capturada en el dispositivo y luego sincronizada con el servidor de la institución:
                            </p>
                            <ul class="space-y-3">
                                <li class="flex items-start gap-3">
                                    <span class="text-purple-600 font-bold mt-1">•</span>
                                    <div>
                                        <strong class="text-gray-800">Identificador de Usuario/Estudiante:</strong>
                                        <span class="text-gray-700"> Un código interno (ID de estudiante, código de barras, DNI o número de registro) 
                                        que el sistema utiliza para identificar a la persona que consume el servicio.</span>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="text-purple-600 font-bold mt-1">•</span>
                                    <div>
                                        <strong class="text-gray-800">Hora y Fecha:</strong>
                                        <span class="text-gray-700"> La marca de tiempo exacta del servicio de comida.</span>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="text-purple-600 font-bold mt-1">•</span>
                                    <div>
                                        <strong class="text-gray-800">Tipo de Servicio:</strong>
                                        <span class="text-gray-700"> El menú o tipo de comida consumida (ej. "Almuerzo general", "Dieta especial").</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- 2.2 -->
                        <div class="bg-blue-50 rounded-xl p-6">
                            <h3 class="text-xl font-bold text-blue-900 mb-4">2.2 Uso de la Cámara</h3>
                            <p class="text-gray-700 mb-4">
                                La Aplicación requiere acceso a la cámara del dispositivo para:
                            </p>
                            <div class="flex items-start gap-3 mb-4">
                                <span class="text-blue-600 font-bold mt-1">•</span>
                                <div>
                                    <strong class="text-gray-800">Escaneo de Códigos:</strong>
                                    <span class="text-gray-700"> Leer códigos QR o códigos de barras asociados al identificador del estudiante 
                                    para agilizar el registro.</span>
                                </div>
                            </div>
                            <div class="bg-blue-100 border-l-4 border-blue-600 p-4 rounded-r-lg">
                                <p class="text-blue-900 text-sm">
                                    <strong>Nota:</strong> La Aplicación utiliza la cámara únicamente con fines de escaneo de códigos de 
                                    identificación y no almacena ni transmite fotos o videos del entorno del usuario o del personal.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección 3: Uso de la Información -->
        <section class="mb-8">
            <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-3xl p-8 md:p-10 shadow-xl">
                <div class="flex items-start gap-4 mb-6">
                    <div class="p-3 bg-green-600 rounded-xl flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">3. Uso de la Información</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            La información recopilada es utilizada exclusivamente para:
                        </p>
                        <div class="space-y-4">
                            <div class="bg-white rounded-xl p-5">
                                <div class="flex items-start gap-3">
                                    <span class="text-green-600 font-bold">✓</span>
                                    <div>
                                        <strong class="text-gray-800">Función Principal:</strong>
                                        <p class="text-gray-700">Realizar y mantener un registro de asistencia y consumo de comidas para la institución.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl p-5">
                                <div class="flex items-start gap-3">
                                    <span class="text-green-600 font-bold">✓</span>
                                    <div>
                                        <strong class="text-gray-800">Gestión Operacional:</strong>
                                        <p class="text-gray-700">Generar reportes internos sobre el número de servicios, tendencias de consumo y control de asignaciones.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección 4: Almacenamiento -->
        <section class="mb-8">
            <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div class="p-3 bg-indigo-600 rounded-xl flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">4. Almacenamiento y Transferencia de Información</h2>
                        <div class="space-y-4">
                            <div class="border-l-4 border-indigo-500 pl-6 py-2">
                                <h3 class="font-bold text-lg text-gray-800 mb-2">Almacenamiento Local (Offline)</h3>
                                <p class="text-gray-700">
                                    La información de registro se almacena temporalmente en la memoria local del dispositivo del comedor 
                                    (base de datos Drift/SQLite) mientras la aplicación está offline.
                                </p>
                            </div>
                            <div class="border-l-4 border-indigo-500 pl-6 py-2">
                                <h3 class="font-bold text-lg text-gray-800 mb-2">Transferencia</h3>
                                <p class="text-gray-700">
                                    La Aplicación transfiere la información de registro al servidor central de la institución a través de 
                                    una conexión de internet segura (normalmente HTTPS), según la configuración de la institución. El desarrollador 
                                    de Bocado no accede, no almacena ni controla este servidor central ni los datos contenidos en él.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección 5: Servicios de Terceros -->
        <section class="mb-8">
            <div class="bg-gray-50 rounded-3xl p-8 md:p-10 shadow-xl">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-gray-600 rounded-xl flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">5. Servicios de Terceros</h2>
                        <div class="bg-white rounded-xl p-6 border-2 border-gray-300">
                            <p class="text-gray-700 text-center font-semibold">
                                Bocado no utiliza servicios de análisis de terceros, ni muestra publicidad.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección 6: Seguridad -->
        <section class="mb-8">
            <div class="bg-gradient-to-br from-red-50 to-orange-50 rounded-3xl p-8 md:p-10 shadow-xl">
                <div class="flex items-start gap-4 mb-6">
                    <div class="p-3 bg-red-600 rounded-xl flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">6. Seguridad</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            La seguridad de la información es gestionada en dos niveles:
                        </p>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-white rounded-xl p-6">
                                <h3 class="font-bold text-red-800 mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                    Dispositivo
                                </h3>
                                <p class="text-gray-700">
                                    El acceso a la Aplicación está restringido al personal autorizado mediante un mecanismo de autenticación.
                                </p>
                            </div>
                            <div class="bg-white rounded-xl p-6">
                                <h3 class="font-bold text-red-800 mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                                    </svg>
                                    Transferencia
                                </h3>
                                <p class="text-gray-700">
                                    La transferencia de datos al servidor de la institución se realiza mediante métodos de cifrado 
                                    estándar de la industria (como SSL/TLS).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección 7: Privacidad de Menores -->
        <section class="mb-8">
            <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-yellow-600 rounded-xl flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">7. Privacidad de Menores</h2>
                        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-r-xl">
                            <p class="text-gray-700 leading-relaxed">
                                La Aplicación está diseñada para procesar el consumo de servicios de estudiantes (incluidos menores de edad) 
                                dentro de un entorno institucional controlado. La Aplicación en sí misma no interactúa con los menores ni 
                                recopila su información de contacto o perfil.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección 8: Cambios -->
        <section class="mb-8">
            <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-3xl p-8 md:p-10 shadow-xl">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-cyan-600 rounded-xl flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">8. Cambios a Esta Política de Privacidad</h2>
                        <p class="text-gray-700 leading-relaxed">
                            Nos reservamos el derecho de actualizar esta política. Los cambios serán efectivos al publicarse en esta página. 
                            Se recomienda revisarla periódicamente.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección 9: Contacto -->
        <section class="mb-8">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-3xl p-8 md:p-10 shadow-2xl">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold mb-4">9. Contacto</h2>
                        <p class="text-blue-100 mb-6">
                            Si tiene preguntas sobre esta Política de Privacidad, por favor, contacte a:
                        </p>
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 space-y-3">
                            <div class="flex items-center gap-3">
                                <svg class="w-6 h-6 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                <div>
                                    <p class="text-sm text-blue-200">Nombre/Empresa de Soporte:</p>
                                    <p class="text-lg font-bold">BlueBox S.A.C.</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-6 h-6 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <div>
                                    <p class="text-sm text-blue-200">Correo Electrónico de Soporte:</p>
                                    <a href="mailto:info@blueboxsolutions.tech" class="text-lg font-bold hover:text-orange-300 transition">
                                        info@blueboxsolutions.tech
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Botón Volver -->
        <div class="text-center">
            <a href="/politicas-seguridad" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-red-500 text-white px-8 py-4 rounded-full font-bold hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver a todos los proyectos
            </a>
        </div>

    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'CCruces V2 - Inicio')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden gradient-bg text-white py-40">
    <div class="container mx-auto px-4 text-center relative z-10">
        <h1 class="text-6xl md:text-7xl font-bold mb-6 animate-fade-in-up">
            Bienvenido a <br><span class="gradient-text-enhanced bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-500">CCruces V2</span>
        </h1>
        <p class="text-xl md:text-2xl mb-10 text-gray-100 max-w-3xl mx-auto leading-relaxed animate-fade-in-up animation-delay-200">
            Nueva versión del proyecto con diseño mejorado y características avanzadas
        </p>
        <div class="flex gap-4 justify-center flex-wrap animate-fade-in-up animation-delay-400">
            <a href="#servicios" class="group bg-white text-blue-600 px-10 py-4 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:shadow-pink-500/50 transform hover:-translate-y-1 hover:scale-105">
                <span class="flex items-center gap-2">
                    Explorar
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="servicios" class="section-padding bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16 animate-fade-in-up">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider mb-2 block">Nuestros Servicios</span>
            <h2 class="text-5xl md:text-6xl font-bold mb-6 text-gray-800">
                Lo que <span class="gradient-text bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">Ofrecemos</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="group card-hover bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl mb-6 flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-gray-800 group-hover:text-blue-600 transition-colors">Desarrollo Web</h3>
                <p class="text-gray-600 leading-relaxed">
                    Sitios web modernos y responsivos con las últimas tecnologías
                </p>
            </div>

            <div class="group card-hover bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl mb-6 flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-gray-800 group-hover:text-green-600 transition-colors">Apps Móviles</h3>
                <p class="text-gray-600 leading-relaxed">
                    Aplicaciones nativas y multiplataforma de alto rendimiento
                </p>
            </div>

            <div class="group card-hover bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl mb-6 flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-gray-800 group-hover:text-orange-600 transition-colors">Optimización</h3>
                <p class="text-gray-600 leading-relaxed">
                    Mejoramos el rendimiento de tus aplicaciones existentes
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contacto" class="section-padding bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-5xl md:text-6xl font-bold mb-6">
                ¿Listo para <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-400">Empezar?</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8">
                Contáctanos y lleva tu proyecto al siguiente nivel
            </p>
            <a href="#" class="inline-block bg-white text-blue-600 px-10 py-4 rounded-full font-bold hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1 hover:scale-105">
                Contactar Ahora
            </a>
        </div>
    </div>
</section>
@endsection

'use client';

import { useState } from 'react';

export default function HomePage() {
    const [formData, setFormData] = useState({
        name: '',
        email: '',
        message: ''
    });
    const [formStatus, setFormStatus] = useState<{
        type: 'success' | 'error' | null;
        message: string;
    }>({ type: null, message: '' });
    const [isSubmitting, setIsSubmitting] = useState(false);

    const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
        setFormData({
            ...formData,
            [e.target.id]: e.target.value
        });
    };

    const handleSubmit = async (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        setIsSubmitting(true);
        setFormStatus({ type: null, message: '' });

        try {
            const response = await fetch('/api/contact', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData),
            });

            const data = await response.json();

            if (response.ok) {
                setFormStatus({
                    type: 'success',
                    message: data.message || '¡Mensaje enviado correctamente! Te responderemos pronto.'
                });
                setFormData({ name: '', email: '', message: '' });
            } else {
                setFormStatus({
                    type: 'error',
                    message: data.error || 'Error al enviar el mensaje. Por favor, intenta nuevamente.'
                });
            }
        } catch (error) {
            setFormStatus({
                type: 'error',
                message: 'Error de conexión. Por favor, verifica tu conexión a internet.'
            });
        } finally {
            setIsSubmitting(false);
        }
    };

    return (
        <main className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
            {/* Hero Section */}
            <div className="container mx-auto px-4 py-16">
                <div className="text-center max-w-4xl mx-auto">
                    <h1 className="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                        CCruces
                    </h1>
                    <p className="text-xl md:text-2xl text-gray-700 dark:text-gray-300 mb-4">
                        Desarrollo & Consultoría Tecnológica
                    </p>
                    <p className="text-lg text-gray-600 dark:text-gray-400 mb-12">
                        Apps Móviles • Desarrollo Web • Reportería de Datos • Business Intelligence
                    </p>

                    {/* CTA Buttons */}
                    <div className="flex flex-wrap justify-center gap-4 mb-16">
                        <a
                            href="#servicios"
                            className="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-colors shadow-lg"
                        >
                            Ver Servicios
                        </a>
                        <a
                            href="#portafolio"
                            className="px-8 py-3 bg-white hover:bg-gray-50 text-blue-600 rounded-lg font-semibold transition-colors shadow-lg border-2 border-blue-600"
                        >
                            Portafolio
                        </a>
                    </div>
                </div>

                {/* Services Section */}
                <section id="servicios" className="py-16">
                    <h2 className="text-4xl font-bold text-center text-gray-900 dark:text-white mb-12">
                        Servicios
                    </h2>
                    <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                        {/* Service Card 1 */}
                        <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                            <div className="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mb-4">
                                <span className="text-2xl">📱</span>
                            </div>
                            <h3 className="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                                Apps Móviles
                            </h3>
                            <p className="text-gray-600 dark:text-gray-400">
                                Desarrollo nativo y multiplataforma con Flutter, React Native y Swift
                            </p>
                        </div>

                        {/* Service Card 2 */}
                        <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                            <div className="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center mb-4">
                                <span className="text-2xl">🌐</span>
                            </div>
                            <h3 className="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                                Desarrollo Web
                            </h3>
                            <p className="text-gray-600 dark:text-gray-400">
                                Aplicaciones web modernas con Next.js, React y Node.js
                            </p>
                        </div>

                        {/* Service Card 3 */}
                        <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                            <div className="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center mb-4">
                                <span className="text-2xl">📊</span>
                            </div>
                            <h3 className="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                                Reportería de Datos
                            </h3>
                            <p className="text-gray-600 dark:text-gray-400">
                                Dashboards interactivos con Metabase, Power BI y visualización de datos
                            </p>
                        </div>

                        {/* Service Card 4 */}
                        <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                            <div className="w-12 h-12 bg-orange-100 dark:bg-orange-900 rounded-lg flex items-center justify-center mb-4">
                                <span className="text-2xl">💼</span>
                            </div>
                            <h3 className="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                                Consultoría
                            </h3>
                            <p className="text-gray-600 dark:text-gray-400">
                                Asesoría tecnológica, arquitectura de software y transformación digital
                            </p>
                        </div>
                    </div>
                </section>

                {/* Portfolio Section */}
                <section id="portafolio" className="py-16">
                    <h2 className="text-4xl font-bold text-center text-gray-900 dark:text-white mb-12">
                        Portafolio
                    </h2>
                    <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        {/* Project 1 - EduSmart 360 */}
                        <div className="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                            <div className="h-48 bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
                                <span className="text-6xl">🎓</span>
                            </div>
                            <div className="p-6">
                                <h3 className="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                                    EduSmart 360
                                </h3>
                                <p className="text-gray-600 dark:text-gray-400 mb-4">
                                    Plataforma integral de gestión educativa con módulos para padres, alumnos, docentes y administradores
                                </p>
                                <div className="flex flex-wrap gap-2">
                                    <span className="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm">
                                        Flutter
                                    </span>
                                    <span className="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full text-sm">
                                        Dart
                                    </span>
                                    <span className="px-3 py-1 bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 rounded-full text-sm">
                                        Mobile
                                    </span>
                                </div>
                            </div>
                        </div>

                        {/* Placeholder for more projects */}
                        <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border-2 border-dashed border-gray-300 dark:border-gray-600 flex items-center justify-center">
                            <div className="text-center">
                                <p className="text-gray-500 dark:text-gray-400 mb-2">Más proyectos próximamente</p>
                                <p className="text-sm text-gray-400 dark:text-gray-500">En desarrollo...</p>
                            </div>
                        </div>

                        <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border-2 border-dashed border-gray-300 dark:border-gray-600 flex items-center justify-center">
                            <div className="text-center">
                                <p className="text-gray-500 dark:text-gray-400 mb-2">Más proyectos próximamente</p>
                                <p className="text-sm text-gray-400 dark:text-gray-500">En desarrollo...</p>
                            </div>
                        </div>
                    </div>
                </section>

                {/* Sandbox / Demos Section */}
                <section id="demos" className="py-16">
                    <h2 className="text-4xl font-bold text-center text-gray-900 dark:text-white mb-12">
                        Sandbox & Demos
                    </h2>
                    <div className="bg-white dark:bg-gray-800 rounded-xl p-8 shadow-lg">
                        <p className="text-center text-gray-600 dark:text-gray-400 mb-6">
                            Explora demostraciones interactivas de tecnologías y proyectos
                        </p>
                        <div className="flex flex-wrap justify-center gap-4">
                            <a
                                href="/demos/demo1"
                                className="px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white rounded-lg font-semibold transition-all shadow-md"
                            >
                                Demo 1: Dashboard
                            </a>
                            <a
                                href="/demos/demo2"
                                className="px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white rounded-lg font-semibold transition-all shadow-md"
                            >
                                Demo 2: Analytics
                            </a>
                        </div>
                    </div>
                </section>

                {/* Contact Section */}
                <section id="contacto" className="py-16">
                    <h2 className="text-4xl font-bold text-center text-gray-900 dark:text-white mb-12">
                        Contacto
                    </h2>
                    <div className="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-xl p-8 shadow-lg">
                        {formStatus.type && (
                            <div className={`mb-6 p-4 rounded-lg ${
                                formStatus.type === 'success' 
                                    ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-100' 
                                    : 'bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-100'
                            }`}>
                                {formStatus.message}
                            </div>
                        )}
                        <form className="space-y-6" onSubmit={handleSubmit}>
                            <div>
                                <label htmlFor="name" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Nombre
                                </label>
                                <input
                                    type="text"
                                    id="name"
                                    value={formData.name}
                                    onChange={handleChange}
                                    required
                                    className="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                    placeholder="Tu nombre"
                                />
                            </div>
                            <div>
                                <label htmlFor="email" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Email
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    value={formData.email}
                                    onChange={handleChange}
                                    required
                                    className="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                    placeholder="tu@email.com"
                                />
                            </div>
                            <div>
                                <label htmlFor="message" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Mensaje
                                </label>
                                <textarea
                                    id="message"
                                    rows={4}
                                    value={formData.message}
                                    onChange={handleChange}
                                    required
                                    className="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                    placeholder="Cuéntame sobre tu proyecto..."
                                ></textarea>
                            </div>
                            <button
                                type="submit"
                                disabled={isSubmitting}
                                className="w-full px-8 py-3 bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white rounded-lg font-semibold transition-colors shadow-lg"
                            >
                                {isSubmitting ? 'Enviando...' : 'Enviar Mensaje'}
                            </button>
                        </form>
                    </div>
                </section>
            </div>

            {/* Footer */}
            <footer className="bg-gray-900 text-white py-8">
                <div className="container mx-auto px-4 text-center">
                    <p className="text-gray-400">
                        © 2025 CCruces - Todos los derechos reservados
                    </p>
                </div>
            </footer>
        </main>
    );
}

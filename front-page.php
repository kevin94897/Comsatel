<?php

/**
 * Template para la Página de Inicio (Home)
 */

get_header(); ?>

<main id="home">
    <!-- Hero Banner -->
    <section class="relative h-screen min-h-[600px] flex items-end">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_home-banner.png');">
        </div>

        <!-- Content -->
        <div class="container-full mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-32 leading-tight" data-aos="fade-up" data-aos-duration="1000">
                    SEGURIDAD EN EL<br>
                    TRANSPORTE EN RUTA
                </h1>
            </div>
        </div>

        <!-- Tracking Pin Graphic (Optional) -->
        <div class="absolute top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none">
            <div class="relative">
                <!-- You can add your custom tracking pin SVG or icon here -->
            </div>
        </div>
    </section>

    <section class="bg-dark">
        <div
            class="flex flex-row gap-4 items-center lg:justify-center py-4 px-4 overflow-x-scroll lg:overflow-x-hidden w-full whitespace-nowrap">
            <a href="#"
                class="px-8 py-2 bg-red-600 text-white text-center rounded-full hover:bg-red-700 transition-all duration-200 font-semibold"
                data-aos="zoom-in" data-aos-delay="100">
                Desafío
            </a>
            <a href="#"
                class="px-8 py-2 bg-transparent text-white text-center rounded-full hover:bg-white hover:text-gray-900 transition-all duration-200 font-semibold"
                data-aos="zoom-in" data-aos-delay="200">
                Portafolio de soluciones
            </a>
            <a href="#"
                class="px-8 py-2 bg-transparent text-white text-center rounded-full hover:bg-white hover:text-gray-900 transition-all duration-200 font-semibold"
                data-aos="zoom-in" data-aos-delay="300">
                Testimonios
            </a>
            <a href="#"
                class="px-8 py-2 bg-transparent text-white text-center rounded-full hover:bg-white hover:text-gray-900 transition-all duration-200 font-semibold"
                data-aos="zoom-in" data-aos-delay="400">
                Preguntas frecuentes
            </a>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="py-16 lg:py-24 bg-gray-50 motion-safe:animate-fade-in">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-down">Desafío</p>
                <p class="leading-relaxed mb-16 text-2xl font-semibold tracking-[-0.08px]" data-aos="fade-up" data-aos-delay="100">
                    Las operaciones de transporte enfrentan riesgos de robos, accidentes y pérdida de control en ruta.
                    El reto es mantener la seguridad del vehículo, la carga y el conductor en todo momento.
                </p>
                <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-down" data-aos-delay="200">Portafolio de soluciones</p>
                <h2 class="text-3xl lg:text-4xl font-semibold mb-4" data-aos="fade-up" data-aos-delay="300">
                    <span class="text-primary">Nuestras soluciones de seguridad en el transporte en ruta</span>
                </h2>
            </div>
        </div>
    </section>

    <!-- Solutions Grid -->
    <section class="pb-16 lg:pb-24 bg-gray-50">
        <div class="container mx-auto px-4 lg:px-8">

            <!-- Solution 1: Sistema de video -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-20 lg:mb-32">
                <div class="order-2 lg:order-1" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-img-01.png"
                        alt="Sistema de video" class="rounded-2xl shadow-lg w-full">
                </div>
                <div class="order-1 lg:order-2" data-aos="fade-left" data-aos-delay="200">
                    <p class="text-sm uppercase tracking-tighter mb-3 text-primary font-medium">Beneficios</p>
                    <h3 class="text-3xl lg:text-4xl font-semibold text-black mb-6">Sistema de video</h3>
                    <p class="leading-relaxed mb-6">
                        Gestión sobre kilómetros a pie de protección que necesitas en seguridad vial contra la
                        integración de tu flota, con video en vivo grabado de nuestros camiones.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-gray-700" data-aos="fade-right" data-aos-delay="300">
                            <svg class="w-5 h-5 text-primary mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Monitoreo en tiempo real
                        </li>
                        <li class="flex items-center text-gray-700" data-aos="fade-right" data-aos-delay="400">
                            <svg class="w-5 h-5 text-primary mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Prevención de incidentes
                        </li>
                        <li class="flex items-center text-gray-700" data-aos="fade-right" data-aos-delay="500">
                            <svg class="w-5 h-5 text-primary mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Protección de la carga
                        </li>
                        <li class="flex items-center text-gray-700" data-aos="fade-right" data-aos-delay="600">
                            <svg class="w-5 h-5 text-primary mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Recuperación eficiente
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Solution 2: Sistema de rastreo satelital -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-20 lg:mb-32">
                <div class="order-2" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-img-02.png"
                        alt="Sistema de rastreo satelital" class="rounded-2xl shadow-lg w-full">
                </div>
                <div class="order-1" data-aos="fade-right" data-aos-delay="200">
                    <p class="text-sm uppercase tracking-wider mb-3 text-primary font-medium">Servicio de rastreo</p>
                    <h3 class="text-3xl lg:text-4xl font-semibold mb-6">Sistema de rastreo satelital</h3>
                    <p class="leading-relaxed mb-6">
                        Controla el tránsito en tu flota con rastreo en tiempo real de los vehículos mediante el sistema
                        de nuestro sistema GPS/Glonass, lo brinda información en tiempo real y acceso a reportes
                        detallados para mejorar la productividad.
                    </p>
                    <a href="#"
                        class="inline-flex items-center text-primary font-semibold hover:text-red-700 transition-colors">
                        VER MÁS: RASTREO Y GESTIÓN DE FLOTAS
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Solution 3: Sello electrónico ThunderLock -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-20 lg:mb-32">
                <div class="order-2 lg:order-1" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-img-03.png"
                        alt="Sello electrónico ThunderLock" class="rounded-2xl shadow-lg w-full">
                </div>
                <div class="order-1 lg:order-2" data-aos="fade-left" data-aos-delay="200">
                    <p class="text-sm uppercase tracking-wider mb-3 text-primary font-medium">Solución</p>
                    <h3 class="text-3xl lg:text-4xl font-semibold mb-6">Sello electrónico ThunderLock</h3>
                    <p class="leading-relaxed mb-6">
                        Protege tu mercadería durante todo el trayecto con un sistema de bloqueo electrónico satelital
                        de alta seguridad para garantía que llegue sin incidentes.
                    </p>
                    <a href="#"
                        class="inline-flex items-center text-primary font-semibold hover:text-red-700 transition-colors">
                        VER MÁS: THUNDERLOCK CARGA Y ACTIVOS
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Solution 4: Botón de pánico y buzzer -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-20 lg:mb-32">
                <div class="order-2" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-img-04.png"
                        alt="Botón de pánico y buzzer" class="rounded-2xl shadow-lg w-full">
                </div>
                <div class="order-1" data-aos="fade-right" data-aos-delay="200">
                    <p class="text-sm uppercase tracking-wider mb-3 text-primary font-medium">Solución</p>
                    <h3 class="text-3xl lg:text-4xl font-semibold mb-6">Botón de pánico y buzzer</h3>
                    <p class="leading-relaxed mb-6">
                        Herramienta de seguridad básica y esencial que permite enviar una alerta inmediata en casos de
                        emergencia, alertando de manera temprana en casos de robo o violencia que puedan afectar a la
                        seguridad.
                    </p>
                    <a href="#"
                        class="inline-flex items-center text-primary font-semibold hover:text-red-700 transition-colors">
                        VER MÁS: ASISTENCIA AL CONDUCTOR
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Solution 5: Kit Dual -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-20 lg:mb-32">
                <div class="order-2 lg:order-1" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-img-05.png"
                        alt="Kit Dual" class="rounded-2xl shadow-lg w-full">
                </div>
                <div class="order-1 lg:order-2" data-aos="fade-left" data-aos-delay="200">
                    <p class="text-sm uppercase tracking-wider mb-3 text-primary font-medium">Controla y mantente</p>
                    <h3 class="text-3xl lg:text-4xl font-semibold mb-6">Kit Dual</h3>
                    <p class="leading-relaxed mb-6">
                        Nuestro kit combina y sincroniza en punto de contacto ideal porque lo puede adquirir para
                        facilitar asegurados, ayuda como complemento de todas nuestras soluciones tecnológicas.
                    </p>
                    <a href="#"
                        class="inline-flex items-center text-primary font-semibold hover:text-red-700 transition-colors">
                        VER MÁS: COMBUSTION Y GESTIÓN DE RUTA
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-semibold text-primary mb-4" data-aos="fade-up">
                    ¿Listo para optimizar la seguridad de tu flota?
                </h2>
                <p class="max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                    Cotiza tu solución y descubre cómo nuestras herramientas pueden transformar tu operación con
                    tecnologías de identificación y control.
                </p>
            </div>

            <div class="max-w-5xl mx-auto">
                <div class="rounded-2xl p-8 lg:p-12" data-aos="zoom-in" data-aos-delay="200">
                    <div class="grid lg:grid-cols-2 gap-8 items-center relative">
                        <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-dispositivos.png"
                                alt="Plataforma en múltiples dispositivos" class="w-full">
                        </div>
                        <div class="absolute top-0 left-0 opacity-10 shadow-lg p-8 max-w-[500px] bg-white rounded-2xl">
                            <h3 class="text-2xl lg:text-3xl font-semibold text-gray-900 mb-4">
                                Impulsa la seguridad de tu flota desde aquí
                            </h3>
                            <p class="mb-6">
                                Accede a nuestra plataforma de monitoreo desde cualquier lugar. Monitorea tu flota en
                                tiempo real con información precisa y actualizada.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="#" class="btn-primary">
                                    Regístrate
                                </a>
                                <a href="#" class="btn-secondary">
                                    Contacta al agente
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <p class="text-sm text-gray-400 uppercase tracking-wider mb-4 text-center" data-aos="fade-down">Confianza</p>
                <h2 class="text-3xl lg:text-4xl font-semibold text-gray-900 mb-8 text-center" data-aos="fade-up" data-aos-delay="100">
                    Confiado por empresas y personas en todo el país
                </h2>
                <p class="text-center mb-12" data-aos="fade-up" data-aos-delay="200">
                    Nuestros clientes dan clientes que han reconocido sus verdaderas gracias a nuestras soluciones.
                </p>

                <!-- Testimonial Card -->
                <div class="grid lg:grid-cols-2 gap-8 items-center bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="flip-left" data-aos-delay="300" data-aos-duration="1000">
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avis-testimonial.jpg"
                            alt="AVIS Testimonial" class="w-full h-full object-cover">
                    </div>
                    <div class="p-8 lg:p-12">
                        <h3 class="text-2xl font-semibold text-primary mb-4">AVIS</h3>
                        <p class="mb-6">
                            AVIS XYZ A través trabajó las fronteras de taller y innovación, buscó seguridad de nuestras
                            tecnologías para el control total donde cualquiera que fuera.
                        </p>
                        <p class="text-sm text-gray-500 mb-6">
                            <strong>María Torres,</strong> Gerente de Operaciones, Abril 2022
                        </p>
                        <a href="#"
                            class="inline-flex items-center text-primary font-semibold hover:text-red-700 transition-colors">
                            LEER CASO COMPLETO
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <div class="flex justify-center items-center gap-4 mt-8">
                    <button
                        class="w-12 h-12 rounded-full border-2 border-gray-300 flex items-center justify-center hover:border-red-600 hover:text-primary transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button
                        class="w-12 h-12 rounded-full border-2 border-gray-300 flex items-center justify-center hover:border-red-600 hover:text-primary transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer();

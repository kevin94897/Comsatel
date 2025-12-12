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
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-bold text-white mb-20 leading-tight" data-aos="fade-up"
                    data-aos-duration="1000">
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

    <?php
    $nav_buttons = array(
        array(
            'label' => 'Desafío',
            'url' => '#challenge',
            'style' => 'btn-primary',
            'delay' => 100
        ),
        array(
            'label' => 'Portafolio de soluciones',
            'url' => '#solutions',
            'style' => 'btn-outline-white',
            'delay' => 200
        ),
        array(
            'label' => 'Testimonios',
            'url' => '#testimonials',
            'style' => 'btn-outline-white',
            'delay' => 300
        ),
        array(
            'label' => 'Preguntas frecuentes',
            'url' => '#faqs',
            'style' => 'btn-outline-white',
            'delay' => 400
        ),
    );
    get_template_part('inc/componentes/section-nav-buttons', null, array('buttons' => $nav_buttons));
    ?>

    <!-- Intro Section -->
    <section class="py-12 lg:py-16 bg-gray-50 motion-safe:animate-fade-in" id="challenge">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-down">Desafío</p>
                <p class="leading-relaxed mb-0 md:text-2xl text-xl font-semibold tracking-[-0.08px]" data-aos="fade-up"
                    data-aos-delay="100">
                    Las operaciones de transporte enfrentan riesgos de robos, accidentes y pérdida de control en ruta.
                    El reto es mantener la seguridad del vehículo, la carga y el conductor en todo momento.
                </p>
            </div>
        </div>
    </section>

    <!-- Solutions Grid -->
    <section class="pb-16 lg:pb-24 pt-8 bg-gray-50" id="solutions">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-down" data-aos-delay="200">
                    Portafolio de soluciones</p>
                <h2 class="text-2xl lg:text-4xl font-semibold mb-4" data-aos="fade-up" data-aos-delay="300">
                    <span class="text-primary">Nuestras soluciones de seguridad en el transporte en ruta</span>
                </h2>
            </div>
            <!-- Solution 1: Sistema de video -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-12 lg:mb-20">
                <div class="order-2 lg:order-1" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-img-01.png"
                        alt="Sistema de video"
                        class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                </div>
                <div class="order-1 lg:order-2" data-aos="fade-left" data-aos-delay="200">
                    <p class="text-sm uppercase tracking-tighter mb-3 text-primary font-medium">Beneficios</p>
                    <h3 class="text-2xl lg:text-4xl font-semibold text-black mb-6">Sistema de video</h3>
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
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-12 lg:mb-20">
                <div class="order-2" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-img-02.png"
                        alt="Sistema de rastreo satelital"
                        class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                </div>
                <div class="order-1" data-aos="fade-right" data-aos-delay="200">
                    <p class="text-sm uppercase tracking-wider mb-3 text-primary font-medium">Servicio de rastreo</p>
                    <h3 class="text-2xl lg:text-4xl font-semibold mb-6">Sistema de rastreo satelital</h3>
                    <p class="leading-relaxed mb-6">
                        Controla el tránsito en tu flota con rastreo en tiempo real de los vehículos mediante el sistema
                        de nuestro sistema GPS/Glonass, lo brinda información en tiempo real y acceso a reportes
                        detallados para mejorar la productividad.
                    </p>
                    <?php
                    get_template_part('inc/componentes/button-arrow', null, array(
                        'text' => 'VER MÁS: RASTREO Y GESTIÓN DE FLOTAS',
                        'url' => '#'
                    ));
                    ?>
                </div>
            </div>

            <!-- Solution 3: Sello electrónico ThunderLock -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-12 lg:mb-20">
                <div class="order-2 lg:order-1" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-img-03.png"
                        alt="Sello electrónico ThunderLock"
                        class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                </div>
                <div class="order-1 lg:order-2" data-aos="fade-left" data-aos-delay="200">
                    <p class="text-sm uppercase tracking-wider mb-3 text-primary font-medium">Solución</p>
                    <h3 class="text-2xl lg:text-4xl font-semibold mb-6">Sello electrónico ThunderLock</h3>
                    <p class="leading-relaxed mb-6">
                        Protege tu mercadería durante todo el trayecto con un sistema de bloqueo electrónico satelital
                        de alta seguridad para garantía que llegue sin incidentes.
                    </p>
                    <?php
                    get_template_part('inc/componentes/button-arrow', null, array(
                        'text' => 'VER MÁS: THUNDERLOCK CARGA Y ACTIVOS',
                        'url' => '#'
                    ));
                    ?>
                </div>
            </div>

            <!-- Solution 4: Botón de pánico y buzzer -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-12 lg:mb-20">
                <div class="order-2" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-img-04.png"
                        alt="Botón de pánico y buzzer"
                        class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                </div>
                <div class="order-1" data-aos="fade-right" data-aos-delay="200">
                    <p class="text-sm uppercase tracking-wider mb-3 text-primary font-medium">Solución</p>
                    <h3 class="text-2xl lg:text-4xl font-semibold mb-6">Botón de pánico y buzzer</h3>
                    <p class="leading-relaxed mb-6">
                        Herramienta de seguridad básica y esencial que permite enviar una alerta inmediata en casos de
                        emergencia, alertando de manera temprana en casos de robo o violencia que puedan afectar a la
                        seguridad.
                    </p>
                    <?php
                    get_template_part('inc/componentes/button-arrow', null, array(
                        'text' => 'VER MÁS: ASISTENCIA AL CONDUCTOR',
                        'url' => '#'
                    ));
                    ?>
                </div>
            </div>

            <!-- Solution 5: Kit Dual -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <div class="order-2 lg:order-1" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-img-05.png"
                        alt="Kit Dual"
                        class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                </div>
                <div class="order-1 lg:order-2" data-aos="fade-left" data-aos-delay="200">
                    <p class="text-sm uppercase tracking-wider mb-3 text-primary font-medium">Controla y mantente</p>
                    <h3 class="text-2xl lg:text-4xl font-semibold mb-6">Kit Dual</h3>
                    <p class="leading-relaxed mb-6">
                        Nuestro kit combina y sincroniza en punto de contacto ideal porque lo puede adquirir para
                        facilitar asegurados, ayuda como complemento de todas nuestras soluciones tecnológicas.
                    </p>
                    <?php
                    get_template_part('inc/componentes/button-arrow', null, array(
                        'text' => 'VER MÁS: COMBUSTION Y GESTIÓN DE RUTA',
                        'url' => '#'
                    ));
                    ?>
                </div>
            </div>

        </div>
    </section>

    <!-- SECCIÓN CTA -->
    <?php get_template_part('inc/componentes/section-cta'); ?>

    <!-- SECCIÓN TESTIMONIOS -->
    <?php include get_template_directory() . '/inc/componentes/section-testimonios.php'; ?>

    <!-- SECCIÓN CLIENTES -->
    <?php include get_template_directory() . '/inc/componentes/section-clientes.php'; ?>

    <!-- SECCIÓN FAQ -->
    <?php include get_template_directory() . '/inc/componentes/section-faqs.php'; ?>

</main>

<?php get_footer();

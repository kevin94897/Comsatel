<?php

/**
 * Template Name: Sector
 */

get_header();
?>

<main class="producto-gps-page bg-gray-50">

    <!-- Hero Banner -->
    <section class="relative h-screen min-h-[600px] flex items-end <?php echo wp_title(); ?>">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_gps_banner.png');">
        </div>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <span class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-20 leading-tight mt-2" data-aos="fade-up"
                    data-aos-duration="1000">
                    SECTOR MINERIA
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
            'label' => 'Como funciona',
            'url' => '#how-it-works',
            'style' => 'btn-outline-white',
            'delay' => 200
        ),
        array(
            'label' => 'Soluciones',
            'url' => '#solutions',
            'style' => 'btn-outline-white',
            'delay' => 300
        ),
        array(
            'label' => 'Testimonios',
            'url' => '#testimonials',
            'style' => 'btn-outline-white',
            'delay' => 400
        ),
        array(
            'label' => 'Preguntas frecuentes',
            'url' => '#faqs',
            'style' => 'btn-outline-white',
            'delay' => 500
        ),
    );
    get_template_part('inc/componentes/section-nav-buttons', null, array('buttons' => $nav_buttons));
    ?>

    <!-- Intro Section -->
    <section class="py-12 lg:py-16 bg-gray-50 motion-safe:animate-fade-in" id="challenge">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-down">Desafío</p>
                <p class="leading-relaxed mb-0 md:text-2xl text-xl font-medium tracking-[-0.08px]" data-aos="fade-up"
                    data-aos-delay="100">
                    Monitorea cada vehículo y controla cada movimiento en línea con nuestros sistemas de localización GPS: Equipos robustos con localización de alta precisión para vehículos y activos con alertas inteligentes (salidas de ruta, detenciones prolongadas, excesos de velocidad).
                </p>
            </div>
        </div>
    </section>

    <?php

    $scroll_carousel_args = array(
        'section_id' => 'how-it-works',

        // Banner configuration
        'banner' => array(
            'title' => 'Cómo funciona Gestión de Flotas',
            'subtitle' => 'Gestión de Flotas',
            'description' => 'Desde la instalación hasta la recuperación, cada paso está diseñado para proteger tu vehículo y actuar de forma inmediata ante cualquier incidente.',
            'images' => array(
                array(
                    'url' => get_template_directory_uri() . '/images/comsatel_servicio-flotas.png',
                    'alt' => 'Candado GPS vista frontal'
                ),
            )
        ),

        // Cards for carousel
        'cards' => array(
            array(
                'icon' => '1',
                'title' => 'Incrementa la seguridad de tus vehículos y conductores',
                'description' => 'Equipos GPS, sensores e identificadores listos para integrarse a tu flota.',
                'image' => get_template_directory_uri() . '/images/comsatel_gps_card-img.png'
            ),
            array(
                'icon' => '2',
                'title' => 'Monitorea la ubicación de tu flota y activos en tiempo real',
                'description' => 'Ubica cada vehículo minuto a minuto y visualiza recorridos activos.',
                'image' => get_template_directory_uri() . '/images/comsatel_gps_card-img.png'
            ),
            array(
                'icon' => '3',
                'title' => 'Reduce costos operativos',
                'description' => 'Configura geocercas, rutas críticas y recibe alertas de desvíos.',
                'image' => get_template_directory_uri() . '/images/comsatel_gps_card-img.png'
            ),
            array(
                'icon' => '4',
                'title' => 'Mejorar la eficiencia y productividad de la flota',
                'description' => 'Asigna responsables, controla documentos y previene el uso no autorizado.',
                'image' => get_template_directory_uri() . '/images/comsatel_gps_card-img.png'
            ),
            array(
                'icon' => '5',
                'title' => 'Recuperación de activos en caso de robo',
                'description' => 'Genera reportes de desempeño, consumo y seguridad para tomar decisiones rápidas.',
                'image' => get_template_directory_uri() . '/images/comsatel_gps_card-img.png'
            ),
        )
    );

    // Render the component
    get_template_part('inc/componentes/section-scroll-carousel', null, $scroll_carousel_args);
    ?>

    <!-- Solutions Grid -->
    <section class="pb-16 lg:pb-24 pt-8 bg-gray-50" id="solutions">
        <div class="container-fluid py-6 lg:py-16 md:mb-20 mb-16 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_gps-title-banner-02.png');">
            <div class=" mx-auto px-4 lg:px-8 max-w-4xl">
                <!-- Header -->
                <div class="text-center">
                    <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-in">
                        PORTAFOLIO DE SOLUCIONES
                    </p>

                    <h2 class="text-2xl lg:text-4xl font-medium text-primary mb-4" data-aos="fade-in">
                        Tenemos las mejores soluciones para tu flota logística
                    </h2>
                    <p class="text-gray-600 leading-relaxed mb-8 max-w-2xl mx-auto" data-aos="fade-in" data-aos-delay="100">
                        Incrementa la eficiencia y seguridad de tu operación logística con tecnología de rastreo vehicular, gestión de flotas, videotelemática, sensores de monitoreo y protocolos de recupero especializados.
                    </p>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 lg:px-8">

            <!-- Solution 2: Sistema de rastreo satelital -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-12 lg:mb-20">
                <div class="order-2" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-img-02.png"
                        alt="Sistema de rastreo satelital"
                        class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                </div>
                <div class="order-1" data-aos="fade-right" data-aos-delay="200">
                    <div class="flex items-center gap-2 mb-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_sector-icon-video.png"
                            alt="Sistema de rastreo satelital"
                            class="w-10">
                        <p class="text-sm uppercase tracking-wider mb-0 text-gray-600 font-medium">COMSATEL VIDEO</p>
                    </div>
                    <h3 class="text-2xl lg:text-4xl font-medium mb-6">Video telemática</h3>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-gray-700" data-aos="fade-right" data-aos-delay="300">
                            <svg class="w-5 h-5 text-primary mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Alertas inteligentes
                        </li>
                        <li class="flex items-center text-gray-700" data-aos="fade-right" data-aos-delay="400">
                            <svg class="w-5 h-5 text-primary mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Ubicación e historial de recorridos
                        </li>
                        <li class="flex items-center text-gray-700" data-aos="fade-right" data-aos-delay="500">
                            <svg class="w-5 h-5 text-primary mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Control de zonas y eventos configurados
                        </li>
                        <li class="flex items-center text-gray-700" data-aos="fade-right" data-aos-delay="600">
                            <svg class="w-5 h-5 text-primary mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Análisis de conducción
                        </li>
                        <li class="flex items-center text-gray-700" data-aos="fade-right" data-aos-delay="700">
                            <svg class="w-5 h-5 text-primary mr-3 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Módulo Gestión de ruts
                        </li>
                    </ul>
                    <?php
                    get_template_part('inc/componentes/button-arrow', null, array(
                        'text' => 'VER MÁS: SISTEMAS DE VIDEO TELEMÁTICA',
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
                    <div class="flex items-center gap-2 mb-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_sector-icon-video.png"
                            alt="Sistema de rastreo satelital"
                            class="w-10">
                        <p class="text-sm uppercase tracking-wider mb-0 text-gray-600 font-medium">SVR X</p>
                    </div>
                    <h3 class="text-2xl lg:text-4xl font-medium mb-6">Asistencia al conductor y prevención de accidentes</h3>
                    <p class="leading-relaxed mb-6">
                        Integra el monitoreo 24/7 con un protocolo de recuperación inmediato, optimizando la seguridad de tu flota y asegurando el cumplimiento de tiempos y rutas.
                    </p>
                    <?php
                    get_template_part('inc/componentes/button-arrow', null, array(
                        'text' => 'VER MÁS: ASISTENCIA AL CONDUCTOR Y PREVENCIÓN DE ACCIDENTES',
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
                    <div class="flex items-center gap-2 mb-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_sector-icon-video.png"
                            alt="Sistema de rastreo satelital"
                            class="w-10">
                        <p class="text-sm uppercase tracking-wider mb-0 text-gray-600 font-medium">METEOR</p>
                    </div>
                    <h3 class="text-2xl lg:text-4xl font-medium mb-6">Videotelemática móvil</h3>
                    <p class="leading-relaxed mb-6">
                        Optimiza la eficiencia operativa mediante reportes detallados que identifican áreas de mejora, reducen el desgaste de la flota y elevan la seguridad del conductor.
                    </p>
                    <?php
                    get_template_part('inc/componentes/button-arrow', null, array(
                        'text' => 'VER MÁS: VIDEOTELEMÁTICA',
                        'url' => '#'
                    ));
                    ?>
                </div>
            </div>

            <!-- Solution 5: Sello electrónico ThunderLock -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-12 lg:mb-20">
                <div class="order-2 lg:order-1" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_soluciones-img-03.png"
                        alt="Sello electrónico ThunderLock"
                        class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                </div>
                <div class="order-1 lg:order-2" data-aos="fade-left" data-aos-delay="200">
                    <div class="flex items-center gap-2 mb-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_sector-icon-video.png"
                            alt="Sistema de rastreo satelital"
                            class="w-10">
                        <p class="text-sm uppercase tracking-wider mb-0 text-gray-600 font-medium">SECURITY CARGO</p>
                    </div>
                    <h3 class="text-2xl lg:text-4xl font-medium mb-6">Sensores de control y monitoreo del vehículo</h3>
                    <p class="leading-relaxed mb-6">
                        Aporta visibilidad y respaldo en tiempo real para conductores, custodios y personal operativo, mejorando la seguridad y la gestión de incidentes en ruta. </p>
                    <?php
                    get_template_part('inc/componentes/button-arrow', null, array(
                        'text' => 'VER MÁS: SENSORES DE CONTROL Y MONITOREO DEL VEHÍCULO',
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
    <?php get_template_part('inc/componentes/section-testimonios'); ?>

    <!-- SECCIÓN FAQS -->
    <?php get_template_part('inc/componentes/section-faqs'); ?>
</main>
<?php
get_footer();
?>
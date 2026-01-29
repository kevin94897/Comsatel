<?php

/**
 * Template Name: Servicio
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
                <span
                    class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-20 leading-tight mt-2"
                    data-aos="fade-up" data-aos-duration="1000">
                    SERVICIO DE RASTREO Y GESTION DE FLOTAS
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
            'label' => 'Otras soluciones',
            'url' => '#other-solutions',
            'style' => 'btn-outline-white',
            'delay' => 500
        ),
        array(
            'label' => 'Resultados medibles',
            'url' => '#stats-cards',
            'style' => 'btn-outline-white',
            'delay' => 600
        ),
        array(
            'label' => 'Preguntas frecuentes',
            'url' => '#faqs',
            'style' => 'btn-outline-white',
            'delay' => 700
        ),
    );
    get_template_part('inc/componentes/section-nav-buttons', null, array('buttons' => $nav_buttons));
    ?>

    <!-- Intro Section -->
    <section class="py-12 lg:py-16 bg-gray-50 motion-safe:animate-fade-in" id="challenge">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-down">Desafío</p>
                <p class="leading-relaxed mb-0 md:text-xl text-lg font-medium tracking-[-0.08px]" data-aos="fade-up"
                    data-aos-delay="100">
                    Monitorea cada vehículo y controla cada movimiento en línea con nuestros sistemas de localización
                    GPS: Equipos robustos con localización de alta precisión para vehículos y activos con alertas
                    inteligentes (salidas de ruta, detenciones prolongadas, excesos de velocidad).
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

    <?php

    $tabbed_content_args = array(
        'section_id' => 'solutions',
        'background_image' => get_template_directory_uri() . '/images/comsatel_gps-title-banner.png',
        'eyebrow' => 'PLANES',
        'title' => 'Elige el producto que mejor se adapta a ti',
        'description' => 'Descubre cómo nuestras soluciones mejoran la productividad, reducen costos y aseguran el control total de tu operación.',
        'tabs' => array(
            // First main tab: Clocator Premium
            array(
                'id' => 'clocator-premium',
                'label' => 'CLocator Premium',
                'content_tabs' => array(
                    array(
                        'id' => 'premium-bloqueo',
                        'label' => 'Bloqueo robusto y resistente a manipulación',
                        'image' => get_template_directory_uri() . '/images/comsatel_gps-tab-img.png',
                        'description' => 'Sistema de bloqueo de alta resistencia que previene intentos de manipulación no autorizada.'
                    ),
                    array(
                        'id' => 'premium-apertura',
                        'label' => 'Apertura controlada con llave electrónica o app',
                        'image' => get_template_directory_uri() . '/images/comsatel_gps-tab-img.png',
                        'description' => 'Control total de acceso mediante llave electrónica o aplicación móvil.'
                    ),
                    array(
                        'id' => 'premium-registro',
                        'label' => 'Registro en tiempo real de cada apertura o cierre',
                        'image' => get_template_directory_uri() . '/images/comsatel_gps-tab-img.png',
                        'description' => 'Monitoreo completo con registro automático de todos los eventos de apertura y cierre.'
                    ),
                    array(
                        'id' => 'premium-alertas',
                        'label' => 'Alertas inmediatas por intentos de corte o apertura no autorizada',
                        'image' => get_template_directory_uri() . '/images/comsatel_gps-tab-img.png',
                        'description' => 'Controla aperturas en tiempo real registra cada evento en la plataforma y recibe alertas inmediatas por intentos de manipulación garantizando seguridad en cada trayecto.'
                    ),
                    array(
                        'id' => 'premium-historial',
                        'label' => 'Historial completo de accesos para auditoría',
                        'image' => get_template_directory_uri() . '/images/comsatel_gps-tab-img.png',
                        'description' => 'Acceso completo al historial de eventos para auditorías y análisis.'
                    ),
                    array(
                        'id' => 'premium-compatible',
                        'label' => 'Compatible con contenedores, remolques y cisternas',
                        'image' => get_template_directory_uri() . '/images/comsatel_gps-tab-img.png',
                        'description' => 'Diseño versátil compatible con diferentes tipos de vehículos de carga.'
                    ),
                    array(
                        'id' => 'premium-respaldo',
                        'label' => 'Respaldo de central de operaciones 24/7',
                        'image' => get_template_directory_uri() . '/images/comsatel_gps-tab-img.png',
                        'description' => 'Soporte continuo con central de operaciones disponible las 24 horas.'
                    ),
                )
            ),

            // Second main tab: Clocator Plus
            array(
                'id' => 'clocator-plus',
                'label' => 'CLocator Plus',
                'content_tabs' => array(
                    array(
                        'id' => 'plus-feature-1',
                        'label' => 'Característica 1 de Plus',
                        'image' => get_template_directory_uri() . '/images/comsatel_gps-tab-img.png',
                        'description' => 'Descripción de la primera característica del plan Plus.'
                    ),
                    array(
                        'id' => 'plus-feature-2',
                        'label' => 'Característica 2 de Plus',
                        'image' => get_template_directory_uri() . '/images/comsatel_gps-tab-img.png',
                        'description' => 'Descripción de la segunda característica del plan Plus.'
                    ),
                    // Add more features as needed
                )
            ),

            // Third main tab: Clocator Estándar
            array(
                'id' => 'clocator-estandar',
                'label' => 'CLocator Estándar',
                'content_tabs' => array(
                    array(
                        'id' => 'estandar-feature-1',
                        'label' => 'Característica 1 de Estándar',
                        'image' => get_template_directory_uri() . '/images/comsatel_gps-tab-img.png',
                        'description' => 'Descripción de la primera característica del plan Estándar.'
                    ),
                    array(
                        'id' => 'estandar-feature-2',
                        'label' => 'Característica 2 de Estándar',
                        'image' => get_template_directory_uri() . '/images/comsatel_gps-tab-img.png',
                        'description' => 'Descripción de la segunda característica del plan Estándar.'
                    ),
                    // Add more features as needed
                )
            ),
        )
    );

    // Use the component
    get_template_part('inc/componentes/section-tabbed-content', null, $tabbed_content_args); ?>

    <!-- SECCIÓN CTA -->
    <?php get_template_part('inc/componentes/section-cta'); ?>

    <!-- SECCIÓN TESTIMONIOS -->
    <?php get_template_part('inc/componentes/section-testimonios'); ?>

    <!-- SECCIÓN PRODUCTOS -->
    <?php get_template_part('inc/componentes/section-productos-slider'); ?>

    <!-- Stats Cards Section -->
    <?php
    $stats_cards = array(
        'section_id' => 'stats-cards',
        'title' => 'Resultados medibles, Confianza comprobada',
        'cards' => array(
            array(
                'stat' => '96%',
                'description' => 'Tasa de efectividad en recupero de vehículos robados.',
                'image' => get_template_directory_uri() . '/images/comsatel_soluciones-img-01.png'
            ),
            array(
                'stat' => '13,000',
                'description' => 'Vehículos recuperados con nuestras soluciones.',
                'image' => get_template_directory_uri() . '/images/comsatel_soluciones-img-02.png'
            ),
            array(
                'stat' => '150M',
                'description' => 'En bienes asegurados devueltos a sus dueños.',
                'image' => get_template_directory_uri() . '/images/comsatel_home_cta-2.png'
            ),
        )
    );
    get_template_part('inc/componentes/section-stats-cards', null, $stats_cards);
    ?>

    <!-- SECCIÓN FAQS -->
    <?php get_template_part('inc/componentes/section-faqs'); ?>
</main>
<?php
get_footer();
?>
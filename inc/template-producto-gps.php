<?php

/**
 * Template Name: Producto GPS
 */

get_header();
?>

<main class="producto-gps-page">
    <!-- Hero Banner -->
    <section class="relative h-screen min-h-[600px] flex items-end <?php echo wp_title(); ?>">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_gps_banner.png');">
        </div>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-bold text-white mb-20 leading-tight" data-aos="fade-up"
                    data-aos-duration="1000">
                    CANDADO GPS
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
    );
    get_template_part('inc/componentes/section-nav-buttons', null, array('buttons' => $nav_buttons));
    ?>

</main>

<?php

$scroll_carousel_args = array(
    'section_id' => 'solutions-carousel',

    // Banner configuration
    'banner' => array(
        'title' => 'CANDADO GPS',
        'subtitle' => 'SOLUCIÓN INTELIGENTE',
        'description' => 'El dispositivo de seguridad más avanzado para el transporte de carga. Monitoreo en tiempo real y control total de tus activos.',
        'images' => array(
            array(
                'url' => get_template_directory_uri() . '/images/comsatel_gps-img.png',
                'alt' => 'Candado GPS vista frontal'
            ),
        )
    ),

    // Cards for carousel
    'cards' => array(
        array(
            'icon' => '1',
            'title' => 'Ubicación remota al instante',
            'description' => 'Obtén la ubicación exacta de tu carga en tiempo real desde cualquier dispositivo. Monitoreo GPS preciso las 24 horas.',
            'image' => get_template_directory_uri() . '/images/feature-ubicacion.jpg'
        ),
        array(
            'icon' => '2',
            'title' => 'Historial de recorridos',
            'description' => 'Accede al historial completo de rutas y movimientos. Analiza patrones y optimiza tus operaciones logísticas.',
            'image' => get_template_directory_uri() . '/images/feature-historial.jpg'
        ),
        array(
            'icon' => '3',
            'title' => 'Geocercas y alertas inteligentes',
            'description' => 'Configura zonas seguras y recibe alertas automáticas cuando tu carga entre o salga de áreas específicas.',
            'image' => get_template_directory_uri() . '/images/feature-geocercas.jpg'
        ),
        array(
            'icon' => '4',
            'title' => 'Autonomía inteligente',
            'description' => 'Batería de larga duración con gestión inteligente de energía. Hasta 6 meses de autonomía en modo standby.',
            'image' => get_template_directory_uri() . '/images/feature-bateria.jpg'
        ),
        array(
            'icon' => '5',
            'title' => 'Resguarda tus activos en casos de emergencia',
            'description' => 'Sistema de alertas inmediatas ante intentos de manipulación o apertura no autorizada. Protección 24/7.',
            'image' => get_template_directory_uri() . '/images/feature-seguridad.jpg'
        ),
    )
);

// Render the component
get_template_part('inc/componentes/section-scroll-carousel', null, $scroll_carousel_args);
?>

<?php

$tabbed_content_args = array(
    'section_id' => 'how-it-works',
    'background_image' => get_template_directory_uri() . '/images/comsatel_gps-title-banner.png',
    'eyebrow' => 'PLANES',
    'title' => 'Elige el producto que mejor se adapta a ti',
    'description' => 'Descubre cómo nuestras soluciones mejoran la productividad, reducen costos y aseguran el control total de tu operación.',
    'tabs' => array(
        // First main tab: Clocator Premium
        array(
            'id' => 'clocator-premium',
            'label' => 'Clocator Premium',
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
            'label' => 'Clocator Plus',
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
            'label' => 'Clocator Estándar',
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

<!-- SECCIÓN FAQS -->
<?php get_template_part('inc/componentes/section-faqs'); ?>

<?php
get_footer();
?>
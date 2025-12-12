<?php
/**
 * EXAMPLE: How to use section-scroll-carousel.php
 * 
 * Add this code to your template file (e.g., template-producto-gps.php)
 */

$scroll_carousel_args = array(
    'section_id' => 'solutions-carousel',

    // Banner configuration
    'banner' => array(
        'title' => 'CANDADO GPS',
        'subtitle' => 'SOLUCIÓN INTELIGENTE',
        'description' => 'El dispositivo de seguridad más avanzado para el transporte de carga. Monitoreo en tiempo real y control total de tus activos.',
        'images' => array(
            array(
                'url' => get_template_directory_uri() . '/images/candado-gps-1.jpg',
                'alt' => 'Candado GPS vista frontal'
            ),
            array(
                'url' => get_template_directory_uri() . '/images/candado-gps-2.jpg',
                'alt' => 'Candado GPS vista lateral'
            ),
            array(
                'url' => get_template_directory_uri() . '/images/candado-gps-3.jpg',
                'alt' => 'Candado GPS en uso'
            ),
            array(
                'url' => get_template_directory_uri() . '/images/candado-gps-4.jpg',
                'alt' => 'Candado GPS detalle'
            ),
            array(
                'url' => get_template_directory_uri() . '/images/candado-gps-5.jpg',
                'alt' => 'Candado GPS instalado'
            ),
            array(
                'url' => get_template_directory_uri() . '/images/candado-gps-6.jpg',
                'alt' => 'Candado GPS aplicación'
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

<?php

/**
 * Template Name: Nosotros
 */

get_header();

// ── ACF Data ──────────────────────────────────────────────
$nosotros_fields = get_fields();

// Encabezado
$encabezado        = $nosotros_fields['encabezado'] ?? [];
$enc_subtitulo     = $encabezado['subtitulo'] ?? '';
$enc_descripcion   = $encabezado['descripcion'] ?? '';

// Línea de tiempo
$linea_de_tiempo   = $nosotros_fields['linea_de_tiempo'] ?? [];
$sucesos           = $linea_de_tiempo['suceso'] ?? [];

// Presencia
$presencia         = $nosotros_fields['presencia'] ?? [];
$pres_titulo       = $presencia['titulo'] ?? '';
$pres_descripcion  = $presencia['descripcion'] ?? '';
$pres_texto_1      = $presencia['texto_1'] ?? '';
$pres_lista_1      = $presencia['lista_1'] ?? [];
$pres_texto_2      = $presencia['texto_2'] ?? '';
$pres_lista_2      = $presencia['lista_2'] ?? [];
$pres_imagen       = $presencia['imagen'] ?? [];

// Contadores
$contadores_group  = $nosotros_fields['contadores'] ?? [];
$contadores        = $contadores_group['contadores_numericos'] ?? [];

// Sobre nosotros / Trabajos / Certificados
$sobre_nosotros    = $nosotros_fields['sobre_nosotros'] ?? [];
$trabajos          = $nosotros_fields['trabajos'] ?? [];
$certificados_g    = $nosotros_fields['certificados'] ?? [];
?>

<main id="home" class="bg-dark-50">

    <!-- Hero Banner -->
    <section class="relative h-screen max-h-[500px] flex items-end bg-dark-900">
        <?php $hero_img = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
        <?php if ( $hero_img ) : ?>
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                 style="background-image: url('<?php echo esc_url( $hero_img ); ?>');">
            </div>
        <?php endif; ?>
        <div class="w-full md:container md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="max-w-xl">
                <span class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="heading-h1 font-bold text-white mb-20 mt-2 uppercase"
                    data-aos="fade-up" data-aos-duration="1000">
                    <?php echo get_the_title(); ?>
                </h1>
            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <?php if ( $enc_subtitulo || $enc_descripcion ) : ?>
        <section class="py-12 lg:py-16 bg-gray-50" id="challenge">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="max-w-4xl mx-auto text-center">
                    <?php if ( $enc_subtitulo ) : ?>
                        <p class="text-sm text-gray-500 uppercase tracking-wider mb-4" data-aos="fade-down">
                            <?php echo wp_kses_post( $enc_subtitulo ); ?>
                        </p>
                    <?php endif; ?>
                    <?php if ( $enc_descripcion ) : ?>
                        <p class="leading-relaxed mb-0 md:text-xl text-base font-medium tracking-[-0.08px]"
                           data-aos="fade-up" data-aos-delay="100">
                            <?php echo wp_kses_post( $enc_descripcion ); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Timeline Section -->
<?php if ( ! empty( $sucesos ) ) :
    $timeline_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="w-5 h-5 min-w-5" viewBox="0 0 24 24" fill="none">
        <g clip-path="url(#clip0_2460_5954)">
            <path d="M13.1629 2.16709L21.1839 7.99509C21.8779 8.49909 22.1679 9.39209 21.9029 10.2071L18.8389 19.6371C18.7098 20.0344 18.4583 20.3806 18.1204 20.6262C17.7825 20.8717 17.3756 21.004 16.9579 21.0041H7.04186C6.62415 21.004 6.21719 20.8717 5.87928 20.6262C5.54138 20.3806 5.28989 20.0344 5.16086 19.6371L2.09686 10.2071C1.96771 9.8097 1.96771 9.38162 2.09688 8.98424C2.22605 8.58686 2.47774 8.24059 2.81586 7.99509L10.8369 2.16709C11.1749 1.9214 11.582 1.78906 11.9999 1.78906C12.4177 1.78906 12.8249 1.9214 13.1629 2.16709Z"
                stroke="#E60000" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10 10L12 8V16" stroke="#E60000" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
        </g>
        <defs><clipPath id="clip0_2460_5954"><rect width="24" height="24" fill="white"/></clipPath></defs>
    </svg>';

    $fila_top    = [];
    $fila_bottom = [];
    foreach ( $sucesos as $i => $suceso ) {
        if ( $i % 2 === 0 ) $fila_top[]    = $suceso;
        else                 $fila_bottom[] = $suceso;
    }
?>
    <section class="bg-[#EEE] py-14 overflow-hidden">
        <div class="container mx-auto px-4 md:px-8">

            <!-- MOBILE: lista vertical simple -->
            <div class="flex flex-col gap-4 lg:hidden">
                <?php foreach ( $sucesos as $i => $item ) :
                    $item_titulo = $item['titulo'] ?? '';
                    $item_desc   = $item['descripcion'] ?? '';
                    if ( ! $item_titulo && ! $item_desc ) continue;
                ?>
                    <div class="flex gap-3 items-start"
                         data-aos="fade-up"
                         data-aos-delay="<?php echo ( $i + 1 ) * 100; ?>">
                        <!-- Línea vertical izquierda -->
                        <div class="flex flex-col items-center pt-1 flex-shrink-0">
                            <div class="w-2 h-2 rounded-full bg-[#E60000] flex-shrink-0"></div>
                            <?php if ( $i < count( $sucesos ) - 1 ) : ?>
                                <div class="w-px flex-1 min-h-[40px] bg-gray-300 mt-1"></div>
                            <?php endif; ?>
                        </div>
                        <!-- Card -->
                        <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 flex-1 mb-2">
                            <?php if ( $item_titulo ) : ?>
                                <div class="flex items-start gap-2 mb-2 font-bold text-[#1A1A1A]">
                                    <?php echo $timeline_icon; ?>
                                    <span><?php echo wp_kses_post( $item_titulo ); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if ( $item_desc ) : ?>
                                <p class="text-sm leading-relaxed text-gray-600">
                                    <?php echo wp_kses_post( $item_desc ); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- DESKTOP: layout dos filas con línea central -->
            <div class="hidden lg:block">
                <div class="max-w-5xl mx-auto">
                    <div class="flex flex-col">

                        <!-- Fila superior -->
                        <?php if ( ! empty( $fila_top ) ) : ?>
                            <div class="flex items-start gap-4">
                                <?php foreach ( $fila_top as $i => $item ) :
                                    $item_titulo = $item['titulo'] ?? '';
                                    $item_desc   = $item['descripcion'] ?? '';
                                    if ( ! $item_titulo && ! $item_desc ) continue;
                                ?>
                                    <div class="flex-1 min-w-0 pb-6"
                                         data-aos="fade-up"
                                         data-aos-delay="<?php echo ( $i + 1 ) * 100; ?>">
                                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                                            <?php if ( $item_titulo ) : ?>
                                                <div class="flex items-start gap-2 mb-2 font-bold text-[#1A1A1A] text-left">
                                                    <?php echo $timeline_icon; ?>
                                                    <span><?php echo wp_kses_post( $item_titulo ); ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ( $item_desc ) : ?>
                                                <p class="text-sm leading-relaxed text-gray-600 text-left">
                                                    <?php echo wp_kses_post( $item_desc ); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Línea separadora -->
                        <div class="relative w-full h-px bg-gray-300">
                            <div class="absolute top-1/2 left-0 h-0.5 bg-black -translate-y-1/2 flex justify-end items-center"
                                 data-aos="fade-right" data-aos-duration="1500" style="width: 15%;">
                                <div class="w-2.5 h-2.5 bg-black rounded-full border-2 border-[#F2F2F2]"></div>
                            </div>
                        </div>

                        <!-- Fila inferior -->
                        <?php if ( ! empty( $fila_bottom ) ) : ?>
                            <div class="flex items-start gap-8">
                                <div class="w-1/6 flex-shrink-0"></div>
                                <?php foreach ( $fila_bottom as $i => $item ) :
                                    $item_titulo = $item['titulo'] ?? '';
                                    $item_desc   = $item['descripcion'] ?? '';
                                    if ( ! $item_titulo && ! $item_desc ) continue;
                                ?>
                                    <div class="w-1/3 flex-shrink-0 pt-6"
                                         data-aos="fade-up"
                                         data-aos-delay="<?php echo ( $i + 4 ) * 100; ?>">
                                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                                            <?php if ( $item_titulo ) : ?>
                                                <div class="flex items-start gap-2 mb-2 font-bold text-[#1A1A1A] text-left">
                                                    <?php echo $timeline_icon; ?>
                                                    <span><?php echo wp_kses_post( $item_titulo ); ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ( $item_desc ) : ?>
                                                <p class="text-sm leading-relaxed text-gray-600 text-left">
                                                    <?php echo wp_kses_post( $item_desc ); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>
    </section>
<?php endif; ?>

    <!-- Map / Presencia Section -->
    <?php
    $has_presencia = $pres_titulo || $pres_descripcion || $pres_texto_1 || ! empty( $pres_lista_1 )
                  || $pres_texto_2 || ! empty( $pres_lista_2 ) || ! empty( $pres_imagen['url'] );
    ?>
    <?php if ( $has_presencia ) : ?>
        <section class="bg-dark-50 px-6 md:px-24 py-12 lg:py-16 overflow-hidden">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="space-y-8">

                    <?php if ( $pres_titulo || $pres_descripcion ) : ?>
                        <header class="space-y-4">
                            <?php if ( $pres_titulo ) : ?>
                                <h2 class="heading-h2 font-medium text-gray-900">
                                    <?php echo wp_kses_post( $pres_titulo ); ?>
                                </h2>
                            <?php endif; ?>
                            <?php if ( $pres_descripcion ) : ?>
                                <p class="text-gray-600 text-lg leading-relaxed max-w-lg">
                                    <?php echo wp_kses_post( $pres_descripcion ); ?>
                                </p>
                            <?php endif; ?>
                        </header>
                    <?php endif; ?>

                    <?php if ( $pres_texto_1 || ! empty( $pres_lista_1 ) || $pres_texto_2 || ! empty( $pres_lista_2 ) ) : ?>
                        <div class="grid grid-cols-2 gap-8">

                            <?php if ( $pres_texto_1 || ! empty( $pres_lista_1 ) ) : ?>
                                <div>
                                    <?php if ( $pres_texto_1 ) : ?>
                                        <h3 class="heading-h3 font-medium mb-4 text-gray-900">
                                            <?php echo wp_kses_post( $pres_texto_1 ); ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $pres_lista_1 ) ) : ?>
                                        <ul class="space-y-2 text-gray-600 pl-4">
                                            <?php foreach ( $pres_lista_1 as $row ) :
                                                $item_val = $row['item'] ?? '';
                                                if ( ! $item_val ) continue;
                                            ?>
                                                <li><?php echo wp_kses_post( $item_val ); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( $pres_texto_2 || ! empty( $pres_lista_2 ) ) : ?>
                                <div>
                                    <?php if ( $pres_texto_2 ) : ?>
                                        <h3 class="heading-h3 font-medium mb-4 text-gray-900">
                                            <?php echo wp_kses_post( $pres_texto_2 ); ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $pres_lista_2 ) ) : ?>
                                        <ul class="space-y-2 text-gray-600 pl-4">
                                            <?php foreach ( $pres_lista_2 as $row ) :
                                                $item_val = $row['item'] ?? '';
                                                if ( ! $item_val ) continue;
                                            ?>
                                                <li><?php echo wp_kses_post( $item_val ); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>

                </div>

                <!-- Imagen del mapa -->
                <?php if ( ! empty( $pres_imagen['url'] ) ) : ?>
                    <div class="relative w-full max-w-2xl mx-auto overflow-hidden">
                        <img src="<?php echo esc_url( $pres_imagen['url'] ); ?>"
                             alt="<?php echo esc_attr( $pres_imagen['alt'] ?? 'Mapa' ); ?>"
                             class="w-full h-auto block">

                        <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 500 700"
                             preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <filter id="glow-line" x="-20%" y="-20%" width="140%" height="140%">
                                    <feGaussianBlur stdDeviation="3" result="blur"/>
                                    <feComposite in="SourceGraphic" in2="blur" operator="over"/>
                                </filter>
                                <linearGradient id="lineGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%"   stop-color="#FF0000" stop-opacity="0.2"/>
                                    <stop offset="100%" stop-color="#FF0000" stop-opacity="1"/>
                                </linearGradient>
                            </defs>
                            <path id="route"
                                  d="M220,180 Q250,250 210,320 T230,450 T320,580"
                                  stroke="url(#lineGradient)" stroke-width="3" fill="none"
                                  stroke-linecap="round" stroke-dasharray="1000" stroke-dashoffset="1000"
                                  filter="url(#glow-line)" class="animate-draw-path"/>
                            <g class="node animate-pop-in" style="animation-delay: 0.2s;">
                                <circle cx="220" cy="180" r="5"  fill="#FF0000"/>
                                <circle cx="220" cy="180" r="12" stroke="#FF0000" stroke-width="2" fill="none" class="animate-ping-slow"/>
                            </g>
                            <g class="node animate-pop-in" style="animation-delay: 1.5s;">
                                <circle cx="210" cy="320" r="5"  fill="#FF0000"/>
                                <circle cx="210" cy="320" r="10" stroke="#FF0000" stroke-width="1.5" fill="none" class="animate-ping-slow"/>
                            </g>
                            <g class="node animate-pop-in" style="animation-delay: 3s;">
                                <circle cx="320" cy="580" r="6"  fill="#FF0000"/>
                                <circle cx="320" cy="580" r="15" stroke="#FF0000" stroke-width="2" fill="none" class="animate-ping-slow"/>
                            </g>
                        </svg>
                    </div>
                <?php endif; ?>

            </div>
        </section>
    <?php endif; ?>

    <!-- Counters Section -->
    <?php if ( ! empty( $contadores ) ) : ?>
        <?php
        get_template_part( 'inc/componentes/section-counters', null, array(
            'counters' => array_map( function ( $c ) {
                return array(
                    'number' => $c['numero']      ?? '',
                    'prefix' => $c['prefijo']     ?? '',
                    'suffix' => $c['sufijo']      ?? '',
                    'label'  => $c['descripcion'] ?? '',
                );
            }, $contadores ),
        ) );
        ?>
    <?php endif; ?>

    <!-- SECCIÓN TRABAJA CON NOSOTROS -->
    <?php if ( ! empty( $sobre_nosotros ) || ! empty( $trabajos ) ) : ?>
        <?php get_template_part( 'inc/componentes/section-trabaja-con-nosotros', null, array(
            'sobre_nosotros' => $sobre_nosotros,
            'trabajos'       => $trabajos,
        ) ); ?>
    <?php endif; ?>

    <!-- SECCION CLIENTES -->
    <?php get_template_part( 'inc/componentes/section-clientes' ); ?>

    <!-- SECCION CERTIFICADOS -->
    <?php
    $lista_certificados = $certificados_g['lista_de_certificados'] ?? [];
    if ( ! empty( $lista_certificados ) ) :
        get_template_part( 'inc/componentes/section-certificados', null, array(
            'certificados' => $lista_certificados,
        ) );
    endif;
    ?>

    <!-- SECCIÓN FAQS -->
    <?php get_template_part( 'inc/componentes/section-faqs' ); ?>

</main>

<?php get_footer(); ?>
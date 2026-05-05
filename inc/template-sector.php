<?php

/**
 * Template Name: Sector
 */

get_header();
?>

<main class="producto-gps-page bg-gray-50">

    <!-- Hero Banner -->
    <section class="relative h-screen min-h-[600px] flex items-end bg-dark-900">

        <?php $hero_img = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
        <?php if ($hero_img): ?>
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('<?php echo esc_url($hero_img); ?>');">
            </div>
        <?php endif; ?>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-xl">
                <span
                    class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="heading-h1 font-bold text-white mb-20 leading-tight mt-2 uppercase" data-aos="fade-up"
                    data-aos-duration="1000">
                    <?php echo get_the_title(); ?>
                </h1>
            </div>
        </div>
    </section>

    <?php
    $nav_buttons = array();
    $acf_group = get_field('sectores', 'options');
    $acf_nav_buttons = $acf_group['botones'] ?? null;

    if (!empty($acf_nav_buttons)) {
        foreach ($acf_nav_buttons as $index => $btn) {
            $link = $btn['texto_del_boton'];
            if ($link) {
                $nav_buttons[] = array(
                    'label' => $link['title'],
                    'url' => $link['url'],
                    'style' => $index === 0 ? 'btn btn-primary' : 'btn btn-outline-white',
                    'delay' => ($index + 1) * 100
                );
            }
        }
    }

    if (empty($nav_buttons)) {
        $nav_buttons = array(
            array('label' => 'Desafío', 'url' => '#desafio', 'style' => 'btn btn-primary', 'delay' => 100),
            array('label' => 'Cómo funciona', 'url' => '#como-funciona', 'style' => 'btn btn-outline-white', 'delay' => 200),
            array('label' => 'Soluciones', 'url' => '#soluciones', 'style' => 'btn btn-outline-white', 'delay' => 300),
            array('label' => 'Testimonios', 'url' => '#testimonios', 'style' => 'btn btn-outline-white', 'delay' => 400),
            array('label' => 'Preguntas frecuentes', 'url' => '#preguntas-frecuentes', 'style' => 'btn btn-outline-white', 'delay' => 500),
        );
    }

    get_template_part('inc/componentes/section-nav-buttons', null, array('buttons' => $nav_buttons));
    ?>

    <!-- Intro Section -->
    <?php
    $encabezado = get_field('encabezado');
    $subtitulo = $encabezado['subtitulo'] ?? null;
    $descripcion = $encabezado['descripcion'] ?? null;
    ?>
    <?php if ($subtitulo || $descripcion): ?>
        <section class="py-12 lg:py-16 bg-white motion-safe:animate-fade-in" id="desafio">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="max-w-4xl mx-auto text-center">
                    <?php if (!empty($subtitulo)): ?>
                        <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-down">
                            <?php echo wp_kses_post($subtitulo); ?>
                        </p>
                    <?php endif; ?>
                    <?php if (!empty($descripcion)): ?>
                        <p class="leading-relaxed mb-0 md:text-xl text-md font-medium tracking-[-0.08px]" data-aos="fade-up"
                            data-aos-delay="100">
                            <?php echo wp_kses_post($descripcion); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    // ── Scroll Carousel (Cómo funciona) ──────────────────────────────────────
    $bannerslider = get_field('bannerslider');
    $bs_banner = $bannerslider['banner'] ?? [];
    $bs_slider = $bannerslider['slider'] ?? [];
    $bs_items = $bs_slider['items_del_slider'] ?? [];

    $carousel_cards = [];
    if (!empty($bs_items)) {
        $counter = 1;
        foreach ($bs_items as $item) {
            $card_title = $item['titulo'] ?? '';
            $card_desc = $item['descripcion'] ?? '';
            if (!$card_title && !$card_desc)
                continue;
            $card = array(
                'icon' => (string) $counter,
                'title' => $card_title,
                'description' => $card_desc,
            );
            if (!empty($item['imagen']['url'])) {
                $card['image'] = $item['imagen']['url'];
            }
            $carousel_cards[] = $card;
            $counter++;
        }
    }

    $has_carousel = !empty($bs_banner) || !empty($carousel_cards);
    if ($has_carousel):
        $scroll_carousel_args = array(
            'section_id' => 'como-funciona',
            'banner' => array(
                'title' => $bs_banner['titulo'] ?? null,
                'subtitle' => $bs_banner['subtitulo'] ?? null,
                'description' => $bs_banner['descripcion'] ?? null,
                'images' => !empty($bs_banner['imagen']['url']) ? array(
                    array(
                        'url' => $bs_banner['imagen']['url'],
                        'alt' => $bs_banner['imagen']['alt'] ?? null,
                    )
                ) : [],
            ),
            'cards' => $carousel_cards,
        );
        get_template_part('inc/componentes/section-scroll-carousel', null, $scroll_carousel_args);
    endif;
    ?>

    <!-- Portfolio / Soluciones Section -->
    <?php
    $banner_titulo = get_field('banner_titulo');
    $bt_subtitulo = $banner_titulo['subtitulo'] ?? null;
    $bt_titulo = $banner_titulo['titulo'] ?? null;
    $bt_descripcion = $banner_titulo['descripcion'] ?? null;
    $bt_bg_url = $banner_titulo['imagen_de_fondo']['url'] ?? null;

    $soluciones_group = get_field('soluciones');
    $lista_soluciones = $soluciones_group['lista_de_soluciones'] ?? null;

    $has_solutions_section = $bt_subtitulo || $bt_titulo || $bt_descripcion || $bt_bg_url || !empty($lista_soluciones);
    ?>
    <?php if ($has_solutions_section): ?>
        <section class="pb-16 lg:pb-24 pt-8 bg-wwhite" id="soluciones">

            <?php if ($bt_subtitulo || $bt_titulo || $bt_descripcion || $bt_bg_url): ?>
                <div class="container-fluid py-6 lg:py-16 md:mb-20 mb-16 bg-cover bg-center bg-no-repeat" <?php if ($bt_bg_url): ?>style="background-image: url('<?php echo esc_url($bt_bg_url); ?>');" <?php endif; ?>>
                    <div class="mx-auto px-4 lg:px-8 max-w-4xl">
                        <div class="text-center">
                            <?php if (!empty($bt_subtitulo)): ?>
                                <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-in">
                                    <?php echo wp_kses_post($bt_subtitulo); ?>
                                </p>
                            <?php endif; ?>
                            <?php if (!empty($bt_titulo)): ?>
                                <h2 class="text-xl lg:text-4xl font-medium text-primary mb-4" data-aos="fade-in">
                                    <?php echo wp_kses_post($bt_titulo); ?>
                                </h2>
                            <?php endif; ?>
                            <?php if (!empty($bt_descripcion)): ?>
                                <p class="text-gray-600 leading-relaxed mb-8 max-w-2xl mx-auto" data-aos="fade-in"
                                    data-aos-delay="100">
                                    <?php echo wp_kses_post($bt_descripcion); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($lista_soluciones)): ?>
                <div class="container mx-auto px-4 lg:px-8">
                    <?php
                    $counter = 0;
                    foreach ($lista_soluciones as $solucion):
                        $s_imagen = $solucion['imagen'] ?? null;
                        $s_subtitulo = $solucion['subtitulo'] ?? null;
                        $s_titulo = $solucion['titulo'] ?? null;
                        $s_descripcion = $solucion['descripcion'] ?? null;
                        $s_bullets = $solucion['bullets'] ?? null;
                        $s_boton = $solucion['boton'] ?? null;

                        // Omitir si no hay título
                        if (!$s_titulo) {
                            $counter++;
                            continue;
                        }

                        $is_even = ($counter % 2 !== 0);
                        ?>
                        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-12 lg:mb-20">

                            <!-- Imagen -->
                            <?php if (!empty($s_imagen['url'])): ?>
                                <div class="order-2 <?php echo $is_even ? 'lg:order-1' : 'lg:order-2'; ?>" data-aos="zoom-in"
                                    data-aos-duration="1000">
                                    <img src="<?php echo esc_url($s_imagen['url']); ?>"
                                        alt="<?php echo esc_attr($s_imagen['alt'] ?? $s_titulo); ?>"
                                        class="rounded-2xl transition-transform duration-500 hover:scale-105">
                                </div>
                            <?php endif; ?>

                            <!-- Contenido -->
                            <div class="order-1 <?php echo $is_even ? 'lg:order-2' : 'lg:order-1'; ?>"
                                data-aos="<?php echo $is_even ? 'fade-left' : 'fade-right'; ?>" data-aos-delay="200">

                                <?php if (!empty($s_subtitulo)): ?>
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="text-sm uppercase tracking-wider mb-0 text-gray-600 font-medium">
                                            <?php echo wp_kses_post($s_subtitulo); ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($s_titulo)): ?>
                                    <h3 class="text-2xl lg:text-3xl font-medium mb-6">
                                        <?php echo wp_kses_post($s_titulo); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if (!empty($s_descripcion)): ?>
                                    <p class="leading-relaxed mb-6"><?php echo wp_kses_post($s_descripcion); ?></p>
                                <?php endif; ?>

                                <?php if (!empty($s_bullets)): ?>
                                    <ul class="space-y-3 mb-8">
                                        <?php foreach ($s_bullets as $bullet):
                                            $bullet_item = $bullet['item'] ?? '';
                                            if (!$bullet_item)
                                                continue;
                                            ?>
                                            <li class="flex items-center text-gray-700" data-aos="fade-right">
                                                <svg class="w-5 h-5 text-primary mr-3 flex-shrink-0" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <?php echo wp_kses_post($bullet_item); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <?php if (!empty($s_boton['url'])): ?>
                                    <?php
                                    get_template_part('inc/componentes/button-arrow', null, array(
                                        'text' => $s_boton['title'] ?? null,
                                        'url' => $s_boton['url'],
                                        'target' => $s_boton['target'] ?? '_self',
                                    ));
                                    ?>
                                <?php endif; ?>

                            </div>
                        </div>
                        <?php
                        $counter++;
                    endforeach;
                    ?>
                </div>
            <?php endif; ?>

        </section>
    <?php endif; ?>

    <!-- SECCIÓN CTA -->
    <?php get_template_part('inc/componentes/section-cta'); ?>

    <!-- SECCIÓN TESTIMONIOS -->
    <?php get_template_part('inc/componentes/section-testimonios'); ?>

    <!-- SECCIÓN FAQS -->
    <?php get_template_part('inc/componentes/section-faqs'); ?>

</main>

<?php get_footer(); ?>
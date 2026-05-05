<?php

/**
 * Template Name: Producto
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
    $acf_group = get_field('productos', 'options');
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
            array('label' => 'Otras soluciones', 'url' => '#otras-soluciones', 'style' => 'btn btn-outline-white', 'delay' => 500),
            array('label' => 'Preguntas frecuentes', 'url' => '#preguntas-frecuentes', 'style' => 'btn btn-outline-white', 'delay' => 600),
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
                'images' => (function () use ($bs_banner) {
                    $imgs = [];
                    if (!empty($bs_banner['imagen']['url'])) {
                        $imgs[] = [
                            'url' => $bs_banner['imagen']['url'],
                            'alt' => $bs_banner['imagen']['alt'] ?? null,
                        ];
                    }
                    if (!empty($bs_banner['mas_imagenes'])) {
                        foreach ($bs_banner['mas_imagenes'] as $mi) {
                            $imgs[] = [
                                'url' => $mi['url'],
                                'alt' => $mi['alt'] ?? null,
                            ];
                        }
                    }
                    return $imgs;
                })(),
            ),
            'cards' => $carousel_cards,
        );
        get_template_part('inc/componentes/section-scroll-carousel', null, $scroll_carousel_args);
    endif;
    ?>

    <?php
    // ── Tabbed Content (Soluciones / Planes) ─────────────────────────────────
    $acf_imagen_de_fondo = get_field('imagen_de_fondo');
    $acf_subtitulo = get_field('subtitulo');
    $acf_titulo = get_field('titulo');
    $acf_descripcion = get_field('descripcion');
    $acf_tabs_group = get_field('tabs');
    $acf_productos = $acf_tabs_group['producto'] ?? [];

    $tabs_from_acf = [];
    if (is_array($acf_productos)) {
        foreach ($acf_productos as $producto) {
            $nombre = $producto['nombre'] ?? '';
            if (!$nombre)
                continue;

            $content_tabs = [];
            $caracteristicas = $producto['caracteristicas'] ?? [];

            if (is_array($caracteristicas)) {
                foreach ($caracteristicas as $caracteristica) {
                    $feat_label = $caracteristica['caracteristica'] ?? '';
                    if (!$feat_label)
                        continue;
                    $content_tabs[] = array(
                        'id' => sanitize_title($feat_label),
                        'label' => $feat_label,
                        'image' => $caracteristica['imagen']['url'] ?? '',
                        'description' => $caracteristica['descripcion'] ?? '',
                    );
                }
            }

            $tabs_from_acf[] = array(
                'id' => sanitize_title($nombre),
                'label' => $nombre,
                'content_tabs' => $content_tabs,
            );
        }
    }

    $has_tabs = !empty($tabs_from_acf) || $acf_subtitulo || $acf_titulo || $acf_descripcion;
    if ($has_tabs):
        $tabbed_content_args = array(
            'section_id' => 'soluciones',
            'background_image' => $acf_imagen_de_fondo['url'] ?? null,
            'eyebrow' => $acf_subtitulo ?? null,
            'title' => $acf_titulo ?? null,
            'description' => $acf_descripcion ?? null,
            'tabs' => $tabs_from_acf,
        );
        get_template_part('inc/componentes/section-tabbed-content', null, $tabbed_content_args);
    endif;
    ?>

    <!-- SECCIÓN CTA -->
    <?php get_template_part('inc/componentes/section-cta'); ?>

    <!-- SECCIÓN TESTIMONIOS -->
    <?php get_template_part('inc/componentes/section-testimonios'); ?>

    <!-- SECCIÓN PRODUCTOS -->
    <?php get_template_part('inc/componentes/section-productos-slider'); ?>

    <!-- SECCIÓN FAQS -->
    <?php get_template_part('inc/componentes/section-faqs'); ?>

</main>

<?php get_footer(); ?>
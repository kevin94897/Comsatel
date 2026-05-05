<?php

/**
 * Template Name: Soluciones
 */

get_header(); ?>

<main id="home">

    <!-- Hero Banner -->
    <section class="relative min-h-[500px] h-screen flex items-end bg-dark-900">
        <?php $hero_img = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
        <?php if ($hero_img): ?>
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('<?php echo esc_url($hero_img); ?>');" data-aos="fade-in"
                data-aos-duration="1200">
            </div>
        <?php endif; ?>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-xl">
                <span
                    class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="heading-h1 font-bold text-white mb-20 leading-tight mt-2 uppercase" data-aos="fade-up"
                    data-aos-duration="1000">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </section>

    <?php
    $nav_buttons = array();
    $acf_group = get_field('soluciones', 'options');
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
            array('label' => 'Portafolio de soluciones', 'url' => '#soluciones', 'style' => 'btn btn-outline-white', 'delay' => 200),
            array('label' => 'Testimonios', 'url' => '#testimonios', 'style' => 'btn btn-outline-white', 'delay' => 300),
            array('label' => 'Preguntas frecuentes', 'url' => '#preguntas-frecuentes', 'style' => 'btn btn-outline-white', 'delay' => 400),
        );
    }

    get_template_part('inc/componentes/section-nav-buttons', null, array('buttons' => $nav_buttons));
    ?>

    <!-- Intro Section -->
    <?php
    $encabezado = get_field('encabezado');
    $intro_subtitulo = $encabezado['subtitulo'] ?? null;
    $intro_descripcion = $encabezado['descripcion'] ?? null;
    ?>
    <?php if ($intro_subtitulo || $intro_descripcion): ?>
        <section class="py-12 lg:py-16 bg-white motion-safe:animate-fade-in" id="desafio">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="max-w-4xl mx-auto text-center">
                    <?php if (!empty($intro_subtitulo)): ?>
                        <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-down">
                            <?php echo wp_kses_post($intro_subtitulo); ?>
                        </p>
                    <?php endif; ?>
                    <?php if (!empty($intro_descripcion)): ?>
                        <p class="leading-relaxed mb-0 md:text-xl text-md font-medium tracking-[-0.08px]" data-aos="fade-up"
                            data-aos-delay="100">
                            <?php echo wp_kses_post($intro_descripcion); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Solutions Grid -->
    <?php
    $soluciones_group = get_field('soluciones');
    $lista_soluciones = $soluciones_group['lista_de_soluciones'] ?? null;
    $banner_soluciones = get_field('banner_titulo');
    $s_header_subtitulo = $banner_soluciones['subtitulo'] ?? null;
    $s_header_titulo = $banner_soluciones['titulo'] ?? null;
    $s_header_bg_url = $banner_soluciones['imagen_de_fondo']['url'] ?? null;
    $s_header_desc = $banner_soluciones['descripcion'] ?? null;

    $has_solutions_section = $s_header_subtitulo || $s_header_titulo || $s_header_bg_url || !empty($lista_soluciones);
    ?>
    <?php if ($has_solutions_section): ?>
        <section class="pb-16 lg:pb-24 pt-8 bg-white" id="soluciones">

            <?php if ($s_header_subtitulo || $s_header_titulo || $s_header_desc || $s_header_bg_url): ?>
                <div class="container-fluid py-6 lg:py-16 md:mb-20 mb-16 bg-cover bg-center bg-no-repeat" <?php if ($s_header_bg_url): ?>style="background-image: url('<?php echo esc_url($s_header_bg_url); ?>');" <?php endif; ?>>
                    <div class="mx-auto px-4 lg:px-8 max-w-3xl">
                        <div class="text-center">
                            <?php if (!empty($s_header_subtitulo)): ?>
                                <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-in">
                                    <?php echo wp_kses_post($s_header_subtitulo); ?>
                                </p>
                            <?php endif; ?>
                            <?php if (!empty($s_header_titulo)): ?>
                                <h2 class="text-xl lg:text-4xl font-medium text-primary mb-4" data-aos="fade-in">
                                    <?php echo wp_kses_post($s_header_titulo); ?>
                                </h2>
                            <?php endif; ?>
                            <?php if (!empty($s_header_desc)): ?>
                                <p class="text-gray-600 leading-relaxed mb-8 max-w-2xl mx-auto" data-aos="fade-in"
                                    data-aos-delay="100">
                                    <?php echo wp_kses_post($s_header_desc); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($lista_soluciones)): ?>
                <div class="container mx-auto px-4 lg:px-8">
                    <?php foreach ($lista_soluciones as $index => $solucion):
                        $s_imagen = $solucion['imagen'] ?? null;
                        $s_subtitulo = $solucion['subtitulo'] ?? null;
                        $s_titulo = $solucion['titulo'] ?? null;
                        $s_desc = $solucion['descripcion'] ?? null;
                        $s_bullets = $solucion['bullets'] ?? null;
                        $s_boton = $solucion['boton'] ?? null;

                        // Omitir si no hay título
                        if (!$s_titulo)
                            continue;

                        $is_even = ($index % 2 !== 0);
                        ?>
                        <div class="grid lg:grid-cols-2 gap-8 lg:gap-24 items-center mb-12 lg:mb-20">

                            <!-- Imagen -->
                            <?php if (!empty($s_imagen['url'])): ?>
                                <div class="lg:col-span-1 <?php echo $is_even ? 'order-1 lg:order-2' : 'order-2 lg:order-1'; ?>"
                                    data-aos="zoom-in" data-aos-duration="1000">
                                    <img src="<?php echo esc_url($s_imagen['url']); ?>"
                                        alt="<?php echo esc_attr($s_imagen['alt'] ?? $s_titulo); ?>"
                                        class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                                </div>
                            <?php endif; ?>

                            <!-- Contenido -->
                            <div class="lg:col-span-1 <?php echo $is_even ? 'order-2 lg:order-1' : 'order-2'; ?>"
                                data-aos="<?php echo $is_even ? 'fade-right' : 'fade-left'; ?>" data-aos-delay="200">

                                <?php if (!empty($s_subtitulo)): ?>
                                    <p class="text-sm uppercase tracking-tighter mb-3 text-primary font-medium">
                                        <?php echo wp_kses_post($s_subtitulo); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($s_titulo)): ?>
                                    <h3 class="text-xl lg:text-3xl font-medium text-black mb-6">
                                        <?php echo wp_kses_post($s_titulo); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if (!empty($s_desc)): ?>
                                    <p class="leading-relaxed mb-6 text-gray-600"><?php echo wp_kses_post($s_desc); ?></p>
                                <?php endif; ?>

                                <?php if (!empty($s_bullets)): ?>
                                    <ul class="space-y-3 mb-8">
                                        <?php foreach ($s_bullets as $b_index => $bullet):
                                            $bullet_item = $bullet['item'] ?? '';
                                            if (!$bullet_item)
                                                continue;
                                            ?>
                                            <li class="flex items-center text-gray-700" data-aos="fade-right"
                                                data-aos-delay="<?php echo 300 + ($b_index * 100); ?>">
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
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </section>
    <?php endif; ?>

    <!-- SECCIÓN CTA -->
    <?php get_template_part('inc/componentes/section-cta'); ?>

    <!-- SECCIÓN TESTIMONIOS -->
    <?php get_template_part('inc/componentes/section-testimonios'); ?>

    <!-- SECCIÓN FAQ -->
    <?php get_template_part('inc/componentes/section-faqs'); ?>

</main>

<?php get_footer(); ?>
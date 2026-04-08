<?php

/**
 * Template Name: Front Page
 */
$hero = get_field('banner_hero');

get_header(); ?>

<main id="home">
    <!-- Hero Banner -->
    <section class="relative h-screen min-h-[600px] flex items-center bg-dark-900">
        <?php $hero_img = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
        <?php if ($hero_img): ?>
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('<?php echo esc_url($hero_img); ?>');" data-aos="fade-in"
                data-aos-duration="1200">
            </div>
        <?php endif; ?>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10 h-full">
            <div class=" flex items-center h-full">
                <div class="max-w-xl text-center md:text-left">
                    <?php if (!empty($hero['titulo'])): ?>
                        <h1 class="heading-h1 font-medium text-white mb-6"
                            data-aos="fade-up" data-aos-duration="1000">
                            <?php echo wp_kses_post($hero['titulo']); ?>
                        </h1>
                    <?php endif; ?>
                    <?php if (!empty($hero['descripcion'])): ?>
                        <p class="text-white text-sm md:text-lg ">
                            <?php echo nl2br(wp_kses_post($hero['descripcion'])); ?>
                        </p>
                    <?php endif; ?>
                    <div class="flex gap-4 md:flex-row flex-col md:items-start items-center">
                        <?php if (!empty($hero['boton_primario'])): ?>
                            <a href="<?php echo esc_url($hero['boton_primario']['url']); ?>"
                                target="<?php echo esc_attr($hero['boton_primario']['target'] ?: '_self'); ?>"
                                class="btn btn-primary flex items-center gap-2 w-max">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM8 14.5V5.5L14 10L8 14.5Z"
                                        fill="white" />
                                </svg>
                                <?php echo esc_html($hero['boton_primario']['title']); ?>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($hero['boton_secundario'])): ?>
                            <a href="<?php echo esc_url($hero['boton_secundario']['url']); ?>"
                                target="<?php echo esc_attr($hero['boton_secundario']['target'] ?: '_self'); ?>"
                                class="btn btn-outline-white flex items-center gap-2 w-max">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20"
                                    fill="none">
                                    <path
                                        d="M1 15.345C1.65391 16.1483 2.552 16.7163 3.558 16.963C5.832 17.552 8.07 16.517 8.557 14.653C9.044 12.787 7.284 10.753 5.011 10.163C2.738 9.573 0.977 7.54 1.464 5.675C1.951 3.81 4.188 2.776 6.462 3.365C7.444 3.601 8.332 4.158 9 4.957M5.121 17.128V19M5.121 1V3.2"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <?php echo esc_html($hero['boton_secundario']['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
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
    $nav_buttons = array();
    $acf_group = get_field('home', 'options');
    $acf_nav_buttons = $acf_group['botones'] ?? null;

    if (!empty($acf_nav_buttons)) {
        foreach ($acf_nav_buttons as $index => $btn) {
            $link = $btn['texto_del_boton'];
            if ($link) {
                $nav_buttons[] = array(
                    'label' => $link['title'],
                    'url' => $link['url'],
                    'style' => 'btn btn-outline-white',
                    'delay' => ($index + 1) * 100
                );
            }
        }
    }

    // Fallback to defaults if empty
    if (empty($nav_buttons)) {
        $nav_buttons = array(
            array(
                'label' => 'Seguridad y recupero',
                'url' => '#soluciones',
                'style' => 'btn btn-outline-white',
                'delay' => 200
            ),
            array(
                'label' => 'Gestión de flotas',
                'url' => '#soluciones-slider',
                'style' => 'btn btn-outline-white',
                'delay' => 200
            ),
            array(
                'label' => 'Conducción',
                'url' => '#beneficios',
                'style' => 'btn btn-outline-white',
                'delay' => 300
            ),
            array(
                'label' => 'Clientes',
                'url' => '#clientes',
                'style' => 'btn btn-outline-white',
                'delay' => 400
            ),
        );
    }

    get_template_part('inc/componentes/section-nav-buttons', null, array('buttons' => $nav_buttons));
    ?>

    <!-- Solutions Grid -->
    <?php $soluciones = get_field('soluciones'); ?>
    <section class="py-16 lg:py-24 bg-gray-50" id="soluciones">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <!-- <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-down" data-aos-delay="200">
                    Soluciones</p> -->
                <?php if (!empty($soluciones['titulo'])): ?>
                    <h2 class="heading-h2 font-medium mb-4" data-aos="fade-up" data-aos-delay="300">
                        <?php echo wp_kses_post($soluciones['titulo']); ?>
                    </h2>
                <?php endif; ?>
            </div>

            <?php if (!empty($soluciones['lista_de_soluciones'])): ?>
                <?php 
                $total_soluciones = count($soluciones['lista_de_soluciones']);
                foreach ($soluciones['lista_de_soluciones'] as $index => $item):
                    $is_even = ($index % 2 === 0);
                    $is_last = ($index === $total_soluciones - 1);
                    $margin_class = $is_last ? '' : 'mb-12 lg:mb-20';
                    ?>
                    <div class="grid lg:grid-cols-2 gap-8 lg:gap-24 items-center <?php echo $margin_class; ?>">
                        <div class="<?php echo $is_even ? 'order-2 lg:order-1' : 'order-2'; ?>" data-aos="zoom-in"
                            data-aos-duration="1000">
                            <?php if (!empty($item['imagen'])): ?>
                                <img src="<?php echo esc_url($item['imagen']['url']); ?>"
                                    alt="<?php echo esc_attr($item['titulo']); ?>"
                                    class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                            <?php endif; ?>
                        </div>
                        <div class="<?php echo $is_even ? 'order-1 lg:order-2' : 'order-1'; ?>"
                            data-aos="fade-<?php echo $is_even ? 'left' : 'right'; ?>" data-aos-delay="200">
                            <div class="flex items-center gap-2 text-sm uppercase tracking-wider mb-3 text-gray font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="37" viewBox="0 0 36 37" fill="none">
                                    <path
                                        d="M29.9093 0H5.98185C2.67817 0 0 2.67825 0 5.98205V30.0267C0 33.3305 2.67817 36.0088 5.98185 36.0088H29.9093C33.213 36.0088 35.8912 33.3305 35.8912 30.0267V5.98205C35.8912 2.67825 33.213 0 29.9093 0Z"
                                        fill="#FF4D4D" />
                                    <path
                                        d="M25.8706 17.3571C25.8706 17.3571 25.8706 19.2857 27.6968 19.2857C29.0969 19.2857 29.036 14.1429 28.9751 11.0571C28.9751 9.9 28.0621 9 26.9663 9C26.4794 9 25.9315 9.19286 25.5663 9.57857L20.6964 14.4643M20.6964 14.4643L22.7052 16.5857C22.9487 16.8429 23.1313 17.2286 23.1313 17.6143V19.9929C23.1313 20.4429 22.7661 20.8286 22.34 20.8286H10.4698C10.1045 20.8286 9.73928 20.5071 9.73928 20.0571V12.7929C9.73928 12.2143 9.98278 11.6357 10.348 11.25C10.7133 10.8643 11.2611 10.6071 11.809 10.6071H16.3744C16.8006 10.6071 17.2267 10.8 17.531 11.1214L20.6964 14.4643ZM14.2441 10.6071V16.3929H22.2185M13.0873 20.8929V24.1071M19.3571 20.8929V24.1071M26.7837 27H8.52182C7.6696 27 7 26.2929 7 25.3929C7 24.4929 7.6696 23.7857 8.52182 23.7857H26.7837C27.6359 23.7857 28.3055 24.4929 28.3055 25.3929C28.3055 26.2929 27.6359 27 26.7837 27Z"
                                        stroke="white" stroke-miterlimit="10" />
                                </svg>
                                <?php echo wp_kses_post($item['subtitulo']); ?>
                            </div>
                            <h3 class="heading-h3 font-medium text-black mb-6">
                                <?php echo wp_kses_post($item['titulo']); ?>
                            </h3>
                            <p class="leading-relaxed mb-10 text-gray">
                                <?php echo wp_kses_post($item['descripcion']); ?>
                            </p>
                            <?php if (!empty($item['boton'])): ?>
                                <a href="<?php echo esc_url($item['boton']['url']); ?>"
                                    target="<?php echo esc_attr($item['boton']['target'] ?: '_self'); ?>"
                                    class="btn btn-primary group inline-flex items-center gap-2 w-max transition-all duration-300">

                                    <span class="leading-none">
                                        <?php echo esc_html($item['boton']['title']); ?>
                                    </span>

                                    <svg class="w-[11px] h-[11px] shrink-0 transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"
                                        viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">

                                        <path
                                            d="M7.49879 1.82794L1.17383 1.82794C0.665894 1.82794 0.255397 1.4138 0.259892 0.905882C0.264331 0.404286 0.672211 3.40801e-08 1.17383 7.63632e-08L9.62085 7.88394e-07C10.1731 8.34948e-07 10.6208 0.447716 10.6208 1L10.6208 9.44702C10.6208 9.94864 10.2166 10.3565 9.71497 10.361C9.20705 10.3655 8.79291 9.95496 8.79291 9.44702L8.79291 3.12206L1.56203 10.3529C1.20467 10.7103 0.625269 10.7103 0.267908 10.3529C-0.0894524 9.99558 -0.0894524 9.41618 0.267908 9.05882L7.49879 1.82794Z"
                                            fill="white" />

                                    </svg>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </section>

    <?php
    $soluciones_slider = get_field('soluciones_slider');

    $scroll_carousel_args = array(
        'section_id' => 'soluciones-slider',
        'banner' => array(
            'title' => $soluciones_slider['titulo'] ?? null,
            'subtitle' => $soluciones_slider['subtitulo'] ?? null,
            'description' => $soluciones_slider['descripcion'] ?? null,
            'images' => array(
                array(
                    'url' => !empty($soluciones_slider['imagen'])
                        ? $soluciones_slider['imagen']['url']
                        : get_template_directory_uri() . '/images/comsatel_gps-img.png',
                    'alt' => $soluciones_slider['titulo'] ?? ''
                ),
            )
        ),
        'cards' => array()
    );

    /* REPEATER */
    if (!empty($soluciones_slider['lista_de_soluciones'])) {

        foreach ($soluciones_slider['lista_de_soluciones'] as $item) {

            $scroll_carousel_args['cards'][] = array(
                'title' => $item['titulo'] ?? null,
                'description' => $item['descripcion'] ?? null,
                'image' => !empty($item['imagen'])
                    ? $item['imagen']['url']
                    : '',
                'button' => $item['boton'] ?? null
            );
        }
    }

    /* Render */
    if (!empty($scroll_carousel_args['cards'])) {
        get_template_part(
            'inc/componentes/section-carousel',
            null,
            $scroll_carousel_args
        );
    }
    ?>

    <!-- Beneficios (Aptitudes) -->
    <?php
    $aptitudes = get_field('aptitudes');
    if (!empty($aptitudes['lista_de_aptitudes'])): ?>
        <section class="py-16 lg:py-24 bg-gray-50" id="beneficios">
            <div class="container mx-auto">
                <?php if (!empty($aptitudes['titulo'])): ?>
                    <h2 class="heading-h2 font-medium text-center text-gray-800 md:mb-12 mb-6">
                        <?php echo wp_kses_post($aptitudes['titulo']); ?>
                    </h2>
                <?php endif; ?>

                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-6 gap-4 w-full lg:w-2/3">
                        <?php foreach ($aptitudes['lista_de_aptitudes'] as $index => $apt): ?>
                            <div
                                class="group bg-white p-6 md:p-8 md:rounded-2xl rounded-lg shadow-lg transform md:hover:scale-105 transition duration-300 md:hover:bg-[linear-gradient(255deg,#B30000_-14.25%,#FF7A7A_111.69%)]">
                                <div class="text-primary mb-4 transition-colors duration-300 md:group-hover:!text-white">
                                    <?php if (!empty($apt['icono'])): ?>
                                        <img src="<?php echo esc_url($apt['icono']['url']); ?>"
                                            alt="<?php echo esc_attr($apt['titulo']); ?>"
                                            class="w-12 h-12 object-contain md:group-hover:brightness-0 md:group-hover:invert transition-all duration-300">
                                    <?php endif; ?>
                                </div>
                                <h2
                                    class="heading-h3 font-semibold text-primary mb-2 uppercase transition-colors duration-300 md:group-hover:!text-white">
                                    <?php echo esc_html($apt['titulo']); ?>
                                </h2>
                                <p class="text-sm opacity-90 transition-colors duration-300 md:group-hover:!text-white mb-0">
                                    <?php echo esc_html($apt['descripcion']); ?>
                                </p>
                            </div>

                            <!-- Modal para este beneficio -->
                            <?php
                            get_template_part('inc/componentes/modal-beneficio', null, array(
                                'id' => 'benefit-' . $index,
                                'title' => $apt['titulo'],
                                'description' => $apt['descripcion'],
                                'image' => !empty($apt['imagen']) ? $apt['imagen']['url'] : ''
                            ));
                            ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="hidden lg:block lg:w-1/3">
                        <div class="relative max-w-[280px] mx-auto">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_cards-phone.png"
                                alt="Beneficios Comsatel" class="w-full h-auto">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- SECCIÓN CTA -->
    <?php
    $cta = get_field('cta');
    get_template_part('inc/componentes/section-cta-2', null, array('cta' => $cta));
    ?>

    <!-- SECCIÓN BLOG -->
    <?php get_template_part('inc/componentes/section-blog'); ?>

    <!-- SECCIÓN CLIENTES -->
    <?php include get_template_directory() . '/inc/componentes/section-clientes.php'; ?>

</main>

<?php get_footer();

<?php

/**
 * Template Name: Xperience
 * 
 * Plantilla personalizada para el blog con búsqueda, filtros y carga de posts
 */

get_header();
?>

<main id="primary" class="site-main bg-gray-50">

    <!-- Hero Banner -->
    <section class="relative min-h-[500px] flex items-end <?php echo wp_title(); ?>">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_tyc_banner.png');">
        </div>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="">
                <span class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-10 leading-tight mt-2 uppercase" data-aos="fade-up"
                    data-aos-duration="1000">
                    <?php the_title(); ?>
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

    <!-- Seccion eventos categorias -->
    <?php get_template_part('inc/componentes/section-eventos-categorias'); ?>

    <!-- Seccion alianzas -->
    <?php get_template_part('inc/componentes/section-alianzas'); ?>

    <!-- Seccion promociones -->
    <?php get_template_part('inc/componentes/section-promociones'); ?>


</main>
<?php get_footer(); ?>
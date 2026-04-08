<?php

/**
 * Template Name: Xperience
 * 
 * Plantilla personalizada para el blog con búsqueda, filtros y carga de posts
 */

get_header();

// ── Campos ACF ────────────────────────────────────────────────────────────────
$encabezado = get_field('encabezado') ?: [];
$beneficios_group = get_field('beneficios') ?: [];
$alianzas_group = get_field('alianzas') ?: [];
$seccion_promos = get_field('seccion_promociones') ?: [];

// Encabezado hero
$subtitulo = $encabezado['subtitulo'] ?? '';
$titulo = $encabezado['titulo'] ?? '';
$descripcion = $encabezado['descripcion'] ?? '';

// Pasar datos a los componentes vía $GLOBALS
$GLOBALS['xp_encabezado'] = $encabezado;
$GLOBALS['xp_beneficios_group'] = $beneficios_group;
$GLOBALS['xp_alianzas_group'] = $alianzas_group;
$GLOBALS['xp_seccion_promos'] = $seccion_promos;
?>


<main id="primary" class="site-main bg-gray-50">

    <!-- Hero Banner -->
    <section class="relative min-h-[500px] flex items-end bg-dark-900">
        <?php $hero_img = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
        <?php if ($hero_img): ?>
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                    style="background-image: url('<?php echo esc_url($hero_img); ?>');" data-aos="fade-in"
                    data-aos-duration="1200">
                </div>
        <?php endif; ?>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="">
                <span
                    class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="heading-h1 font-bold text-white mb-10 leading-tight mt-2 uppercase"
                    data-aos="fade-up" data-aos-duration="1000">
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
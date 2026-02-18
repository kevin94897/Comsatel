<?php

/**
 * The template for displaying single Promocion posts
 *
 * @package comsatel
 */

get_header();

// Get ACF Fields
$titulo      = get_field('titulo');
$descripcion = get_field('descripcion');
$imagen      = get_field('imagen');
$beneficios  = get_field('beneficios');

?>

<main id="primary" class="site-main bg-gray-50 min-h-screen">

    <!-- Hero Banner -->
    <section class="relative h-screen max-h-[500px] flex items-end">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_nosotros_banner.png');">
        </div>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <span
                    class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-20 leading-tight mt-2"
                    data-aos="fade-up" data-aos-duration="1000">
                    <?php echo get_the_title(); ?>
                </h1>
            </div>
        </div>

    </section>

    <!-- Breadcrumbs (Standard) -->
    <div class="container mx-auto px-4 pt-4 pb-2">
        <div class="text-xs text-gray-500 flex items-center gap-2">
            <a href="<?php echo home_url(); ?>" class="hover:text-primary transition-colors">Inicio</a>
            <span>&gt;</span>
            <a href="<?php echo home_url('/promociones/'); ?>" class="hover:text-primary transition-colors">Promociones</a>
            <span>&gt;</span>
            <span class="text-gray-900 truncate"><?php echo $titulo ? esc_html($titulo) : get_the_title(); ?></span>
        </div>
    </div>

    <!-- Main Content Section -->
    <section class="py-8 lg:py-12">
        <div class="container mx-auto px-4 lg:px-8">

            <!-- Validar si hay contenido antes de mostrar nada -->
            <?php if ($titulo || $descripcion) : ?>
                <!-- Header: Title & Intro -->
                <div class="text-center mb-12 max-w-4xl mx-auto" data-aos="fade-up">
                    <?php if ($titulo) : ?>
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#FF4D4D] mb-6 leading-tight">
                            <?php echo esc_html($titulo); ?>
                        </h1>
                    <?php endif; ?>

                    <?php if ($descripcion) : ?>
                        <div class="text-gray-600 text-lg md:text-xl leading-relaxed">
                            <?php echo wp_kses_post($descripcion); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Title for Timeline (Static based on design) -->
                <div class="text-center mb-10" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="text-2xl md:text-3xl font-medium text-gray-800">
                        ¿Cómo acceder a este beneficio?
                    </h2>
                </div>
            <?php endif; ?>

            <!-- Grid Layout: Image & Timeline -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">

                <!-- Left Column: Main Image -->
                <?php if ($imagen) :
                    $img_url = is_array($imagen) ? $imagen['url'] : $imagen;
                    $img_alt = is_array($imagen) ? ($imagen['alt'] ?: $titulo) : $titulo;
                ?>
                    <div class="relative w-full" data-aos="fade-right" data-aos-duration="1000">
                        <!-- Image Container with 'Cut' effect if needed, or just clean -->
                        <div class="relative rounded-2xl overflow-hidden shadow-xl lg:shadow-2xl">
                            <img src="<?php echo esc_url($img_url); ?>"
                                alt="<?php echo esc_attr($img_alt); ?>"
                                class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-700">
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Right Column: Benefits Timeline -->
                <?php if ($beneficios) : ?>
                    <div class="relative pl-4 lg:pl-0" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">

                        <!-- Vertical Line (Absolute) -->
                        <div class="absolute left-[19px] lg:left-[19px] top-4 bottom-8 w-[2px] bg-gray-200"></div>

                        <div class="space-y-8 relative">
                            <?php
                            $count = 1;
                            foreach ($beneficios as $beneficio) :
                                $b_titulo = $beneficio['titulo'];
                                $b_desc   = $beneficio['descripcion'];
                            ?>
                                <div class="flex gap-6 group">
                                    <!-- Number Badge -->
                                    <div class="relative z-10 flex-shrink-0">
                                        <div class="w-10 h-10 rounded-full bg-gray-800 text-white flex items-center justify-center font-bold text-lg shadow-md group-hover:bg-[#FF4D4D] group-hover:scale-110 transition-all duration-300">
                                            <?php echo $count; ?>
                                        </div>
                                    </div>

                                    <!-- Content Card -->
                                    <div class="flex-grow bg-white p-6 rounded-xl shadow-sm border border-transparent group-hover:border-gray-100 group-hover:shadow-md transition-all duration-300">
                                        <?php if ($b_titulo) : ?>
                                            <h3 class="text-gray-900 font-bold text-lg mb-2">
                                                <?php echo esc_html($b_titulo); ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if ($b_desc) : ?>
                                            <div class="text-gray-600 text-sm leading-relaxed">
                                                <?php echo wp_kses_post($b_desc); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php
                                $count++;
                            endforeach;
                            ?>
                        </div>

                    </div>
                <?php endif; ?>

            </div>

        </div>
    </section>

</main>

<?php
get_footer();

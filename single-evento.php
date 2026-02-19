<?php

/**
 * The template for displaying single Evento posts
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
            <div class="max-w-3xl mb-10">
                <span
                    class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-white leading-tight my-2 uppercase"
                    data-aos="fade-up" data-aos-duration="1000">
                    <?php echo get_the_title(); ?>
                </h1>
                <p class="text-white">Planchado + inspección con tarifa exclusiva para clientes COMSATEL</p>
                <button class="btn btn-primary open-benefit-modal" data-partner="<?php echo esc_attr(get_the_title()); ?>">Acceder al beneficio</button>
            </div>
        </div>

    </section>

    <!-- Breadcrumbs -->
    <section class="py-6 md:py-12">
        <div class="container mx-auto px-4 lg:px-8">
            <nav class="flex items-center gap-2 text-sm text-black whitespace-nowrap overflow-x-auto scroll-smooth"
                data-aos="fade-in"
                data-aos-duration="800"
                data-aos-delay="100">
                <a href="<?php echo home_url(); ?>" class="hover:text-primary transition-colors text-gray">Inicio</a>
                <span>></span>
                <a href="<?php echo home_url('/promociones/'); ?>" class="hover:text-primary transition-colors text-gray">Promociones</a>
                <span>></span>
                <span class="text-dark"><?php the_title(); ?></span>
            </nav>
        </div>
    </section>


    <!-- Main Content Section -->
    <section class="pb-8 md:pb-12">
        <div class="container mx-auto px-4 lg:px-8">

            <!-- Validar si hay contenido antes de mostrar nada -->
            <?php if ($titulo || $descripcion) : ?>
                <!-- Header: Title & Intro -->
                <div class="text-center mb-8 max-w-3xl mx-auto" data-aos="fade-up">
                    <?php if ($titulo) : ?>
                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-[#FF4D4D] mb-6 leading-tight">
                            <?php echo esc_html($titulo); ?>
                        </h1>
                    <?php endif; ?>


                </div>

                <div class="text-center mb-12 max-w-5xl mx-auto">
                    <?php if ($descripcion) : ?>
                        <div class="leading-relaxed mb-0 md:text-lg text-base font-normal tracking-[-0.08px]">
                            <?php echo wp_kses_post($descripcion); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Title for Timeline (Static based on design) -->
                <div class="text-center mb-10" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="text-xl md:text-3xl font-medium text-gray-800">
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
                    <div class="relative w-full md:block hidden" data-aos="fade-right" data-aos-duration="1000">
                        <!-- Image Container with 'Cut' effect if needed, or just clean -->
                        <div class="relative rounded-2xl overflow-hidden -ml-4">
                            <img src="<?php echo esc_url($img_url); ?>"
                                alt="<?php echo esc_attr($img_alt); ?>"
                                class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-700">
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Right Column: Benefits Timeline -->
                <?php if ($beneficios) : ?>
                    <div class="relative lg:pl-0" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">

                        <!-- Vertical Line (Absolute) -->
                        <div class="absolute left-[15px] lg:left-[19px] top-4 bottom-8 w-[2px] bg-gray-200"></div>

                        <div class="space-y-8 relative">
                            <?php
                            $count = 1;
                            foreach ($beneficios as $beneficio) :
                                $b_titulo = $beneficio['titulo'];
                                $b_desc   = $beneficio['descripcion'];
                            ?>
                                <div class="flex gap-4 md:gap-6 group">
                                    <!-- Number Badge -->
                                    <div class="relative z-10 flex-shrink-0">
                                        <div class="md:w-10 w-8 h-8 md:h-10 rounded-full bg-gray-800 text-white flex items-center justify-center font-semibold text-sm md:text-lg shadow-md group-hover:bg-[#FF4D4D] group-hover:scale-110 transition-all duration-300">
                                            <?php echo $count; ?>
                                        </div>
                                    </div>

                                    <!-- Content Card -->
                                    <div class="flex-grow bg-white p-6 rounded-md shadow-sm border border-transparent group-hover:border-gray-100 group-hover:shadow-md transition-all duration-300">
                                        <?php if ($b_titulo) : ?>
                                            <h3 class="text-gray-900 font-semibold text-sm md:text-lg mb-2">
                                                <?php echo esc_html($b_titulo); ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if ($b_desc) : ?>
                                            <div class="text-gray-600 text-xs md:text-sm leading-relaxed">
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
            <div class="mt-12">
                <p class="font-medium text-lg">Además</p>
                <p>Finalizado el servicio de planchado, Fiocco te obsequia lavado externo + aspirado por dentro y lavado del tablero.</p>
            </div>
            <div class="mt-12">
                <p class="font-medium text-lg">Recuerda:</p>
                <ul class="ml-10">
                    <li>Para gozar de este beneficio deben haber pasado como mínimo 7 días hábiles después de iniciar o haber renovado tu servicio.</li>
                    <li>Promoción válida solo en local: Carlos Villarán 1034, La Victoria.</li>
                    <li>Solo para titulares con servicio activo en Comsatel.</li>
                    <li>Válido solo en Lima.</li>
                    <li>Sujeto a términos y condiciones de Fiocco no acumulable, ni aplica sobre otras promociones.</li>
                </ul>
            </div>
            <div class="mt-12">
                <p>Comsatel, no se responsabiliza por el servicio o producto brindado por el comercio asociado.</p>
            </div>
            <div>
                <button class="btn btn-primary open-benefit-modal" data-partner="<?php echo esc_attr(get_the_title()); ?>">Acceder al beneficio</button>
            </div>
        </div>
    </section>

</main>

<?php get_template_part('inc/componentes/modal-beneficio'); ?>

<?php
get_footer();

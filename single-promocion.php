<?php

/**
 * The template for displaying single Promocion posts
 *
 * @package comsatel
 */

get_header();

// ── Campos ACF ────────────────────────────────────────────────────────────────
$titulo = get_field('titulo');
$descripcion = get_field('descripcion');
$imagen = get_field('imagen');
$beneficios = get_field('beneficios');
$texto = get_field('texto');
$boton_modal = get_field('boton_modal') ?: 'Acceder al beneficio';
?>

<main id="primary" class="site-main bg-gray-50 min-h-screen">

    <!-- Hero Banner -->
    <section class="relative min-h-[500px] flex items-end bg-dark-900 <?php echo wp_title(); ?>">
        <?php $hero_img = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
        <?php if ($hero_img): ?>
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('<?php echo esc_url($hero_img); ?>');" data-aos="fade-in"
                data-aos-duration="1200">
            </div>
        <?php endif; ?>

        <!-- Content -->
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-xl mb-10">
                <span
                    class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="heading-h1 font-semibold text-white my-2 uppercase"
                    data-aos="fade-up" data-aos-duration="1000">
                    <?php echo get_the_title(); ?>
                </h1>
            </div>
        </div>
    </section>

    <!-- Breadcrumbs -->
    <section class="py-6 md:py-12">
        <div class="container mx-auto px-4 lg:px-8">
            <nav class="flex items-center gap-2 text-sm text-black whitespace-nowrap overflow-x-auto scroll-smooth"
                data-aos="fade-in" data-aos-duration="800" data-aos-delay="100">
                <a href="<?php echo home_url(); ?>" class="hover:text-primary transition-colors text-gray">Inicio</a>
                <span>></span>
                <a href="<?php echo home_url('/promociones/'); ?>"
                    class="hover:text-primary transition-colors text-gray">Promociones</a>
                <span>></span>
                <span class="text-dark"><?php the_title(); ?></span>
            </nav>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="pb-8 md:pb-12">
        <div class="container mx-auto px-4 lg:px-8">

            <!-- Header: Title & Descripcion -->
            <?php if ($titulo || $descripcion): ?>
                <?php if ($titulo): ?>
                    <div class="text-center mb-8 max-w-3xl mx-auto" data-aos="fade-up">
                        <h2 class="heading-h2 font-semibold text-[#FF4D4D] mb-6">
                            <?php echo esc_html($titulo); ?>
                        </h2>
                    </div>
                <?php endif; ?>

                <?php if ($descripcion): ?>
                    <div class="text-center mb-12 max-w-5xl mx-auto">
                        <div class="leading-relaxed mb-0 md:text-lg text-base font-normal tracking-[-0.08px]">
                            <?php echo wp_kses_post($descripcion); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($beneficios): ?>
                    <div class="text-center mb-10" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="heading-h2 font-medium text-gray-800">
                            ¿Cómo acceder a este beneficio?
                        </h2>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Grid Layout: Image & Timeline -->
            <?php if ($imagen || $beneficios): ?>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">

                    <!-- Left Column: Main Image -->
                    <?php if ($imagen):
                        $img_url = is_array($imagen) ? $imagen['url'] : $imagen;
                        $img_alt = is_array($imagen) ? ($imagen['alt'] ?: $titulo) : $titulo;
                    ?>
                        <div class="relative w-full md:block hidden" data-aos="fade-right" data-aos-duration="1000">
                            <div class="relative rounded-2xl overflow-hidden -ml-4">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>"
                                    class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-700">
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Right Column: Benefits Timeline -->
                    <?php if ($beneficios): ?>
                        <div class="relative lg:pl-0" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">

                            <div class="absolute left-[15px] lg:left-[19px] top-4 bottom-8 w-[2px] bg-gray-200"></div>

                            <div class="space-y-8 relative">
                                <?php $count = 1;
                                foreach ($beneficios as $beneficio):
                                    $b_titulo = $beneficio['titulo'] ?? '';
                                    $b_desc = $beneficio['descripcion'] ?? '';
                                    if (!$b_titulo && !$b_desc)
                                        continue;
                                ?>
                                    <div class="flex gap-4 md:gap-6 group">
                                        <!-- Number Badge -->
                                        <div class="relative z-10 flex-shrink-0">
                                            <div
                                                class="md:w-10 w-8 h-8 md:h-10 rounded-full bg-gray-800 text-white flex items-center justify-center font-semibold text-sm md:text-lg shadow-md group-hover:bg-[#FF4D4D] group-hover:scale-110 transition-all duration-300">
                                                <?php echo $count; ?>
                                            </div>
                                        </div>

                                        <!-- Content Card -->
                                        <div
                                            class="flex-grow bg-white p-6 rounded-md shadow-sm border border-transparent group-hover:border-gray-100 group-hover:shadow-md transition-all duration-300">
                                            <?php if ($b_titulo): ?>
                                                <h3 class="heading-h3 text-gray-900 font-semibold mb-2">
                                                    <?php echo esc_html($b_titulo); ?>
                                                </h3>
                                            <?php endif; ?>

                                            <?php if ($b_desc): ?>
                                                <div class="text-gray-600 text-xs md:text-sm leading-relaxed">
                                                    <?php echo wp_kses_post($b_desc); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php $count++;
                                endforeach; ?>
                            </div>

                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <!-- Texto WYSIWYG -->
            <?php if ($texto): ?>
                <div class="mt-12 prose max-w-none">
                    <?php echo wp_kses_post($texto); ?>
                </div>
            <?php endif; ?>

            <!-- Botón modal inferior -->
            <div class="mt-12">
                <button class="btn btn-primary open-benefit-modal"
                    data-partner="<?php echo esc_attr(get_the_title()); ?>">
                    <?php echo esc_html($boton_modal); ?>
                </button>
            </div>

        </div>
    </section>

</main>

<?php get_template_part('inc/componentes/modal-beneficio'); ?>

<?php get_footer(); ?>
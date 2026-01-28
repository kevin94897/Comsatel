<?php

/**
 * Template Name: Descargables
 */

get_header();
?>

<main id="primary" class="site-main bg-gray-50">

    <!-- Hero Banner -->
    <section class="relative min-h-[500px] flex items-end <?php echo wp_title(); ?>">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_tyc_banner.png');"
            data-aos="fade-in"
            data-aos-duration="1200">
        </div>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="">
                <span class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"
                    data-aos="fade-right"
                    data-aos-duration="800"
                    data-aos-delay="200"></span>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-10 leading-tight mt-2 uppercase"
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="400"
                    data-aos-easing="ease-out-cubic">
                    Descargables
                </h1>
            </div>
        </div>
    </section>

    <section class="py-12 lg:py-16 bg-white overflow-hidden">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl lg:text-4xl font-medium text-black mb-16" data-aos="fade-up">Descargas</h2>

            <div class="grid lg:grid-cols-2 gap-x-12 gap-y-16">
                <?php
                $args = array(
                    'post_type' => 'Descarga',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $query = new WP_Query($args);

                if ($query->have_posts()):
                    $delay = 100;
                    while ($query->have_posts()): $query->the_post();
                        $texto_pequeno = get_field('texto_pequeno');
                        $descargable = get_field('descargable');
                        $featured_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
                ?>
                        <article class="flex flex-col md:flex-row gap-6 items-center" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <!-- Card Image -->
                            <div class="w-full md:w-1/2 aspect-[4/3] rounded-3xl overflow-hidden shadow-lg group">
                                <?php if ($featured_img): ?>
                                    <img src="<?php echo esc_url($featured_img); ?>"
                                        alt="<?php echo esc_attr(get_the_title()); ?>"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                <?php else: ?>
                                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Card Content -->
                            <div class="w-full md:w-1/2">
                                <?php if ($texto_pequeno): ?>
                                    <span class="text-xs text-gray uppercase tracking-wider mb-4 aos-init aos-animate">
                                        <?php echo esc_html($texto_pequeno); ?>
                                    </span>
                                <?php endif; ?>

                                <h3 class="text-lg lg:text-xl font-medium text-dark leading-tight mb-6">
                                    <?php the_title(); ?>
                                </h3>

                                <?php if ($descargable):
                                    $file_url = is_array($descargable) ? $descargable['url'] : $descargable;
                                ?>
                                    <a href="<?php echo esc_url($file_url); ?>"
                                        target="_blank" download
                                        class="inline-flex items-center gap-2 text-primary font-medium uppercase tracking-wider text-sm hover:translate-x-1 transition-transform group/link">
                                        DESCARGAR
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform group-hover/link:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php
                        $delay += 100;
                    endwhile;
                    wp_reset_postdata();
                else:
                    ?>
                    <p class="text-center text-gray-500 py-12">No se encontraron descargables en este momento.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

</main>
<?php
get_footer();
?>
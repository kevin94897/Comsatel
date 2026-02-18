<?php

/**
 * Section: Promociones
 *
 * Post Type: promociones (Assumed)
 * Layout: Alternating grid (3-2-3-2)
 */

$args = [
    'post_type'      => ['Promocion', 'promocion', 'promociones'],
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
];

$query = new WP_Query($args);

if ($query->have_posts()) :
    $all_posts = $query->posts;
?>
    <section class="py-12 lg:py-16 bg-gray-50">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h2 class="text-xl md:text-2xl lg:text-3xl font-semibold text-dark mb-4" data-aos="fade-up">
                    Promociones y Descuentos Exclusivos
                </h2>
                <p class="text-gray-600 max-w-5xl mx-auto" data-aos="fade-up">
                    Beneficios especiales para que cuides tu vehículo ahorrando más, gracias a nuestras alianzas con marcas expertas.
                </p>
            </div>

            <!-- Grid Container -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-6 lg:gap-8 justify-center">
                <?php
                $idx = 0;
                foreach ($all_posts as $post) :
                    // Determine desktop column span based on 3-2 pattern (5 item cycle)
                    // Items 0,1,2 (first 3) -> span 2 (3 items per row in 6-col grid)
                    // Items 3,4 (next 2) -> span 3 (2 items per row in 6-col grid)
                    $cycle_index = $idx % 5;
                    $lg_col_span = ($cycle_index < 3) ? 'lg:col-span-2' : 'lg:col-span-3';
                    $idx++;
                ?>
                    <!-- Card -->
                    <div class="col-span-1 <?php echo $lg_col_span; ?> bg-white rounded-lg shadow-lg overflow-hidden flex flex-col h-full hover:shadow-xl transition-shadow duration-300" data-aos="fade-up">
                        <!-- Image -->
                        <div class="relative h-48 lg:h-[280px] overflow-hidden p-4">
                            <?php
                            $acf_image = get_field('imagen', $post->ID);
                            if ($acf_image) :
                                $img_url = is_array($acf_image) ? $acf_image['url'] : $acf_image;
                                $img_alt = is_array($acf_image) ? $acf_image['alt'] : get_the_title($post);
                            ?>
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" class="w-full h-full object-cover transition-transform duration-500 rounded-md">
                            <?php elseif (has_post_thumbnail($post)) : ?>
                                <?php echo get_the_post_thumbnail($post, 'large', ['class' => 'w-full h-full object-cover transition-transform duration-500 rounded-md']); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.jpg" alt="<?php echo esc_attr($post->post_title); ?>" class="w-full h-full object-cover rounded-md">
                            <?php endif; ?>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-grow pt-0">
                            <h3 class="text-lg lg:text-xl font-medium text-dark mb-3 leading-tight">
                                <?php echo get_the_title($post); ?>
                            </h3>

                            <div class="text-gray-600 text-sm mb-6 flex-grow line-clamp-3">
                                <?php
                                $acf_desc = get_field('descripcion', $post->ID);
                                if ($acf_desc) {
                                    echo wp_trim_words(strip_tags($acf_desc), 20);
                                } else {
                                    echo get_the_excerpt($post);
                                }
                                ?>
                            </div>

                            <div class="mt-auto">
                                <a href="<?php echo get_permalink($post); ?>" class="btn btn-primary inline-block !font-normal !text-xs md:!text-sm px-6 py-2 rounded-full hover:bg-red-700 transition">
                                    Leer Más
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php else : ?>
    <!-- Debug: No posts found for the specified post types. Please check the CPT slug. -->
    <section class="py-12 bg-gray-50 text-center">
        <p class="text-gray-500">No hay promociones disponibles en este momento.</p>
    </section>
<?php endif; ?>
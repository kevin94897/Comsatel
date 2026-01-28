<!-- También te podría interesar Section -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">

        <!-- Section Header -->
        <div class="mb-8 md:mb-12">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-medium text-dark mb-2">
                También te podría interesar
            </h2>
        </div>

        <!-- Swiper Slider -->
        <div class="swiper productosInteresSlider relative">
            <div class="swiper-wrapper">

                <?php
                // Get related posts from the same category
                $categories = get_the_category();
                $category_ids = array();

                if ($categories) {
                    foreach ($categories as $category) {
                        $category_ids[] = $category->term_id;
                    }
                }

                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'post__not_in' => array(get_the_ID()),
                    'category__in' => $category_ids,
                    'orderby' => 'rand'
                );

                $related_posts = new WP_Query($args);

                if ($related_posts->have_posts()) :
                    while ($related_posts->have_posts()) : $related_posts->the_post();
                ?>

                        <!-- Slide Card -->
                        <div class="swiper-slide">
                            <article class="bg-white rounded-md overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col group mb-10">
                                <a href="<?php the_permalink(); ?>" class="block h-full flex flex-col">

                                    <!-- Image -->
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="relative w-full h-48 overflow-hidden bg-gray-100">
                                            <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-110')); ?>

                                            <!-- Category Badge -->
                                            <?php
                                            $post_categories = get_the_category();
                                            if (!empty($post_categories)) :
                                                $category = $post_categories[0];
                                            ?>
                                                <span class="absolute top-4 left-4 z-10 inline-flex items-center px-3 py-1 text-xs font-medium uppercase tracking-wider bg-primary text-white rounded-full">
                                                    <?php echo esc_html($category->name); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Content -->
                                    <div class="p-6 flex flex-col gap-3 flex-1">

                                        <!-- Title -->
                                        <h3 class="text-lg font-medium leading-tight text-dark transition-colors duration-200 group-hover:text-primary line-clamp-2">
                                            <?php the_title(); ?>
                                        </h3>

                                        <!-- Meta -->
                                        <div class="flex items-center gap-2 text-xs text-gray-500">
                                            <span class="flex items-center gap-1">
                                                <svg width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 14.5C11.5899 14.5 14.5 11.5899 14.5 8C14.5 4.41015 11.5899 1.5 8 1.5C4.41015 1.5 1.5 4.41015 1.5 8C1.5 11.5899 4.41015 14.5 8 14.5Z" stroke="currentColor" stroke-width="1.5" />
                                                    <path d="M8 4V8L10.5 9.5" stroke="currentColor" stroke-width="1.5" />
                                                </svg>
                                                Lectura de <?php echo comsatel_reading_time(); ?>
                                            </span>
                                            <span class="text-gray-300">|</span>
                                            <span><?php echo get_the_date('d \D\e Y'); ?></span>
                                        </div>

                                        <!-- Excerpt -->
                                        <p class="text-sm text-black line-clamp-3 flex-1">
                                            <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                                        </p>

                                        <?php
                                        get_template_part('inc/componentes/button-arrow', null, array(
                                            'text' => 'LEER MÁS',
                                            'url' => get_the_permalink(),
                                            'class' => 'mt-4 justify-end'
                                        ));
                                        ?>
                                    </div>
                                </a>
                            </article>
                        </div>

                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Si no hay posts relacionados, mostrar posts recientes
                    $recent_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'post__not_in' => array(get_the_ID()),
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );

                    $recent_posts = new WP_Query($recent_args);

                    if ($recent_posts->have_posts()) :
                        while ($recent_posts->have_posts()) : $recent_posts->the_post();
                        ?>

                            <!-- Slide Card (Same structure as above) -->
                            <div class="swiper-slide">
                                <article class="bg-white rounded-md overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col group mb-10">
                                    <a href="<?php the_permalink(); ?>" class="block h-full flex flex-col">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="relative w-full h-48 overflow-hidden bg-gray-100">
                                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-110')); ?>
                                                <?php
                                                $post_categories = get_the_category();
                                                if (!empty($post_categories)) :
                                                    $category = $post_categories[0];
                                                ?>
                                                    <span class="absolute top-4 left-4 z-10 inline-flex items-center px-3 py-1 text-xs font-medium uppercase tracking-wider bg-primary text-white rounded-full">
                                                        <?php echo esc_html($category->name); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="p-6 flex flex-col gap-3 flex-1">
                                            <h3 class="text-lg font-medium leading-tight text-dark transition-colors duration-200 group-hover:text-primary line-clamp-2">
                                                <?php the_title(); ?>
                                            </h3>
                                            <div class="flex items-center gap-2 text-xs text-gray-500">
                                                <span class="flex items-center gap-1">
                                                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 14.5C11.5899 14.5 14.5 11.5899 14.5 8C14.5 4.41015 11.5899 1.5 8 1.5C4.41015 1.5 1.5 4.41015 1.5 8C1.5 11.5899 4.41015 14.5 8 14.5Z" stroke="currentColor" stroke-width="1.5" />
                                                        <path d="M8 4V8L10.5 9.5" stroke="currentColor" stroke-width="1.5" />
                                                    </svg>
                                                    Lectura de <?php echo comsatel_reading_time(); ?>
                                                </span>
                                                <span class="text-gray-300">|</span>
                                                <span><?php echo get_the_date('d \D\e Y'); ?></span>
                                            </div>
                                            <p class="text-sm text-black line-clamp-3 flex-1">
                                                <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                                            </p>
                                            <span class="inline-flex items-center justify-end gap-2 text-sm font-medium text-primary uppercase tracking-wider transition-all duration-200 group-hover:gap-3 mt-auto">
                                                LEER MÁS
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="transition-transform duration-200 group-hover:translate-x-1">
                                                    <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                    </a>
                                </article>
                            </div>

                <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                endif;
                ?>

            </div>
        </div>

        <!-- Navigation Buttons -->
        <!-- <div class="flex justify-end gap-4 mt-0">
            <button class="productos-interes-prev group p-3 rounded-full border border-dark flex items-center justify-center hover:border-primary hover:bg-primary transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 24" fill="none">
                    <path d="M13.2411 22.8154C12.8411 23.2153 12.2986 23.44 11.7329 23.44C11.1672 23.44 10.6247 23.2153 10.2246 22.8154L0.62461 13.2154C0.224672 12.8153 0 12.2728 0 11.7071C0 11.1414 0.224672 10.5989 0.62461 10.1989L10.2246 0.598857C10.627 0.210254 11.1658 -0.00477437 11.7252 8.62612e-05C12.2846 0.00494689 12.8196 0.229307 13.2152 0.624844C13.6107 1.02038 13.8351 1.55545 13.8399 2.1148C13.8448 2.67416 13.6297 3.21304 13.2411 3.61539L7.46621 9.57379L27.7329 9.57379C28.2987 9.57379 28.8413 9.79855 29.2414 10.1986C29.6414 10.5987 29.8662 11.1413 29.8662 11.7071C29.8662 12.2729 29.6414 12.8155 29.2414 13.2156C28.8413 13.6157 28.2987 13.8405 27.7329 13.8405L7.46621 13.8405L13.2411 19.7989C13.6411 20.1989 13.8658 20.7414 13.8658 21.3071C13.8658 21.8728 13.6411 22.4153 13.2411 22.8154Z" class="fill-dark group-hover:fill-white transition-colors" />
                </svg>
            </button>
            <button class="productos-interes-next group p-3 rounded-full border border-dark flex items-center justify-center hover:border-primary hover:bg-primary transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 24" fill="none">
                    <path d="M16.6251 0.624611C17.0251 0.224673 17.5676 0 18.1333 0C18.699 0 19.2415 0.224673 19.6416 0.624611L29.2416 10.2246C29.6415 10.6247 29.8662 11.1672 29.8662 11.7329C29.8662 12.2986 29.6415 12.8411 29.2416 13.2411L19.6416 22.8411C19.2393 23.2297 18.7004 23.4448 18.141 23.4399C17.5817 23.4351 17.0466 23.2107 16.6511 22.8152C16.2555 22.4196 16.0312 21.8846 16.0263 21.3252C16.0214 20.7658 16.2365 20.227 16.6251 19.8246L22.4 13.8662H2.13333C1.56754 13.8662 1.02492 13.6414 0.624839 13.2414C0.224761 12.8413 0 12.2987 0 11.7329C0 11.1671 0.224761 10.6245 0.624839 10.2244C1.02492 9.82431 1.56754 9.59954 2.13333 9.59954H22.4L16.6251 3.64114C16.2251 3.24109 16.0005 2.69856 16.0005 2.13288C16.0005 1.56719 16.2251 1.02467 16.6251 0.624611Z" class="fill-dark group-hover:fill-white transition-colors" />
                </svg>
            </button>
        </div> -->

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Swiper !== 'undefined') {
            new Swiper('.productosInteresSlider', {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: '.productos-interes-next',
                    prevEl: '.productos-interes-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                },
            });
        }
    });
</script>
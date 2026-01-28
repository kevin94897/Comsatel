<?php

/**
 * Section: Blog / Últimas Noticias
 * Displays the latest 4 posts: 1 featured on left, 3 small on right.
 */

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
);

$blog_query = new WP_Query($args);

if (!$blog_query->have_posts()) {
    return;
}
?>

<section class="py-16 md:py-24 bg-gray-50" id="blog">
    <div class="container mx-auto px-4 lg:px-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-2 md:gap-6">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-medium text-gray-900 max-w-xl">
                Novedades y recursos de Comsatel
            </h2>
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn-outline transition-colors">
                Ver Todos Los Recursos
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
            <?php
            $modal_count = 0;
            while ($blog_query->have_posts()) : $blog_query->the_post();
                $modal_count++;

                // Get category
                $categories = get_the_category();
                $category_name = !empty($categories) ? $categories[0]->name : 'Blog';

                // Featured Post (First one)
                if ($modal_count === 1) : ?>
                    <div class="flex flex-col h-full">
                        <div class="relative w-full aspect-[4/3] rounded-3xl overflow-hidden mb-8 group">
                            <a href="<?php the_permalink(); ?>" class="block w-full h-full text-dark">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('large'); ?>"
                                        alt="<?php the_title(); ?>"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <?php else : ?>
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-400">Sin imagen</span>
                                    </div>
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="flex-1 flex flex-col items-start">
                            <span class="text-xs uppercase tracking-wider text-gray-400 mb-3 block">
                                <?php echo esc_html($category_name); ?>
                            </span>
                            <h3 class="text-2xl md:text-3xl font-medium text-gray-900 mb-4 leading-tight">
                                <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors text-dark">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <div class="text-black mb-6 line-clamp-3">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="text-primary font-medium hover:text-primary-dark inline-flex items-center gap-2 mt-auto group">
                                Conocer más
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transform transition-transform group-hover:translate-x-1">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Open Right Column Container -->
                    <div class="flex flex-col gap-8">
                    <?php else :
                    // Secondary Posts
                    ?>
                        <article class="flex flex-row gap-4 md:gap-6 group items-center">
                            <div class="w-5/12 aspect-video rounded-2xl overflow-hidden shrink-0">
                                <a href="<?php the_permalink(); ?>" class="block w-full h-full text-dark">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php the_post_thumbnail_url('medium'); ?>"
                                            alt="<?php the_title(); ?>"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    <?php else : ?>
                                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                            <span class="text-xs text-gray-500">No Image</span>
                                        </div>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="w-7/12">
                                <span class="text-[10px] md:text-xs uppercase tracking-wider text-gray-400 mb-1 md:mb-2 block">
                                    <?php echo esc_html($category_name); ?>
                                </span>
                                <h4 class="text-sm md:text-lg font-medium text-gray-900 leading-snug mb-0 md:mb-2">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors text-dark">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                            </div>
                        </article>
                    <?php endif; ?>
                <?php endwhile; ?>

                <?php if ($modal_count > 0) : ?>
                    </div> <!-- Close Right Column Container -->
                <?php endif; ?>
        </div>
    </div>
</section>

<?php wp_reset_postdata(); ?>
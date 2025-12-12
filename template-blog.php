<?php

/**
 * Template Name: Blog
 * 
 * Plantilla personalizada para el blog con búsqueda, filtros y carga de posts
 */

get_header();
?>

<main id="primary" class="site-main bg-gray-50">

    <!-- Hero Banner -->
    <section class="relative min-h-[400px] flex items-end <?php echo wp_title(); ?>">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_blog_banner.png');">
        </div>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="">
                <span class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold text-white mb-10 leading-tight mt-2" data-aos="fade-up"
                    data-aos-duration="1000">
                    BLOG
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

    <section class="py-8 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <!-- Barra de búsqueda y filtros -->
            <div class="flex flex-row md:flex-row justify-between items-center gap-2 md:gap-8 mb-12">
                <!-- Search Wrapper -->
                <div class="relative flex-1 w-full md:max-w-[500px] w-full md:min-w-[200px]">
                    <input
                        type="search"
                        id="blog-search"
                        class="w-full pl-12 pr-6 py-3 font-medium text-black bg-white border border-black rounded-lg transition-all duration-200 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 !pl-12"
                        placeholder="Buscar"
                        aria-label="Buscar posts">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 17A8 8 0 1 0 9 1a8 8 0 0 0 0 16zM18 18l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>

                <!-- Filter Wrapper -->
                <div class="md:w-auto md:w-[200px]">
                    <select id="blog-filter" class="text-sm w-full px-4 py-3 font-normal text-black bg-white border border-black rounded-md transition-all duration-200 outline-none cursor-pointer appearance-none focus:border-primary focus:ring-2 focus:ring-primary/20 md:pr-12 pr-8 leading-none" aria-label="Filtrar posts">
                        <option value="date">Relevancia</option>
                        <option value="title">Título</option>
                        <option value="modified">Recientes</option>
                    </select>
                </div>
            </div>

            <!-- Grid de posts -->
            <div id="blog-posts-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10 lg:gap-12 mb-12">
                <?php
                $paged = 1;
                $posts_per_page = 9;

                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $posts_per_page,
                    'paged' => $paged,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                $blog_query = new WP_Query($args);

                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post();
                        get_template_part('template-parts/content/content', 'blog-card');
                    endwhile;
                else :
                    echo '<p class="text-center text-xl text-gray-500 py-16 col-span-full">No se encontraron posts.</p>';
                endif;

                wp_reset_postdata();
                ?>
            </div>

            <!-- Botón Cargar Más -->
            <?php if ($blog_query->max_num_pages > 1) : ?>
                <div class="flex justify-center items-center gap-4 mt-12">
                    <button
                        id="load-more-posts"
                        class="btn btn-outline min-w-[200px] disabled:opacity-50 disabled:cursor-not-allowed"
                        data-page="1"
                        data-max-pages="<?php echo $blog_query->max_num_pages; ?>">
                        Cargar Más
                    </button>
                    <div id="loading-spinner" class="hidden">
                        <svg class="animate-spin h-10 w-10 text-primary" viewBox="0 0 50 50">
                            <circle class="opacity-25" cx="25" cy="25" r="20" stroke="currentColor" stroke-width="5" fill="none"></circle>
                            <path class="opacity-75" fill="currentColor" d="M25 5 A20 20 0 0 1 45 25"></path>
                        </svg>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part('inc/componentes/section-newsletter'); ?>
</main>

<?php
get_footer();

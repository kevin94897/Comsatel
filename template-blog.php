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
    <section class="relative min-h-[500px] flex items-end <?php echo wp_title(); ?>">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_blog_banner.png');">
        </div>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="">
                <span class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="text-2xl md:text-4xl lg:text-5xl font-semibold text-white mb-10 leading-tight mt-2 uppercase" data-aos="fade-up"
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

    <section class="py-8 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Barra de búsqueda y filtros -->
            <div class="flex flex-row md:flex-row justify-between items-center gap-2 md:gap-8 mb-4 md:mb-12">
                <!-- Search Wrapper -->
                <div class="relative w-full md:max-w-[600px] w-full md:min-w-[200px]">
                    <input
                        type="search"
                        id="blog-search"
                        class="text-xs md:text-sm w-full pl-12 pr-6 py-3 text-black placeholder-black !bg-gray-50 border !border-gray-400 rounded-md transition-all duration-200 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 md:!pl-12 !pl-10"
                        placeholder="Buscar"
                        aria-label="Buscar posts">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none md:w-5 md:h-5 w-4 h-4 bg-white" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.5 13C4.68333 13 3.146 12.3707 1.888 11.112C0.63 9.85333 0.000667196 8.316 5.29101e-07 6.5C-0.000666138 4.684 0.628667 3.14667 1.888 1.888C3.14733 0.629333 4.68467 0 6.5 0C8.31533 0 9.853 0.629333 11.113 1.888C12.373 3.14667 13.002 4.684 13 6.5C13 7.23333 12.8833 7.925 12.65 8.575C12.4167 9.225 12.1 9.8 11.7 10.3L17.3 15.9C17.4833 16.0833 17.575 16.3167 17.575 16.6C17.575 16.8833 17.4833 17.1167 17.3 17.3C17.1167 17.4833 16.8833 17.575 16.6 17.575C16.3167 17.575 16.0833 17.4833 15.9 17.3L10.3 11.7C9.8 12.1 9.225 12.4167 8.575 12.65C7.925 12.8833 7.23333 13 6.5 13ZM6.5 11C7.75 11 8.81267 10.5627 9.688 9.688C10.5633 8.81333 11.0007 7.75067 11 6.5C10.9993 5.24933 10.562 4.187 9.688 3.313C8.814 2.439 7.75133 2.00133 6.5 2C5.24867 1.99867 4.18633 2.43633 3.313 3.313C2.43967 4.18967 2.002 5.252 2 6.5C1.998 7.748 2.43567 8.81067 3.313 9.688C4.19033 10.5653 5.25267 11.0027 6.5 11Z" fill="#1E1E1E" />
                    </svg>

                </div>

                <!-- Filter Wrapper -->
                <div class="flex flex-row md:gap-4 items-center">
                    <!-- Category Filter -->
                    <div class="flex-1 relative hidden md:block basis-1/2 md:basis-[200px] shrink-0" id="category-filter-wrapper">
                        <button id="category-dropdown-toggle" class="md:flex hidden items-center justify-between text-sm w-full px-4 md:py-5 py-3 font-normal text-black !bg-transparent border border-gray-400 rounded-md transition-all duration-200 outline-none cursor-pointer appearance-none focus:border-primary focus:ring-2 focus:ring-primary/20 leading-none">
                            <span>Tema</span>
                            <svg class="transition-transform duration-200" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div id="category-dropdown-menu" class="hidden absolute top-full left-0 w-full mt-1 bg-white border border-gray-400 rounded-md shadow-lg z-50 overflow-y-auto p-4">
                            <div class="flex flex-col gap-3">
                                <?php
                                $categories = get_categories(array(
                                    'hide_empty' => true,
                                ));
                                foreach ($categories as $cat) :
                                ?>
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <div class="relative flex items-center">
                                            <input type="checkbox" name="blog_category[]" value="<?php echo $cat->term_id; ?>" class="peer sr-only blog-category-checkbox">
                                            <div class="w-5 h-5 border-2 border-gray-300 rounded-sm transition-all peer-checked:bg-primary peer-checked:border-primary"></div>
                                            <svg class="absolute inset-0 m-auto w-3.5 h-3.5 text-white opacity-0 peer-checked:opacity-100 transition-opacity" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.5 6L5 8.5L9.5 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <span class="text-sm font-normal text-black group-hover:text-primary transition-colors">
                                            <?php echo esc_html($cat->name); ?>
                                        </span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Sort Filter -->
                    <div class="basis-full md:basis-[200px] shrink-0">
                        <select id="blog-filter" class="text-xs md:text-sm w-full px-4 py-3 font-normal text-black !bg-transparent border border-gray-400 rounded-md transition-all duration-200 outline-none cursor-pointer appearance-none focus:border-primary focus:ring-2 focus:ring-primary/20 md:pr-12 pr-8 leading-none" aria-label="Filtrar posts">
                            <option value="date">Relevancia</option>
                            <option value="title">Título</option>
                            <option value="modified">Recientes</option>
                            <option value="oldest">Más antiguos</option>
                        </select>
                    </div>
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

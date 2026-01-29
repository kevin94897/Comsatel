<?php

/**
 * AJAX Handlers for Blog
 * Funciones para búsqueda, filtros y carga de posts
 */

/**
 * Calcular tiempo de lectura estimado
 */
function comsatel_reading_time()
{
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Asumiendo 200 palabras por minuto

    return $reading_time . ' min';
}

/**
 * Localizar scripts para AJAX
 */
function comsatel_localize_blog_scripts()
{
    wp_localize_script('jquery', 'comsatel_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('comsatel_blog_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'comsatel_localize_blog_scripts');

/**
 * Filtrar posts por búsqueda y orden
 */
function filter_blog_posts()
{
    // Verificar nonce
    check_ajax_referer('comsatel_blog_nonce', 'nonce');

    $search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';
    $orderby = isset($_POST['orderby']) ? sanitize_text_field($_POST['orderby']) : 'date';
    $categories = isset($_POST['categories']) ? array_map('intval', $_POST['categories']) : array();

    // Configurar argumentos de la consulta
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 9,
        'paged' => 1,
        'post_status' => 'publish',
        's' => $search,
    );

    // Filtrar por categorías si se proporcionan
    if (!empty($categories)) {
        $args['category__in'] = $categories;
    }

    // Configurar orden
    switch ($orderby) {
        case 'title':
            $args['orderby'] = 'title';
            $args['order'] = 'ASC';
            break;
        case 'modified':
            $args['orderby'] = 'modified';
            $args['order'] = 'DESC';
            break;
        case 'oldest':
            $args['orderby'] = 'date';
            $args['order'] = 'ASC';
            break;
        default:
            $args['orderby'] = 'date';
            $args['order'] = 'DESC';
            break;
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content/content', 'blog-card');
        }
    } else {
        echo '<p class="no-posts">No se encontraron posts.</p>';
    }

    $html = ob_get_clean();

    wp_send_json_success(array(
        'html' => $html,
        'max_pages' => $query->max_num_pages
    ));

    wp_reset_postdata();
}
add_action('wp_ajax_filter_blog_posts', 'filter_blog_posts');
add_action('wp_ajax_nopriv_filter_blog_posts', 'filter_blog_posts');

/**
 * Cargar más posts
 */
function load_more_posts()
{
    // Verificar nonce
    check_ajax_referer('comsatel_blog_nonce', 'nonce');

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';
    $orderby = isset($_POST['orderby']) ? sanitize_text_field($_POST['orderby']) : 'date';
    $categories = isset($_POST['categories']) ? array_map('intval', $_POST['categories']) : array();

    // Configurar argumentos de la consulta
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 9,
        'paged' => $page,
        'post_status' => 'publish',
        's' => $search,
    );

    // Filtrar por categorías si se proporcionan
    if (!empty($categories)) {
        $args['category__in'] = $categories;
    }

    // Configurar orden
    switch ($orderby) {
        case 'title':
            $args['orderby'] = 'title';
            $args['order'] = 'ASC';
            break;
        case 'modified':
            $args['orderby'] = 'modified';
            $args['order'] = 'DESC';
            break;
        case 'oldest':
            $args['orderby'] = 'date';
            $args['order'] = 'ASC';
            break;
        default:
            $args['orderby'] = 'date';
            $args['order'] = 'DESC';
            break;
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content/content', 'blog-card');
        }
    }

    $html = ob_get_clean();

    wp_send_json_success(array(
        'html' => $html,
        'max_pages' => $query->max_num_pages
    ));

    wp_reset_postdata();
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
/**
 * Global Search AJAX Handler (Initial version: Blog Posts)
 */
function comsatel_global_search()
{
    // Verificar nonce (opcional en búsqueda pública pero recomendado)
    // check_ajax_referer('comsatel_blog_nonce', 'nonce');

    $query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';

    if (empty($query)) {
        wp_send_json_error('Consulta vacía');
    }

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        'post_status' => 'publish',
        's' => $query,
    );

    $search_query = new WP_Query($args);

    ob_start();

    if ($search_query->have_posts()) {
        while ($search_query->have_posts()) {
            $search_query->the_post();
?>
            <a href="<?php the_permalink(); ?>" class="flex flex-col p-4 bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 rounded-xl transition-all group">
                <span class="text-xs text-primary font-bold uppercase mb-1">Blog</span>
                <h4 class="text-lg font-bold text-gray-900 group-hover:text-primary transition-colors mb-2">
                    <?php the_title(); ?>
                </h4>
                <p class="text-sm text-gray-500 line-clamp-2">
                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                </p>
            </a>
<?php
        }
    } else {
        echo '<p class="text-gray-500 text-center py-8">No se encontraron resultados para "' . esc_html($query) . '".</p>';
    }

    $html = ob_get_clean();

    wp_send_json_success(array(
        'html' => $html
    ));

    wp_reset_postdata();
}
add_action('wp_ajax_comsatel_global_search', 'comsatel_global_search');
add_action('wp_ajax_nopriv_comsatel_global_search', 'comsatel_global_search');

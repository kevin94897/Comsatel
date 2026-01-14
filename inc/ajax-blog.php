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

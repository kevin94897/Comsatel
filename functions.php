<?php

/**
 * comsatel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package comsatel
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function comsatel_content_width()
{
	$GLOBALS['content_width'] = apply_filters('comsatel_content_width', 640);
}
add_action('after_setup_theme', 'comsatel_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function comsatel_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'comsatel'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'comsatel'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'comsatel_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function comsatel_scripts()
{
	// Tailwind compilado
	wp_enqueue_style('comsatel-tailwind', get_template_directory_uri() . '/tailwind-output.css', [], _S_VERSION);

	// Tus estilos globales
	wp_enqueue_style(
		'comsatel-global',
		get_template_directory_uri() . '/src/global.css',
		['comsatel-tailwind'],
		filemtime(get_template_directory() . '/src/global.css')
	);

	// Style.css WP
	wp_enqueue_style(
		'comsatel-style',
		get_stylesheet_uri(),
		['comsatel-global'],    // ← Depende de global → GLOBAL GANA
		wp_get_theme()->get('Version')
	);


	// ⬇⬇⬇ SWIPER CSS + JS (AGREGAR AQUÍ)
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11.0.0');

	wp_enqueue_script(
		'swiper-js',
		'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
		[],
		'11.0.0',
		true
	);

	// Inicializar Swiper al cargar
	wp_add_inline_script('swiper-js', "
		document.addEventListener('DOMContentLoaded', function(){
			new Swiper('.myTestimonialSlider', {
				loop: true,
				slidesPerView: 1,
				spaceBetween: 30,
				navigation: {
					nextEl: '.testimonial-next',
					prevEl: '.testimonial-prev',
				},
			});
		});
	");

	// AOS
	wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', [], '2.3.1');
	wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], '2.3.1', true);
	wp_add_inline_script('aos-js', 'AOS.init({ duration: 800, easing: "ease-in-out", once: true, offset: 100 });');

	// Blog Scripts (solo en la plantilla de blog)
	if (is_page_template('template-blog.php')) {
		wp_enqueue_script(
			'comsatel-blog-js',
			get_template_directory_uri() . '/js/blog.js',
			['jquery'],
			filemtime(get_template_directory() . '/js/blog.js'),
			true
		);
	}

	// Calculator Script (solo en la página de calculadora)
	if (is_page_template('inc/template-calculator.php')) {
		wp_enqueue_script(
			'comsatel-calculator',
			get_template_directory_uri() . '/js/calculator.js',
			[],
			filemtime(get_template_directory() . '/js/calculator.js'),
			true
		);
	}

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Main theme scripts
	wp_enqueue_script(
		'comsatel-scripts',
		get_template_directory_uri() . '/js/scripts.js',
		['jquery'],
		filemtime(get_template_directory() . '/js/scripts.js'),
		true
	);

	// Ubicaciones Helper
	wp_enqueue_script(
		'comsatel-ubicaciones',
		get_template_directory_uri() . '/js/ubicaciones.js',
		[],
		filemtime(get_template_directory() . '/js/ubicaciones.js'),
		true
	);
}

add_action('wp_enqueue_scripts', 'comsatel_scripts', 99);



function comsatel_register_nav_menus()
{
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary Menu', 'comsatel'),
			'footer-empresa' => esc_html__('Footer Empresa', 'comsatel'),
			'footer-legal' => esc_html__('Footer Avisos Legales', 'comsatel'),
			'footer-contacto' => esc_html__('Footer Contacto', 'comsatel'),
		)
	);
}
add_action('after_setup_theme', 'comsatel_register_nav_menus');


function comsatel_setup()
{
	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	// Let WordPress manage the document title.
	add_theme_support('title-tag');

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support('post-thumbnails');

	// Add custom image sizes
	add_image_size('comsatel-hero', 1920, 1080, true);
	add_image_size('comsatel-card', 800, 600, true);
	add_image_size('comsatel-thumbnail', 400, 300, true);

	// Switch default core markup to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	// Add support for custom logo
	add_theme_support(
		'custom-logo',
		array(
			'height' => 100,
			'width' => 300,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'comsatel_setup');


/**
 * Custom Footer Logo
 */
function comsatel_register_footer_logo()
{
	add_theme_support('footer-logo', array(
		'height' => 90,
		'width'  => 240,
		'flex-width'  => true,
		'flex-height' => true,
	));
}
add_action('after_setup_theme', 'comsatel_register_footer_logo');

function comsatel_footer_logo()
{
	$footer_logo_id = get_theme_mod('footer_logo');

	if ($footer_logo_id) {
		$footer_logo_url = wp_get_attachment_image_url($footer_logo_id, 'full');
		echo '<img src="' . esc_url($footer_logo_url) . '" class="footer-logo" alt="Footer Logo">';
	} else {
		// Si no subes uno, usa el mismo del header como fallback
		if (has_custom_logo()) {
			echo get_custom_logo();
		}
	}
}

function comsatel_customize_register($wp_customize)
{

	$wp_customize->add_setting('footer_logo', array(
		'default'   => '',
		'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
		'label'    => __('Logo Dark Version', 'comsatel'),
		'section'  => 'title_tagline',
		'mime_type' => 'image',
	)));
}
add_action('customize_register', 'comsatel_customize_register');


/**
 * Add custom classes to menu items
 */
function comsatel_nav_menu_link_attributes($atts, $item, $args, $depth)
{
	// Add classes to primary menu links
	if ('menu-1' === $args->theme_location) {
		$atts['class'] = 'text-white hover:text-gray-200 transition-colors duration-200 font-medium';
	}

	// Add classes to footer menu links
	if (in_array($args->theme_location, array('footer-empresa', 'footer-legal', 'footer-contacto'))) {
		$atts['class'] = 'block text-black hover:text-primary transition-colors';
	}

	return $atts;
}
add_filter('nav_menu_link_attributes', 'comsatel_nav_menu_link_attributes', 10, 4);

/**
 * Custom logo classes
 */
function comsatel_custom_logo_class($html)
{
	$html = str_replace('custom-logo-link', 'custom-logo-link inline-block', $html);
	$html = str_replace('custom-logo', 'custom-logo w-auto inline-flex', $html);
	return $html;
}
add_filter('get_custom_logo', 'comsatel_custom_logo_class');

/**
 * Remove unwanted menu item classes
 */
function comsatel_clean_nav_menu_classes($classes, $item, $args)
{
	// Only keep essential classes
	$essential_classes = array('menu-item', 'current-menu-item', 'current-menu-parent');
	return array_intersect($classes, $essential_classes);
}
add_filter('nav_menu_css_class', 'comsatel_clean_nav_menu_classes', 10, 3);

/**
 * Add viewport meta tag for mobile responsiveness
 */
function comsatel_add_viewport_meta()
{
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">';
}
add_action('wp_head', 'comsatel_add_viewport_meta', 1);

/**
 * Customize excerpt length
 */
function comsatel_excerpt_length($length)
{
	return 30;
}
add_filter('excerpt_length', 'comsatel_excerpt_length');

/**
 * Customize excerpt more string
 */
function comsatel_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'comsatel_excerpt_more');

/**
 * Add async/defer to scripts
 */
function comsatel_async_scripts($tag, $handle, $src)
{
	// Add handles of scripts you want to defer
	$defer_scripts = array('comsatel-scripts');

	if (in_array($handle, $defer_scripts)) {
		return '<script src="' . $src . '" defer></script>' . "\n";
	}

	return $tag;
}
add_filter('script_loader_tag', 'comsatel_async_scripts', 10, 3);

/**
 * Remove jQuery Migrate
 */
function comsatel_remove_jquery_migrate($scripts)
{
	if (!is_admin() && isset($scripts->registered['jquery'])) {
		$script = $scripts->registered['jquery'];

		if ($script->deps) {
			$script->deps = array_diff($script->deps, array('jquery-migrate'));
		}
	}
}
add_action('wp_default_scripts', 'comsatel_remove_jquery_migrate');

/**
 * Disable WordPress emojis
 */
function comsatel_disable_emojis()
{
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'comsatel_disable_emojis');

/**
 * Add custom body classes
 */
function comsatel_body_classes($classes)
{
	// Add class for homepage
	if (is_front_page() && is_home()) {
		$classes[] = 'home-page';
	}

	// Add class for pages
	if (is_page()) {
		$classes[] = 'page-' . basename(get_permalink());
	}

	return $classes;
}
add_filter('body_class', 'comsatel_body_classes');

/**
 * Security: Remove WordPress version from head
 */
function comsatel_remove_version()
{
	return '';
}
add_filter('the_generator', 'comsatel_remove_version');
remove_action('wp_head', 'wp_generator');

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter('show_admin_bar', '__return_false');

/**
 * Añade las clases de Tailwind 'group relative' a los elementos <li> del menú principal.
 */
function add_tailwind_group_class_to_menu_li($classes, $item, $args)
{
	// Aplicar solo al menú que tiene el theme_location 'menu-1'
	if ($args->theme_location === 'menu-1') {
		// Añade la clase 'group' y 'relative' al <li>
		$classes[] = 'group relative';
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_tailwind_group_class_to_menu_li', 10, 3);

add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {

	if (!empty($item->classes)) {
		// Convierte las clases del <li> en string
		$classes = implode(' ', $item->classes);

		// Agrega las clases al <a>
		$atts['class'] = trim(($atts['class'] ?? '') . ' ' . $classes);
	}

	return $atts;
}, 10, 3);


/**
 * Include AJAX handlers for calculator
 */
require get_template_directory() . '/inc/ajax-calculator.php';


/**
 * Include AJAX handlers for blog
 */
require get_template_directory() . '/inc/ajax-blog.php';

/**
 * Include AJAX handlers for Libro de Reclamaciones
 */
require get_template_directory() . '/inc/ajax-libro-reclamaciones.php';

/**
 * Include AJAX handlers for Contacto
 */
require get_template_directory() . '/inc/ajax-contacto.php';


/**
 * Peru Locations Data
 */
require get_template_directory() . '/inc/data-ubicaciones.php';

add_action('wp_enqueue_scripts', function () {
	$ubicaciones = get_peru_locations_data();
	wp_localize_script('comsatel-scripts', 'comsatelUbicaciones', $ubicaciones);
}, 100);

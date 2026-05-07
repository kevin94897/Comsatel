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
 * Configuración centralizada de correos electrónicos
 * Administra el envío a pruebas ('kevin.gomez@nerd.pe') vs producción
 */
function comsatel_get_recipient_email($type = 'general')
{
    // [MODO DE PRUEБАS] Cambia esto a "false" cuando el sitio esté en Producción (en vivo)
    $is_test_mode = false; 
    
    // Correo o correos que recibirán los formularios mientras $is_test_mode sea true
    $test_emails = ['kevin.gomez@nerd.pe'];

    if ($is_test_mode) {
        return $test_emails;
    }

    // Correos oficiales de producción (pueden ser uno o más añadiéndolos al array)
    switch ($type) {
        case 'contacto':
            return ['atencionalcliente@comsatel.com.pe'];
        case 'reclamo':
            return ['atencionalcliente@comsatel.com.pe']; // Ejemplo
        case 'cotizador':
            return ['atencionalcliente@comsatel.com.pe']; // Cambiar/agregar el de ventas
        case 'general':
        default:
            return ['atencionalcliente@comsatel.com.pe'];
    }
}

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
 * Obtiene el puerto actual de Vite.
 */
function comsatel_get_vite_port(): int
{
	static $port = null;
	if ($port === null) {
		$hot_file = get_template_directory() . '/hot';
		$port = 5173; // Fallback
		if (file_exists($hot_file)) {
			$port = (int) trim(file_get_contents($hot_file));
		}
	}
	return $port;
}

/**
 * Detecta si el servidor de desarrollo Vite está corriendo.
 */
function comsatel_is_vite_dev(): bool
{
	static $is_dev = null;
	if ($is_dev === null) {
		$port = comsatel_get_vite_port();
		$handle = @fsockopen('localhost', $port, $errno, $errstr, 1);
		if ($handle) {
			fclose($handle);
			$is_dev = true;
		} else {
			$is_dev = false;
		}
	}
	return $is_dev;
}

/**
 * Marca los scripts de Vite como type="module" en modo desarrollo.
 * Debe estar al nivel global (no dentro de comsatel_scripts) para que
 * WordPress lo registre antes de procesar los script tags.
 */
add_filter('script_loader_tag', function (string $tag, string $handle): string {
	if (!comsatel_is_vite_dev())
		return $tag;

	$module_handles = [
		'vite-client',
		'comsatel-scripts',
		'comsatel-blog-js',
		'comsatel-calculator',
		'comsatel-ubicaciones',
		'comsatel-cotizador',
		'comsatel-validator',
		'comsatel-validator-init',
	];
	if (in_array($handle, $module_handles, true)) {
		// Quitar ?ver=xxxx que WordPress agrega y rompe el dev server de Vite
		$tag = preg_replace('/\?ver=[^\'"\s]+/', '', $tag);
		$tag = str_replace(' defer', '', $tag);
		$tag = str_replace('<script ', '<script type="module" ', $tag);
	}
	return $tag;
}, 20, 2);

/**
 * Quitar ?ver de los estilos que apuntan al dev server de Vite.
 */
add_filter('style_loader_tag', function (string $tag, string $handle): string {
	if (!comsatel_is_vite_dev())
		return $tag;

	$vite_styles = ['comsatel-tailwind'];
	if (in_array($handle, $vite_styles, true)) {
		$tag = preg_replace('/\?ver=[^\'"\s]+/', '', $tag);
	}
	return $tag;
}, 20, 2);

/**
 * Enqueue scripts and styles.
 */
function comsatel_scripts()
{
	$is_dev = comsatel_is_vite_dev();
	$vite_port = comsatel_get_vite_port();
	$vite_base = "http://localhost:{$vite_port}";

	if ($is_dev) {
		// --- Modo desarrollo: Vite dev server con HMR ---

		// CSS de Tailwind (Vite lo inyecta vía HMR)
		wp_enqueue_style('comsatel-tailwind', $vite_base . '/src/tailwind.css', [], false);

		// Style.css WP
		wp_enqueue_style(
			'comsatel-style',
			get_stylesheet_uri(),
			['comsatel-tailwind'],
			wp_get_theme()->get('Version')
		);

		// Cliente HMR de Vite (se carga en el <head>)
		wp_enqueue_script('vite-client', $vite_base . '/@vite/client', [], false, false);

		// Main theme scripts
		wp_enqueue_script('comsatel-scripts', $vite_base . '/js/scripts.js', ['jquery'], false, true);

		// Ubicaciones Helper
		wp_enqueue_script('comsatel-ubicaciones', $vite_base . '/js/ubicaciones.js', [], false, true);

		// Cotizador Script
		wp_enqueue_script('comsatel-cotizador', $vite_base . '/js/cotizador.js', ['jquery'], false, true);

		// Centralized Validation Engine
		wp_enqueue_script('comsatel-validator', $vite_base . '/js/form-validator.js', [], false, true);

		// Validation Initialization
		wp_enqueue_script('comsatel-validator-init', $vite_base . '/js/validator-init.js', ['comsatel-validator'], false, true);

		// Blog Scripts (solo en la plantilla de blog)
		if (is_page_template('template-blog.php')) {
			wp_enqueue_script('comsatel-blog-js', $vite_base . '/js/blog.js', [], false, true);
		}

		// Calculator Script (solo en la página de calculadora)
		if (is_page_template('inc/template-calculator.php')) {
			wp_enqueue_script('comsatel-calculator', $vite_base . '/js/calculator.js', ['comsatel-validator-init'], false, true);
		}

	} else {
		// --- Modo producción: assets compilados desde /dist/ ---

		// Tailwind + global (compilado por Vite)
		wp_enqueue_style(
			'comsatel-tailwind',
			get_template_directory_uri() . '/dist/css/tailwind.css',
			[],
			filemtime(get_template_directory() . '/dist/css/tailwind.css')
		);

		// Style.css WP
		wp_enqueue_style(
			'comsatel-style',
			get_stylesheet_uri(),
			['comsatel-tailwind'],
			wp_get_theme()->get('Version')
		);

		// Blog Scripts (solo en la plantilla de blog)
		if (is_page_template('template-blog.php')) {
			wp_enqueue_script(
				'comsatel-blog-js',
				get_template_directory_uri() . '/dist/js/blog.js',
				['jquery'],
				filemtime(get_template_directory() . '/dist/js/blog.js'),
				true
			);
		}

		// Calculator Script (solo en la página de calculadora)
		if (is_page_template('inc/template-calculator.php')) {
			wp_enqueue_script(
				'comsatel-calculator',
				get_template_directory_uri() . '/dist/js/calculator.js',
				['comsatel-validator-init'],
				filemtime(get_template_directory() . '/dist/js/calculator.js'),
				true
			);
		}

		// Main theme scripts
		wp_enqueue_script(
			'comsatel-scripts',
			get_template_directory_uri() . '/dist/js/scripts.js',
			['jquery'],
			filemtime(get_template_directory() . '/dist/js/scripts.js'),
			true
		);

		// Ubicaciones Helper
		wp_enqueue_script(
			'comsatel-ubicaciones',
			get_template_directory_uri() . '/dist/js/ubicaciones.js',
			[],
			filemtime(get_template_directory() . '/dist/js/ubicaciones.js'),
			true
		);

		// Cotizador Script
		wp_enqueue_script(
			'comsatel-cotizador',
			get_template_directory_uri() . '/dist/js/cotizador.js',
			['jquery'],
			filemtime(get_template_directory() . '/dist/js/cotizador.js'),
			true
		);

		// Centralized Validation Engine
		wp_enqueue_script(
			'comsatel-validator',
			get_template_directory_uri() . '/dist/js/form-validator.js',
			[],
			filemtime(get_template_directory() . '/dist/js/form-validator.js'),
			true
		);

		// Validation Initialization
		wp_enqueue_script(
			'comsatel-validator-init',
			get_template_directory_uri() . '/dist/js/validator-init.js',
			['comsatel-validator'],
			filemtime(get_template_directory() . '/dist/js/validator-init.js'),
			true
		);
	}

	// ⬇⬇⬇ SWIPER CSS + JS (CDN – siempre)
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

			new Swiper('.myProductosSlider', {
				loop: true,
				slidesPerView: 1,
				spaceBetween: 30,
				navigation: {
					nextEl: '.productos-next',
					prevEl: '.productos-prev',
				},
			});
		});
	");

	// AOS
	wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', [], '2.3.1');
	wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], '2.3.1', true);
	wp_add_inline_script('aos-js', 'AOS.init({ duration: 800, easing: "ease-in-out", once: true, offset: 100 });');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Export global variables for all scripts
	wp_localize_script('comsatel-validator-init', 'comsatel_vars', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'home_url' => home_url(),
		'nonce_contacto' => wp_create_nonce('comsatel_contacto_nonce'),
	));
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
		'width' => 240,
		'flex-width' => true,
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
		'default' => '',
		'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
		'label' => __('Logo Dark Version', 'comsatel'),
		'section' => 'title_tagline',
		'mime_type' => 'image',
	)));

	// --- Seccción Redes Sociales ---
	$wp_customize->add_section('comsatel_social_section', array(
		'title' => __('Redes Sociales', 'comsatel'),
		'priority' => 30,
	));

	$socials = array(
		'instagram' => array('label' => 'Instagram URL', 'default' => ''),
		'twitter' => array('label' => 'Twitter URL', 'default' => ''),
		'linkedin' => array('label' => 'LinkedIn URL', 'default' => ''),
		'facebook' => array('label' => 'Facebook URL', 'default' => ''),
		'youtube' => array('label' => 'YouTube URL', 'default' => ''),
	);

	foreach ($socials as $key => $data) {
		$wp_customize->add_setting('comsatel_social_' . $key, array(
			'default' => $data['default'],
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
		));

		$wp_customize->add_control('comsatel_social_' . $key, array(
			'label' => __($data['label'], 'comsatel'),
			'section' => 'comsatel_social_section',
			'type' => 'url',
		));
	}

	// --- Sección WhatsApp ---
	$wp_customize->add_section('comsatel_whatsapp_section', array(
		'title'    => __('WhatsApp', 'comsatel'),
		'priority' => 35,
	));

	$wp_customize->add_setting('comsatel_whatsapp_number', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	));
	$wp_customize->add_control('comsatel_whatsapp_number', array(
		'label'       => __('Número de WhatsApp', 'comsatel'),
		'description' => __('Incluye el código de país, ej: 51987654321', 'comsatel'),
		'section'     => 'comsatel_whatsapp_section',
		'type'        => 'text',
	));

	$wp_customize->add_setting('comsatel_whatsapp_message', array(
		'default'           => '¡Hola! ¿En qué podemos ayudarte?',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	));
	$wp_customize->add_control('comsatel_whatsapp_message', array(
		'label'   => __('Mensaje del globo', 'comsatel'),
		'section' => 'comsatel_whatsapp_section',
		'type'    => 'text',
	));
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
	$html = str_replace('custom-logo', 'custom-logo w-auto min-w-[120px] inline-flex', $html);
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
 * Nota: en modo dev Vite usa type="module" que ya es diferido por el navegador.
 * En producción, el defer lo maneja el quinto argumento de wp_enqueue_script (in_footer=true).
 * Este filtro se mantiene deshabilitado para no conflictuar con el filtro de HMR.
 */
// function comsatel_async_scripts($tag, $handle, $src) { ... }
// add_filter('script_loader_tag', 'comsatel_async_scripts', 10, 3);

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
 * Include AJAX handlers for Cotizador
 */
require get_template_directory() . '/inc/ajax-cotizador.php';


/**
 * Peru Locations Data
 */
require get_template_directory() . '/inc/data-ubicaciones.php';

/**
 * Filtro global para ACF: Resaltar texto entre pipes |word| con color primario.
 */
function comsatel_acf_format_value_highlight($value, $post_id, $field)
{
	if (is_string($value) && (strpos($value, '|') !== false)) {
		// Reemplaza |texto| por <span class="text-primary">$1</span>
		$value = preg_replace('/\|([^|]+)\|/', '<span class="text-primary">$1</span>', $value);
	}
	return $value;
}
add_filter('acf/format_value/type=text', 'comsatel_acf_format_value_highlight', 10, 3);
add_filter('acf/format_value/type=textarea', 'comsatel_acf_format_value_highlight', 10, 3);
add_filter('acf/format_value/type=wysiwyg', 'comsatel_acf_format_value_highlight', 10, 3);

add_action('wp_enqueue_scripts', function () {
	$ubicaciones = get_peru_locations_data();
	wp_localize_script('comsatel-scripts', 'comsatelUbicaciones', $ubicaciones);
}, 100);

/**
 * Assign custom templates to specific post types
 */
add_filter('template_include', function ($template) {
	if (is_singular('solucion')) {
		$new_template = locate_template(array('inc/template-solucion.php'));
		if (!empty($new_template))
			return $new_template;
	}
	if (is_singular('sector')) {
		$new_template = locate_template(array('inc/template-sector.php'));
		if (!empty($new_template))
			return $new_template;
	}
	if (is_singular('servicio')) {
		$new_template = locate_template(array('inc/template-servicio.php'));
		if (!empty($new_template))
			return $new_template;
	}
	if (is_singular('producto')) {
		$new_template = locate_template(array('inc/template-producto.php'));
		if (!empty($new_template))
			return $new_template;
	}
	return $template;
});

function comsatel_theme_setup()
{
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'comsatel_theme_setup');

/**
 * Enable featured image support for custom post types.
 */
function comsatel_add_cpt_supports()
{
	$cpts = array('solucion', 'sector', 'servicio', 'producto', 'promocion', 'promociones', 'evento');

	foreach ($cpts as $cpt) {
		add_post_type_support($cpt, 'thumbnail');
	}
}
add_action('init', 'comsatel_add_cpt_supports', 20);

/**
 * Convierte una URL de Google Maps a formato embed
 */
function comsatel_maps_to_embed_url($url)
{
	if (empty($url))
		return '';

	// Ya es una URL de embed → retornar tal cual
	if (strpos($url, 'maps/embed') !== false) {
		return $url;
	}

	// URL corta (maps.app.goo.gl) → no se puede convertir sin hacer redirect
	// Mejor dejar que el editor use la URL embed directamente
	if (strpos($url, 'goo.gl') !== false) {
		return $url;
	}

	// URL normal de Google Maps → convertir a embed
	// https://www.google.com/maps/place/... → https://www.google.com/maps/embed?pb=...
	if (preg_match('/[?&]pb=([^&]+)/', $url, $matches)) {
		return 'https://www.google.com/maps/embed?pb=' . $matches[1];
	}

	// Fallback: intentar construir embed con la URL tal cual
	return $url;
}

/**
 * Register ACF Options Pages
 */
if (function_exists('acf_add_options_page')) {
	// Página principal de opciones del tema
	acf_add_options_page(array(
		'page_title' => 'Opciones del Tema',
		'menu_title' => 'Opciones del Tema',
		'menu_slug' => 'theme-options',
		'capability' => 'edit_posts',
		'redirect' => false
	));

	// Megamenu - Perú
	acf_add_options_sub_page(array(
		'page_title'  => 'Megamenu - Perú',
		'menu_title'  => 'Megamenu PE',
		'menu_slug'   => 'megamenu-header',
		'post_id'     => 'megamenu-header',
		'parent_slug' => 'theme-options',
		'capability'  => 'edit_posts',
	));

	// Megamenu - Bolivia
	acf_add_options_sub_page(array(
		'page_title'  => 'Megamenu - Bolivia',
		'menu_title'  => 'Megamenu BO',
		'menu_slug'   => 'megamenu-header-bo',
		'post_id'     => 'megamenu-header-bo',
		'parent_slug' => 'theme-options',
		'capability'  => 'edit_posts',
	));

	// Megamenu - Colombia
	acf_add_options_sub_page(array(
		'page_title'  => 'Megamenu - Colombia',
		'menu_title'  => 'Megamenu CO',
		'menu_slug'   => 'megamenu-header-co',
		'post_id'     => 'megamenu-header-co',
		'parent_slug' => 'theme-options',
		'capability'  => 'edit_posts',
	));
}

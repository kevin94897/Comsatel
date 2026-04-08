<?php

/**
 * The header for our theme
 *
 * @package comsatel
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<?php
/**
 * PARCHE: header.php — Desktop Actions + Mobile Login
 * 
 * Campos ACF (Options Page):
 *   boton_sesion      → texto del label del botón "Iniciar Sesión"
 *   lista_de_enlaces  → repeater: icono (imagen), boton (enlace)
 *   boton_rojo        → enlace (url, title, target) para "Cotiza ahora"
 * 
 * Reemplaza los bloques indicados en el header.php original.
 * El resto del archivo queda intacto.
 */

// ── Leer campos ACF (Options) ─────────────────────────────────────────────────
$acf_boton_sesion = get_field('boton_sesion', 'option') ?: null;
$acf_lista_de_enlaces = get_field('lista_de_enlaces', 'option') ?: null;
$acf_boton_rojo = get_field('boton_rojo', 'option') ?: null;

$label_sesion = $acf_boton_sesion ?: 'Iniciar Sesión';
$boton_rojo_url = $acf_boton_rojo['url'] ?? null;
$boton_rojo_titulo = $acf_boton_rojo['title'] ?? null;
$boton_rojo_target = $acf_boton_rojo['target'] ?? '_self';

// SVG fallbacks por posición (mismo orden que el template original)
$fallback_svgs = [
	// CLocator
	'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none"><path d="M5.06464 3.22832C4.97668 3.27883 4.89956 3.34622 4.83771 3.42661C4.77587 3.50701 4.73052 3.59883 4.70426 3.69681C4.67801 3.79478 4.67137 3.89698 4.68472 3.99753C4.69807 4.09808 4.73116 4.195 4.78208 4.28272L5.28928 5.1616L4.7112 5.28L0 8L2 11.464L6.7112 8.744L7.10288 8.3024L7.61008 9.18128C7.66059 9.26925 7.72797 9.34636 7.80837 9.40821C7.88877 9.47005 7.98059 9.5154 8.07856 9.54166C8.17654 9.56791 8.27874 9.57456 8.37928 9.5612C8.47983 9.54785 8.57675 9.51476 8.66448 9.46384L10.7917 8.23568C10.8796 8.18517 10.9568 8.11779 11.0186 8.03739C11.0804 7.95699 11.1258 7.86517 11.1521 7.7672C11.1783 7.66922 11.185 7.56702 11.1716 7.46648C11.1582 7.36593 11.1252 7.26901 11.0742 7.18128L10.567 6.30256L11.1451 6.18416L15.8563 3.46416L13.8563 0L9.14512 2.72L8.75344 3.1616L8.24624 2.28272C8.19572 2.19477 8.12832 2.11767 8.04792 2.05584C7.96751 1.99401 7.87569 1.94868 7.77772 1.92244C7.67974 1.8962 7.57755 1.88957 7.47701 1.90293C7.37647 1.9163 7.27955 1.9494 7.19184 2.00032L5.06464 3.22832ZM1.0928 8.2928L5.2496 5.8928L6.4496 7.9712L2.2928 10.3712L1.0928 8.2928ZM9.40656 3.4928L13.5635 1.0928L14.7635 3.1712L10.6067 5.5712L9.40656 3.4928ZM11.1666 9.66144C11.1268 9.81357 11.0574 9.95633 10.9623 10.0815C10.8672 10.2067 10.7482 10.3118 10.6123 10.3908C10.4763 10.4698 10.3261 10.5212 10.1703 10.5419C10.0144 10.5626 9.85601 10.5523 9.70416 10.5115L9.50096 11.2853C10.561 11.5642 11.6573 10.9267 11.9397 9.86768L11.1666 9.66144ZM9.28976 12.057L9.08656 12.8306C11.007 13.3357 12.9845 12.1949 13.4939 10.2838L12.7211 10.0781C12.3234 11.5699 10.7955 12.453 9.28976 12.057ZM8.87744 13.6034L8.67408 14.3773C11.451 15.1075 14.3048 13.461 15.0411 10.699L14.2683 10.493C13.6437 12.8354 11.2397 14.2246 8.87744 13.6034Z" fill="#FF4D4D"/></svg>',
	// C-Go
	'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.88949 0.00262198C8.15064 -0.0167262 8.40856 0.0715913 8.60662 0.248184C8.80469 0.424776 8.92671 0.675211 8.9459 0.944503V0.986677C8.9459 1.26631 8.83819 1.53448 8.64646 1.73221C8.45474 1.92994 8.19471 2.04102 7.92357 2.04102C7.65243 2.04102 7.39239 1.92994 7.20067 1.73221C7.00894 1.53448 6.90123 1.26631 6.90123 0.986677C6.91007 0.722506 7.01808 0.472209 7.20246 0.288608C7.38685 0.105007 7.63318 0.00246479 7.88949 0.00262198Z" fill="#FF4D4D"/></svg>',
	// Tracksolid (mismo SVG que CLocator en el original)
	'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none"><path d="M5.06464 3.22832C4.97668 3.27883 4.89956 3.34622 4.83771 3.42661C4.77587 3.50701 4.73052 3.59883 4.70426 3.69681C4.67801 3.79478 4.67137 3.89698 4.68472 3.99753C4.69807 4.09808 4.73116 4.195 4.78208 4.28272L5.28928 5.1616L4.7112 5.28L0 8L2 11.464L6.7112 8.744L7.10288 8.3024L7.61008 9.18128C7.66059 9.26925 7.72797 9.34636 7.80837 9.40821C7.88877 9.47005 7.98059 9.5154 8.07856 9.54166C8.17654 9.56791 8.27874 9.57456 8.37928 9.5612C8.47983 9.54785 8.57675 9.51476 8.66448 9.46384L10.7917 8.23568C10.8796 8.18517 10.9568 8.11779 11.0186 8.03739C11.0804 7.95699 11.1258 7.86517 11.1521 7.7672C11.1783 7.66922 11.185 7.56702 11.1716 7.46648C11.1582 7.36593 11.1252 7.26901 11.0742 7.18128L10.567 6.30256L11.1451 6.18416L15.8563 3.46416L13.8563 0L9.14512 2.72L8.75344 3.1616L8.24624 2.28272C8.19572 2.19477 8.12832 2.11767 8.04792 2.05584C7.96751 1.99401 7.87569 1.94868 7.77772 1.92244C7.67974 1.8962 7.57755 1.88957 7.47701 1.90293C7.37647 1.9163 7.27955 1.9494 7.19184 2.00032L5.06464 3.22832Z" fill="#FF4D4D"/></svg>',
	// CLVideo
	'<svg xmlns="http://www.w3.org/2000/svg" width="13" height="9" viewBox="0 0 13 9" fill="none"><path d="M1.83333 0C1.3471 0 0.880788 0.193154 0.536971 0.536971C0.193154 0.880787 0 1.3471 0 1.83333V6.83333C0 7.31956 0.193154 7.78588 0.536971 8.1297C0.880788 8.47351 1.3471 8.66667 1.83333 8.66667H7.5C7.98623 8.66667 8.45255 8.47351 8.79636 8.1297C9.14018 7.78588 9.33333 7.31956 9.33333 6.83333V5.77067L11.6127 7.80067C12.1493 8.27867 13 7.89733 13 7.178V1.24333C13 0.523333 12.1493 0.142667 11.6127 0.620667L9.33333 2.65067V1.83333C9.33333 1.3471 9.14018 0.880787 8.79636 0.536971C8.45255 0.193154 7.98623 0 7.5 0H1.83333Z" fill="#FF4D4D"/></svg>',
	// Trackmobile
	'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.88949 0.00262198C8.15064 -0.0167262 8.40856 0.0715913 8.60662 0.248184C8.80469 0.424776 8.92671 0.675211 8.9459 0.944503V0.986677C8.9459 1.26631 8.83819 1.53448 8.64646 1.73221C8.45474 1.92994 8.19471 2.04102 7.92357 2.04102C7.65243 2.04102 7.39239 1.92994 7.20067 1.73221C7.00894 1.53448 6.90123 1.26631 6.90123 0.986677C6.91007 0.722506 7.01808 0.472209 7.20246 0.288608C7.38685 0.105007 7.63318 0.00246479 7.88949 0.00262198Z" fill="#FF4D4D"/></svg>',
];

function render_megamenu_icon($icono): void
{
	if (empty($icono))
		return;

	if (is_array($icono) && !empty($icono['url'])) {
		// ACF Image Array
		echo '<img src="' . esc_url($icono['url']) . '" alt="' . esc_attr($icono['alt'] ?? '') . '" class="w-5 h-5 object-contain">';
	} elseif (is_string($icono) && !empty($icono)) {
		// Raw SVG String
		echo $icono;
	}
}
?>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<!-- <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'comsatel'); ?></a> -->

		<?php
		// Detectar si estamos en front-page o template producto-gps
		$is_transparent_header = is_front_page() || is_page_template('inc/template-producto.php')
			|| is_page_template('template-blog.php') || is_single() || is_page_template('inc/template-tyc.php')
			|| is_page_template('inc/template-gestion.php') || is_page_template('inc/template-contacto.php')
			|| is_page_template('inc/template-solucion.php') || is_page_template('inc/template-cookies.php')
			|| is_page_template('inc/template-descargas.php') || is_page_template('inc/template-actualizar-datos.php')
			|| is_page_template('inc/template-servicio.php') || is_page_template('inc/template-sector.php')
			|| is_page_template('inc/template-nosotros.php') || is_page_template('inc/template-xperience.php')
			|| is_page_template('inc/template-promocion.php') || is_page_template('inc/template-promociones.php');

		$header_bg_class = $is_transparent_header ? '' : 'bg-transparent ';
		$text_color_class = $is_transparent_header ? 'text-white' : 'text-gray-900';
		$text_hover_class = $is_transparent_header ? 'hover:text-gray-200' : 'hover:text-primary';
		$logo_text_class = $is_transparent_header ? 'text-white' : 'text-gray-900';
		$mobile_menu_bg = $is_transparent_header ? 'bg-gray-900 bg-opacity-95' : 'bg-white shadow-lg';
		$mobile_text_class = $is_transparent_header ? 'text-white' : 'text-gray-900';
		?>

		<!-- Header -->
		<header id="masthead"
			data-transparent="<?php echo $is_transparent_header ? '1' : '0'; ?>"
			class="absolute top-0 left-0 right-0 z-50 transition-all duration-300 <?php echo $header_bg_class; ?>">
			<div class="container-full mx-auto px-4 lg:px-8">
				<div class="flex items-center justify-between py-4 lg:py-6">

					<!-- Logo -->
					<div class="site-branding relative" data-aos="fade-right" data-aos-duration="800">
						<?php if ($is_transparent_header): ?>
							<?php
							$dark_logo_id  = get_theme_mod('footer_logo');
							$dark_logo_url = $dark_logo_id ? wp_get_attachment_image_url($dark_logo_id, 'full') : null;
							?>
							<!-- Logo claro (visible por defecto, se oculta en sticky) -->
							<div id="header-logo-clear" class="transition-opacity duration-300">
								<?php if (has_custom_logo()): ?>
									<?php the_custom_logo(); ?>
								<?php else: ?>
									<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
										class="text-white text-2xl font-medium">
										<?php bloginfo('name'); ?>
									</a>
								<?php endif; ?>
							</div>
							<!-- Logo oscuro (oculto por defecto, visible en sticky) -->
							<div id="header-logo-dark" class="absolute inset-0 opacity-0 pointer-events-none transition-opacity duration-300">
								<?php if ($dark_logo_url): ?>
									<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
										<img src="<?php echo esc_url($dark_logo_url); ?>" class="w-auto h-full object-contain"
											alt="<?php bloginfo('name'); ?>">
									</a>
								<?php elseif (has_custom_logo()): ?>
									<?php the_custom_logo(); ?>
								<?php else: ?>
									<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
										class="text-gray-900 text-2xl font-medium">
										<?php bloginfo('name'); ?>
									</a>
								<?php endif; ?>
							</div>
						<?php else: ?>
							<!-- Logo oscuro para páginas internas (fondo blanco) -->
							<?php
							$footer_logo_id = get_theme_mod('footer_logo');
							if ($footer_logo_id):
								$footer_logo_url = wp_get_attachment_image_url($footer_logo_id, 'full');
								?>
								<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
									<img src="<?php echo esc_url($footer_logo_url); ?>" class="w-auto"
										alt="<?php bloginfo('name'); ?>">
								</a>
							<?php elseif (has_custom_logo()): ?>
								<?php the_custom_logo(); ?>
							<?php else: ?>
								<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
									class="<?php echo $logo_text_class; ?> text-2xl font-medium">
									<?php bloginfo('name'); ?>
								</a>
							<?php endif; ?>
						<?php endif; ?>
					</div>

					<!-- Desktop Navigation -->
					<nav class="hidden lg:flex items-center space-x-8 header-nav-<?php echo $is_transparent_header ? 'dark' : 'light'; ?>"
						data-aos="fade-down" data-aos-delay="200">
						<?php
						// Definimos el HTML de la línea animada
						$animated_line = '<span class="absolute left-0 bottom-0 h-0.5 w-0 bg-red-600 group-hover:w-full transition-all duration-300"></span>';

						// Usaremos un filtro para la clase del <a>
						wp_nav_menu(array(
							'theme_location' => 'menu-1',
							'menu_class' => 'flex items-center list-none space-x-8 mb-0',
							'container' => false,
							'fallback_cb' => false,
							// Estas clases se aplicarán al <a>
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							// El contenido antes y después del texto del enlace
							'link_before' => '<span class="transition-colors duration-200">',
							// Se inserta la línea animada justo después del texto del enlace (dentro del <a>)
							'link_after' => '</span>' . $animated_line,
						));
						?>
					</nav>

					<!-- Mega Menu Container -->
					<div id="mega-menu"
						class="fixed left-1/2 -translate-x-1/2 w-[95vw] max-w-[1200px] bg-white shadow-2xl border-t border-gray-100 rounded-lg z-[100] transition-all duration-300 opacity-0 invisible pointer-events-none">
						<div class="p-8 mx-auto flex min-h-[300px]">

							<!-- Tabs Sidebar - Left Column -->
							<div class="w-1/4 pr-6 flex flex-col space-b-2 border-r border-gray-100">
								<div class="menu-tab-item active group/item flex items-center justify-between cursor-pointer p-3 rounded-md hover:bg-gray-50 transition-all text-red-600 font-medium"
									data-target="por-necesidad">
									<div class="flex items-center gap-3 text-xs">
										<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
												d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
											</path>
										</svg>
										<span>Por Necesidad</span>
									</div>
									<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M9 5l7 7-7 7"></path>
									</svg>
								</div>

								<div class="menu-tab-item group/item flex items-center justify-between cursor-pointer p-3 rounded-md hover:bg-gray-50 transition-all text-gray-700"
									data-target="por-productos">
									<div class="flex items-center gap-3 text-xs">
										<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
												d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
											</path>
										</svg>
										<span>Por Productos</span>
									</div>
									<svg class="w-4 h-4 opacity-0 group-hover/item:opacity-100 transition-opacity"
										fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M9 5l7 7-7 7"></path>
									</svg>
								</div>

								<div class="menu-tab-item group/item flex items-center justify-between cursor-pointer p-3 rounded-md hover:bg-gray-50 transition-all text-gray-700"
									data-target="por-sector">
									<div class="flex items-center gap-3 text-xs">
										<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
												d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
											</path>
										</svg>
										<span>Por Sector</span>
									</div>
									<svg class="w-4 h-4 opacity-0 group-hover/item:opacity-100 transition-opacity"
										fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M9 5l7 7-7 7"></path>
									</svg>
								</div>
							</div>

							<!-- Dynamic Content Area - Right Column -->
							<div class="w-3/4 pl-8 py-2">

								<!-- Tab 1: Por Necesidad -->
								<div id="por-necesidad" class="tab-content">
									<?php
									// Obtener las secciones de menú desde ACF (repetidor)
									if (have_rows('megamenu_por_necesidad', 'option')):
										// Contar el total de secciones
										$total_sections = count(get_field('megamenu_por_necesidad', 'option'));

										// Determinar la clase del grid según la cantidad
										$grid_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2'; // Default para 4 o menos
									
										if ($total_sections > 6) {
											$grid_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4';
										} elseif ($total_sections > 4) {
											$grid_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3';
										}

										echo '<div class="grid ' . $grid_class . ' gap-x-16 gap-y-8">';

										while (have_rows('megamenu_por_necesidad', 'option')):
											the_row();
											$titulo = get_sub_field('titulo_seccion');
											$icono = get_sub_field('icono_svg');
											?>
											<div class="mega-menu-section">
												<div class="flex items-center gap-2 mb-2">
													<?php if (!empty($icono)): ?>
														<span class="w-5 h-5 text-gray-500">
															<?php render_megamenu_icon($icono); ?>
														</span>
													<?php endif; ?>

													<?php if (!empty($titulo)): ?>
														<p class="font-bold text-gray-800 mb-0 text-xs">
															<?php echo esc_html($titulo); ?>
														</p>
													<?php endif; ?>
												</div>

												<?php if (have_rows('items_menu')): ?>
													<ul class="space-b-2.5 pl-0">
														<?php while (have_rows('items_menu')):
															the_row();
															$enlace = get_sub_field('enlace');
															if (!empty($enlace['url'])):
																$link_url = $enlace['url'];
																$link_title = !empty($enlace['title']) ? $enlace['title'] : '';
																$link_target = !empty($enlace['target']) ? $enlace['target'] : '_self';
																?>
																<li>
																	<a href="<?php echo esc_url($link_url); ?>"
																		target="<?php echo esc_attr($link_target); ?>"
																		class="text-black hover:text-red-600 cursor-pointer transition-colors text-xs block">
																		<?php echo esc_html($link_title); ?>
																	</a>
																</li>
															<?php endif; ?>
														<?php endwhile; ?>
													</ul>
												<?php endif; ?>
											</div>
											<?php
										endwhile;
										echo '</div>';
									else:
										?>
										<p class="text-gray-400 text-xs">Sin submenus</p>
									<?php endif; ?>
								</div>

								<!-- Tab 2: Por Productos -->
								<div id="por-productos" class="tab-content hidden">
									<?php
									if (have_rows('megamenu_por_productos', 'option')):
										$total_sections = count(get_field('megamenu_por_productos', 'option'));

										$grid_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2';

										if ($total_sections > 6) {
											$grid_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4';
										} elseif ($total_sections > 4) {
											$grid_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3';
										}

										echo '<div class="grid ' . $grid_class . ' gap-x-16 gap-y-8">';

										while (have_rows('megamenu_por_productos', 'option')):
											the_row();
											$titulo = get_sub_field('titulo_seccion');
											$icono = get_sub_field('icono_svg');
											?>
											<div class="mega-menu-section">
												<?php if (!empty($titulo) || !empty($icono)): ?>
													<p class="flex items-center gap-2 font-bold text-gray-800 mb-2 text-xs">
														<?php if (!empty($icono)): ?>
															<span class="w-5 h-5 text-gray-500">
																<?php render_megamenu_icon($icono); ?>
															</span>
														<?php endif; ?>
														<?php if (!empty($titulo)): ?>
															<?php echo esc_html($titulo); ?>
														<?php endif; ?>
													</p>
												<?php endif; ?>

												<?php if (have_rows('items_menu')): ?>
													<ul class="space-b-2.5 pl-0">
														<?php while (have_rows('items_menu')):
															the_row();
															$enlace = get_sub_field('enlace');
															if (!empty($enlace['url'])):
																$link_url = $enlace['url'];
																$link_title = !empty($enlace['title']) ? $enlace['title'] : '';
																$link_target = !empty($enlace['target']) ? $enlace['target'] : '_self';
																?>
																<li>
																	<a href="<?php echo esc_url($link_url); ?>"
																		target="<?php echo esc_attr($link_target); ?>"
																		class="text-black hover:text-red-600 transition-colors text-xs block">
																		<?php echo esc_html($link_title); ?>
																	</a>
																</li>
															<?php endif; ?>
														<?php endwhile; ?>
													</ul>
												<?php endif; ?>
											</div>
										<?php endwhile;
										echo '</div>';
									else: ?>
										<p class="text-gray-400 text-xs">Sin submenus</p>
									<?php endif; ?>
								</div>

								<!-- Tab 3: Por Sector -->
								<div id="por-sector" class="tab-content hidden">
									<?php
									if (have_rows('megamenu_por_sector', 'option')):
										$total_sections = count(get_field('megamenu_por_sector', 'option'));

										$grid_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2';

										if ($total_sections > 6) {
											$grid_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4';
										} elseif ($total_sections > 4) {
											$grid_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3';
										}

										echo '<div class="grid ' . $grid_class . ' gap-x-16 gap-y-8">';

										while (have_rows('megamenu_por_sector', 'option')):
											the_row();
											$titulo = get_sub_field('titulo_seccion');
											$icono = get_sub_field('icono_svg');
											?>
											<div class="mega-menu-section">
												<?php if (!empty($titulo) || !empty($icono)): ?>
													<p class="flex items-center gap-2 font-bold text-gray-800 mb-2 text-xs">
														<?php if (!empty($icono)): ?>
															<span class="w-5 h-5 text-gray-500">
																<?php render_megamenu_icon($icono); ?>
															</span>
														<?php endif; ?>
														<?php if (!empty($titulo)): ?>
															<?php echo esc_html($titulo); ?>
														<?php endif; ?>
													</p>
												<?php endif; ?>

												<?php if (have_rows('items_menu')): ?>
													<ul class="space-b-4">
														<?php while (have_rows('items_menu')):
															the_row();
															$enlace = get_sub_field('enlace');
															if (!empty($enlace['url'])):
																$link_url = $enlace['url'];
																$link_title = !empty($enlace['title']) ? $enlace['title'] : '';
																$link_target = !empty($enlace['target']) ? $enlace['target'] : '_self';
																?>
																<li>
																	<a href="<?php echo esc_url($link_url); ?>"
																		target="<?php echo esc_attr($link_target); ?>"
																		class="text-gray-600 hover:text-red-600 transition-colors text-xs block">
																		<?php echo esc_html($link_title); ?>
																	</a>
																</li>
															<?php endif; ?>
														<?php endwhile; ?>
													</ul>
												<?php endif; ?>
											</div>
										<?php endwhile;
										echo '</div>';
									else: ?>
										<p class="text-gray-400 text-xs">Sin submenus</p>
									<?php endif; ?>
								</div>

							</div>
						</div>
					</div>

					<!-- Desktop Actions -->
					<div class="hidden lg:flex items-center space-x-4">
						<!-- Search Icon -->
						<button id="search-desktop-trigger"
							class="<?php echo $text_color_class . ' ' . $text_hover_class; ?> transition-colors duration-200 border-none bg-transparent"
							aria-label="Buscar" data-aos="zoom-in" data-aos-delay="300">
							<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
							</svg>
						</button>

						<!-- Iniciar Sesión Button -->
						<?php if (!empty($acf_lista_de_enlaces)): ?>
							<div class="relative inline-block group hidden xl:block">
								<button class="btn flex items-center !px-3 gap-2 border !rounded-md transition-all duration-300 font-medium
			<?php echo $is_transparent_header ? 'btn-outline-white' : 'btn-outline'; ?> text-[14px]">
									<?php if (!empty($label_sesion)): ?>
										<span><?php echo esc_html($label_sesion); ?></span>
									<?php endif; ?>
									<svg xmlns="http://www.w3.org/2000/svg"
										class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none"
										viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M19 9l-7 7-7-7" />
									</svg>
								</button>

								<div
									class="absolute left-0 mt-2 w-[145px] bg-white rounded-md shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden border border-gray-100">
									<div class="py-2">
										<?php foreach ($acf_lista_de_enlaces as $enlace_item):
											$boton = $enlace_item['boton'] ?? [];
											$icono = $enlace_item['icono'] ?? [];
											if (empty($boton['url']))
												continue;
											?>
											<a href="<?php echo esc_url($boton['url']); ?>"
												target="<?php echo esc_attr($boton['target'] ?: '_self'); ?>"
												class="flex items-center py-3 px-5 hover:bg-gray-50 group/item transition-colors">

												<?php if (!empty($icono['url'])): ?>
													<span class="text-red-500 mr-2">
														<img src="<?php echo esc_url($icono['url']); ?>"
															alt="<?php echo esc_attr($icono['alt'] ?? ''); ?>"
															class="w-4 h-4 object-contain">
													</span>
												<?php endif; ?>

												<span class="text-black font-medium group-hover/item:text-gray-900 text-xs">
													<?php echo wp_kses_post($boton['title'] ?? ''); ?>
												</span>
											</a>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						<?php endif; ?>

						<!-- Cotiza ahora Button -->
						<?php if (!empty($boton_rojo_url)): ?>
							<a href="<?php echo esc_url($boton_rojo_url); ?>"
								target="<?php echo esc_attr($boton_rojo_target); ?>"
								class="btn btn-primary !rounded-md !bg-primary-600 !border-primary-600 border !px-4 transform shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300 ease-out text-[14px]">
								<?php echo esc_html($boton_rojo_titulo); ?>
							</a>
						<?php endif; ?>

						<!-- Country Selector -->
						<?php
						// Mapa de slugs de Polylang → SVG de bandera + nombre
						$country_flags = [
							'pe' => [
								'name' => 'Perú',
								'svg' => '<rect width="900" height="600" fill="#D91023"/><rect width="300" height="600" x="300" fill="#fff"/>',
								'viewBox' => '0 0 900 600',
							],
							'co' => [
								'name' => 'Colombia',
								'svg' => '<rect width="900" height="300" y="0" fill="#FCD116"/><rect width="900" height="150" y="300" fill="#003893"/><rect width="900" height="150" y="450" fill="#CE1126"/>',
								'viewBox' => '0 0 900 600',
							],
							'bo' => [
								'name' => 'Bolivia',
								'svg' => '<rect width="900" height="200" fill="#DA291C"/><rect width="900" height="200" y="200" fill="#F4E400"/><rect width="900" height="200" y="400" fill="#007A33"/>',
								'viewBox' => '0 0 900 600',
							],
							// Añade más países aquí con su slug exacto de Polylang
						];

						// Obtener idiomas de Polylang
						$languages = pll_the_languages([
							'raw' => 1, // devuelve array en lugar de HTML
							'show_flags' => 1,
							'show_names' => 1,
						]);

						// Separar activo de los demás
						$active_lang = null;
						$inactive_langs = [];

						foreach ($languages as $lang) {
							$slug = $lang['slug']; // ej: "es-pe", "es-bo"
							$data = $country_flags[$slug] ?? null;

							if (!$data)
								continue; // slug no mapeado, omitir
						
							$lang['flag_data'] = $data;

							if ($lang['current_lang']) {
								$active_lang = $lang;
							} else {
								$inactive_langs[] = $lang;
							}
						}

						// Fallback si no hay activo mapeado
						if (!$active_lang) {
							$active_lang = ['flag_data' => $country_flags['es-pe'], 'slug' => 'es-pe'];
						}
						?>

						<div class="relative inline-block group ml-2">
							<button
								class="flex items-center gap-2 transition-all duration-300 focus:outline-none bg-transparent border-none">

								<!-- Bandera activa dinámica -->
								<div
									class="w-7 h-7 rounded-full overflow-hidden relative shadow-sm ring-2 ring-transparent group-hover:ring-white/20 transition-all">
									<svg xmlns="http://www.w3.org/2000/svg"
										viewBox="<?php echo esc_attr($active_lang['flag_data']['viewBox']); ?>"
										class="w-full h-full object-cover" preserveAspectRatio="xMidYMid slice">
										<?php echo $active_lang['flag_data']['svg']; ?>
									</svg>
								</div>

								<!-- Chevron -->
								<svg xmlns="http://www.w3.org/2000/svg"
									class="w-5 h-5 transition-transform duration-300 group-hover:rotate-180 <?php echo esc_attr($text_color_class); ?>"
									fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M19 9l-7 7-7-7" />
								</svg>
							</button>

							<!-- Dropdown -->
							<div
								class="absolute right-0 mt-4 w-48 bg-white rounded-md shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-out z-50 overflow-hidden border border-gray-100 transform origin-top-right scale-95 group-hover:scale-100">
								<div class="py-2">
									<?php foreach ($inactive_langs as $lang): ?>
										<a href="<?php echo esc_url($lang['url']); ?>"
											class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors group/item">

											<!-- Bandera -->
											<div
												class="w-6 h-6 rounded-full overflow-hidden relative shadow-sm shrink-0 grayscale group-hover/item:grayscale-0 transition-all">
												<svg xmlns="http://www.w3.org/2000/svg"
													viewBox="<?php echo esc_attr($lang['flag_data']['viewBox']); ?>"
													class="w-full h-full object-cover scale-150">
													<?php echo $lang['flag_data']['svg']; ?>
												</svg>
											</div>

											<!-- Nombre -->
											<span class="text-sm font-medium text-black group-hover/item:text-gray-900">
												<?php echo esc_html($lang['flag_data']['name']); ?>
											</span>
										</a>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>

					<!-- Mobile Actions -->
					<div class="flex lg:hidden items-center gap-2">
						<!-- Search Icon Mobile -->
						<button id="search-mobile-trigger"
							class="<?php echo $text_color_class; ?> p-2 bg-transparent border-none" aria-label="Buscar">
							<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
							</svg>
						</button>

						<!-- Mobile Menu Toggle -->
						<button id="mobile-menu-toggle"
							class="<?php echo $text_color_class; ?> p-2 bg-transparent border-none p-0"
							aria-label="Menu">
							<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M4 6h16M4 12h16M4 18h16" />
							</svg>
						</button>
					</div>
				</div>
			</div>



		</header>

		<!-- Mobile Menu -->
		<div id="mobile-menu" class="hidden lg:hidden fixed inset-0 z-[100] bg-white">
			<div class="h-full flex flex-col">
				<div class="container-full mx-auto px-4 lg:px-8">
					<div class="flex items-center justify-between py-4 lg:py-6">


						<div class="mobile-menu-logo">
							<?php
							$footer_logo_id = get_theme_mod('footer_logo');
							if ($footer_logo_id): ?>
								<img src="<?php echo esc_url(wp_get_attachment_image_url($footer_logo_id, 'full')); ?>"
									class="w-auto" alt="Comsatel">
							<?php endif; ?>
						</div>

						<button id="mobile-menu-close" class="text-gray-900 p-2 bg-transparent border-none">
							<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M6 18L18 6M6 6l12 12" />
							</svg>
						</button>
					</div>
				</div>

				<div class="flex-1 overflow-y-auto">

					<nav id="mobile-level-1" class="mobile-menu-level active">
						<div class="px-4 py-6 space-y-2">
							<a href="<?php echo esc_url(home_url('/calculadora')); ?>"
								class="btn btn-primary !bg-[#CC0000] w-full !rounded-md !text-sm">Cotiza ahora</a>
							<?php if (!empty($acf_lista_de_enlaces)): ?>
								<div class="relative inline-block group w-full" data-aos="zoom-in" data-aos-delay="400">
									<button id="loginBtn"
										class="btn flex justify-center items-center w-full !px-3 gap-2 py-2 border-2 !rounded-md transition-all duration-300 font-medium btn-outline text-[14px]">
										<span><?php echo esc_html($label_sesion); ?></span>
										<svg xmlns="http://www.w3.org/2000/svg" id="arrowIcon"
											class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none"
											viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
												d="M19 9l-7 7-7-7" />
										</svg>
									</button>

									<div id="loginDropdown"
										class="mt-2 w-full bg-white rounded-md transition-all duration-200 z-50 overflow-hidden border border-gray-100">
										<div class="py-2">
											<?php foreach ($acf_lista_de_enlaces as $enlace_item):
												$boton = $enlace_item['boton'] ?? [];
												$icono = $enlace_item['icono'] ?? [];
												if (empty($boton['url']))
													continue;
												?>
												<a href="<?php echo esc_url($boton['url']); ?>"
													target="<?php echo esc_attr($boton['target'] ?: '_self'); ?>"
													class="flex items-center py-3 px-5 hover:bg-gray-50 group/item transition-colors">

													<?php if (!empty($icono['url'])): ?>
														<span class="text-red-500 mr-2">
															<img src="<?php echo esc_url($icono['url']); ?>"
																alt="<?php echo esc_attr($icono['alt'] ?? ''); ?>"
																class="w-4 h-4 object-contain">
														</span>
													<?php endif; ?>

													<span class="text-black font-medium group-hover/item:text-gray-900 text-xs">
														<?php echo esc_html($boton['title'] ?? ''); ?>
													</span>
												</a>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
						<ul class="divide-y divide-gray-50 list-none">
							<?php
							$menu_items = wp_get_nav_menu_items('Comsatel Principal');
							if ($menu_items):
								foreach ($menu_items as $item):
									if ($item->menu_item_parent == 0):
										$has_children = in_array('menu-item-has-children', (array) $item->classes);

										if ($has_children): ?>
											<li>
												<button
													class="mobile-nav-trigger w-full px-5 py-6 flex items-center justify-between text-gray-900 bg-white border-none"
													data-target="soluciones">
													<span class="font-medium"><?php echo esc_html($item->title); ?></span>
													<svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
														viewBox="0 0 24 24">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
															d="M9 5l7 7-7 7" />
													</svg>
												</button>
											</li>
										<?php else: ?>
											<li>
												<a href="<?php echo esc_url($item->url); ?>"
													class="block px-5 py-6 font-normal text-gray-900">
													<?php echo esc_html($item->title); ?>
												</a>
											</li>
											<?php
										endif;
									endif;
								endforeach;
							endif;
							?>
						</ul>
					</nav>

					<nav id="mobile-level-2-soluciones" class="mobile-menu-level">
						<button
							class="mobile-back-trigger w-full px-5 py-4 border-b border-gray-100 flex items-center gap-2 text-gray-900 bg-gray-50">
							<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M15 19l-7-7 7-7" />
							</svg>
							<span class="font-medium text-lg"></span>
						</button>
						<ul class="divide-y divide-gray-50 list-none">
							<?php
							$tabs = [
								'por-necesidad' => ['label' => 'Por Necesidad', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
								'por-productos' => ['label' => 'Por Productos', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
								'por-sector' => ['label' => 'Por Sector', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4']
							];
							foreach ($tabs as $id => $data): ?>
								<li>
									<button
										class="mobile-nav-trigger w-full px-5 py-4 flex items-center justify-between text-gray-900 bg-white border-none"
										data-target="<?php echo $id; ?>">
										<div class="flex items-center gap-3">
											<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor"
												viewBox="0 0 24 24">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
													d="<?php echo $data['icon']; ?>" />
											</svg>
											<span class="font-medium"><?php echo $data['label']; ?></span>
										</div>
										<svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
											viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
												d="M9 5l7 7-7 7" />
										</svg>
									</button>
								</li>
							<?php endforeach; ?>
						</ul>
					</nav>

					<?php foreach (['por_necesidad', 'por_productos', 'por_sector'] as $field_key): ?>
						<nav id="mobile-level-3-<?php echo str_replace('_', '-', $field_key); ?>" class="mobile-menu-level">
							<button
								class="mobile-back-trigger w-full px-5 py-4 border-b border-gray-100 flex items-center gap-2 text-gray-900 bg-gray-50">
								<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M15 19l-7-7 7-7" />
								</svg>
								<span class="font-medium text-lg"></span>
							</button>
							<?php if (have_rows('megamenu_' . $field_key, 'option')): ?>
								<?php while (have_rows('megamenu_' . $field_key, 'option')):
									the_row();
									$titulo = get_sub_field('titulo_seccion');
									$icono = get_sub_field('icono_svg');
									?>
									<?php if (!empty($titulo) || !empty($icono)): ?>
										<div class="flex items-center gap-2 font-medium text-gray-800 text-md px-5 py-3">
											<?php if (!empty($icono)): ?>
												<span class="w-4 h-4">
													<?php render_megamenu_icon($icono); ?>
												</span>
											<?php endif; ?>
											<?php if (!empty($titulo)): ?>
												<?php echo esc_html($titulo); ?>
											<?php endif; ?>
										</div>
									<?php endif; ?>

									<?php if (have_rows('items_menu')): ?>
										<ul class="bg-white mb-4 list-none">
											<?php while (have_rows('items_menu')):
												the_row();
												$enlace = get_sub_field('enlace');
												if (!empty($enlace['url'])):
													$link_title = !empty($enlace['title']) ? $enlace['title'] : '';
													?>
													<li>
														<a href="<?php echo esc_url($enlace['url']); ?>"
															class="block px-6 py-1 text-sm text-gray-700 border-b border-gray-50 last:border-0">
															<?php echo esc_html($link_title); ?>
														</a>
													</li>
												<?php endif;
											endwhile; ?>
										</ul>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
						</nav>
					<?php endforeach; ?>

				</div>

				<!-- Mobile Country Selector Footer -->
				<div class="border-t border-gray-100 p-4 bg-white mt-auto">
					<div class="relative inline-block w-full">
						<button id="mobileCountryBtn"
							class="flex items-center justify-between w-full px-4 py-3 bg-gray-50 rounded-md transition-all focus:outline-none border-none">
							<div class="flex items-center gap-3">
								<div
									class="w-6 h-6 rounded-full overflow-hidden relative shadow-sm ring-2 ring-transparent">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 600"
										class="w-full h-full object-cover" preserveAspectRatio="xMidYMid slice">
										<rect width="900" height="600" fill="#D91023" />
										<rect width="300" height="600" x="300" fill="#fff" />
									</svg>
								</div>
								<span class="text-sm font-medium text-gray-900">Perú</span>
							</div>
							<svg xmlns="http://www.w3.org/2000/svg" id="mobileCountryArrow"
								class="w-5 h-5 transition-transform duration-300 text-gray-500" fill="none"
								viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M19 9l-7 7-7-7" />
							</svg>
						</button>

						<!-- Mobile Dropup -->
						<div id="mobileCountryDropdown"
							class="absolute bottom-full left-0 w-full mb-2 bg-white rounded-md shadow-2xl hidden overflow-hidden border border-gray-100 transition-all duration-300 ease-out transform origin-bottom scale-95 opacity-0">
							<div class="py-2">
								<a href="https://comsatel.com.bo" target="_blank"
									class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors">
									<div class="w-6 h-6 rounded-full overflow-hidden relative shadow-sm shrink-0">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 600"
											class="w-full h-full object-cover scale-150">
											<rect width="900" height="200" fill="#DA291C" />
											<rect width="900" height="200" y="200" fill="#F4E400" />
											<rect width="900" height="200" y="400" fill="#007A33" />
										</svg>
									</div>
									<span class="text-sm font-medium text-black">Bolivia</span>
								</a>
								<a href="#"
									class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors">
									<div class="w-6 h-6 rounded-full overflow-hidden relative shadow-sm shrink-0">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 600"
											class="w-full h-full object-cover scale-150">
											<rect width="900" height="600" fill="#CE1126" />
											<rect width="900" height="400" fill="#003893" />
											<rect width="900" height="300" fill="#003893" />
											<rect width="900" height="200" y="300" fill="#FCD116" />
											<rect width="900" height="300" y="0" fill="#FCD116" />
											<rect width="900" height="150" y="300" fill="#003893" />
											<rect width="900" height="150" y="450" fill="#CE1126" />
										</svg>
									</div>
									<span class="text-sm font-medium text-black">Colombia</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php get_template_part('inc/componentes/search-overlay'); ?>

		<script>
			document.addEventListener('DOMContentLoaded', function () {
				const btn = document.getElementById('loginBtn');
				const dropdown = document.getElementById('loginDropdown');
				const arrow = document.getElementById('arrowIcon');

				btn.addEventListener('click', function (e) {
					e.stopPropagation(); // Evita que el clic se propague al documento
					dropdown.classList.toggle('hidden');
					arrow.classList.toggle('rotate-180');
				});

				// Cerrar el menú si se hace clic fuera de él
				document.addEventListener('click', function (e) {
					if (!dropdown.contains(e.target) && !btn.contains(e.target)) {
						dropdown.classList.add('hidden');
						arrow.classList.remove('rotate-180');
					}
				});

				// Mobile Country Selector
				const mobileCountryBtn = document.getElementById('mobileCountryBtn');
				const mobileCountryDropdown = document.getElementById('mobileCountryDropdown');
				const mobileCountryArrow = document.getElementById('mobileCountryArrow');

				if (mobileCountryBtn && mobileCountryDropdown) {
					mobileCountryBtn.addEventListener('click', function (e) {
						e.stopPropagation();
						const isHidden = mobileCountryDropdown.classList.contains('hidden');

						if (isHidden) {
							mobileCountryDropdown.classList.remove('hidden');
							setTimeout(() => {
								mobileCountryDropdown.style.opacity = '1';
								mobileCountryDropdown.style.transform = 'scale(1)';
							}, 10);
						} else {
							mobileCountryDropdown.style.opacity = '0';
							mobileCountryDropdown.style.transform = 'scale(0.95)';
							setTimeout(() => {
								mobileCountryDropdown.classList.add('hidden');
							}, 300);
						}

						mobileCountryArrow.classList.toggle('rotate-180');
					});

					document.addEventListener('click', function (e) {
						if (!mobileCountryDropdown.contains(e.target) && !mobileCountryBtn.contains(e.target)) {
							mobileCountryDropdown.style.opacity = '0';
							mobileCountryDropdown.style.transform = 'scale(0.95)';
							setTimeout(() => {
								mobileCountryDropdown.classList.add('hidden');
							}, 300);
							mobileCountryArrow.classList.remove('rotate-180');
						}
					});
				}
			});
		</script>
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

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<!-- <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'comsatel'); ?></a> -->

		<?php
		// Detectar si estamos en front-page o template producto-gps
		$is_transparent_header = is_front_page() || is_page_template('inc/template-producto-gps.php');

		$header_bg_class = $is_transparent_header ? '' : 'bg-white ';
		$text_color_class = $is_transparent_header ? 'text-white' : 'text-gray-900';
		$text_hover_class = $is_transparent_header ? 'hover:text-gray-200' : 'hover:text-primary';
		$logo_text_class = $is_transparent_header ? 'text-white' : 'text-gray-900';
		$mobile_menu_bg = $is_transparent_header ? 'bg-gray-900 bg-opacity-95' : 'bg-white shadow-lg';
		$mobile_text_class = $is_transparent_header ? 'text-white' : 'text-gray-900';
		?>

		<!-- Header -->
		<header id="masthead"
			class="absolute top-0 left-0 right-0 z-50 transition-all duration-300 <?php echo $header_bg_class; ?>">
			<div class="container-full mx-auto px-4 lg:px-8">
				<div class="flex items-center justify-between py-4 lg:py-6">

					<!-- Logo -->
					<div class="site-branding" data-aos="fade-right" data-aos-duration="800">
						<?php if ($is_transparent_header): ?>
							<!-- Logo claro para fondo oscuro -->
							<?php if (has_custom_logo()): ?>
								<?php the_custom_logo(); ?>
							<?php else: ?>
								<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
									class="<?php echo $logo_text_class; ?> text-2xl font-bold">
									<?php bloginfo('name'); ?>
								</a>
							<?php endif; ?>
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
									class="<?php echo $logo_text_class; ?> text-2xl font-bold">
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

					<!-- Desktop Actions -->
					<div class="hidden lg:flex items-center space-x-4">
						<!-- Search Icon -->
						<button
							class="<?php echo $text_color_class . ' ' . $text_hover_class; ?> transition-colors duration-200 border-none bg-transparent"
							aria-label="Buscar" data-aos="zoom-in" data-aos-delay="300">
							<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
							</svg>
						</button>

						<!-- Iniciar Sesión Button -->
						<a href="#"
							class="btn <?php echo $is_transparent_header ? 'btn-outline-white' : 'btn-outline'; ?> !rounded-md"
							data-aos="zoom-in" data-aos-delay="400">
							Iniciar Sesión
						</a>

						<!-- Cotiza ahora Button -->
						<a href="<?php echo esc_url(home_url('/calculadora')); ?>"
							class="btn btn-primary !rounded-md !bg-primary-600 !border-primary-600 transform shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300 ease-out">
							Cotiza ahora
						</a>
					</div>

					<!-- Mobile Menu Toggle -->
					<button id="mobile-menu-toggle"
						class="lg:hidden <?php echo $text_color_class; ?> p-2 bg-transparent border-none p-0"
						aria-label="Menu">
						<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M4 6h16M4 12h16M4 18h16" />
						</svg>
					</button>
				</div>
			</div>

			<!-- Mobile Menu -->
			<div id="mobile-menu" class="hidden lg:hidden <?php echo $mobile_menu_bg; ?>">
				<nav class="mx-auto px-4 py-6">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'menu-1',
						'menu_class' => 'flex flex-col space-y-4 list-none ml-0',
						'container' => false,
						'fallback_cb' => false,
						'link_before' => '<span class="' . $mobile_text_class . ' text-lg">',
						'link_after' => '</span>',
					));
					?>
					<div class="pt-4 space-y-3">
						<a href="#"
							class="block w-full px-6 py-3 border <?php echo $is_transparent_header ? 'border-white text-white hover:bg-white hover:text-gray-900' : 'border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white'; ?> text-center rounded transition-all duration-200">
							Iniciar Sesión
						</a>
						<a href="#"
							class="block w-full px-6 py-3 bg-red-600 text-white text-center rounded hover:bg-red-700 transition-all duration-200">
							Cotiza ahora
						</a>
					</div>
				</nav>
			</div>
		</header>
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
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'comsatel'); ?></a>

		<!-- Header -->
		<header id="masthead" class="absolute top-0 left-0 right-0 z-50">
			<div class="container-full mx-auto px-4 lg:px-8">
				<div class="flex items-center justify-between py-4 lg:py-6">

					<!-- Logo -->
					<div class="site-branding" data-aos="fade-right" data-aos-duration="800">
						<?php if (has_custom_logo()): ?>
							<?php the_custom_logo(); ?>
						<?php else: ?>
							<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
								class="text-white text-2xl font-bold">
								<?php bloginfo('name'); ?>
							</a>
						<?php endif; ?>
					</div>

					<!-- Desktop Navigation -->
					<nav class="hidden lg:flex items-center space-x-8" data-aos="fade-down" data-aos-delay="200">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'menu-1',
							'menu_class' => 'flex items-center list-none space-x-8 mb-0',
							'container' => false,
							'fallback_cb' => false,
							'link_before' => '<span class="text-white hover:text-gray-200 transition-colors duration-200">',
							'link_after' => '</span>',
						));
						?>
					</nav>

					<!-- Desktop Actions -->
					<div class="hidden lg:flex items-center space-x-4">
						<!-- Search Icon -->
						<button
							class="text-white hover:text-gray-200 transition-colors duration-200 border-none bg-transparent"
							aria-label="Buscar"
							data-aos="zoom-in" data-aos-delay="300">
							<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
							</svg>
						</button>

						<!-- Iniciar Sesión Button -->
						<a href="#"
							class="px-6 py-2 border border-white text-white rounded hover:bg-white hover:text-gray-900 transition-all duration-200"
							data-aos="zoom-in" data-aos-delay="400">
							Iniciar Sesión
						</a>

						<!-- Cotiza ahora Button -->
						<a href="#"
							class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-all duration-200"
							data-aos="zoom-in" data-aos-delay="500">
							Cotiza ahora
						</a>
					</div>

					<!-- Mobile Menu Toggle -->
					<button id="mobile-menu-toggle" class="lg:hidden text-white p-2 bg-transparent border-none p-0"
						aria-label="Menu">
						<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M4 6h16M4 12h16M4 18h16" />
						</svg>
					</button>
				</div>
			</div>

			<!-- Mobile Menu -->
			<div id="mobile-menu" class="hidden lg:hidden bg-gray-900 bg-opacity-95">
				<nav class="mx-auto px-4 py-6">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'menu-1',
						'menu_class' => 'flex flex-col space-y-4 list-none ml-0',
						'container' => false,
						'fallback_cb' => false,
						'link_before' => '<span class="text-white text-lg">',
						'link_after' => '</span>',
					));
					?>
					<div class="pt-4 space-y-3">
						<a href="#"
							class="block w-full px-6 py-3 border border-white text-white text-center rounded hover:bg-white hover:text-gray-900 transition-all duration-200">
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
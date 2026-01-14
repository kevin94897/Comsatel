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
		$is_transparent_header = is_front_page() || is_page_template('inc/template-producto-gps.php')
			|| is_page_template('template-blog.php') || is_single() || is_page_template('inc/template-tyc.php')
			|| is_page_template('inc/template-gestion.php') || is_page_template('inc/template-contacto.php')
			|| is_page_template('inc/template-soluciones.php') || is_page_template('inc/template-cookies.php');

		$header_bg_class = $is_transparent_header ? '' : 'bg-transparent ';
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
									class="<?php echo $logo_text_class; ?> text-2xl font-semibold">
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
									class="<?php echo $logo_text_class; ?> text-2xl font-semibold">
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
								<div class="menu-tab-item active group/item flex items-center justify-between cursor-pointer p-3 rounded-md hover:bg-gray-50 transition-all text-red-600 font-semibold"
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
												<h4 class="flex items-center gap-2 font-semibold text-gray-800 mb-4 text-xs">
													<?php if ($icono): ?>
														<span class="w-5 h-5 text-gray-500"><?php echo $icono; ?></span>
													<?php else: ?>
														<svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
															viewBox="0 0 24 24">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																d="M9 5l7 7-7 7"></path>
														</svg>
													<?php endif; ?>
													<?php echo esc_html($titulo); ?>
												</h4>

												<?php if (have_rows('items_menu')): ?>
													<ul class="space-b-2.5">
														<?php while (have_rows('items_menu')):
															the_row();
															$enlace = get_sub_field('enlace');
															if ($enlace):
																$link_url = $enlace['url'];
																$link_title = $enlace['title'];
																$link_target = $enlace['target'] ? $enlace['target'] : '_self';
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
												<h4 class="flex items-center gap-2 font-semibold text-gray-800 mb-4 text-xs">
													<?php if ($icono): ?>
														<span class="w-5 h-5 text-gray-500"><?php echo $icono; ?></span>
													<?php endif; ?>
													<?php echo esc_html($titulo); ?>
												</h4>

												<?php if (have_rows('items_menu')): ?>
													<ul class="space-b-2.5">
														<?php while (have_rows('items_menu')):
															the_row();
															$enlace = get_sub_field('enlace');
															if ($enlace):
																$link_url = $enlace['url'];
																$link_title = $enlace['title'];
																$link_target = $enlace['target'] ? $enlace['target'] : '_self';
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
												<h4 class="flex items-center gap-2 font-semibold text-gray-800 mb-4 text-xs">
													<?php if ($icono): ?>
														<span class="w-5 h-5 text-gray-500"><?php echo $icono; ?></span>
													<?php endif; ?>
													<?php echo esc_html($titulo); ?>
												</h4>

												<?php if (have_rows('items_menu')): ?>
													<ul class="space-b-2.5">
														<?php while (have_rows('items_menu')):
															the_row();
															$enlace = get_sub_field('enlace');
															if ($enlace):
																$link_url = $enlace['url'];
																$link_title = $enlace['title'];
																$link_target = $enlace['target'] ? $enlace['target'] : '_self';
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

							</div>
						</div>
					</div>

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
						<div class="relative inline-block group" data-aos="zoom-in" data-aos-delay="400">
							<button class="flex items-center !px-3 gap-2 border !rounded-md transition-all duration-300 font-medium
		<?php echo $is_transparent_header ? 'btn-outline-white' : 'btn-outline'; ?> text-[14px]">
								<span>Iniciar Sesión</span>
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
									<a href="#"
										class="flex items-center py-3 px-5 hover:bg-gray-50 group/item transition-colors">
										<span class="text-red-500 mr-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15"
												viewBox="0 0 16 15" fill="none">
												<path
													d="M5.06464 3.22832C4.97668 3.27883 4.89956 3.34622 4.83771 3.42661C4.77587 3.50701 4.73052 3.59883 4.70426 3.69681C4.67801 3.79478 4.67137 3.89698 4.68472 3.99753C4.69807 4.09808 4.73116 4.195 4.78208 4.28272L5.28928 5.1616L4.7112 5.28L0 8L2 11.464L6.7112 8.744L7.10288 8.3024L7.61008 9.18128C7.66059 9.26925 7.72797 9.34636 7.80837 9.40821C7.88877 9.47005 7.98059 9.5154 8.07856 9.54166C8.17654 9.56791 8.27874 9.57456 8.37928 9.5612C8.47983 9.54785 8.57675 9.51476 8.66448 9.46384L10.7917 8.23568C10.8796 8.18517 10.9568 8.11779 11.0186 8.03739C11.0804 7.95699 11.1258 7.86517 11.1521 7.7672C11.1783 7.66922 11.185 7.56702 11.1716 7.46648C11.1582 7.36593 11.1252 7.26901 11.0742 7.18128L10.567 6.30256L11.1451 6.18416L15.8563 3.46416L13.8563 0L9.14512 2.72L8.75344 3.1616L8.24624 2.28272C8.19572 2.19477 8.12832 2.11767 8.04792 2.05584C7.96751 1.99401 7.87569 1.94868 7.77772 1.92244C7.67974 1.8962 7.57755 1.88957 7.47701 1.90293C7.37647 1.9163 7.27955 1.9494 7.19184 2.00032L5.06464 3.22832ZM1.0928 8.2928L5.2496 5.8928L6.4496 7.9712L2.2928 10.3712L1.0928 8.2928ZM9.40656 3.4928L13.5635 1.0928L14.7635 3.1712L10.6067 5.5712L9.40656 3.4928ZM11.1666 9.66144C11.1268 9.81357 11.0574 9.95633 10.9623 10.0815C10.8672 10.2067 10.7482 10.3118 10.6123 10.3908C10.4763 10.4698 10.3261 10.5212 10.1703 10.5419C10.0144 10.5626 9.85601 10.5523 9.70416 10.5115L9.50096 11.2853C10.561 11.5642 11.6573 10.9267 11.9397 9.86768L11.1666 9.66144ZM9.28976 12.057L9.08656 12.8306C11.007 13.3357 12.9845 12.1949 13.4939 10.2838L12.7211 10.0781C12.3234 11.5699 10.7955 12.453 9.28976 12.057ZM8.87744 13.6034L8.67408 14.3773C11.451 15.1075 14.3048 13.461 15.0411 10.699L14.2683 10.493C13.6437 12.8354 11.2397 14.2246 8.87744 13.6034Z"
													fill="#FF4D4D" />
											</svg>
										</span>
										<span
											class="text-black font-medium group-hover/item:text-gray-900 text-xs">CLocator</span>
									</a>

									<a href="#"
										class="flex items-center py-3 px-5 hover:bg-gray-50 group/item transition-colors">
										<span class="text-red-500 mr-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
												viewBox="0 0 16 16" fill="none">
												<path fill-rule="evenodd" clip-rule="evenodd"
													d="M7.88949 0.00262198C8.15064 -0.0167262 8.40856 0.0715913 8.60662 0.248184C8.80469 0.424776 8.92671 0.675211 8.9459 0.944503V0.986677C8.9459 1.26631 8.83819 1.53448 8.64646 1.73221C8.45474 1.92994 8.19471 2.04102 7.92357 2.04102C7.65243 2.04102 7.39239 1.92994 7.20067 1.73221C7.00894 1.53448 6.90123 1.26631 6.90123 0.986677C6.91007 0.722506 7.01808 0.472209 7.20246 0.288608C7.38685 0.105007 7.63318 0.00246479 7.88949 0.00262198ZM15.8637 8.71854L15.9318 8.78883V8.85912V8.92941C15.9334 8.94752 15.9411 8.96449 15.9535 8.97734C15.966 8.9902 15.9824 8.99811 16 8.9997V9.06999V9.14028V9.21057V9.28086V9.35114V9.42143V9.56201V9.6323V9.70259V9.77288V9.84317V9.91346V9.98375V10.054V10.1243V10.1946V10.2649V10.4055V10.4758V10.5461V10.6164V10.6866V10.7569C16 10.8272 15.9318 10.8272 15.9318 10.8975V11.0381C15.4056 11.9831 14.7386 12.837 13.9553 13.5685L14.0235 13.4982L14.0916 13.4279L14.1598 13.3577V13.2874L14.228 13.2171L14.2961 13.1468C14.2961 13.1281 14.3033 13.1103 14.3161 13.0971C14.3289 13.0839 14.3462 13.0765 14.3643 13.0765L14.4324 13.0062L14.5006 12.9359C14.5006 12.9267 14.5023 12.9175 14.5058 12.909C14.5092 12.9005 14.5142 12.8927 14.5205 12.8862C14.5269 12.8797 14.5344 12.8745 14.5427 12.871C14.5509 12.8674 14.5598 12.8656 14.5687 12.8656V12.7953L14.6369 12.725L14.705 12.6548C14.705 12.6455 14.7068 12.6364 14.7102 12.6279C14.7137 12.6193 14.7187 12.6116 14.725 12.6051C14.7313 12.5985 14.7388 12.5934 14.7471 12.5898C14.7554 12.5863 14.7642 12.5845 14.7732 12.5845V12.5142C14.7732 12.4955 14.7804 12.4777 14.7932 12.4645C14.8059 12.4513 14.8233 12.4439 14.8414 12.4439C15.1162 11.9363 15.3226 11.3924 15.4548 10.8272C15.5049 10.6865 15.5187 10.5348 15.4948 10.3869C15.4709 10.239 15.4101 10.1001 15.3184 9.98375C14.6369 9.06999 12.047 9.77288 9.52522 11.5301C8.56298 12.1773 7.69152 12.9578 6.93531 13.8497C6.93531 13.8497 6.86715 13.92 6.86715 13.8497C6.86715 13.7794 6.799 13.7794 6.86715 13.7794C6.99513 13.444 7.17973 13.1346 7.4124 12.8656C7.6782 12.5213 7.96264 12.1928 8.26434 11.8816C8.7935 11.2955 9.38836 10.7764 10.0364 10.3352C12.2174 8.78883 14.671 8.36709 15.7615 8.92941C15.6933 8.50767 15.8296 8.57796 15.8978 8.71854H15.8637ZM15.3866 7.66419C15.34 7.478 15.2459 7.30809 15.114 7.17217C14.0916 5.90695 11.0246 6.68014 8.36658 8.85912C5.70851 11.0381 4.3454 13.92 5.36773 15.1852C5.60866 15.4514 5.91475 15.6457 6.25375 15.7475C6.39006 15.7475 6.45822 15.8178 6.59453 15.8178C6.60375 15.8167 6.61309 15.8177 6.62186 15.8208C6.63062 15.824 6.63859 15.8291 6.64515 15.8359C6.65171 15.8426 6.6567 15.8509 6.65974 15.8599C6.66278 15.8689 6.66378 15.8786 6.66269 15.8881C6.66269 15.9584 6.66269 15.9584 6.59453 15.9584C5.50404 16.099 4.61802 15.8881 4.14093 15.2555C2.91413 13.7794 4.41355 10.4758 7.54871 7.87506C8.15217 7.38217 8.79001 6.9358 9.45707 6.53956C10.7641 5.74638 12.2366 5.28838 13.7509 5.20406C14.3631 5.21449 14.9483 5.46595 15.3866 5.90695C15.5782 6.16934 15.6746 6.49264 15.6592 6.82072C15.6571 7.11464 15.587 7.4038 15.4548 7.66419L15.3866 7.73448C15.4548 7.64311 15.3866 7.64311 15.3866 7.64311V7.66419ZM14.4597 4.33949V4.62065C14.4597 4.63929 14.4525 4.65717 14.4397 4.67035C14.4269 4.68354 14.4096 4.69094 14.3915 4.69094H14.3234C14.3234 4.62065 14.2552 4.62065 14.2552 4.55036L14.1871 4.48007C13.2329 3.14457 10.1659 3.77718 7.37151 5.81558C5.60372 7.04808 4.13456 8.68349 3.0777 10.5953C2.39615 11.8605 2.25984 13.0554 2.87324 13.688L3.14586 13.9692V14.0606L3.0777 14.1308C2.63021 14.026 2.22535 13.7804 1.91906 13.4279C0.555949 11.741 2.19168 8.15622 5.59946 5.34464C9.00724 2.53305 12.824 1.61928 14.1871 3.30624C14.3867 3.60988 14.4826 3.97341 14.4597 4.33949ZM0.964882 11.0873C0.773172 10.961 0.590913 10.82 0.419637 10.6656C-0.39823 9.61122 0.0107034 7.78369 1.37381 5.88587C1.76654 5.33706 2.19946 4.82009 2.66877 4.33949C3.36043 3.67245 4.10098 3.06145 4.88383 2.51196V2.37138L4.6112 2.09022C4.6112 2.09022 4.54305 2.01993 4.6112 2.01993C4.6112 2.00129 4.61839 1.98341 4.63117 1.97023C4.64395 1.95705 4.66128 1.94965 4.67936 1.94965L6.79218 1.52791H6.86034V1.5982L6.11063 3.84747L6.04247 3.91776C6.02491 3.91617 6.00845 3.90826 5.99599 3.8954C5.98353 3.88255 5.97585 3.86558 5.97432 3.84747L5.76985 3.42573L5.70169 3.35544H5.59946C4.99855 3.75403 4.42884 4.20056 3.89557 4.69094C1.91906 6.51847 0.828571 8.62716 0.896727 10.1032C0.898892 10.3972 0.968985 10.6863 1.10119 10.9467V11.017L0.964882 11.0873Z"
													fill="#FF4D4D" />
											</svg>
										</span>
										<span
											class="text-black font-medium group-hover/item:text-gray-900 text-xs">C-Go</span>
									</a>

									<a href="#"
										class="flex items-center py-3 px-5 hover:bg-gray-50 group/item transition-colors">
										<span class="text-red-500 mr-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15"
												viewBox="0 0 16 15" fill="none">
												<path
													d="M5.06464 3.22832C4.97668 3.27883 4.89956 3.34622 4.83771 3.42661C4.77587 3.50701 4.73052 3.59883 4.70426 3.69681C4.67801 3.79478 4.67137 3.89698 4.68472 3.99753C4.69807 4.09808 4.73116 4.195 4.78208 4.28272L5.28928 5.1616L4.7112 5.28L0 8L2 11.464L6.7112 8.744L7.10288 8.3024L7.61008 9.18128C7.66059 9.26925 7.72797 9.34636 7.80837 9.40821C7.88877 9.47005 7.98059 9.5154 8.07856 9.54166C8.17654 9.56791 8.27874 9.57456 8.37928 9.5612C8.47983 9.54785 8.57675 9.51476 8.66448 9.46384L10.7917 8.23568C10.8796 8.18517 10.9568 8.11779 11.0186 8.03739C11.0804 7.95699 11.1258 7.86517 11.1521 7.7672C11.1783 7.66922 11.185 7.56702 11.1716 7.46648C11.1582 7.36593 11.1252 7.26901 11.0742 7.18128L10.567 6.30256L11.1451 6.18416L15.8563 3.46416L13.8563 0L9.14512 2.72L8.75344 3.1616L8.24624 2.28272C8.19572 2.19477 8.12832 2.11767 8.04792 2.05584C7.96751 1.99401 7.87569 1.94868 7.77772 1.92244C7.67974 1.8962 7.57755 1.88957 7.47701 1.90293C7.37647 1.9163 7.27955 1.9494 7.19184 2.00032L5.06464 3.22832ZM1.0928 8.2928L5.2496 5.8928L6.4496 7.9712L2.2928 10.3712L1.0928 8.2928ZM9.40656 3.4928L13.5635 1.0928L14.7635 3.1712L10.6067 5.5712L9.40656 3.4928ZM11.1666 9.66144C11.1268 9.81357 11.0574 9.95633 10.9623 10.0815C10.8672 10.2067 10.7482 10.3118 10.6123 10.3908C10.4763 10.4698 10.3261 10.5212 10.1703 10.5419C10.0144 10.5626 9.85601 10.5523 9.70416 10.5115L9.50096 11.2853C10.561 11.5642 11.6573 10.9267 11.9397 9.86768L11.1666 9.66144ZM9.28976 12.057L9.08656 12.8306C11.007 13.3357 12.9845 12.1949 13.4939 10.2838L12.7211 10.0781C12.3234 11.5699 10.7955 12.453 9.28976 12.057ZM8.87744 13.6034L8.67408 14.3773C11.451 15.1075 14.3048 13.461 15.0411 10.699L14.2683 10.493C13.6437 12.8354 11.2397 14.2246 8.87744 13.6034Z"
													fill="#FF4D4D" />
											</svg>
										</span>
										<span
											class="text-black font-medium group-hover/item:text-gray-900 text-xs">Tracksolid</span>
									</a>

									<a href="#"
										class="flex items-center py-3 px-5 hover:bg-gray-50 group/item transition-colors">
										<span class="text-red-500 mr-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="13" height="9"
												viewBox="0 0 13 9" fill="none">
												<path
													d="M1.83333 0C1.3471 0 0.880788 0.193154 0.536971 0.536971C0.193154 0.880787 0 1.3471 0 1.83333V6.83333C0 7.31956 0.193154 7.78588 0.536971 8.1297C0.880788 8.47351 1.3471 8.66667 1.83333 8.66667H7.5C7.98623 8.66667 8.45255 8.47351 8.79636 8.1297C9.14018 7.78588 9.33333 7.31956 9.33333 6.83333V5.77067L11.6127 7.80067C12.1493 8.27867 13 7.89733 13 7.178V1.24333C13 0.523333 12.1493 0.142667 11.6127 0.620667L9.33333 2.65067V1.83333C9.33333 1.3471 9.14018 0.880787 8.79636 0.536971C8.45255 0.193154 7.98623 0 7.5 0H1.83333Z"
													fill="#FF4D4D" />
											</svg>
										</span>
										<span
											class="text-black font-medium group-hover/item:text-gray-900 text-xs">CLVideo</span>
									</a>

									<a href="#"
										class="flex items-center py-3 px-5 hover:bg-gray-50 group/item transition-colors">
										<span class="text-red-500 mr-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
												viewBox="0 0 16 16" fill="none">
												<path fill-rule="evenodd" clip-rule="evenodd"
													d="M7.88949 0.00262198C8.15064 -0.0167262 8.40856 0.0715913 8.60662 0.248184C8.80469 0.424776 8.92671 0.675211 8.9459 0.944503V0.986677C8.9459 1.26631 8.83819 1.53448 8.64646 1.73221C8.45474 1.92994 8.19471 2.04102 7.92357 2.04102C7.65243 2.04102 7.39239 1.92994 7.20067 1.73221C7.00894 1.53448 6.90123 1.26631 6.90123 0.986677C6.91007 0.722506 7.01808 0.472209 7.20246 0.288608C7.38685 0.105007 7.63318 0.00246479 7.88949 0.00262198ZM15.8637 8.71854L15.9318 8.78883V8.85912V8.92941C15.9334 8.94752 15.9411 8.96449 15.9535 8.97734C15.966 8.9902 15.9824 8.99811 16 8.9997V9.06999V9.14028V9.21057V9.28086V9.35114V9.42143V9.56201V9.6323V9.70259V9.77288V9.84317V9.91346V9.98375V10.054V10.1243V10.1946V10.2649V10.4055V10.4758V10.5461V10.6164V10.6866V10.7569C16 10.8272 15.9318 10.8272 15.9318 10.8975V11.0381C15.4056 11.9831 14.7386 12.837 13.9553 13.5685L14.0235 13.4982L14.0916 13.4279L14.1598 13.3577V13.2874L14.228 13.2171L14.2961 13.1468C14.2961 13.1281 14.3033 13.1103 14.3161 13.0971C14.3289 13.0839 14.3462 13.0765 14.3643 13.0765L14.4324 13.0062L14.5006 12.9359C14.5006 12.9267 14.5023 12.9175 14.5058 12.909C14.5092 12.9005 14.5142 12.8927 14.5205 12.8862C14.5269 12.8797 14.5344 12.8745 14.5427 12.871C14.5509 12.8674 14.5598 12.8656 14.5687 12.8656V12.7953L14.6369 12.725L14.705 12.6548C14.705 12.6455 14.7068 12.6364 14.7102 12.6279C14.7137 12.6193 14.7187 12.6116 14.725 12.6051C14.7313 12.5985 14.7388 12.5934 14.7471 12.5898C14.7554 12.5863 14.7642 12.5845 14.7732 12.5845V12.5142C14.7732 12.4955 14.7804 12.4777 14.7932 12.4645C14.8059 12.4513 14.8233 12.4439 14.8414 12.4439C15.1162 11.9363 15.3226 11.3924 15.4548 10.8272C15.5049 10.6865 15.5187 10.5348 15.4948 10.3869C15.4709 10.239 15.4101 10.1001 15.3184 9.98375C14.6369 9.06999 12.047 9.77288 9.52522 11.5301C8.56298 12.1773 7.69152 12.9578 6.93531 13.8497C6.93531 13.8497 6.86715 13.92 6.86715 13.8497C6.86715 13.7794 6.799 13.7794 6.86715 13.7794C6.99513 13.444 7.17973 13.1346 7.4124 12.8656C7.6782 12.5213 7.96264 12.1928 8.26434 11.8816C8.7935 11.2955 9.38836 10.7764 10.0364 10.3352C12.2174 8.78883 14.671 8.36709 15.7615 8.92941C15.6933 8.50767 15.8296 8.57796 15.8978 8.71854H15.8637ZM15.3866 7.66419C15.34 7.478 15.2459 7.30809 15.114 7.17217C14.0916 5.90695 11.0246 6.68014 8.36658 8.85912C5.70851 11.0381 4.3454 13.92 5.36773 15.1852C5.60866 15.4514 5.91475 15.6457 6.25375 15.7475C6.39006 15.7475 6.45822 15.8178 6.59453 15.8178C6.60375 15.8167 6.61309 15.8177 6.62186 15.8208C6.63062 15.824 6.63859 15.8291 6.64515 15.8359C6.65171 15.8426 6.6567 15.8509 6.65974 15.8599C6.66278 15.8689 6.66378 15.8786 6.66269 15.8881C6.66269 15.9584 6.66269 15.9584 6.59453 15.9584C5.50404 16.099 4.61802 15.8881 4.14093 15.2555C2.91413 13.7794 4.41355 10.4758 7.54871 7.87506C8.15217 7.38217 8.79001 6.9358 9.45707 6.53956C10.7641 5.74638 12.2366 5.28838 13.7509 5.20406C14.3631 5.21449 14.9483 5.46595 15.3866 5.90695C15.5782 6.16934 15.6746 6.49264 15.6592 6.82072C15.6571 7.11464 15.587 7.4038 15.4548 7.66419L15.3866 7.73448C15.4548 7.64311 15.3866 7.64311 15.3866 7.64311V7.66419ZM14.4597 4.33949V4.62065C14.4597 4.63929 14.4525 4.65717 14.4397 4.67035C14.4269 4.68354 14.4096 4.69094 14.3915 4.69094H14.3234C14.3234 4.62065 14.2552 4.62065 14.2552 4.55036L14.1871 4.48007C13.2329 3.14457 10.1659 3.77718 7.37151 5.81558C5.60372 7.04808 4.13456 8.68349 3.0777 10.5953C2.39615 11.8605 2.25984 13.0554 2.87324 13.688L3.14586 13.9692V14.0606L3.0777 14.1308C2.63021 14.026 2.22535 13.7804 1.91906 13.4279C0.555949 11.741 2.19168 8.15622 5.59946 5.34464C9.00724 2.53305 12.824 1.61928 14.1871 3.30624C14.3867 3.60988 14.4826 3.97341 14.4597 4.33949ZM0.964882 11.0873C0.773172 10.961 0.590913 10.82 0.419637 10.6656C-0.39823 9.61122 0.0107034 7.78369 1.37381 5.88587C1.76654 5.33706 2.19946 4.82009 2.66877 4.33949C3.36043 3.67245 4.10098 3.06145 4.88383 2.51196V2.37138L4.6112 2.09022C4.6112 2.09022 4.54305 2.01993 4.6112 2.01993C4.6112 2.00129 4.61839 1.98341 4.63117 1.97023C4.64395 1.95705 4.66128 1.94965 4.67936 1.94965L6.79218 1.52791H6.86034V1.5982L6.11063 3.84747L6.04247 3.91776C6.02491 3.91617 6.00845 3.90826 5.99599 3.8954C5.98353 3.88255 5.97585 3.86558 5.97432 3.84747L5.76985 3.42573L5.70169 3.35544H5.59946C4.99855 3.75403 4.42884 4.20056 3.89557 4.69094C1.91906 6.51847 0.828571 8.62716 0.896727 10.1032C0.898892 10.3972 0.968985 10.6863 1.10119 10.9467V11.017L0.964882 11.0873Z"
													fill="#FF4D4D" />
											</svg>
										</span>
										<span
											class="text-black font-medium group-hover/item:text-gray-900 text-xs">Trackmobile</span>
									</a>
								</div>
							</div>
						</div>

						<!-- Cotiza ahora Button -->
						<a href="<?php echo esc_url(home_url('/calculadora')); ?>"
							class="btn-primary !rounded-md !bg-primary-600 !border-primary-600 border !px-4 transform shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300 ease-out text-[14px]">
							Cotiza ahora
						</a>

						<!-- Country Selector -->
						<div class="relative inline-block group ml-2" data-aos="zoom-in" data-aos-delay="500">
							<button class="flex items-center gap-2 transition-all duration-300 focus:outline-none bg-transparent border-none">
								<!-- Active Flag (Peru) -->
								<div class="w-7 h-7 rounded-full overflow-hidden relative shadow-sm ring-2 ring-transparent group-hover:ring-white/20 transition-all">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 600" class="w-full h-full object-cover" preserveAspectRatio="xMidYMid slice">
										<rect width="900" height="600" fill="#D91023" />
										<rect width="300" height="600" x="300" fill="#fff" />
									</svg>
								</div>
								<!-- Chevron -->
								<svg xmlns="http://www.w3.org/2000/svg"
									class="w-5 h-5 transition-transform duration-300 group-hover:rotate-180 <?php echo $text_color_class; ?>"
									fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
								</svg>
							</button>

							<!-- Dropdown -->
							<div
								class="absolute right-0 mt-4 w-48 bg-white rounded-md shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-out z-50 overflow-hidden border border-gray-100 transform origin-top-right scale-95 group-hover:scale-100">
								<div class="py-2">
									<!-- Bolivia -->
									<a href="https://comsatel.com.bo" target="_blank"
										class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors group/item">
										<div class="w-6 h-6 rounded-full overflow-hidden relative shadow-sm shrink-0 grayscale group-hover/item:grayscale-0 transition-all">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 600" class="w-full h-full object-cover scale-150">
												<rect width="900" height="200" fill="#DA291C" />
												<rect width="900" height="200" y="200" fill="#F4E400" />
												<rect width="900" height="200" y="400" fill="#007A33" />
											</svg>
										</div>
										<span class="text-sm font-medium text-black group-hover/item:text-gray-900">Bolivia</span>
									</a>

									<!-- Colombia -->
									<a href="#"
										class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors group/item">
										<div class="w-6 h-6 rounded-full overflow-hidden relative shadow-sm shrink-0 grayscale group-hover/item:grayscale-0 transition-all">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 600" class="w-full h-full object-cover scale-150">
												<rect width="900" height="600" fill="#CE1126" />
												<rect width="900" height="400" fill="#003893" />
												<rect width="900" height="300" fill="#003893" />
												<rect width="900" height="200" y="300" fill="#FCD116" />
												<!-- Simple Colombia flag approximation -->
												<rect width="900" height="300" y="0" fill="#FCD116" />
												<rect width="900" height="150" y="300" fill="#003893" />
												<rect width="900" height="150" y="450" fill="#CE1126" />
											</svg>
										</div>
										<span class="text-sm font-medium text-black group-hover/item:text-gray-900">Colombia</span>
									</a>
								</div>
							</div>
						</div>
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
							<div class="relative inline-block group w-full" data-aos="zoom-in" data-aos-delay="400">
								<button id="loginBtn" class="flex justify-center items-center w-full !px-3 gap-2 py-2 border-2 !rounded-md transition-all duration-300 font-medium
		<?php echo $is_transparent_header ? 'btn-outline' : 'btn-outline'; ?> text-[14px]">
									<span>Iniciar Sesión</span>
									<svg xmlns="http://www.w3.org/2000/svg" id="arrowIcon"
										class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none"
										viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M19 9l-7 7-7-7" />
									</svg>
								</button>

								<div id="loginDropdown"
									class="mt-2 w-full bg-white rounded-md group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden border border-gray-100">
									<div class="py-2">
										<a href="#"
											class="flex items-center py-3 px-5 hover:bg-gray-50 group/item transition-colors">
											<span class="text-red-500 mr-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15"
													viewBox="0 0 16 15" fill="none">
													<path
														d="M5.06464 3.22832C4.97668 3.27883 4.89956 3.34622 4.83771 3.42661C4.77587 3.50701 4.73052 3.59883 4.70426 3.69681C4.67801 3.79478 4.67137 3.89698 4.68472 3.99753C4.69807 4.09808 4.73116 4.195 4.78208 4.28272L5.28928 5.1616L4.7112 5.28L0 8L2 11.464L6.7112 8.744L7.10288 8.3024L7.61008 9.18128C7.66059 9.26925 7.72797 9.34636 7.80837 9.40821C7.88877 9.47005 7.98059 9.5154 8.07856 9.54166C8.17654 9.56791 8.27874 9.57456 8.37928 9.5612C8.47983 9.54785 8.57675 9.51476 8.66448 9.46384L10.7917 8.23568C10.8796 8.18517 10.9568 8.11779 11.0186 8.03739C11.0804 7.95699 11.1258 7.86517 11.1521 7.7672C11.1783 7.66922 11.185 7.56702 11.1716 7.46648C11.1582 7.36593 11.1252 7.26901 11.0742 7.18128L10.567 6.30256L11.1451 6.18416L15.8563 3.46416L13.8563 0L9.14512 2.72L8.75344 3.1616L8.24624 2.28272C8.19572 2.19477 8.12832 2.11767 8.04792 2.05584C7.96751 1.99401 7.87569 1.94868 7.77772 1.92244C7.67974 1.8962 7.57755 1.88957 7.47701 1.90293C7.37647 1.9163 7.27955 1.9494 7.19184 2.00032L5.06464 3.22832ZM1.0928 8.2928L5.2496 5.8928L6.4496 7.9712L2.2928 10.3712L1.0928 8.2928ZM9.40656 3.4928L13.5635 1.0928L14.7635 3.1712L10.6067 5.5712L9.40656 3.4928ZM11.1666 9.66144C11.1268 9.81357 11.0574 9.95633 10.9623 10.0815C10.8672 10.2067 10.7482 10.3118 10.6123 10.3908C10.4763 10.4698 10.3261 10.5212 10.1703 10.5419C10.0144 10.5626 9.85601 10.5523 9.70416 10.5115L9.50096 11.2853C10.561 11.5642 11.6573 10.9267 11.9397 9.86768L11.1666 9.66144ZM9.28976 12.057L9.08656 12.8306C11.007 13.3357 12.9845 12.1949 13.4939 10.2838L12.7211 10.0781C12.3234 11.5699 10.7955 12.453 9.28976 12.057ZM8.87744 13.6034L8.67408 14.3773C11.451 15.1075 14.3048 13.461 15.0411 10.699L14.2683 10.493C13.6437 12.8354 11.2397 14.2246 8.87744 13.6034Z"
														fill="#FF4D4D" />
												</svg>
											</span>
											<span
												class="text-black font-medium group-hover/item:text-gray-900 text-xs">CLocator</span>
										</a>

										<a href="#"
											class="flex items-center py-3 px-5 hover:bg-gray-50 group/item transition-colors">
											<span class="text-red-500 mr-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
													viewBox="0 0 16 16" fill="none">
													<path fill-rule="evenodd" clip-rule="evenodd"
														d="M7.88949 0.00262198C8.15064 -0.0167262 8.40856 0.0715913 8.60662 0.248184C8.80469 0.424776 8.92671 0.675211 8.9459 0.944503V0.986677C8.9459 1.26631 8.83819 1.53448 8.64646 1.73221C8.45474 1.92994 8.19471 2.04102 7.92357 2.04102C7.65243 2.04102 7.39239 1.92994 7.20067 1.73221C7.00894 1.53448 6.90123 1.26631 6.90123 0.986677C6.91007 0.722506 7.01808 0.472209 7.20246 0.288608C7.38685 0.105007 7.63318 0.00246479 7.88949 0.00262198ZM15.8637 8.71854L15.9318 8.78883V8.85912V8.92941C15.9334 8.94752 15.9411 8.96449 15.9535 8.97734C15.966 8.9902 15.9824 8.99811 16 8.9997V9.06999V9.14028V9.21057V9.28086V9.35114V9.42143V9.56201V9.6323V9.70259V9.77288V9.84317V9.91346V9.98375V10.054V10.1243V10.1946V10.2649V10.4055V10.4758V10.5461V10.6164V10.6866V10.7569C16 10.8272 15.9318 10.8272 15.9318 10.8975V11.0381C15.4056 11.9831 14.7386 12.837 13.9553 13.5685L14.0235 13.4982L14.0916 13.4279L14.1598 13.3577V13.2874L14.228 13.2171L14.2961 13.1468C14.2961 13.1281 14.3033 13.1103 14.3161 13.0971C14.3289 13.0839 14.3462 13.0765 14.3643 13.0765L14.4324 13.0062L14.5006 12.9359C14.5006 12.9267 14.5023 12.9175 14.5058 12.909C14.5092 12.9005 14.5142 12.8927 14.5205 12.8862C14.5269 12.8797 14.5344 12.8745 14.5427 12.871C14.5509 12.8674 14.5598 12.8656 14.5687 12.8656V12.7953L14.6369 12.725L14.705 12.6548C14.705 12.6455 14.7068 12.6364 14.7102 12.6279C14.7137 12.6193 14.7187 12.6116 14.725 12.6051C14.7313 12.5985 14.7388 12.5934 14.7471 12.5898C14.7554 12.5863 14.7642 12.5845 14.7732 12.5845V12.5142C14.7732 12.4955 14.7804 12.4777 14.7932 12.4645C14.8059 12.4513 14.8233 12.4439 14.8414 12.4439C15.1162 11.9363 15.3226 11.3924 15.4548 10.8272C15.5049 10.6865 15.5187 10.5348 15.4948 10.3869C15.4709 10.239 15.4101 10.1001 15.3184 9.98375C14.6369 9.06999 12.047 9.77288 9.52522 11.5301C8.56298 12.1773 7.69152 12.9578 6.93531 13.8497C6.93531 13.8497 6.86715 13.92 6.86715 13.8497C6.86715 13.7794 6.799 13.7794 6.86715 13.7794C6.99513 13.444 7.17973 13.1346 7.4124 12.8656C7.6782 12.5213 7.96264 12.1928 8.26434 11.8816C8.7935 11.2955 9.38836 10.7764 10.0364 10.3352C12.2174 8.78883 14.671 8.36709 15.7615 8.92941C15.6933 8.50767 15.8296 8.57796 15.8978 8.71854H15.8637ZM15.3866 7.66419C15.34 7.478 15.2459 7.30809 15.114 7.17217C14.0916 5.90695 11.0246 6.68014 8.36658 8.85912C5.70851 11.0381 4.3454 13.92 5.36773 15.1852C5.60866 15.4514 5.91475 15.6457 6.25375 15.7475C6.39006 15.7475 6.45822 15.8178 6.59453 15.8178C6.60375 15.8167 6.61309 15.8177 6.62186 15.8208C6.63062 15.824 6.63859 15.8291 6.64515 15.8359C6.65171 15.8426 6.6567 15.8509 6.65974 15.8599C6.66278 15.8689 6.66378 15.8786 6.66269 15.8881C6.66269 15.9584 6.66269 15.9584 6.59453 15.9584C5.50404 16.099 4.61802 15.8881 4.14093 15.2555C2.91413 13.7794 4.41355 10.4758 7.54871 7.87506C8.15217 7.38217 8.79001 6.9358 9.45707 6.53956C10.7641 5.74638 12.2366 5.28838 13.7509 5.20406C14.3631 5.21449 14.9483 5.46595 15.3866 5.90695C15.5782 6.16934 15.6746 6.49264 15.6592 6.82072C15.6571 7.11464 15.587 7.4038 15.4548 7.66419L15.3866 7.73448C15.4548 7.64311 15.3866 7.64311 15.3866 7.64311V7.66419ZM14.4597 4.33949V4.62065C14.4597 4.63929 14.4525 4.65717 14.4397 4.67035C14.4269 4.68354 14.4096 4.69094 14.3915 4.69094H14.3234C14.3234 4.62065 14.2552 4.62065 14.2552 4.55036L14.1871 4.48007C13.2329 3.14457 10.1659 3.77718 7.37151 5.81558C5.60372 7.04808 4.13456 8.68349 3.0777 10.5953C2.39615 11.8605 2.25984 13.0554 2.87324 13.688L3.14586 13.9692V14.0606L3.0777 14.1308C2.63021 14.026 2.22535 13.7804 1.91906 13.4279C0.555949 11.741 2.19168 8.15622 5.59946 5.34464C9.00724 2.53305 12.824 1.61928 14.1871 3.30624C14.3867 3.60988 14.4826 3.97341 14.4597 4.33949ZM0.964882 11.0873C0.773172 10.961 0.590913 10.82 0.419637 10.6656C-0.39823 9.61122 0.0107034 7.78369 1.37381 5.88587C1.76654 5.33706 2.19946 4.82009 2.66877 4.33949C3.36043 3.67245 4.10098 3.06145 4.88383 2.51196V2.37138L4.6112 2.09022C4.6112 2.09022 4.54305 2.01993 4.6112 2.01993C4.6112 2.00129 4.61839 1.98341 4.63117 1.97023C4.64395 1.95705 4.66128 1.94965 4.67936 1.94965L6.79218 1.52791H6.86034V1.5982L6.11063 3.84747L6.04247 3.91776C6.02491 3.91617 6.00845 3.90826 5.99599 3.8954C5.98353 3.88255 5.97585 3.86558 5.97432 3.84747L5.76985 3.42573L5.70169 3.35544H5.59946C4.99855 3.75403 4.42884 4.20056 3.89557 4.69094C1.91906 6.51847 0.828571 8.62716 0.896727 10.1032C0.898892 10.3972 0.968985 10.6863 1.10119 10.9467V11.017L0.964882 11.0873Z"
														fill="#FF4D4D" />
												</svg>
											</span>
											<span
												class="text-black font-medium group-hover/item:text-gray-900 text-xs">C-Go</span>
										</a>

										<a href="#"
											class="flex items-center py-3 px-5 hover:bg-gray-50 group/item transition-colors">
											<span class="text-red-500 mr-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15"
													viewBox="0 0 16 15" fill="none">
													<path
														d="M5.06464 3.22832C4.97668 3.27883 4.89956 3.34622 4.83771 3.42661C4.77587 3.50701 4.73052 3.59883 4.70426 3.69681C4.67801 3.79478 4.67137 3.89698 4.68472 3.99753C4.69807 4.09808 4.73116 4.195 4.78208 4.28272L5.28928 5.1616L4.7112 5.28L0 8L2 11.464L6.7112 8.744L7.10288 8.3024L7.61008 9.18128C7.66059 9.26925 7.72797 9.34636 7.80837 9.40821C7.88877 9.47005 7.98059 9.5154 8.07856 9.54166C8.17654 9.56791 8.27874 9.57456 8.37928 9.5612C8.47983 9.54785 8.57675 9.51476 8.66448 9.46384L10.7917 8.23568C10.8796 8.18517 10.9568 8.11779 11.0186 8.03739C11.0804 7.95699 11.1258 7.86517 11.1521 7.7672C11.1783 7.66922 11.185 7.56702 11.1716 7.46648C11.1582 7.36593 11.1252 7.26901 11.0742 7.18128L10.567 6.30256L11.1451 6.18416L15.8563 3.46416L13.8563 0L9.14512 2.72L8.75344 3.1616L8.24624 2.28272C8.19572 2.19477 8.12832 2.11767 8.04792 2.05584C7.96751 1.99401 7.87569 1.94868 7.77772 1.92244C7.67974 1.8962 7.57755 1.88957 7.47701 1.90293C7.37647 1.9163 7.27955 1.9494 7.19184 2.00032L5.06464 3.22832ZM1.0928 8.2928L5.2496 5.8928L6.4496 7.9712L2.2928 10.3712L1.0928 8.2928ZM9.40656 3.4928L13.5635 1.0928L14.7635 3.1712L10.6067 5.5712L9.40656 3.4928ZM11.1666 9.66144C11.1268 9.81357 11.0574 9.95633 10.9623 10.0815C10.8672 10.2067 10.7482 10.3118 10.6123 10.3908C10.4763 10.4698 10.3261 10.5212 10.1703 10.5419C10.0144 10.5626 9.85601 10.5523 9.70416 10.5115L9.50096 11.2853C10.561 11.5642 11.6573 10.9267 11.9397 9.86768L11.1666 9.66144ZM9.28976 12.057L9.08656 12.8306C11.007 13.3357 12.9845 12.1949 13.4939 10.2838L12.7211 10.0781C12.3234 11.5699 10.7955 12.453 9.28976 12.057ZM8.87744 13.6034L8.67408 14.3773C11.451 15.1075 14.3048 13.461 15.0411 10.699L14.2683 10.493C13.6437 12.8354 11.2397 14.2246 8.87744 13.6034Z"
														fill="#FF4D4D" />
												</svg>
											</span>
											<span
												class="text-black font-medium group-hover/item:text-gray-900 text-xs">Tracksolid</span>
										</a>

										<a href="#"
											class="flex items-center py-3 px-5 hover:bg-gray-50 group/item transition-colors">
											<span class="text-red-500 mr-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="13" height="9"
													viewBox="0 0 13 9" fill="none">
													<path
														d="M1.83333 0C1.3471 0 0.880788 0.193154 0.536971 0.536971C0.193154 0.880787 0 1.3471 0 1.83333V6.83333C0 7.31956 0.193154 7.78588 0.536971 8.1297C0.880788 8.47351 1.3471 8.66667 1.83333 8.66667H7.5C7.98623 8.66667 8.45255 8.47351 8.79636 8.1297C9.14018 7.78588 9.33333 7.31956 9.33333 6.83333V5.77067L11.6127 7.80067C12.1493 8.27867 13 7.89733 13 7.178V1.24333C13 0.523333 12.1493 0.142667 11.6127 0.620667L9.33333 2.65067V1.83333C9.33333 1.3471 9.14018 0.880787 8.79636 0.536971C8.45255 0.193154 7.98623 0 7.5 0H1.83333Z"
														fill="#FF4D4D" />
												</svg>
											</span>
											<span
												class="text-black font-medium group-hover/item:text-gray-900 text-xs">CLVideo</span>
										</a>

										<a href="#"
											class="flex items-center py-3 px-5 hover:bg-gray-50 group/item transition-colors">
											<span class="text-red-500 mr-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
													viewBox="0 0 16 16" fill="none">
													<path fill-rule="evenodd" clip-rule="evenodd"
														d="M7.88949 0.00262198C8.15064 -0.0167262 8.40856 0.0715913 8.60662 0.248184C8.80469 0.424776 8.92671 0.675211 8.9459 0.944503V0.986677C8.9459 1.26631 8.83819 1.53448 8.64646 1.73221C8.45474 1.92994 8.19471 2.04102 7.92357 2.04102C7.65243 2.04102 7.39239 1.92994 7.20067 1.73221C7.00894 1.53448 6.90123 1.26631 6.90123 0.986677C6.91007 0.722506 7.01808 0.472209 7.20246 0.288608C7.38685 0.105007 7.63318 0.00246479 7.88949 0.00262198ZM15.8637 8.71854L15.9318 8.78883V8.85912V8.92941C15.9334 8.94752 15.9411 8.96449 15.9535 8.97734C15.966 8.9902 15.9824 8.99811 16 8.9997V9.06999V9.14028V9.21057V9.28086V9.35114V9.42143V9.56201V9.6323V9.70259V9.77288V9.84317V9.91346V9.98375V10.054V10.1243V10.1946V10.2649V10.4055V10.4758V10.5461V10.6164V10.6866V10.7569C16 10.8272 15.9318 10.8272 15.9318 10.8975V11.0381C15.4056 11.9831 14.7386 12.837 13.9553 13.5685L14.0235 13.4982L14.0916 13.4279L14.1598 13.3577V13.2874L14.228 13.2171L14.2961 13.1468C14.2961 13.1281 14.3033 13.1103 14.3161 13.0971C14.3289 13.0839 14.3462 13.0765 14.3643 13.0765L14.4324 13.0062L14.5006 12.9359C14.5006 12.9267 14.5023 12.9175 14.5058 12.909C14.5092 12.9005 14.5142 12.8927 14.5205 12.8862C14.5269 12.8797 14.5344 12.8745 14.5427 12.871C14.5509 12.8674 14.5598 12.8656 14.5687 12.8656V12.7953L14.6369 12.725L14.705 12.6548C14.705 12.6455 14.7068 12.6364 14.7102 12.6279C14.7137 12.6193 14.7187 12.6116 14.725 12.6051C14.7313 12.5985 14.7388 12.5934 14.7471 12.5898C14.7554 12.5863 14.7642 12.5845 14.7732 12.5845V12.5142C14.7732 12.4955 14.7804 12.4777 14.7932 12.4645C14.8059 12.4513 14.8233 12.4439 14.8414 12.4439C15.1162 11.9363 15.3226 11.3924 15.4548 10.8272C15.5049 10.6865 15.5187 10.5348 15.4948 10.3869C15.4709 10.239 15.4101 10.1001 15.3184 9.98375C14.6369 9.06999 12.047 9.77288 9.52522 11.5301C8.56298 12.1773 7.69152 12.9578 6.93531 13.8497C6.93531 13.8497 6.86715 13.92 6.86715 13.8497C6.86715 13.7794 6.799 13.7794 6.86715 13.7794C6.99513 13.444 7.17973 13.1346 7.4124 12.8656C7.6782 12.5213 7.96264 12.1928 8.26434 11.8816C8.7935 11.2955 9.38836 10.7764 10.0364 10.3352C12.2174 8.78883 14.671 8.36709 15.7615 8.92941C15.6933 8.50767 15.8296 8.57796 15.8978 8.71854H15.8637ZM15.3866 7.66419C15.34 7.478 15.2459 7.30809 15.114 7.17217C14.0916 5.90695 11.0246 6.68014 8.36658 8.85912C5.70851 11.0381 4.3454 13.92 5.36773 15.1852C5.60866 15.4514 5.91475 15.6457 6.25375 15.7475C6.39006 15.7475 6.45822 15.8178 6.59453 15.8178C6.60375 15.8167 6.61309 15.8177 6.62186 15.8208C6.63062 15.824 6.63859 15.8291 6.64515 15.8359C6.65171 15.8426 6.6567 15.8509 6.65974 15.8599C6.66278 15.8689 6.66378 15.8786 6.66269 15.8881C6.66269 15.9584 6.66269 15.9584 6.59453 15.9584C5.50404 16.099 4.61802 15.8881 4.14093 15.2555C2.91413 13.7794 4.41355 10.4758 7.54871 7.87506C8.15217 7.38217 8.79001 6.9358 9.45707 6.53956C10.7641 5.74638 12.2366 5.28838 13.7509 5.20406C14.3631 5.21449 14.9483 5.46595 15.3866 5.90695C15.5782 6.16934 15.6746 6.49264 15.6592 6.82072C15.6571 7.11464 15.587 7.4038 15.4548 7.66419L15.3866 7.73448C15.4548 7.64311 15.3866 7.64311 15.3866 7.64311V7.66419ZM14.4597 4.33949V4.62065C14.4597 4.63929 14.4525 4.65717 14.4397 4.67035C14.4269 4.68354 14.4096 4.69094 14.3915 4.69094H14.3234C14.3234 4.62065 14.2552 4.62065 14.2552 4.55036L14.1871 4.48007C13.2329 3.14457 10.1659 3.77718 7.37151 5.81558C5.60372 7.04808 4.13456 8.68349 3.0777 10.5953C2.39615 11.8605 2.25984 13.0554 2.87324 13.688L3.14586 13.9692V14.0606L3.0777 14.1308C2.63021 14.026 2.22535 13.7804 1.91906 13.4279C0.555949 11.741 2.19168 8.15622 5.59946 5.34464C9.00724 2.53305 12.824 1.61928 14.1871 3.30624C14.3867 3.60988 14.4826 3.97341 14.4597 4.33949ZM0.964882 11.0873C0.773172 10.961 0.590913 10.82 0.419637 10.6656C-0.39823 9.61122 0.0107034 7.78369 1.37381 5.88587C1.76654 5.33706 2.19946 4.82009 2.66877 4.33949C3.36043 3.67245 4.10098 3.06145 4.88383 2.51196V2.37138L4.6112 2.09022C4.6112 2.09022 4.54305 2.01993 4.6112 2.01993C4.6112 2.00129 4.61839 1.98341 4.63117 1.97023C4.64395 1.95705 4.66128 1.94965 4.67936 1.94965L6.79218 1.52791H6.86034V1.5982L6.11063 3.84747L6.04247 3.91776C6.02491 3.91617 6.00845 3.90826 5.99599 3.8954C5.98353 3.88255 5.97585 3.86558 5.97432 3.84747L5.76985 3.42573L5.70169 3.35544H5.59946C4.99855 3.75403 4.42884 4.20056 3.89557 4.69094C1.91906 6.51847 0.828571 8.62716 0.896727 10.1032C0.898892 10.3972 0.968985 10.6863 1.10119 10.9467V11.017L0.964882 11.0873Z"
														fill="#FF4D4D" />
												</svg>
											</span>
											<span
												class="text-black font-medium group-hover/item:text-gray-900 text-xs">Trackmobile</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<ul class="divide-y divide-gray-50">
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
													<span class="font-semibold"><?php echo esc_html($item->title); ?></span>
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
							<span class="font-semibold text-lg"></span>
						</button>
						<ul class="divide-y divide-gray-50">
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
											<span class="font-semibold"><?php echo $data['label']; ?></span>
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
								<span class="font-semibold text-lg"></span>
							</button>
							<?php if (have_rows('megamenu_' . $field_key, 'option')): ?>
								<?php while (have_rows('megamenu_' . $field_key, 'option')):
									the_row();
									$titulo = get_sub_field('titulo_seccion');
									$icono = get_sub_field('icono_svg');
								?>
									<div class="flex items-center gap-2 font-semibold text-gray-800 text-md px-5 py-3">
										<?php if ($icono)
											echo '<span class="w-4 h-4">' . $icono . '</span>'; ?>
										<?php echo esc_html($titulo); ?>
									</div>
									<ul class="bg-white mb-4">
										<?php if (have_rows('items_menu')):
											while (have_rows('items_menu')):
												the_row();
												$enlace = get_sub_field('enlace');
												if ($enlace): ?>
													<li>
														<a href="<?php echo esc_url($enlace['url']); ?>"
															class="block px-6 py-1 text-sm text-gray-700 border-b border-gray-50 last:border-0">
															<?php echo esc_html($enlace['title']); ?>
														</a>
													</li>
										<?php endif;
											endwhile;
										endif; ?>
									</ul>
								<?php endwhile; ?>
							<?php endif; ?>
						</nav>
					<?php endforeach; ?>

				</div>

				<!-- Mobile Country Selector Footer -->
				<div class="border-t border-gray-100 p-4 bg-white mt-auto">
					<div class="relative inline-block w-full">
						<button id="mobileCountryBtn" class="flex items-center justify-between w-full px-4 py-3 bg-gray-50 rounded-md transition-all focus:outline-none border-none">
							<div class="flex items-center gap-3">
								<div class="w-6 h-6 rounded-full overflow-hidden relative shadow-sm ring-2 ring-transparent">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 600" class="w-full h-full object-cover" preserveAspectRatio="xMidYMid slice">
										<rect width="900" height="600" fill="#D91023" />
										<rect width="300" height="600" x="300" fill="#fff" />
									</svg>
								</div>
								<span class="text-sm font-semibold text-gray-900">Perú</span>
							</div>
							<svg xmlns="http://www.w3.org/2000/svg" id="mobileCountryArrow" class="w-5 h-5 transition-transform duration-300 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
							</svg>
						</button>

						<!-- Mobile Dropup -->
						<div id="mobileCountryDropdown" class="absolute bottom-full left-0 w-full mb-2 bg-white rounded-md shadow-2xl hidden overflow-hidden border border-gray-100 transition-all duration-300 ease-out transform origin-bottom scale-95 opacity-0">
							<div class="py-2">
								<a href="https://comsatel.com.bo" target="_blank" class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors">
									<div class="w-6 h-6 rounded-full overflow-hidden relative shadow-sm shrink-0">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 600" class="w-full h-full object-cover scale-150">
											<rect width="900" height="200" fill="#DA291C" />
											<rect width="900" height="200" y="200" fill="#F4E400" />
											<rect width="900" height="200" y="400" fill="#007A33" />
										</svg>
									</div>
									<span class="text-sm font-medium text-black">Bolivia</span>
								</a>
								<a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors">
									<div class="w-6 h-6 rounded-full overflow-hidden relative shadow-sm shrink-0">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 600" class="w-full h-full object-cover scale-150">
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

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const btn = document.getElementById('loginBtn');
				const dropdown = document.getElementById('loginDropdown');
				const arrow = document.getElementById('arrowIcon');

				btn.addEventListener('click', function(e) {
					e.stopPropagation(); // Evita que el clic se propague al documento
					dropdown.classList.toggle('hidden');
					arrow.classList.toggle('rotate-180');
				});

				// Cerrar el menú si se hace clic fuera de él
				document.addEventListener('click', function(e) {
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
					mobileCountryBtn.addEventListener('click', function(e) {
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

					document.addEventListener('click', function(e) {
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
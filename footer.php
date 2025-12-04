<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package comsatel
 */

?>

<footer id="colophon" class="site-footer bg-gray-100 pt-16 pb-8">
	<div class="container-full mx-auto px-4 lg:px-8">

		<!-- Top Section: Quality Certifications -->
		<div class="flex flex-col lg:flex-row justify-between items-center mb-12 pb-12 border-b border-gray-300">
			<h3 class="text-2xl lg:text-3xl font-bold text-dark mb-6 lg:mb-0">
				Comprometidos con la calidad
			</h3>
			<div class="flex gap-6">
				<img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_footer-certificados.png"
					alt="ISO 9001 Certificado" class="h-20 lg:h-24 w-auto">
			</div>
		</div>

		<!-- Main Footer Content -->
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-12 mb-12">

			<!-- Logo & Social Media -->
			<div class="lg:col-span-1">
				<div class="mb-6">
					<?php if (has_custom_logo()): ?>
						<?php the_custom_logo(); ?>
					<?php else: ?>
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg"
								alt="<?php bloginfo('name'); ?>" class="h-10 w-auto">
						</a>
					<?php endif; ?>
				</div>

				<!-- Social Media Icons -->
				<div class="flex gap-4">
					<a href="https://instagram.com/comsatel" target="_blank" rel="noopener noreferrer"
						class="text-gray-600 hover:text-primary transition-colors" aria-label="Instagram">
						<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
							<path
								d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
						</svg>
					</a>
					<a href="https://twitter.com/comsatel" target="_blank" rel="noopener noreferrer"
						class="text-gray-600 hover:text-primary transition-colors" aria-label="Twitter">
						<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
							<path
								d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
						</svg>
					</a>
					<a href="https://linkedin.com/company/comsatel" target="_blank" rel="noopener noreferrer"
						class="text-gray-600 hover:text-primary transition-colors" aria-label="LinkedIn">
						<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
							<path
								d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
						</svg>
					</a>
					<a href="https://facebook.com/comsatel" target="_blank" rel="noopener noreferrer"
						class="text-gray-600 hover:text-primary transition-colors" aria-label="Facebook">
						<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
							<path
								d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
						</svg>
					</a>
					<a href="https://youtube.com/comsatel" target="_blank" rel="noopener noreferrer"
						class="text-gray-600 hover:text-primary transition-colors" aria-label="YouTube">
						<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
							<path
								d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
						</svg>
					</a>
				</div>
			</div>

			<!-- Empresa Column -->
			<div class="lg:col-span-1">
				<h4 class="text-lg font-bold text-dark mb-4">Empresa</h4>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footer-empresa',
					'menu_class' => 'space-y-3',
					'container' => 'nav',
					'fallback_cb' => function () {
						?>
					<nav class="space-y-3">
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Club Xperience</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Acerca de Comsatel</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Blog</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Preguntas
							frecuentes</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Trabaja con
							nosotros</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Números de cuenta</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Calculador de
							ahorro</a>
					</nav>
					<?php
					},
				));
				?>
			</div>

			<!-- Avisos legales Column -->
			<div class="lg:col-span-1">
				<h4 class="text-lg font-bold text-dark mb-4">Avisos legales</h4>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footer-legal',
					'menu_class' => 'space-y-3',
					'container' => 'nav',
					'fallback_cb' => function () {
						?>
					<nav class="space-y-3">
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Términos y
							condiciones</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Política de Protección
							de datos</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Sistemas de gestión</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Política de cookies</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Promociones</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Actualiza tus datos</a>
					</nav>
					<?php
					},
				));
				?>
			</div>

			<!-- Contacto Column -->
			<div class="lg:col-span-1">
				<h4 class="text-lg font-bold text-dark mb-4">Contacto</h4>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footer-contacto',
					'menu_class' => 'space-y-3',
					'container' => 'nav',
					'fallback_cb' => function () {
						?>
					<nav class="space-y-3 mb-6">
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Nuestras oficinas</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Ticket de soporte</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Portal facturas</a>
					</nav>
					<?php
					},
				));
				?>
			</div>

			<!-- Contacto Column -->
			<div class="lg:col-span-1">

				<!-- Libro de reclamaciones Button -->
				<a href="#"
					class="inline-flex items-center gap-2 px-4 py-3 border-2 border-dark text-dark rounded-lg hover:bg-dark hover:text-white transition-all font-semibold text-sm">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
					</svg>
					Libro de reclamaciones
				</a>
			</div>
		</div>

		<!-- Bottom Section: Copyright -->
		<div class="pt-8 border-t border-gray-300">
			<div class="flex flex-col md:flex-row justify-between items-center gap-4">
				<p class="text-sm text-gray-600 text-center md:text-left">
					© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.
				</p>
				<div class="flex gap-4 text-sm">
					<a href="#" class="text-gray-600 hover:text-primary transition-colors">Política de Privacidad</a>
					<span class="text-gray-400">|</span>
					<a href="#" class="text-gray-600 hover:text-primary transition-colors">Términos de Servicio</a>
				</div>
			</div>
		</div>

	</div><!-- .container -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
<script>
	// Mobile menu toggle
	document.getElementById('mobile-menu-toggle').addEventListener('click', function () {
		const menu = document.getElementById('mobile-menu');
		menu.classList.toggle('hidden');
	});
</script>

</html>
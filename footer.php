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
		<div class="flex flex-col lg:flex-row justify-between md:items-center mb-12 pb-12 border-b border-gray-300">
			<h3 class="text-2xl lg:text-3xl font-medium text-dark mb-6 lg:mb-0">
				Comprometidos con la calidad
			</h3>
			<div class="flex gap-6">
				<img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_footer-certificados.png"
					alt="ISO 9001 Certificado" class="h-20 lg:h-24 w-auto">
			</div>
		</div>

		<!-- Main Footer Content -->
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 md:gap-8 lg:gap-12 mb-12">

			<!-- Logo & Social Media -->
			<div class="lg:col-span-1 mb-12">
				<div class="mb-6">
					<?php comsatel_footer_logo(); ?>
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
			<div class="lg:col-span-1 border-b border-gray-200">
				<h4 class="text-lg font-bold text-dark my-4 cursor-pointer accordion-title flex items-center justify-between lg:cursor-default">
					Empresa
					<span class="flex-shrink-0 text-red-500 lg:hidden">
						<svg class="arrow-up-footer w-4 h-4 transform -rotate-45 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" width="20" height="24"
							viewBox="0 0 30 24" fill="none">
							<path d="M16.6251 0.624611C17.0251 0.224673 17.5676 0 18.1333 0C18.699 0 19.2415 0.224673 19.6416 0.624611L29.2416 10.2246C29.6415 10.6247 29.8662 11.1672 29.8662 11.7329C29.8662 12.2986 29.6415 12.8411 29.2416 13.2411L19.6416 22.8411C19.2393 23.2297 18.7004 23.4448 18.141 23.4399C17.5817 23.4351 17.0466 23.2107 16.6511 22.8152C16.2555 22.4196 16.0312 21.8846 16.0263 21.3252C16.0214 20.7658 16.2365 20.227 16.6251 19.8246L22.4 13.8662H2.13333C1.56754 13.8662 1.02492 13.6414 0.624839 13.2414C0.224761 12.8413 0 12.2987 0 11.7329C0 11.1671 0.224761 10.6245 0.624839 10.2244C1.02492 9.82431 1.56754 9.59954 2.13333 9.59954H22.4L16.6251 3.64114C16.2251 3.24109 16.0005 2.69856 16.0005 2.13288C16.0005 1.56719 16.2251 1.02467 16.6251 0.624611Z"
								fill="#1E1E1E" />
						</svg>
					</span>
				</h4>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footer-empresa',
					'menu_class' => 'accordion-content space-y-3 max-h-0 opacity-0 lg:max-h-full lg:opacity-100 overflow-hidden transition-all duration-300',
					'container' => 'nav',
					'fallback_cb' => function () {
				?>
					<nav class="accordion-content space-y-3 max-h-0 opacity-0 lg:max-h-full lg:opacity-100 overflow-hidden transition-all duration-300">
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Club Xperience</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Acerca de Comsatel</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Blog</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Preguntas frecuentes</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Trabaja con nosotros</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Números de cuenta</a>
						<a href="#" class="block text-gray-600 hover:text-primary transition-colors">Calculador de ahorro</a>
					</nav>
				<?php
					},
				));
				?>
			</div>

			<!-- Avisos legales Column -->
			<div class="lg:col-span-1 border-b border-gray-200">
				<h4 class="text-lg font-bold text-dark my-4 cursor-pointer accordion-title flex items-center justify-between lg:cursor-default">
					Avisos Legales
					<span class="flex-shrink-0 text-red-500 lg:hidden">
						<svg class="arrow-up-footer w-4 h-4 transform -rotate-45 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" width="20" height="24"
							viewBox="0 0 30 24" fill="none">
							<path d="M16.6251 0.624611C17.0251 0.224673 17.5676 0 18.1333 0C18.699 0 19.2415 0.224673 19.6416 0.624611L29.2416 10.2246C29.6415 10.6247 29.8662 11.1672 29.8662 11.7329C29.8662 12.2986 29.6415 12.8411 29.2416 13.2411L19.6416 22.8411C19.2393 23.2297 18.7004 23.4448 18.141 23.4399C17.5817 23.4351 17.0466 23.2107 16.6511 22.8152C16.2555 22.4196 16.0312 21.8846 16.0263 21.3252C16.0214 20.7658 16.2365 20.227 16.6251 19.8246L22.4 13.8662H2.13333C1.56754 13.8662 1.02492 13.6414 0.624839 13.2414C0.224761 12.8413 0 12.2987 0 11.7329C0 11.1671 0.224761 10.6245 0.624839 10.2244C1.02492 9.82431 1.56754 9.59954 2.13333 9.59954H22.4L16.6251 3.64114C16.2251 3.24109 16.0005 2.69856 16.0005 2.13288C16.0005 1.56719 16.2251 1.02467 16.6251 0.624611Z"
								fill="#1E1E1E" />
						</svg>
					</span>
				</h4>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footer-legal',
					'menu_class' => 'accordion-content space-y-3 max-h-0 opacity-0 lg:max-h-full lg:opacity-100 overflow-hidden transition-all duration-300',
					'container' => 'nav',
					'fallback_cb' => function () {
				?>
					<nav class="accordion-content space-y-3 max-h-0 opacity-0 lg:max-h-full lg:opacity-100 overflow-hidden transition-all duration-300">
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
				<h4 class="text-lg font-bold text-dark my-4 cursor-pointer accordion-title flex items-center justify-between lg:cursor-default">
					Contacto
					<span class="flex-shrink-0 text-red-500 lg:hidden">
						<svg class="arrow-up-footer w-4 h-4 transform -rotate-45 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" width="20" height="24"
							viewBox="0 0 30 24" fill="none">
							<path d="M16.6251 0.624611C17.0251 0.224673 17.5676 0 18.1333 0C18.699 0 19.2415 0.224673 19.6416 0.624611L29.2416 10.2246C29.6415 10.6247 29.8662 11.1672 29.8662 11.7329C29.8662 12.2986 29.6415 12.8411 29.2416 13.2411L19.6416 22.8411C19.2393 23.2297 18.7004 23.4448 18.141 23.4399C17.5817 23.4351 17.0466 23.2107 16.6511 22.8152C16.2555 22.4196 16.0312 21.8846 16.0263 21.3252C16.0214 20.7658 16.2365 20.227 16.6251 19.8246L22.4 13.8662H2.13333C1.56754 13.8662 1.02492 13.6414 0.624839 13.2414C0.224761 12.8413 0 12.2987 0 11.7329C0 11.1671 0.224761 10.6245 0.624839 10.2244C1.02492 9.82431 1.56754 9.59954 2.13333 9.59954H22.4L16.6251 3.64114C16.2251 3.24109 16.0005 2.69856 16.0005 2.13288C16.0005 1.56719 16.2251 1.02467 16.6251 0.624611Z"
								fill="#1E1E1E" />
						</svg>
					</span>
				</h4>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footer-contacto',
					'menu_class' => 'accordion-content space-y-3 max-h-0 opacity-0 lg:max-h-full lg:opacity-100 overflow-hidden transition-all duration-300',
					'container' => 'nav',
					'fallback_cb' => function () {
				?>
					<nav class="accordion-content space-y-3 max-h-0 opacity-0 lg:max-h-full lg:opacity-100 overflow-hidden transition-all duration-300">
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
				<a href="<?php echo esc_url(home_url('/libro-de-reclamaciones/')); ?>" class="btn btn-outline !rounded-md !text-sm !px-4 !py-3 text-left gap-2">
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
				<p class="text-sm text-gray-600 text-center md:text-left mb-0">
					© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.
				</p>
				<div class="md:flex-row flex-col gap-4 text-sm">
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
	document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
		const menu = document.getElementById('mobile-menu');
		menu.classList.toggle('hidden');
	});

	function toggleFAQ(button) {
		const faqItem = button.parentElement;
		const answer = faqItem.querySelector('.accordion-content');
		const arrow = button.querySelector('.arrow-up');

		const isClosed = answer.classList.contains('max-h-0');

		// Cerrar otros acordeones
		document.querySelectorAll('.accordion-content').forEach(item => {
			if (item !== answer) {
				item.classList.remove('max-h-96');
				item.classList.add('max-h-0', 'opacity-0');
			}
		});

		// Resetear rotación de otras flechas a posición cerrada (-rotate-45)
		document.querySelectorAll('.arrow-up').forEach(icon => {
			if (icon !== arrow) {
				icon.classList.remove('rotate-45');
				icon.classList.add('-rotate-45');
			}
		});

		// Toggle del acordeón actual
		if (isClosed) {
			// Abrir
			answer.classList.remove('max-h-0', 'opacity-0');
			answer.classList.add('max-h-96');
			arrow.classList.remove('-rotate-45');
			arrow.classList.add('rotate-45');
		} else {
			// Cerrar
			answer.classList.remove('max-h-96');
			answer.classList.add('max-h-0', 'opacity-0');
			arrow.classList.remove('rotate-45');
			arrow.classList.add('-rotate-45');
		}
	}

	// Función para Footer Accordion (solo en mobile)
	function initFooterAccordion() {
		const accordionTitles = document.querySelectorAll('.accordion-title');

		accordionTitles.forEach(title => {
			title.addEventListener('click', function() {
				// Solo funcionar en mobile (menos de 1024px)
				if (window.innerWidth >= 1024) return;

				const content = this.nextElementSibling;
				const arrow = this.querySelector('.arrow-up-footer');
				const isClosed = content.classList.contains('max-h-0');

				// Toggle del acordeón actual
				if (isClosed) {
					// Abrir
					content.classList.remove('max-h-0', 'opacity-0');
					content.classList.add('max-h-96');
					arrow.classList.remove('-rotate-45');
					arrow.classList.add('rotate-45');
				} else {
					// Cerrar
					content.classList.remove('max-h-96');
					content.classList.add('max-h-0', 'opacity-0');
					arrow.classList.remove('rotate-45');
					arrow.classList.add('-rotate-45');
				}
			});
		});
	}

	// Inicializar footer accordion cuando el DOM esté listo
	document.addEventListener('DOMContentLoaded', initFooterAccordion);
</script>

</html>
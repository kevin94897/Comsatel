<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package comsatel
 */

get_header();
?>

<main id="primary" class="site-main bg-white">
	<section class="min-h-[70vh] flex items-center justify-center px-4 py-20 lg:py-32">
		<div class="max-w-2xl w-full text-center">

			<!-- Graphic Element -->
			<div class="relative mb-12">
				<div class="text-[120px] md:text-[200px] font-bold text-gray-100 select-none motion-preset-fade motion-duration-2000">
					404
				</div>
				<div class="absolute inset-0 flex flex-col items-center justify-center mt-8">
					<h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-2 motion-preset-slide-down motion-duration-1000">
						¡Vaya! Página no encontrada
					</h1>
					<div class="w-20 h-1 bg-primary motion-preset-expand motion-delay-500"></div>
				</div>
			</div>

			<p class="text-gray-600 text-lg md:text-xl mb-12 max-w-lg mx-auto motion-preset-fade motion-delay-700">
				Parece que has llegado a una ruta que no existe. No te preocupes, puedes volver al camino principal.
			</p>

			<div class="flex flex-col sm:flex-row items-center justify-center gap-4 motion-preset-slide-up motion-delay-1000">
				<a href="<?php echo esc_url(home_url('/')); ?>"
					class="btn btn-primary">
					Ir al inicio
				</a>
				<a href="<?php echo esc_url(home_url('/servicios/')); ?>"
					class="btn btn-secondary">
					Ver soluciones
				</a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();

<?php
/**
 * Componente: Banner Blog / Newsletter
 * Campos ACF: banner_blog > titulo, descripcion, imagen
 */

$banner_blog = get_field('banner_blog') ?: null;
$titulo = $banner_blog['titulo'] ?? null;
$descripcion = $banner_blog['descripcion'] ?? null;
$imagen = $banner_blog['imagen'] ?? null;
$imagen_url = $imagen['url'] ?? null;
$imagen_alt = $imagen['alt'] ?? null;
?>

<?php if (!empty($titulo) || !empty($descripcion) || !empty($imagen_url)): ?>
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">

                <!-- LEFT CONTENT -->
                <div data-aos="fade-right" data-aos-duration="900" data-aos-delay="100">

                    <?php if ($titulo): ?>
                        <h2 class="text-3xl md:text-4xl font-medium text-gray-900 leading-tight">
                            <?php echo esc_html($titulo); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (!empty($descripcion)): ?>
                        <p class="text-black mt-4 max-w-md">
                            <?php echo esc_html($descripcion); ?>
                        </p>
                    <?php endif; ?>

                    <p class="text-dark text-lg font-medium mb-2 mt-6">Correo</p>

                    <form class="flex flex-col sm:flex-row gap-4" data-aos="fade-in" data-aos-duration="900"
                        data-aos-delay="200">

                        <input type="email" placeholder="correo@empresa.com" class="!bg-transparent w-full sm:flex-1 px-4 py-3 border border-gray-300 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary
                               text-gray-700">

                        <button type="submit" class="btn btn-primary font-normal !rounded-md">
                            Suscribirse
                        </button>
                    </form>
                </div>

                <!-- RIGHT IMAGES -->
                <?php if (!empty($imagen_url)): ?>
                    <div class="relative flex justify-center" data-aos="fade-left" data-aos-duration="900" data-aos-delay="150">
                        <img src="<?php echo esc_url($imagen_url); ?>"
                            alt="<?php echo esc_attr($imagen_alt ?? 'App Screenshot'); ?>" class="w-full">
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<?php
/**
 * Template Name: Sistema de Gestion
 */

get_header();

// ── ACF Data ──────────────────────────────────────────────
$encabezado = get_field('encabezado') ?? [];
$enc_titulo = $encabezado['titulo'] ?? '';
$enc_descripcion = $encabezado['descripcion'] ?? '';

$archivos_group = get_field('archivos') ?? [];
$archivos = $archivos_group['archivo'] ?? [];
?>

<main id="primary" class="site-main">

    <!-- Hero Banner -->
    <section class="relative min-h-[500px] flex items-end bg-dark-900 <?php echo wp_title(); ?>">
        <?php $hero_img = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
        <?php if ($hero_img): ?>
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('<?php echo esc_url($hero_img); ?>');" data-aos="fade-in"
                data-aos-duration="1200">
            </div>
        <?php endif; ?>

        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="">
                <span class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"
                    data-aos="fade-right" data-aos-duration="800" data-aos-delay="200"></span>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-10 leading-tight mt-2 uppercase"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" data-aos-easing="ease-out-cubic">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </section>

    <!-- Encabezado Section -->
    <?php if ($enc_titulo || $enc_descripcion): ?>
        <section class="py-8 md:py-16 relative">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <?php if ($enc_titulo): ?>
                        <h2 class="md:text-4xl text-2xl font-medium text-primary mb-12 text-center">
                            <?php echo esc_html($enc_titulo); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if ($enc_descripcion): ?>
                        <p class="text-center mb-0">
                            <?php echo esc_html($enc_descripcion); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Archivos / Cards Section -->
    <?php if (!empty($archivos)): ?>
        <section class="space-y-6 mb-32">
            <div class="container mx-auto px-4">

                <?php foreach ($archivos as $archivo):
                    $logo = $archivo['logo'] ?? [];
                    $titulo = $archivo['titulo'] ?? '';
                    $descripcion = $archivo['descripcion'] ?? '';
                    $botones = $archivo['subida_de_archivos'] ?? [];

                    // Omitir si no hay título ni descripción
                    if (!$titulo && !$descripcion)
                        continue;
                    ?>
                    <div class="border border-dark rounded-md p-6 shadow-lg hover:border-primary mb-6">

                        <!-- Logo -->
                        <?php if (!empty($logo['url'])): ?>
                            <div class="w-16 h-16 mb-4 flex-shrink-0">
                                <img src="<?php echo esc_url($logo['url']); ?>"
                                    alt="<?php echo esc_attr($logo['alt'] ?? $titulo); ?>" class="w-full h-full object-contain">
                            </div>
                        <?php endif; ?>

                        <!-- Título -->
                        <?php if ($titulo): ?>
                            <h3 class="text-xl font-medium mb-2">
                                <?php echo esc_html($titulo); ?>
                            </h3>
                        <?php endif; ?>

                        <!-- Descripción -->
                        <?php if ($descripcion): ?>
                            <p class="text-sm md:text-base text-gray-700 mb-4">
                                <?php echo esc_html($descripcion); ?>
                            </p>
                        <?php endif; ?>

                        <!-- Botones de descarga -->
                        <?php if (!empty($botones)): ?>
                            <div class="flex flex-wrap gap-3">
                                <?php foreach ($botones as $boton):
                                    $btn_texto = $boton['texto_del_boton'] ?? '';
                                    $btn_archivo = $boton['archivo'] ?? [];
                                    $btn_url = $btn_archivo['url'] ?? '';

                                    if (!$btn_texto && !$btn_url)
                                        continue;
                                    ?>
                                    <?php if ($btn_url): ?>
                                        <a href="<?php echo esc_url($btn_url); ?>" target="_blank" download class="btn btn-primary">
                                            <?php echo esc_html($btn_texto ?: 'Descargar'); ?>
                                        </a>
                                    <?php else: ?>
                                        <button class="btn btn-primary" disabled>
                                            <?php echo esc_html($btn_texto); ?>
                                        </button>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>

            </div>
        </section>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
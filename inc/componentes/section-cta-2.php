<?php
$cta = $args['cta'] ?? null;
$titulo = $cta['titulo'] ?? null;
$descripcion = $cta['descripcion'] ?? null;
$boton = $cta['boton'] ?? null;
$fondo = $cta['fondo'] ?? null;
$fondo_url = $fondo ? $fondo['url'] : null;

if (empty($titulo) && empty($descripcion) && empty($boton)) {
    return;
}
?>

<!-- CTA Section -->
<section id="cta-banner" class="relative pt-24 lg:pt-36 pb-4 overflow-hidden bg-gray-50">

    <?php if ($fondo_url): ?>
        <!-- Background image -->
        <div
            class="absolute inset-0 flex items-end justify-center overflow-hidden pointer-events-none max-w-screen-2xl m-auto">
            <img src="<?php echo esc_url($fondo_url); ?>" alt="<?php echo esc_attr($titulo ?? ''); ?>"
                class="md:w-full h-full object-cover md:max-h-none md:object-cover object-right">
        </div>
    <?php endif; ?>

    <div class="relative container mx-auto px-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-8">

            <!-- Spacer / image side -->
            <div class="hidden lg:block"></div>

            <!-- CTA Card -->
            <div class="p-2 lg:p-10 text-right md:text-left">
                <?php if (!empty($titulo)): ?>
                    <h3 class="heading-h2 font-medium text-white mb-4 max-w-[300px] md:max-w-full ml-auto md:ml-0">
                        <?php echo wp_kses_post($titulo); ?>
                    </h3>
                <?php endif; ?>

                <?php if (!empty($descripcion)): ?>
                    <p class="text-sm md:text-sm lg:text-base text-white mb-4">
                        <?php echo wp_kses_post($descripcion); ?>
                    </p>
                <?php endif; ?>

                <div class="gap-4">
                    <?php if (!empty($boton['url'])): ?>
                        <a href="<?php echo esc_url($boton['url']); ?>"
                            target="<?php echo esc_attr($boton['target'] ?? '_self'); ?>" class="btn btn-primary">
                            <?php echo esc_html($boton['title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>
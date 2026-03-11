<?php
$cta_group = get_field('banner_cta');
$titulo = $cta_group['titulo'] ?? null;
$descripcion = $cta_group['descripcion'] ?? null;
$btn_primario = $cta_group['boton_primario'] ?? null;
$btn_secundario = $cta_group['boton_secundario'] ?? null;
$imagen = $cta_group['imagen'] ?? null;

if (empty($titulo) && empty($descripcion) && empty($btn_primario) && empty($btn_secundario)) {
    return;
}
?>
<section class="py-12 lg:py-20 bg-[#F3F4F6]" id="cta">
    <div class="container mx-auto px-6 lg:px-16">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-12">

            <div class="w-full lg:w-1/2 text-center md:text-left" data-aos="fade-right">
                <?php if (!empty($titulo)): ?>
                    <h2 class="text-2xl lg:text-4xl font-medium text-black leading-tight mb-6">
                        <?php echo wp_kses_post($titulo); ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($descripcion)): ?>
                    <p class="text-black mb-10 md:max-w-lg">
                        <?php echo wp_kses_post($descripcion); ?>
                    </p>
                <?php endif; ?>

                <div class="flex flex-row sm:flex-row gap-4 md:justify-start justify-center">
                    <?php if (!empty($btn_primario['url'])): ?>
                        <a href="<?php echo esc_url($btn_primario['url']); ?>"
                            target="<?php echo esc_attr($btn_primario['target'] ?: '_self'); ?>" class="btn btn-primary">
                            <?php echo esc_html($btn_primario['title']); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($btn_secundario['url'])): ?>
                        <a href="<?php echo esc_url($btn_secundario['url']); ?>"
                            target="<?php echo esc_attr($btn_secundario['target'] ?: '_self'); ?>" class="btn btn-outline">
                            <?php echo esc_html($btn_secundario['title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="w-full lg:w-1/2 relative" data-aos="fade-left">
                <?php if ($imagen): ?>
                    <img src="<?php echo esc_url($imagen['url']); ?>"
                        alt="<?php echo esc_attr($imagen['alt'] ?: ($titulo ?? '')); ?>"
                        class="w-full h-auto object-contain">
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
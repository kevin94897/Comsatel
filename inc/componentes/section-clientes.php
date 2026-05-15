<!-- SECCIÓN CLIENTES -->
<?php
$banner_con_logos_page = get_field('banner_con_logos');
$banner_con_logos_options = get_field('banner_con_logos', 'options');

// Para el banner, priorizamos el de la página si no está vacío
$banner_con_logos = !empty($banner_con_logos_page['titulo']) || !empty($banner_con_logos_page['subtitulo'])
    ? $banner_con_logos_page
    : $banner_con_logos_options;

// Para los logos, combinamos los de la página con los globales
$logos_page = get_field('logos_de_clientes') ?: [];
$logos_options = get_field('logos_de_clientes', 'options') ?: [];
$logos_de_clientes = array_merge($logos_page, $logos_options);

$bg_image_clientes = !empty($banner_con_logos['imagen']['url']) ? $banner_con_logos['imagen']['url'] : null;

if (empty($banner_con_logos) && empty($logos_de_clientes)) {
    return;
}
?>
<section class="md:h-[700px] h-full relative flex-col flex py-16 lg:py-0" id="clientes">
    <?php if ($bg_image_clientes): ?>
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo esc_url($bg_image_clientes); ?>');">
        </div>
    <?php endif; ?>

    <div class="container mx-auto px-4 lg:px-8 z-10 h-full">
        <div class="flex items-center h-full">
            <div class="max-w-2xl flex-1">
                <?php if (!empty($banner_con_logos['subtitulo'])): ?>
                    <p class="text-sm text-white uppercase tracking-wider mb-4" data-aos="fade-down">
                        <?php echo wp_kses_post($banner_con_logos['subtitulo']); ?>
                    </p>
                <?php endif; ?>
                <?php if (!empty($banner_con_logos['titulo'])): ?>
                    <h2 class="text-2xl lg:text-4xl font-medium text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                        <?php echo wp_kses_post($banner_con_logos['titulo']); ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if (!empty($logos_de_clientes)): ?>
        <div class="container z-10">
            <span class="border-t border-[#F0F0F0] h-2 inline-block mr-2 w-full mb-4"></span>
        </div>
    <?php endif; ?>


    <?php if (!empty($logos_de_clientes)): ?>
        <div class="container mx-auto px-0 z-10 pb-8 pt-4">
            <div class="clientes-marquee group">
                <div class="clientes-marquee__track">
                    <?php for ($i = 0; $i < 2; $i++): ?>
                        <?php foreach ($logos_de_clientes as $item): ?>
                            <?php if (!empty($item['logo']['url'])): ?>
                                <div class="clientes-marquee__item">
                                    <img src="<?php echo esc_url($item['logo']['url']); ?>"
                                        alt="<?php echo esc_attr(!empty($item['logo']['alt']) ? $item['logo']['alt'] : 'Cliente Comsatel'); ?>"
                                        loading="lazy" aria-hidden="<?php echo $i === 1 ? 'true' : 'false'; ?>">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<style>
    .clientes-marquee {
        overflow: hidden;
        width: 100%;
        position: relative;
        -webkit-mask-image: linear-gradient(to right, transparent 0, #000 8%, #000 92%, transparent 100%);
        mask-image: linear-gradient(to right, transparent 0, #000 8%, #000 92%, transparent 100%);
    }

    .clientes-marquee__track {
        display: flex;
        align-items: center;
        gap: 3rem;
        width: max-content;
        animation: clientes-marquee-scroll 35s linear infinite;
    }

    .clientes-marquee:hover .clientes-marquee__track {
        animation-play-state: paused;
    }

    .clientes-marquee__item {
        flex: 0 0 auto;
        max-width: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .clientes-marquee__item img {
        max-height: 60px;
        width: auto;
        object-fit: contain;
    }

    @keyframes clientes-marquee-scroll {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .clientes-marquee__track {
            animation: none;
        }
    }
</style>
<?php

/**
 * Section: Alianzas
 *
 * @package Comsatel
 */

// ── Campos ACF ────────────────────────────────────────────────────────────────
$alianzas_group = $GLOBALS['xp_alianzas_group'] ?? null;
$titulo_acf = $alianzas_group['titulo'] ?? null;
$logos_acf = $alianzas_group['logos'] ?? null;

// Si no hay título ni logos, no renderizar
if (empty($titulo_acf) && empty($logos_acf))
    return;
?>

<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-12">

            <!-- Title -->
            <?php if ($titulo_acf): ?>
                <div class="flex-shrink-0 flex items-center gap-6 md:gap-10 text-center md:text-left">
                    <h2 class="text-xl md:text-2xl lg:text-3xl font-medium text-dark mb-0 leading-tight">
                        <?php echo esc_html($titulo_acf); ?>
                    </h2>
                    <div class="hidden md:block w-px h-16 bg-gray-400/50"></div>
                </div>
            <?php endif; ?>

            <!-- Logos Marquee -->
            <?php if (!empty($logos_acf)): ?>
                <div class="alianzas-marquee flex-1 min-w-0 w-full">
                    <div class="alianzas-marquee__track">
                        <?php for ($i = 0; $i < 2; $i++): ?>
                            <?php foreach ($logos_acf as $logo_row):
                                $logo = $logo_row['logo'] ?? [];
                                if (empty($logo['url']))
                                    continue;
                                ?>
                                <div class="alianzas-marquee__item">
                                    <img src="<?php echo esc_url($logo['url']); ?>"
                                        alt="<?php echo esc_attr($logo['alt'] ?? ''); ?>"
                                        title="<?php echo esc_attr($logo['title'] ?? $logo['alt'] ?? ''); ?>" loading="lazy"
                                        aria-hidden="<?php echo $i === 1 ? 'true' : 'false'; ?>">
                                </div>
                            <?php endforeach; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<style>
    .alianzas-marquee {
        overflow: hidden;
        position: relative;
        -webkit-mask-image: linear-gradient(to right, transparent 0, #000 6%, #000 94%, transparent 100%);
        mask-image: linear-gradient(to right, transparent 0, #000 6%, #000 94%, transparent 100%);
    }

    .alianzas-marquee__track {
        display: flex;
        align-items: center;
        gap: 2.5rem;
        width: max-content;
        animation: alianzas-marquee-scroll 30s linear infinite;
    }

    .alianzas-marquee:hover .alianzas-marquee__track {
        animation-play-state: paused;
    }

    .alianzas-marquee__item {
        flex: 0 0 auto;
        width: 120px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @media (min-width: 1024px) {
        .alianzas-marquee__item {
            width: 160px;
            height: 90px;
        }
    }

    .alianzas-marquee__item img {
        max-height: 100%;
        max-width: 100%;
        width: auto;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: .6;
        transition: filter .3s ease, opacity .3s ease;
    }

    .alianzas-marquee__item:hover img {
        filter: grayscale(0);
        opacity: 1;
    }

    @keyframes alianzas-marquee-scroll {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .alianzas-marquee__track {
            animation: none;
        }
    }
</style>
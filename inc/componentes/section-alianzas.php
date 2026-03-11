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
        <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16">

            <!-- Title -->
            <?php if ($titulo_acf): ?>
                <div class="flex-shrink-0 flex items-center gap-8 md:gap-12 text-center md:text-left">
                    <h2 class="text-2xl lg:text-3xl font-medium text-dark mb-0 leading-tight">
                        <?php echo esc_html($titulo_acf); ?>
                    </h2>
                    <!-- Vertical Separator (Hidden on mobile)-->
                    <div class="hidden md:block w-px h-16 bg-gray-400/50"></div>
                </div>
            <?php endif; ?>

            <!-- Logos Grid -->
            <?php if (!empty($logos_acf)): ?>
                <div class="flex flex-wrap justify-center items-center gap-x-8 gap-y-8 md:gap-x-12 md:gap-y-8 max-w-4xl">
                    <?php foreach ($logos_acf as $logo_row):
                        $logo = $logo_row['logo'] ?? [];
                        if (empty($logo['url']))
                            continue;
                        ?>
                        <!-- Logo Item -->
                        <div class="w-24 h-12 lg:w-32 lg:h-16 flex items-center justify-center group">
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?? ''); ?>"
                                title="<?php echo esc_attr($logo['title'] ?? $logo['alt'] ?? ''); ?>"
                                class="w-full h-full object-contain grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
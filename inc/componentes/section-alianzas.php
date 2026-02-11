<?php

/**
 * Section: Alianzas
 *
 * @package Comsatel
 */

// List of logos to display (names for alt text)
$alianzas = [
    'Emotion',
    'Flocco',
    'Etna',
    'Wolf',
    'Domino\'s',
    'Maroubra',
    'Repsol',
    'Entel',
    'Varigas'
];
?>
<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16">

            <!-- Title -->
            <div class="flex-shrink-0 flex items-center gap-8 md:gap-12 text-center md:text-left">
                <h2 class="text-2xl lg:text-3xl font-medium text-dark mb-0 leading-tight">
                    Nuestras <br class="hidden md:block">
                    Alianzas
                </h2>
                <!-- Vertical Separator (Hidden on mobile)-->
                <div class="hidden md:block w-px h-16 bg-gray-400/50"></div>
            </div>

            <!-- Logos Grid -->
            <div class="flex flex-wrap justify-center items-center gap-x-8 gap-y-8 md:gap-x-12 md:gap-y-8 max-w-4xl">
                <?php foreach ($alianzas as $alianza) : ?>
                    <!-- Logo Item -->
                    <div class="w-24 h-12 lg:w-32 lg:h-16 flex items-center justify-center group">
                        <!-- Placeholder Image - User should replace with actual logos -->
                        <!-- Using a designated placeholder or existing image temporarily -->
                        <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_footer-certificado.png"
                            alt="Alianza <?php echo esc_attr($alianza); ?>"
                            title="<?php echo esc_attr($alianza); ?>"
                            class="w-full h-full object-contain grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>
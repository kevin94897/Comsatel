<?php
/**
 * Section: Certificados
 *
 * @package Comsatel
 */

$certificados = $args['certificados'] ?? null;
?>

<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-evenly gap-8 md:gap-12">

            <!-- Title -->
            <div class="flex-shrink-0 flex items-center gap-12">
                <h2 class="text-xl md:text-2xl lg:text-3xl font-medium text-dark mb-0">
                    Certificados
                </h2>
                <div class="hidden md:block w-px h-16 bg-gray-400/50"></div>
            </div>

            <!-- Logos Grid -->
            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12">

                <?php if (!empty($certificados)): ?>
                    <?php foreach ($certificados as $cert):
                        $logo = $cert['logo_certificado'] ?? [];
                        ?>
                        <?php if (!empty($logo['url'])): ?>
                            <div class="w-20 h-20 lg:w-24 lg:h-24 flex items-center justify-center">
                                <img src="<?php echo esc_url($logo['url']); ?>"
                                    alt="<?php echo esc_attr(!empty($logo['alt']) ? $logo['alt'] : 'Certificado'); ?>"
                                    class="w-full h-auto object-contain grayscale hover:grayscale-0 transition-all duration-300">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                <?php endif; ?>

            </div>

        </div>
    </div>
</section>
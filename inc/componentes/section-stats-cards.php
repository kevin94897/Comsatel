<?php

/**
 * Component: Stats Cards Section
 * 
 * @param array $args {
 *     @type string $title
 *     @type array $cards {
 *         @type string $image
 *         @type string $stat
 *         @type string $description
 *     }
 * }
 */

$title = $args['title'] ?? '';
$cards = $args['cards'] ?? array();
?>

<section class="py-16 md:py-24" id="<?php echo $args['section_id']; ?>">
    <div class="container mx-auto px-4">
        <?php if ($title): ?>
            <div class="text-center mb-8 md:mb-16" data-aos="fade-up">
                <h2 class="text-2xl md:text-4xl font-medium text-black max-w-2xl mx-auto leading-tight">
                    <?php echo $title; ?>
                </h2>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            <?php foreach ($cards as $index => $card): ?>
                <div class="relative rounded-lg overflow-hidden aspect-square w-full group h-[400px]"
                    data-aos="fade-up"
                    data-aos-delay="<?php echo $index * 150; ?>">

                    <!-- Background Image -->
                    <img src="<?php echo $card['image']; ?>"
                        alt="<?php echo esc_attr($card['stat']); ?>"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">

                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent"></div>

                    <!-- Content Overlay -->
                    <div class="absolute inset-0 p-4 md:p-10 flex flex-col justify-end">
                        <h3 class="text-4xl md:text-5xl font-bold text-white mb-4">
                            <?php echo $card['stat']; ?>
                        </h3>
                        <p class="text-white text-sm md:text-base leading-relaxed font-normal max-w-[260px]">
                            <?php echo $card['description']; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php

$section_id = $args['section_id'] ?? 'scroll-carousel';
$banner = $args['banner'] ?? [];
$cards = $args['cards'] ?? [];

if (empty($banner) || empty($cards))
    return;
?>

<section class="py-4 bg-gray-50" id="slider-solutions">
    <!-- Carousel Section -->
    <div class="scroll-view carousel-view" data-view="carousel">
        <div class="container mx-auto px-4 lg:!px-0 py-16 lg:py-24 h-full flex items-center relative">
            <!-- Swiper Container -->
            <div class="swiper scrollCarouselSwiper w-full px-4">
                <div class="swiper-wrapper">
                    <?php foreach ($cards as $index => $card): ?>
                        <div class="swiper-slide">
                            <div class="bg-white rounded-2xl p-6 flex flex-col shadow-lg mb-10">

                                <!-- Image -->
                                <?php if (!empty($card['image'])): ?>
                                    <div class="rounded-lg overflow-hidden">
                                        <img src="<?php echo esc_url($card['image']); ?>"
                                            alt="<?php echo esc_attr($card['title']); ?>" class="w-full h-48 object-cover">
                                    </div>
                                <?php endif; ?>

                                <!-- Content -->
                                <div class="flex-1 mt-6">
                                    <h3 class="md:text-lg text-sm font-semibold mb-4 text-gray-900 md:min-h-[70px]">
                                        <?php echo esc_html($card['title']); ?>
                                    </h3>
                                    <p class="md:text-base text-sm text-gray-900 leading-relaxed md:min-h-[100px]">
                                        <?php echo esc_html($card['description']); ?>
                                    </p>
                                </div>

                                <div class="text-right">
                                    <?php
                                    get_template_part('inc/componentes/button-arrow', null, array(
                                        'text' => 'VER SOLUCIÓN',
                                        'class' => 'text-sm',
                                        'url' => '#'
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Navigation removed -->
            </div>

            <!-- Gradient Overlay -->
            <div
                class="absolute inset-y-0 right-0 w-24 md:w-28 bg-gradient-to-l from-gray-50 via-gray-50/70 to-transparent z-10 pointer-events-none">
            </div>
        </div>
    </div>
</section>

<style>
    /* Carousel styles */
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.scrollCarouselSwiper', {
            loop: true,
            speed: 600,
            slidesPerView: 1.2,
            spaceBetween: 20,
            centeredSlides: false,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: false,
            breakpoints: {
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3.2,
                    spaceBetween: 30,
                },
            },
        });
    });
</script>
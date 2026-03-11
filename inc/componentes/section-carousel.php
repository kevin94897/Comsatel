<?php

$section_id = $args['section_id'] ?? 'scroll-carousel';
$banner = $args['banner'] ?? null;
$cards = $args['cards'] ?? null;

if (empty($banner) || empty($cards))
    return;
?>

<section class="py-4 bg-gray-50" id="slider-soluciones">
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
                                    <div class="rounded-lg overflow-hidden md:h-56 h-48">
                                        <img src="<?php echo esc_url($card['image']); ?>"
                                            alt="<?php echo esc_attr($card['title']); ?>" class="w-full h-full object-cover">
                                    </div>
                                <?php endif; ?>

                                <!-- Content -->
                                <div class="flex-1 mt-6">
                                    <?php if (!empty($card['title'])): ?>
                                        <h3 class="md:text-lg text-sm font-medium mb-4 text-gray-900 md:min-h-[70px]">
                                            <?php echo wp_kses_post($card['title']); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if (!empty($card['description'])): ?>
                                        <p class="md:text-base text-sm text-gray leading-relaxed md:min-h-[100px]">
                                            <?php echo wp_kses_post($card['description']); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <div class="text-right">
                                    <?php
                                    $btn_text = $card['button_text'] ?? 'VER SOLUCIÓN';
                                    $btn_url = $card['link'] ?? null;
                                    if (!empty($btn_url)):
                                        get_template_part('inc/componentes/button-arrow', null, array(
                                            'text' => !empty($btn_text) ? $btn_text : 'VER SOLUCIÓN',
                                            'class' => 'text-sm',
                                            'url' => $btn_url
                                        ));
                                    endif;
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
    document.addEventListener('DOMContentLoaded', function () {
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
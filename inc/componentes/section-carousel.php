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
        <div class="container mx-auto px-4 lg:px-6 h-full flex items-center relative">
            <!-- Swiper Container -->
            <div class="swiper scrollCarouselSwiper w-full px-4">
                <div class="swiper-wrapper mb-5">
                    <?php foreach ($cards as $index => $card): ?>
                        <div class="swiper-slide flex flex-col pb-8">
                            <div class="bg-white rounded-xl md:rounded-2xl md:p-4 p-2 flex flex-col shadow-lg h-full">

                                <!-- Image -->
                                <?php if (!empty($card['image'])): ?>
                                    <div class="rounded-lg overflow-hidden shrink-0 w-full aspect-square">
                                        <img src="<?php echo esc_url($card['image']); ?>"
                                            alt="<?php echo esc_attr(!empty($card['title']) ? $card['title'] : 'Carrousel Image'); ?>"
                                            class="w-full h-full object-cover">
                                    </div>
                                <?php endif; ?>

                                <!-- Content -->
                                <div class="mt-4 flex-1 flex flex-col justify-between">
                                    <div>
                                        <?php if (!empty($card['title'])): ?>
                                            <h3
                                                class="md:text-lg text-sm !leading-tight font-medium mb-2 text-gray-900 line-clamp-2">
                                                <?php echo wp_kses_post($card['title']); ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if (!empty($card['description'])): ?>
                                            <p class="md:text-sm text-xs text-gray leading-relaxed line-clamp-3 mb-0">
                                                <?php echo wp_kses_post($card['description']); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="text-right pr-2 md:pr-4 mt-4">
                                        <?php
                                        $boton = $card['boton'] ?? null;
                                        get_template_part('inc/componentes/button-arrow', null, array(
                                            'text' => !empty($boton['title']) ? $boton['title'] : 'Ver solución',
                                            'url' => !empty($boton['url']) ? $boton['url'] : '#',
                                            'target' => !empty($boton['target']) ? $boton['target'] : '_self',
                                            'class' => 'text-sm',
                                        ));
                                        ?>
                                    </div>
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
    /* Iguala la altura de todos los slides al más alto */
    .scrollCarouselSwiper .swiper-wrapper {
        align-items: stretch !important;
    }

    .scrollCarouselSwiper .swiper-slide {
        height: auto !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.scrollCarouselSwiper', {
            loop: true,
            speed: 600,
            slidesPerView: 1.2,
            spaceBetween: 10,
            centeredSlides: false,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: false,
            breakpoints: {
                400: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 15,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
        });
    });
</script>
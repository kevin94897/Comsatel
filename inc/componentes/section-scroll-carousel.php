<?php

/**
 * Componente: Banner + Carousel (secciones independientes)
 *
 * Args esperados:
 * $args = array(
 *    'section_id' => 'unique-id',
 *    'banner' => array(
 *       'title' => 'CANDADO GPS',
 *       'subtitle' => 'Subtítulo opcional',
 *       'description' => 'Descripción del producto...',
 *       'images' => array(
 *          array('url' => 'image1.jpg', 'alt' => 'Descripción'),
 *       )
 *    ),
 *    'cards' => array(
 *       array(
 *          'icon' => '1',
 *          'title' => 'Ubicación remota al instante',
 *          'description' => 'Descripción de la característica...',
 *          'image' => 'card-image.jpg'
 *       ),
 *    )
 * )
 */

$section_id = $args['section_id'] ?? 'scroll-carousel';
$banner = $args['banner'] ?? null;
$cards = $args['cards'] ?? null;

if (empty($banner) && empty($cards))
    return;

$card_count = is_array($cards) ? count($cards) : 0;
$no_slider = $card_count <= 4;
?>

<?php if (!empty($banner)): ?>
    <!-- Banner Section -->
    <section class="banner-section bg-white" id="<?php echo esc_attr($section_id); ?>">
        <div class="container mx-auto px-4 lg:px-8 py-8 lg:py-16">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Images Slider (Embla) -->
                <?php if (!empty($banner['images'])): ?>
                    <div class="order-1 lg:order-1 relative group/embla" data-aos="fade-left">
                        <div class="embla-banner overflow-hidden rounded-lg"
                            data-banner-embla="<?php echo esc_attr($section_id); ?>">
                            <div class="embla__container flex">
                                <?php foreach ($banner['images'] as $image): ?>
                                    <div class="embla__slide flex-[0_0_100%] min-w-0">
                                        <div class="overflow-hidden transition-transform duration-300">
                                            <img src="<?php echo esc_url($image['url']); ?>"
                                                alt="<?php echo esc_attr(!empty($image['alt']) ? $image['alt'] : 'Banner Image'); ?>"
                                                class="w-full h-full object-cover">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <?php if (count($banner['images']) > 1): ?>
                            <div class="embla__dots flex flex-wrap justify-center items-center gap-2 mt-4"></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Content -->
                <div class="order-2 lg:order-2 self-center" data-aos="fade-right">
                    <?php if (!empty($banner['subtitle'])): ?>
                        <p class="text-sm text-primary uppercase tracking-wider mb-4">
                            <?php echo wp_kses_post($banner['subtitle']); ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($banner['title'])): ?>
                        <h2 class="heading-h2 font-medium text-gray-900 mb-6">
                            <?php echo wp_kses_post($banner['title']); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (!empty($banner['description'])): ?>
                        <div class="text-lg text-gray-700 leading-relaxed">
                            <?php echo wp_kses_post($banner['description']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (!empty($cards)): ?>
    <!-- Carousel Section (separada) -->
    <section class="carousel-section bg-white" id="<?php echo esc_attr($section_id); ?>-carousel">
        <div class="container mx-auto px-4 lg:px-8 pb-12 lg:pb-16">
            <div class="<?php echo $no_slider ? 'scrollCarouselStatic w-full' : 'swiper scrollCarouselSwiper w-full'; ?>"
                <?php echo $no_slider ? 'data-no-slider="1"' : ''; ?>>
                <div class="<?php echo $no_slider ? 'static-cards-wrapper' : 'swiper-wrapper'; ?>">
                    <?php foreach ($cards as $index => $card): ?>
                        <div class="<?php echo $no_slider ? 'static-card' : 'swiper-slide'; ?>">
                            <div class="carousel-card bg-[#2B2A2A] text-white rounded-2xl p-6 flex flex-col shadow-xl">

                                <!-- Icon Badge -->
                                <div class="flex items-start justify-between mb-4">
                                    <div
                                        class="w-10 h-10 bg-white text-dark rounded-full flex items-center justify-center font-medium text-lg flex-shrink-0">
                                        <?php if (!empty($card['icon'])): ?>
                                            <?php echo esc_html($card['icon']); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Image (cuadrada) -->
                                <?php if (!empty($card['image'])): ?>
                                    <div class="carousel-card__image rounded-lg overflow-hidden flex-shrink-0">
                                        <img src="<?php echo esc_url($card['image']); ?>"
                                            alt="<?php echo esc_attr(!empty($card['title']) ? $card['title'] : 'Card Image'); ?>">
                                    </div>
                                <?php endif; ?>

                                <!-- Content -->
                                <div class="flex-1 mt-4 flex flex-col">
                                    <?php if (!empty($card['title'])): ?>
                                        <h3 class="text-base font-medium mb-2 text-white line-clamp-2">
                                            <?php echo wp_kses_post($card['title']); ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if (!empty($card['description'])): ?>
                                        <p class="text-gray-300 leading-relaxed text-sm line-clamp-3">
                                            <?php echo wp_kses_post($card['description']); ?>
                                        </p>
                                    <?php endif; ?>

                                    <!-- Button — siempre al pie -->
                                    <?php $boton = $card['boton'] ?? null; ?>
                                    <div class="mt-auto pt-4">
                                        <?php get_template_part('inc/componentes/button-arrow', null, array(
                                            'text' => !empty($boton['title']) ? $boton['title'] : 'Ver solución',
                                            'url' => !empty($boton['url']) ? $boton['url'] : '#',
                                            'target' => !empty($boton['target']) ? $boton['target'] : '_self',
                                            'class' => '!text-white hover:!text-primary',
                                        )); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if (!$no_slider): ?>
                    <div class="swiper-pagination mt-8"></div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<style>
    /* Swiper container — Swiper iguala todos los slides automaticamente */
    .scrollCarouselSwiper {
        width: 100%;
    }

    .scrollCarouselSwiper .swiper-wrapper {
        align-items: stretch;
    }

    .scrollCarouselSwiper .swiper-slide {
        height: auto;
        display: flex;
        align-items: stretch;
    }

    .carousel-card {
        width: 100%;
        box-sizing: border-box;
        overflow: hidden;
    }

    .static-card {
        display: flex;
        align-items: stretch;
    }

    /* Imagen cuadrada (1:1) */
    .carousel-card__image {
        aspect-ratio: 1 / 1;
        width: 100%;
    }

    .carousel-card__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .static-cards-wrapper {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
        width: 100%;
    }

    @media (min-width: 768px) {
        .static-cards-wrapper {
            grid-template-columns: repeat(<?php echo min($card_count, 2); ?>, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .static-cards-wrapper {
            grid-template-columns: repeat(<?php echo min($card_count, 3); ?>, 1fr);
        }
    }

    @media (min-width: 1280px) {
        .static-cards-wrapper {
            grid-template-columns: repeat(<?php echo $card_count; ?>, 1fr);
        }
    }

    .scrollCarouselSwiper .swiper-pagination {
        position: static;
        margin-top: 2rem;
        display: flex;
        justify-content: center;
        gap: 0.5rem;
    }

    .scrollCarouselSwiper .swiper-pagination-bullet {
        background: #1f2937;
        opacity: 0.5;
    }

    .scrollCarouselSwiper .swiper-pagination-bullet-active {
        opacity: 1;
        background: #dc2626;
    }

    /* Embla Banner Slider */
    .embla__dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #d1d5db;
        border: 0;
        padding: 0;
        margin: 0;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .embla__dot.is-selected {
        background-color: #dc2626;
        width: 24px;
        border-radius: 5px;
    }

    .embla-banner {
        cursor: grab;
    }

    .embla-banner:active {
        cursor: grabbing;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const noSlider = <?php echo $no_slider ? 'true' : 'false'; ?>;
        const cardCount = <?php echo (int) $card_count; ?>;

        // Carousel: init Swiper (autoplay siempre activo)
        if (!noSlider && typeof Swiper !== 'undefined' && document.querySelector('.scrollCarouselSwiper')) {
            const enableLoop = cardCount > 4; // loop seguro cuando hay más slides que slidesPerView desktop
            new Swiper('.scrollCarouselSwiper', {
                loop: enableLoop,
                speed: 700,
                slidesPerView: 1,
                spaceBetween: 30,
                autoHeight: false,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: false,
                breakpoints: {
                    640: {
                        slidesPerView: Math.min(1.2, cardCount),
                        spaceBetween: 16,
                    },
                    768: {
                        slidesPerView: Math.min(2, cardCount),
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: Math.min(3, cardCount),
                        spaceBetween: 24,
                    },
                    1280: {
                        slidesPerView: Math.min(4, cardCount),
                        spaceBetween: 28,
                    },
                },
            });
        }

        // Banner: init Embla
        const emblaNode = document.querySelector('.embla-banner');
        if (emblaNode && typeof EmblaCarousel !== 'undefined') {
            const dotsNode = emblaNode.parentElement.querySelector('.embla__dots');
            const emblaApi = EmblaCarousel(emblaNode, {
                loop: true,
                duration: 30
            });

            if (dotsNode) {
                const scrollSnaps = emblaApi.scrollSnapList();
                const dotNodes = scrollSnaps.map((_, index) => {
                    const button = document.createElement('button');
                    button.classList.add('embla__dot');
                    button.type = 'button';
                    button.addEventListener('click', () => emblaApi.scrollTo(index));
                    dotsNode.appendChild(button);
                    return button;
                });

                const toggleDotBtnActiveState = () => {
                    const selected = emblaApi.selectedScrollSnap();
                    dotNodes.forEach((dot, index) => {
                        if (index === selected) dot.classList.add('is-selected');
                        else dot.classList.remove('is-selected');
                    });
                };

                emblaApi.on('select', toggleDotBtnActiveState);
                emblaApi.on('init', toggleDotBtnActiveState);
                emblaApi.on('reInit', toggleDotBtnActiveState);
            }
        }
    });
</script>
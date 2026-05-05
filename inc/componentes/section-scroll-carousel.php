<?php

/**
 * Componente: Scroll-based Carousel con Banner (Sticky Version)
 * 
 * Este componente se detiene al hacer scroll y permite cambiar entre
 * banner y carrusel mediante scroll adicional de forma fluida.
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
 *          array('url' => 'image2.jpg', 'alt' => 'Descripción'),
 *       )
 *    ),
 *    'cards' => array(
 *       array(
 *          'icon' => '1',
 *          'title' => 'Ubicación remota al instante',
 *          'description' => 'Descripción de la característica...',
 *          'image' => 'card-image.jpg'
 *       ),
 *       // ... más tarjetas
 *    )
 * )
 */

$section_id = $args['section_id'] ?? 'scroll-carousel';
$banner = $args['banner'] ?? null;
$cards = $args['cards'] ?? null;

if (empty($banner) || empty($cards))
    return;

$card_count = count($cards);
$no_slider = $card_count <= 3;
?>

<!-- Wrapper externo para el scroll -->
<div class="scroll-carousel-outer-wrapper bg-white">
    <section class="scroll-carousel-wrapper" id="<?php echo esc_attr($section_id); ?>" data-scroll-section>
        <!-- Contenedor sticky que se queda fijo -->
        <div class="scroll-sticky-container" data-sticky-container>
            <div class="scroll-content-wrapper" data-content-wrapper>

                <!-- Banner Section -->
                <div class="scroll-view banner-view active" data-view="banner">
                    <div class="container mx-auto px-4 lg:px-8 py-16 lg:py-24">
                        <div class="grid lg:grid-cols-2 gap-12 items-center">
                            <!-- Images Slider (Embla) -->
                            <?php if (!empty($banner['images'])): ?>
                                <div class="order-1 lg:order-1 relative group/embla" data-aos="fade-left">
                                    <div class="embla-banner overflow-hidden rounded-lg">
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

                                    <!-- Dots Navigation -->
                                    <?php if (count($banner['images']) > 1): ?>
                                        <div class="embla__dots flex flex-wrap justify-center items-center gap-2 mt-4">
                                            <!-- Dots will be generated via JS -->
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <!--  Content -->
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
                </div>

                <!-- Carousel Section -->
                <div class="scroll-view carousel-view" data-view="carousel">
                    <div class="container mx-auto px-4 lg:px-8 py-16 lg:py-24 h-full flex items-center">
                        <!-- Swiper Container -->
                        <div class="<?php echo $no_slider ? 'scrollCarouselStatic w-full' : 'swiper scrollCarouselSwiper w-full'; ?>"
                            <?php echo $no_slider ? 'data-no-slider="1"' : ''; ?>>
                            <div class="<?php echo $no_slider ? 'static-cards-wrapper' : 'swiper-wrapper'; ?>">
                                <?php foreach ($cards as $index => $card): ?>
                                    <div class="<?php echo $no_slider ? 'static-card' : 'swiper-slide'; ?>">
                                        <div class="bg-[#2B2A2A] text-white rounded-2xl p-8 flex flex-col shadow-xl mb-10">

                                            <!-- Icon Badge -->
                                            <div class="flex items-start justify-between mb-6">
                                                <div
                                                    class="w-12 h-12 bg-white text-dark rounded-full flex items-center justify-center font-medium text-xl">
                                                    <?php if (!empty($card['icon'])): ?>
                                                        <?php echo esc_html($card['icon']); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- Image -->
                                            <?php if (!empty($card['image'])): ?>
                                                <div class="rounded-lg overflow-hidden">
                                                    <img src="<?php echo esc_url($card['image']); ?>"
                                                        alt="<?php echo esc_attr(!empty($card['title']) ? $card['title'] : 'Card Image'); ?>"
                                                        class="w-full h-48 object-cover">
                                                </div>
                                            <?php endif; ?>

                                            <!-- Content -->
                                            <div class="flex-1 mt-6">
                                                <?php if (!empty($card['title'])): ?>
                                                    <h3 class="text-xl font-medium mb-4 text-gray-200 min-h-[60px]">
                                                        <?php echo wp_kses_post($card['title']); ?>
                                                    </h3>
                                                <?php endif; ?>
                                                <?php if (!empty($card['description'])): ?>
                                                    <p class="text-gray-200 leading-relaxed min-h-[100px] text-sm">
                                                        <?php echo wp_kses_post($card['description']); ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Navigation -->
                            <?php if (!$no_slider): ?>
                                <div class="swiper-pagination mt-8"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
    </section>
</div>

<style>
    /* Wrapper externo que crea el espacio de scroll */
    .scroll-carousel-outer-wrapper {
        position: relative;
        width: 100%;
        /* height: 200vh; */
        /* Espacio para el efecto de scroll */
    }

    .scroll-carousel-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
    }

    /* Contenedor sticky que se queda fijo en el viewport */
    .scroll-sticky-container {
        position: sticky;
        top: 0;
        height: 100vh;
        max-height: 900px;
        width: 100%;
        margin-top: auto;
        margin-bottom: auto;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .scroll-content-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
    }

    /* Vistas que se alternan */
    .scroll-view {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        opacity: 0;
        transform: scale(0.95);
        transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1),
            transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
    }

    .scroll-view.active {
        opacity: 1;
        transform: scale(1);
        pointer-events: auto;
        z-index: 10;
    }

    /* Animación alternativa: slide */
    .scroll-view.transition-slide {
        transform: translateY(20px);
    }

    .scroll-view.transition-slide.active {
        transform: translateY(0);
    }

    /* Swiper custom styles */
    .scrollCarouselSwiper .swiper-slide {
        height: auto;
    }

    /* Static layout (≤3 cards, no slider) */
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
            grid-template-columns: repeat(<?php echo $card_count; ?>, 1fr);
        }
    }

    .static-card {
        height: auto;
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

    /* Indicador de scroll */
    .scroll-indicator {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 20;
        text-align: center;
        color: #6b7280;
        font-size: 0.875rem;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .scroll-indicator.show {
        opacity: 1;
    }

    .scroll-indicator svg {
        animation: bounce 2s infinite;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(10px);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sectionId = '<?php echo esc_js($section_id); ?>';
        const outerWrapper = document.querySelector(`#${sectionId}`).closest('.scroll-carousel-outer-wrapper');
        const wrapper = document.querySelector(`#${sectionId}`);

        if (!wrapper || !outerWrapper) {
            console.error('Scroll carousel: wrapper no encontrado');
            return;
        }

        const stickyContainer = wrapper.querySelector('[data-sticky-container]');
        const bannerView = wrapper.querySelector('[data-view="banner"]');
        const carouselView = wrapper.querySelector('[data-view="carousel"]');

        let scrollCarouselSwiper = null;
        let currentView = 'banner';


        const noSlider = <?php echo $no_slider ? 'true' : 'false'; ?>;
        const cardCount = <?php echo $card_count; ?>;

        // Loop only when there are enough cards to avoid clone-order glitches.
        // Desktop shows 3 slides; Swiper needs > 2×slidesPerView unique slides for clean looping.
        const enableLoop = cardCount > 6;

        // Initialize Swiper
        function initSwiper() {
            if (noSlider) return;

            if (typeof Swiper === 'undefined') {
                console.error('Swiper library is not loaded');
                return;
            }

            if (scrollCarouselSwiper) return;

            scrollCarouselSwiper = new Swiper('.scrollCarouselSwiper', {
                loop: enableLoop,
                speed: 600,
                slidesPerView: 1,
                spaceBetween: 30,
                autoplay: enableLoop ? {
                    delay: 5000,
                    disableOnInteraction: false,
                } : false,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: false,
                breakpoints: {
                    768: {
                        slidesPerView: Math.min(2, cardCount),
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: Math.min(3, cardCount),
                        spaceBetween: 30,
                    },
                },
            });
        }

        // Switch between views
        function switchView(newView) {
            if (currentView === newView) return;

            currentView = newView;

            if (newView === 'banner') {
                bannerView.classList.add('active');
                carouselView.classList.remove('active');
            } else {
                bannerView.classList.remove('active');
                carouselView.classList.add('active');

                // Initialize Swiper cuando se muestra por primera vez
                if (!scrollCarouselSwiper) {
                    setTimeout(initSwiper, 100);
                }
            }
        }

        // Initialize Embla Banner Slider
        const emblaNode = wrapper.querySelector('.embla-banner');
        if (emblaNode && typeof EmblaCarousel !== 'undefined') {
            const dotsNode = wrapper.querySelector('.embla__dots');
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

        // Scroll handler
        function handleScroll() {
            const wrapperRect = outerWrapper.getBoundingClientRect();
            const wrapperTop = wrapperRect.top;
            const wrapperHeight = wrapperRect.height;
            const windowHeight = window.innerHeight;

            // Si la sección no está en viewport, no hacer nada
            if (wrapperTop > windowHeight || wrapperTop + wrapperHeight < 0) {
                return;
            }

            // Calcular progreso (0 a 1)
            // 0 = sección justo entrando al viewport
            // 1 = sección a punto de salir del viewport
            let progress = 0;

            if (wrapperTop <= 0) {
                // La sección ya pasó el top del viewport
                const stickyHeight = stickyContainer.offsetHeight;
                progress = Math.abs(wrapperTop) / (wrapperHeight - stickyHeight);
                progress = Math.max(0, Math.min(1, progress));
            }


            // Cambiar vista en el 40% del progreso (ajustable)
            const threshold = 0.1;

            if (progress < threshold) {
                switchView('banner');
            } else {
                switchView('carousel');
            }
        }

        // Optimized scroll listener
        let ticking = false;

        function onScroll() {
            if (!ticking) {
                window.requestAnimationFrame(function () {
                    handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        }

        // Attach scroll listener
        window.addEventListener('scroll', onScroll, {
            passive: true
        });

        // Initial check
        handleScroll();

    });
</script>
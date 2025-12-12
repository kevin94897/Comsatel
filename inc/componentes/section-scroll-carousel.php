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
$banner = $args['banner'] ?? [];
$cards = $args['cards'] ?? [];

if (empty($banner) || empty($cards))
    return;
?>

<!-- Wrapper externo para el scroll -->
<div class="scroll-carousel-outer-wrapper">
    <section class="scroll-carousel-wrapper" id="<?php echo esc_attr($section_id); ?>" data-scroll-section>
        <!-- Contenedor sticky que se queda fijo -->
        <div class="scroll-sticky-container" data-sticky-container>
            <div class="scroll-content-wrapper" data-content-wrapper>

                <!-- Banner Section -->
                <div class="scroll-view banner-view active" data-view="banner">
                    <div class="container mx-auto px-4 lg:px-8 py-16 lg:py-24">
                        <div class="grid lg:grid-cols-2 gap-12 items-center">
                            <!-- Images Grid -->
                            <?php if (!empty($banner['images'])): ?>
                                <div class="order-1 lg:order-1" data-aos="fade-left">
                                    <?php foreach ($banner['images'] as $image): ?>
                                        <div class="aspect-square overflow-hidden hover:scale-105 transition-transform duration-300">
                                            <img src="<?php echo esc_url($image['url']); ?>"
                                                alt="<?php echo esc_attr($image['alt'] ?? ''); ?>"
                                                class="w-full h-full object-cover">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <!--  Content -->
                            <div class="order-2 lg:order-2 self-start" data-aos="fade-right">
                                <?php if (!empty($banner['subtitle'])): ?>
                                    <p class="text-sm text-primary uppercase tracking-wider mb-4">
                                        <?php echo esc_html($banner['subtitle']); ?>
                                    </p>
                                <?php endif; ?>

                                <h2 class="text-3xl lg:text-5xl font-semibold text-gray-900 mb-6">
                                    <?php echo esc_html($banner['title']); ?>
                                </h2>

                                <?php if (!empty($banner['description'])): ?>
                                    <p class="text-lg text-gray-700 leading-relaxed">
                                        <?php echo esc_html($banner['description']); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Carousel Section -->
                <div class="scroll-view carousel-view" data-view="carousel">
                    <div class="container mx-auto px-4 lg:px-8 py-16 lg:py-24 h-full flex items-center">
                        <!-- Swiper Container -->
                        <div class="swiper scrollCarouselSwiper w-full">
                            <div class="swiper-wrapper">
                                <?php foreach ($cards as $index => $card): ?>
                                    <div class="swiper-slide">
                                        <div class="bg-[#2B2A2A] text-white rounded-2xl p-8 flex flex-col shadow-xl mb-10">

                                            <!-- Icon Badge -->
                                            <div class="flex items-start justify-between mb-6">
                                                <div class="w-12 h-12 bg-white text-dark rounded-full flex items-center justify-center font-semibold text-xl">
                                                    <?php echo esc_html($card['icon'] ?? ($index + 1)); ?>
                                                </div>
                                            </div>

                                            <!-- Image -->
                                            <?php if (!empty($card['image'])): ?>
                                                <div class="rounded-lg overflow-hidden">
                                                    <img src="<?php echo esc_url($card['image']); ?>"
                                                        alt="<?php echo esc_attr($card['title']); ?>"
                                                        class="w-full h-48 object-cover">
                                                </div>
                                            <?php endif; ?>

                                            <!-- Content -->
                                            <div class="flex-1 mt-6">
                                                <h3 class="text-xl font-semibold mb-4 text-gray-200 min-h-[70px]">
                                                    <?php echo esc_html($card['title']); ?>
                                                </h3>
                                                <p class="text-gray-200 leading-relaxed min-h-[100px]">
                                                    <?php echo esc_html($card['description']); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Navigation -->
                            <div class="swiper-pagination mt-8"></div>
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
        /* Altura total: viewport + espacio para scroll */
        /* height: 300vh; */
        /* Ajustable según necesites */
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
        width: 100%;
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

    .scrollCarouselSwiper .swiper-pagination-bullet {
        background: #1f2937;
        opacity: 0.5;
    }

    .scrollCarouselSwiper .swiper-pagination-bullet-active {
        opacity: 1;
        background: #dc2626;
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
    document.addEventListener('DOMContentLoaded', function() {
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

        console.log('Scroll carousel inicializado para:', sectionId);

        // Initialize Swiper
        function initSwiper() {
            if (typeof Swiper === 'undefined') {
                console.error('Swiper library is not loaded');
                return;
            }

            if (scrollCarouselSwiper) return;

            console.log('Inicializando Swiper...');

            scrollCarouselSwiper = new Swiper('.scrollCarouselSwiper', {
                loop: true,
                speed: 600,
                slidesPerView: 1,
                spaceBetween: 30,
                centeredSlides: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: false,
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                },
            });
        }

        // Switch between views
        function switchView(newView) {
            if (currentView === newView) return;

            console.log('Cambiando vista a:', newView);
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
                progress = Math.abs(wrapperTop) / (wrapperHeight - windowHeight);
                progress = Math.max(0, Math.min(1, progress));
            }

            // Debug
            // console.log('Progress:', progress.toFixed(2));

            // Cambiar vista en el 40% del progreso (ajustable)
            const threshold = 0.4;

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
                window.requestAnimationFrame(function() {
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

        // Debug: log scroll events
        let debugCount = 0;
        window.addEventListener('scroll', function() {
            if (debugCount < 5) {
                console.log('Scroll event detectado');
                debugCount++;
            }
        }, {
            once: false,
            passive: true
        });
    });
</script>
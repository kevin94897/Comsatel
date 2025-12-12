<?php
/**
 * Componente: Scroll-based Carousel con Banner
 * 
 * Este componente muestra un banner que se transforma en un carrusel
 * de tarjetas al hacer scroll hacia abajo, con animaciones suaves.
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

<section class="scroll-carousel-section relative bg-gray-50" id="<?php echo esc_attr($section_id); ?>"
    data-scroll-section>
    <!-- Banner Section -->
    <div class="banner-container transition-all duration-700 ease-in-out" data-banner>
        <div class="container mx-auto px-4 lg:px-8 py-16 lg:py-24">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left: Content -->
                <div class="order-2 lg:order-1" data-aos="fade-right">
                    <?php if (!empty($banner['subtitle'])): ?>
                        <p class="text-sm text-primary uppercase tracking-wider mb-4">
                            <?php echo esc_html($banner['subtitle']); ?>
                        </p>
                    <?php endif; ?>

                    <h2 class="text-3xl lg:text-5xl font-bold text-gray-900 mb-6">
                        <?php echo esc_html($banner['title']); ?>
                    </h2>

                    <?php if (!empty($banner['description'])): ?>
                        <p class="text-lg text-gray-700 leading-relaxed">
                            <?php echo esc_html($banner['description']); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Right: Images Grid -->
                <?php if (!empty($banner['images'])): ?>
                    <div class="" data-aos="fade-left">
                        <?php foreach ($banner['images'] as $image): ?>
                            <div
                                class="aspect-square bg-white rounded-lg shadow-md overflow-hidden hover:scale-105 transition-transform duration-300">
                                <img src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-full h-full object-cover">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Carousel Section -->
    <div class="carousel-container opacity-0 transition-opacity duration-700 ease-in-out absolute inset-0 pointer-events-none"
        data-carousel>
        <div class="container mx-auto px-4 lg:px-8 py-16 lg:py-24 h-full flex items-center">
            <!-- Swiper Container -->
            <div class="swiper scrollCarouselSwiper w-full">
                <div class="swiper-wrapper">
                    <?php foreach ($cards as $index => $card): ?>
                        <div class="swiper-slide">
                            <div
                                class="bg-dark text-white rounded-2xl p-8 h-full min-h-[400px] flex flex-col justify-between shadow-xl">
                                <!-- Icon Badge -->
                                <div class="flex items-start justify-between mb-6">
                                    <div
                                        class="w-12 h-12 bg-white text-dark rounded-full flex items-center justify-center font-bold text-xl">
                                        <?php echo esc_html($card['icon'] ?? ($index + 1)); ?>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1">
                                    <h3 class="text-2xl font-bold mb-4">
                                        <?php echo esc_html($card['title']); ?>
                                    </h3>
                                    <p class="text-gray-300 leading-relaxed">
                                        <?php echo esc_html($card['description']); ?>
                                    </p>
                                </div>

                                <!-- Image -->
                                <?php if (!empty($card['image'])): ?>
                                    <div class="mt-6 rounded-lg overflow-hidden">
                                        <img src="<?php echo esc_url($card['image']); ?>"
                                            alt="<?php echo esc_attr($card['title']); ?>" class="w-full h-48 object-cover">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Navigation -->
                <div class="swiper-pagination mt-8"></div>
                <div class="swiper-button-prev !text-dark"></div>
                <div class="swiper-button-next !text-dark"></div>
            </div>
        </div>
    </div>
</section>

<style>
    .scroll-carousel-section {
        min-height: 100vh;
        position: relative;
    }

    .banner-container.hidden-banner {
        opacity: 0;
        transform: translateY(-20px);
        pointer-events: none;
    }

    .carousel-container.show-carousel {
        opacity: 1;
        pointer-events: auto;
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
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sectionId = '<?php echo esc_js($section_id); ?>';
        const section = document.querySelector(`#${sectionId}`);

        if (!section) return;

        const banner = section.querySelector('[data-banner]');
        const carousel = section.querySelector('[data-carousel]');

        let scrollCarouselSwiper = null;
        let isCarouselView = false;

        // Initialize Swiper
        function initSwiper() {
            if (typeof Swiper === 'undefined') {
                console.error('Swiper library is not loaded');
                return;
            }

            scrollCarouselSwiper = new Swiper('.scrollCarouselSwiper', {
                loop: true,
                speed: 600,
                slidesPerView: 1,
                spaceBetween: 30,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
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

        // Scroll handler
        function handleScroll() {
            const sectionRect = section.getBoundingClientRect();
            const scrollProgress = -sectionRect.top / (sectionRect.height - window.innerHeight);

            // Transition threshold (adjust as needed)
            const threshold = 0.3;

            if (scrollProgress > threshold && !isCarouselView) {
                // Show carousel
                banner.classList.add('hidden-banner');
                carousel.classList.add('show-carousel');
                isCarouselView = true;

                // Initialize Swiper on first show
                if (!scrollCarouselSwiper) {
                    initSwiper();
                }
            } else if (scrollProgress <= threshold && isCarouselView) {
                // Show banner
                banner.classList.remove('hidden-banner');
                carousel.classList.remove('show-carousel');
                isCarouselView = false;
            }
        }

        // Attach scroll listener
        let ticking = false;
        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(function () {
                    handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });

        // Initial check
        handleScroll();
    });
</script>
<?php

/**
 * Template Name: Nosotros
 */

get_header();

// ── ACF Data ──────────────────────────────────────────────
$nosotros_fields = get_fields();

// Encabezado
$encabezado = $nosotros_fields['encabezado'] ?? [];
$enc_subtitulo = $encabezado['subtitulo'] ?? '';
$enc_descripcion = $encabezado['descripcion'] ?? '';

// Línea de tiempo
$linea_de_tiempo = $nosotros_fields['linea_de_tiempo'] ?? [];
$sucesos = $linea_de_tiempo['suceso'] ?? [];

// Presencia
$presencia = $nosotros_fields['presencia'] ?? [];
$pres_titulo = $presencia['titulo'] ?? '';
$pres_descripcion = $presencia['descripcion'] ?? '';
$pres_texto_1 = $presencia['texto_1'] ?? '';
$pres_lista_1 = $presencia['lista_1'] ?? [];
$pres_texto_2 = $presencia['texto_2'] ?? '';
$pres_lista_2 = $presencia['lista_2'] ?? [];
$pres_imagen = $presencia['imagen'] ?? [];

// Contadores
$contadores_group = $nosotros_fields['contadores'] ?? [];
$contadores = $contadores_group['contadores_numericos'] ?? [];

// Sobre nosotros / Trabajos / Certificados
$sobre_nosotros = $nosotros_fields['sobre_nosotros'] ?? [];
$trabajos = $nosotros_fields['trabajos'] ?? [];
$certificados_g = $nosotros_fields['certificados'] ?? [];
?>

<main id="home" class="bg-dark-50">

    <!-- Hero Banner -->
    <section class="relative h-screen max-h-[500px] flex items-end bg-dark-900">
        <?php $hero_img = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
        <?php if ($hero_img): ?>
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('<?php echo esc_url($hero_img); ?>');">
            </div>
        <?php endif; ?>
        <!-- Overlay oscuro -->
        <div class="absolute inset-0 bg-black/40 pointer-events-none"></div>
        <div class="w-full md:container md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="max-w-xl">
                <span
                    class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="heading-h1 font-bold text-white mb-20 mt-2 uppercase" data-aos="fade-up"
                    data-aos-duration="1000">
                    <?php echo get_the_title(); ?>
                </h1>
            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <?php if ($enc_subtitulo || $enc_descripcion): ?>
        <section class="py-12 lg:py-16 bg-gray-50" id="challenge">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="max-w-4xl mx-auto text-center">
                    <?php if ($enc_subtitulo): ?>
                        <p class="text-sm text-gray-500 uppercase tracking-wider mb-4" data-aos="fade-down">
                            <?php echo wp_kses_post($enc_subtitulo); ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($enc_descripcion): ?>
                        <p class="leading-relaxed mb-0 md:text-xl text-base font-medium tracking-[-0.08px]" data-aos="fade-up"
                            data-aos-delay="100">
                            <?php echo wp_kses_post($enc_descripcion); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Timeline Section -->
    <?php if (!empty($sucesos)):
        $timeline_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="w-5 h-5 min-w-5" viewBox="0 0 24 24" fill="none">
        <g clip-path="url(#clip0_2460_5954)">
            <path d="M13.1629 2.16709L21.1839 7.99509C21.8779 8.49909 22.1679 9.39209 21.9029 10.2071L18.8389 19.6371C18.7098 20.0344 18.4583 20.3806 18.1204 20.6262C17.7825 20.8717 17.3756 21.004 16.9579 21.0041H7.04186C6.62415 21.004 6.21719 20.8717 5.87928 20.6262C5.54138 20.3806 5.28989 20.0344 5.16086 19.6371L2.09686 10.2071C1.96771 9.8097 1.96771 9.38162 2.09688 8.98424C2.22605 8.58686 2.47774 8.24059 2.81586 7.99509L10.8369 2.16709C11.1749 1.9214 11.582 1.78906 11.9999 1.78906C12.4177 1.78906 12.8249 1.9214 13.1629 2.16709Z"
                stroke="#E60000" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10 10L12 8V16" stroke="#E60000" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
        </g>
        <defs><clipPath id="clip0_2460_5954"><rect width="24" height="24" fill="white"/></clipPath></defs>
    </svg>';

        $fila_top = [];
        $fila_bottom = [];
        foreach ($sucesos as $i => $suceso) {
            if ($i % 2 === 0)
                $fila_top[] = $suceso;
            else
                $fila_bottom[] = $suceso;
        }
        ?>
        <section class="bg-[#EEE] py-14 overflow-hidden">
            <div class="container mx-auto px-4 md:px-8">

                <!-- MOBILE: lista vertical simple -->
                <div class="flex flex-col gap-4 lg:hidden">
                    <?php foreach ($sucesos as $i => $item):
                        $item_titulo = $item['titulo'] ?? '';
                        $item_desc = $item['descripcion'] ?? '';
                        if (!$item_titulo && !$item_desc)
                            continue;
                        ?>
                        <div class="flex gap-3 items-start" data-aos="fade-up" data-aos-delay="<?php echo ($i + 1) * 100; ?>">
                            <!-- Línea vertical izquierda -->
                            <div class="flex flex-col items-center pt-1 flex-shrink-0">
                                <div class="w-2 h-2 rounded-full bg-[#E60000] flex-shrink-0"></div>
                                <?php if ($i < count($sucesos) - 1): ?>
                                    <div class="w-px flex-1 min-h-[40px] bg-gray-300 mt-1"></div>
                                <?php endif; ?>
                            </div>
                            <!-- Card -->
                            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 flex-1 mb-2">
                                <?php if ($item_titulo): ?>
                                    <div class="flex items-start gap-2 mb-2 font-bold text-[#1A1A1A]">
                                        <?php echo $timeline_icon; ?>
                                        <span><?php echo wp_kses_post($item_titulo); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if ($item_desc): ?>
                                    <p class="text-sm leading-relaxed text-gray-600">
                                        <?php echo wp_kses_post($item_desc); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- DESKTOP: timeline horizontal interactivo -->
                <div class="hidden lg:block">
                    <div class="timeline-cinematic" data-timeline>
                        <div class="timeline-cinematic__line"></div>
                        <div class="timeline-cinematic__progress" data-timeline-progress></div>

                        <div class="swiper timelineSwiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($sucesos as $i => $item):
                                    $item_titulo = $item['titulo'] ?? '';
                                    $item_desc = $item['descripcion'] ?? '';
                                    if (!$item_titulo && !$item_desc)
                                        continue;
                                    $pos = ($i % 2 === 0) ? 'top' : 'bottom';
                                    ?>
                                    <div class="swiper-slide timeline-slide timeline-slide--<?php echo $pos; ?>"
                                        data-index="<?php echo $i; ?>">
                                        <div class="timeline-card timeline-card--<?php echo $pos; ?>">
                                            <div class="timeline-card__connector"></div>
                                            <div class="timeline-card__body">
                                                <?php if ($item_titulo): ?>
                                                    <div class="timeline-card__head">
                                                        <?php echo $timeline_icon; ?>
                                                        <span
                                                            class="timeline-card__title"><?php echo wp_kses_post($item_titulo); ?></span>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($item_desc): ?>
                                                    <p class="timeline-card__desc"><?php echo wp_kses_post($item_desc); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="timeline-node">
                                            <span class="timeline-node__pulse"></span>
                                            <span class="timeline-node__dot"></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="timeline-cinematic__controls">
                            <button type="button" class="timeline-ctrl timeline-ctrl--prev" aria-label="Anterior">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                                    <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                            <button type="button" class="timeline-ctrl timeline-ctrl--next" aria-label="Siguiente">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                                    <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <style>
            .timeline-cinematic {
                position: relative;
                padding: 40px 0 40px;
                min-height: 520px;
            }

            .timeline-cinematic__line {
                position: absolute;
                left: 0;
                right: 0;
                top: 50%;
                height: 1px;
                background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, .18) 8%, rgba(0, 0, 0, .18) 92%, rgba(0, 0, 0, 0) 100%);
                transform: translateY(-50%);
                pointer-events: none;
                z-index: 1;
            }

            .timeline-cinematic__progress {
                position: absolute;
                left: 0;
                top: 50%;
                height: 2px;
                width: 0;
                background: linear-gradient(to right, #E60000, #FF4D4D);
                transform: translateY(-50%);
                transition: width .6s cubic-bezier(.25, .46, .45, .94);
                box-shadow: 0 0 12px rgba(230, 0, 0, .35);
                pointer-events: none;
                z-index: 2;
            }

            .timelineSwiper {
                position: relative;
                overflow: visible;
                z-index: 3;
            }

            .timelineSwiper .swiper-wrapper {
                align-items: center;
            }

            .timeline-slide {
                width: 260px !important;
                height: 440px;
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Card */
            .timeline-card {
                position: absolute;
                left: 50%;
                transform: translateX(-50%) translateY(8px) scale(.92);
                width: 240px;
                opacity: 0;
                transition: opacity .55s cubic-bezier(.25, .46, .45, .94),
                    transform .55s cubic-bezier(.25, .46, .45, .94);
                pointer-events: none;
                z-index: 4;
            }

            .timeline-card--top {
                bottom: calc(50% + 36px);
            }

            .timeline-card--bottom {
                top: calc(50% + 36px);
            }

            .timeline-card__body {
                background: #fff;
                padding: 18px 18px 16px;
                border-radius: 12px;
                box-shadow: 0 18px 40px -18px rgba(15, 15, 15, .18), 0 2px 6px rgba(15, 15, 15, .04);
                border: 1px solid rgba(0, 0, 0, .04);
                position: relative;
            }

            .timeline-card__connector {
                position: absolute;
                left: 50%;
                width: 1px;
                background: linear-gradient(to bottom, rgba(230, 0, 0, .5), rgba(230, 0, 0, 0));
                transform: translateX(-50%);
            }

            .timeline-card--top .timeline-card__connector {
                top: 100%;
                height: 32px;
                background: linear-gradient(to bottom, rgba(230, 0, 0, 0), rgba(230, 0, 0, .5));
            }

            .timeline-card--bottom .timeline-card__connector {
                bottom: 100%;
                height: 32px;
                background: linear-gradient(to top, rgba(230, 0, 0, 0), rgba(230, 0, 0, .5));
            }

            .timeline-card__head {
                display: flex;
                align-items: flex-start;
                gap: 8px;
                margin-bottom: 8px;
                font-weight: 600;
                color: #1A1A1A;
            }

            .timeline-card__title {
                line-height: 1.3;
                font-size: .95rem;
            }

            .timeline-card__desc {
                font-size: .82rem;
                line-height: 1.55;
                color: #4a4a4a;
                margin: 0;
            }

            /* Revealed state — card aparece al avanzar el timeline */
            .timeline-slide.is-revealed .timeline-card {
                opacity: 1;
                transform: translateX(-50%) translateY(0) scale(1);
                pointer-events: auto;
            }

            /* Active emphasis — el slide actual resalta ligeramente */
            .timeline-slide.is-active .timeline-card .timeline-card__body {
                box-shadow: 0 22px 50px -18px rgba(230, 0, 0, .28), 0 2px 6px rgba(15, 15, 15, .06);
                border-color: rgba(230, 0, 0, .18);
            }

            /* Node */
            .timeline-node {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                width: 26px;
                height: 26px;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 5;
            }

            .timeline-node__dot {
                width: 12px;
                height: 12px;
                border-radius: 9999px;
                background: #ff4d4d;
                border: 3px solid #fff;
                box-shadow: 0 1px 4px rgba(0, 0, 0, .15);
                transition: background .35s ease, transform .35s ease, box-shadow .35s ease;
                position: relative;
                z-index: 2;
            }

            .timeline-node__pulse {
                position: absolute;
                inset: 0;
                border-radius: 9999px;
                background: rgba(230, 0, 0, .35);
                opacity: 0;
                transform: scale(.6);
                z-index: 1;
            }

            .timeline-slide.is-active .timeline-node__dot {
                background: #E60000;
                transform: scale(1.15);
                box-shadow: 0 0 0 4px rgba(230, 0, 0, .12);
            }

            .timeline-slide.is-active .timeline-node__pulse {
                animation: timelinePulse 1.8s ease-out infinite;
            }

            @keyframes timelinePulse {
                0% {
                    opacity: .55;
                    transform: scale(.6);
                }

                70% {
                    opacity: 0;
                    transform: scale(2.4);
                }

                100% {
                    opacity: 0;
                    transform: scale(2.4);
                }
            }

            /* Controles */
            .timeline-cinematic__controls {
                position: absolute;
                right: 0;
                bottom: -8px;
                display: flex;
                gap: 8px;
                z-index: 6;
            }

            .timeline-ctrl {
                width: 52px;
                height: 52px;
                border-radius: 9999px;
                border: 1px solid rgba(0, 0, 0, .12);
                background: #fff;
                color: #1A1A1A;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                box-shadow: 0 8px 20px -10px rgba(0, 0, 0, .25);
                transition: background .25s ease, color .25s ease, border-color .25s ease, transform .25s ease, box-shadow .25s ease;
            }

            .timeline-ctrl svg {
                width: 28px;
                height: 28px;
                display: block;
            }

            .timeline-ctrl svg path {
                stroke-width: 2.5;
            }

            .timeline-ctrl:hover {
                background: #E60000;
                color: #fff;
                border-color: #E60000;
                transform: translateY(-2px);
            }

            .timeline-ctrl:disabled {
                opacity: .35;
                cursor: not-allowed;
                transform: none;
                background: #fff;
                color: #1A1A1A;
                border-color: rgba(0, 0, 0, .12);
            }

            @media (prefers-reduced-motion: reduce) {

                .timeline-card,
                .timeline-node__dot,
                .timeline-cinematic__progress {
                    transition: none !important;
                }

                .timeline-node__pulse {
                    animation: none !important;
                }
            }
        </style>

        <script>
            (function () {
                function initTimeline() {
                    if (typeof Swiper === 'undefined') return;
                    var root = document.querySelector('[data-timeline]');
                    if (!root) return;

                    var el = root.querySelector('.timelineSwiper');
                    var slides = root.querySelectorAll('.timeline-slide');
                    var progressBar = root.querySelector('[data-timeline-progress]');
                    var btnPrev = root.querySelector('.timeline-ctrl--prev');
                    var btnNext = root.querySelector('.timeline-ctrl--next');
                    if (!el || !slides.length) return;

                    var total = slides.length;
                    var swiper = new Swiper(el, {
                        slidesPerView: 'auto',
                        centeredSlides: true,
                        speed: 700,
                        grabCursor: true,
                        freeMode: false,
                        autoplay: {
                            delay: 2600,
                            disableOnInteraction: false,
                            pauseOnMouseEnter: true,
                        },
                        navigation: {
                            nextEl: '.timeline-ctrl--next',
                            prevEl: '.timeline-ctrl--prev',
                        },
                        keyboard: { enabled: true, onlyInViewport: true },
                        mousewheel: { forceToAxis: true, sensitivity: 0.6, thresholdDelta: 25 },
                        on: {
                            init: function () { updateState(this); },
                            slideChange: function () { updateState(this); },
                            reachEnd: function () {
                                if (this.autoplay && this.autoplay.running) this.autoplay.stop();
                                switchToManualMode();
                            },
                        }
                    });

                    function updateState(instance) {
                        var sw = instance || swiper;
                        if (!sw) return;
                        var activeIndex = typeof sw.realIndex === 'number' ? sw.realIndex : 0;
                        slides.forEach(function (slide, i) {
                            slide.classList.toggle('is-active', i === activeIndex);
                            if (i <= activeIndex) slide.classList.add('is-revealed');
                        });
                        if (progressBar && total > 1) {
                            var pct = (activeIndex / (total - 1)) * 100;
                            progressBar.style.width = pct + '%';
                        }
                    }

                    // Asegurar el primer globo visible aunque init ya disparó
                    if (slides[0]) {
                        slides[0].classList.add('is-active', 'is-revealed');
                    }

                    var manualEngaged = false;
                    function switchToManualMode() {
                        if (manualEngaged) return;
                        manualEngaged = true;
                        if (swiper.autoplay && swiper.autoplay.running) swiper.autoplay.stop();
                        swiper.params.freeMode = true;
                        swiper.freeMode && swiper.freeMode.enable && swiper.freeMode.enable();
                    }

                    ['touchstart', 'wheel', 'pointerdown'].forEach(function (evt) {
                        el.addEventListener(evt, switchToManualMode, { passive: true, once: true });
                    });
                    btnPrev && btnPrev.addEventListener('click', switchToManualMode, { once: true });
                    btnNext && btnNext.addEventListener('click', switchToManualMode, { once: true });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initTimeline);
                } else {
                    initTimeline();
                }
            })();
        </script>
    <?php endif; ?>

    <!-- Map / Presencia Section -->
    <?php
    $has_presencia = $pres_titulo || $pres_descripcion || $pres_texto_1 || !empty($pres_lista_1)
        || $pres_texto_2 || !empty($pres_lista_2) || !empty($pres_imagen['url']);
    ?>
    <?php if ($has_presencia): ?>
        <section class="bg-dark-50 px-6 md:px-24 pt-12 lg:pt-16 overflow-hidden">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="space-y-8">

                    <?php if ($pres_titulo || $pres_descripcion): ?>
                        <header class="space-y-4">
                            <?php if ($pres_titulo): ?>
                                <h2 class="heading-h2 font-medium text-gray-900">
                                    <?php echo wp_kses_post($pres_titulo); ?>
                                </h2>
                            <?php endif; ?>
                            <?php if ($pres_descripcion): ?>
                                <p class="text-gray-600 text-lg leading-relaxed max-w-lg">
                                    <?php echo wp_kses_post($pres_descripcion); ?>
                                </p>
                            <?php endif; ?>
                        </header>
                    <?php endif; ?>

                    <?php if ($pres_texto_1 || !empty($pres_lista_1) || $pres_texto_2 || !empty($pres_lista_2)): ?>
                        <div class="grid grid-cols-2 gap-8">

                            <?php if ($pres_texto_1 || !empty($pres_lista_1)): ?>
                                <div>
                                    <?php if ($pres_texto_1): ?>
                                        <h3 class="heading-h3 font-medium mb-4 text-gray-900">
                                            <?php echo wp_kses_post($pres_texto_1); ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if (!empty($pres_lista_1)): ?>
                                        <ul class="space-y-2 text-gray-600 pl-4">
                                            <?php foreach ($pres_lista_1 as $row):
                                                $item_val = $row['item'] ?? '';
                                                if (!$item_val)
                                                    continue;
                                                ?>
                                                <li><?php echo wp_kses_post($item_val); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($pres_texto_2 || !empty($pres_lista_2)): ?>
                                <div>
                                    <?php if ($pres_texto_2): ?>
                                        <h3 class="heading-h3 font-medium mb-4 text-gray-900">
                                            <?php echo wp_kses_post($pres_texto_2); ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if (!empty($pres_lista_2)): ?>
                                        <ul class="space-y-2 text-gray-600 pl-4">
                                            <?php foreach ($pres_lista_2 as $row):
                                                $item_val = $row['item'] ?? '';
                                                if (!$item_val)
                                                    continue;
                                                ?>
                                                <li><?php echo wp_kses_post($item_val); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>

                </div>

                <!-- Imagen del mapa -->
                <?php if (!empty($pres_imagen['url'])): ?>
                    <div class="relative w-full max-w-2xl mx-auto overflow-hidden">
                        <img src="<?php echo esc_url($pres_imagen['url']); ?>"
                            alt="<?php echo esc_attr($pres_imagen['alt'] ?? 'Mapa'); ?>" class="w-full h-auto block">

                        <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 500 700"
                            preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <filter id="glow-line" x="-20%" y="-20%" width="140%" height="140%">
                                    <feGaussianBlur stdDeviation="3" result="blur" />
                                    <feComposite in="SourceGraphic" in2="blur" operator="over" />
                                </filter>
                                <linearGradient id="lineGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#FF0000" stop-opacity="0.2" />
                                    <stop offset="100%" stop-color="#FF0000" stop-opacity="1" />
                                </linearGradient>
                            </defs>
                            <path id="route" d="M220,180 Q250,250 210,320 T230,450 T320,580" stroke="url(#lineGradient)"
                                stroke-width="3" fill="none" stroke-linecap="round" stroke-dasharray="1000"
                                stroke-dashoffset="1000" filter="url(#glow-line)" class="animate-draw-path" />
                            <g class="node animate-pop-in" style="animation-delay: 0.2s;">
                                <circle cx="220" cy="180" r="5" fill="#FF0000" />
                                <circle cx="220" cy="180" r="12" stroke="#FF0000" stroke-width="2" fill="none"
                                    class="animate-ping-slow" />
                            </g>
                            <g class="node animate-pop-in" style="animation-delay: 1.5s;">
                                <circle cx="210" cy="320" r="5" fill="#FF0000" />
                                <circle cx="210" cy="320" r="10" stroke="#FF0000" stroke-width="1.5" fill="none"
                                    class="animate-ping-slow" />
                            </g>
                            <g class="node animate-pop-in" style="animation-delay: 3s;">
                                <circle cx="320" cy="580" r="6" fill="#FF0000" />
                                <circle cx="320" cy="580" r="15" stroke="#FF0000" stroke-width="2" fill="none"
                                    class="animate-ping-slow" />
                            </g>
                        </svg>
                    </div>
                <?php endif; ?>

            </div>
        </section>
    <?php endif; ?>

    <!-- Counters Section -->
    <?php if (!empty($contadores)): ?>
        <?php
        get_template_part('inc/componentes/section-counters', null, array(
            'counters' => array_map(function ($c) {
                return array(
                    'number' => $c['numero'] ?? '',
                    'prefix' => $c['prefijo'] ?? '',
                    'suffix' => $c['sufijo'] ?? '',
                    'label' => $c['descripcion'] ?? '',
                );
            }, $contadores),
        ));
        ?>
    <?php endif; ?>

    <!-- SECCIÓN TRABAJA CON NOSOTROS -->
    <?php if (!empty($sobre_nosotros) || !empty($trabajos)): ?>
        <?php get_template_part('inc/componentes/section-trabaja-con-nosotros', null, array(
            'sobre_nosotros' => $sobre_nosotros,
            'trabajos' => $trabajos,
        )); ?>
    <?php endif; ?>

    <!-- SECCION CLIENTES -->
    <?php get_template_part('inc/componentes/section-clientes'); ?>

    <!-- SECCION CERTIFICADOS -->

    <!-- SECCIÓN FAQS -->

</main>

<?php get_footer(); ?>
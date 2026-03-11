<?php

/**
 * Componente: Barra de navegación de botones con animación bubble estilo Framer Motion
 * VERSIÓN: Sin detección automática de scroll
 *
 * Args esperados:
 * $args['buttons'] = array(
 *    array(
 *      'label' => 'Texto',
 *      'url'   => '#anchor',
 *      'style' => 'btn-primary' | 'btn-outline-white',
 *      'delay' => 100
 *    )
 * )
 */

$buttons = $args['buttons'] ?? null;

if (empty($buttons))
    return;

$component_id = 'scroll-buttons-' . uniqid();
?>

<style>
    .animated-bubble {
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        pointer-events: none;
        top: 50%;
        transform: translateY(-50%);
        height: calc(100% - 1rem);
    }

    .animated-nav-btn {
        padding: 0.35rem 1rem;
        font-size: 0.75rem;
        min-width: 40px;
    }

    /* Desktop: texto inactivo atenuado */
    @media (min-width: 768px) {
        .animated-nav-btn {
            border: none !important;
            background-color: transparent !important;
            color: white;
            transition: color 0.3s ease;
            font-size: 0.8rem;
        }

        .animated-nav-btn.active,
        .animated-nav-btn:hover {
            background-color: transparent !important;
            border: none !important;
            color: white;
        }
    }

    @media (max-width: 767px) {
        .animated-nav-btn {
            border: none !important;
            background-color: transparent !important;
            color: white;
            min-height: 30px;
        }

        .animated-nav-btn.active {
            background-color: #FF4D4D !important;
            color: white !important;
            border: none !important;
        }

        /* Eliminar hover en mobile completamente */
        .animated-nav-btn:hover {
            background-color: transparent !important;
            color: rgba(255, 255, 255, 0.5) !important;
        }

        .animated-nav-btn.active:hover {
            background-color: #FF4D4D !important;
            color: white !important;
        }
    }

    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
</style>

<section class="relative bg-[#1a1a1a]" id="<?php echo esc_attr($component_id); ?>">
    <div class="container-full mx-auto !px-0 md:!px-4">
        <div
            class="relative flex flex-nowrap gap-1 p-2 lg:justify-center lg:overflow-visible overflow-x-auto overflow-y-hidden hide-scrollbar">

            <!-- Bubble (solo desktop) — sin mix-blend-difference -->
            <span class="animated-bubble absolute bg-primary rounded-full z-0 opacity-0 hidden md:block"
                id="<?php echo esc_attr($component_id); ?>-bubble">
            </span>

            <?php foreach ($buttons as $index => $button):
                $btn_url = $button['url'] ?? null;
                if (empty($btn_url))
                    continue;
                $delay = $button['delay'] ?? ($index + 1) * 100;
                $btn_id = $component_id . '-btn-' . $index;
                ?>
                <a href="<?php echo esc_url($btn_url); ?>" id="<?php echo esc_attr($btn_id); ?>" class="animated-nav-btn relative rounded-full cursor-pointer
           whitespace-nowrap no-underline inline-flex items-center shrink-0 z-10
           outline-none focus-visible:outline-2 focus-visible:outline-primary focus-visible:outline-offset-2
           <?php echo esc_attr($button['style'] ?? ''); ?>
           <?php echo $index === 0 ? 'active' : ''; ?>" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                    data-aos-delay="<?php echo esc_attr($delay); ?>" style="-webkit-tap-highlight-color: transparent;">
                    <?php if (!empty($button['label'])): ?>
                        <?php echo esc_html($button['label']); ?>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    (function () {
        const componentId = '<?php echo esc_attr($component_id); ?>';
        const container = document.getElementById(componentId);
        if (!container) return;

        const bubble = document.getElementById(componentId + '-bubble');
        const buttons = container.querySelectorAll('.animated-nav-btn');
        const scrollContainer = container.querySelector('div > div');
        const isMobile = window.innerWidth < 768;

        let activeButton = null;

        if (isMobile) {
            buttons.forEach(btn => {
                btn.removeAttribute('data-aos');
                btn.removeAttribute('data-aos-delay');
                btn.style.opacity = '1';
                btn.style.transform = 'none';
            });
        }

        // Mover el bubble a un botón específico (solo desktop)
        function moveBubbleTo(button) {
            if (!button || !bubble || isMobile) return;

            const rect = button.getBoundingClientRect();
            const containerRect = scrollContainer.getBoundingClientRect();

            const left = rect.left - containerRect.left + scrollContainer.scrollLeft;
            const width = rect.width;

            bubble.style.width = width + 'px';
            bubble.style.left = left + 'px';
            bubble.style.transform = 'translateY(-50%)'; // el top:50% ya está en CSS
            bubble.style.opacity = '1';
        }

        // Centrar el botón en el contenedor scrollable (mobile)
        function scrollButtonIntoView(button) {
            if (!button || !scrollContainer || !isMobile) return;

            const buttonRect = button.getBoundingClientRect();
            const containerRect = scrollContainer.getBoundingClientRect();
            const scrollLeft = scrollContainer.scrollLeft;

            // Calcular la posición para centrar el botón
            const buttonCenter = buttonRect.left - containerRect.left + scrollLeft + (buttonRect.width / 2);
            const containerCenter = containerRect.width / 2;
            const scrollTo = buttonCenter - containerCenter;

            scrollContainer.scrollTo({
                left: scrollTo,
                behavior: 'smooth'
            });
        }

        // Establecer botón activo
        function setActiveButton(button) {
            if (activeButton === button) return;

            buttons.forEach(btn => btn.classList.remove('active'));

            if (button) {
                button.classList.add('active');

                if (isMobile) {
                    scrollButtonIntoView(button);
                    // Nada más — sin bubble, sin animaciones
                } else {
                    moveBubbleTo(button);
                }
            }

            activeButton = button;
        }

        // Click en botones - smooth scroll
        // Click en botones - smooth scroll
        buttons.forEach(button => {
            button.addEventListener('click', (e) => {
                const href = button.getAttribute('href');
                if (href && href.startsWith('#')) {
                    e.preventDefault();
                    setActiveButton(button);

                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });

            // Hover SOLO desktop
            if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
                button.addEventListener('mouseenter', () => {
                    if (button !== activeButton) moveBubbleTo(button);
                });
            }
        });

        // Restaurar bubble al botón activo cuando el mouse sale (solo desktop)
        if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
            scrollContainer.addEventListener('mouseleave', () => {
                if (activeButton) {
                    moveBubbleTo(activeButton);
                }
            });
        }

        // Ajustar posición del bubble en resize (solo desktop)
        window.addEventListener('resize', () => {
            if (activeButton && !isMobile) {
                moveBubbleTo(activeButton);
            }
        }, {
            passive: true
        });

        // Establecer primer botón como activo inicialmente
        if (buttons.length > 0) {
            // Esperar a que el DOM esté completamente renderizado
            requestAnimationFrame(() => {
                setActiveButton(buttons[0]);
            });
        }
    })();
</script>
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

$buttons = $args['buttons'] ?? [];

if (empty($buttons))
    return;

$component_id = 'scroll-buttons-' . uniqid();
?>

<style>
    /* Solo estilos que no se pueden hacer con Tailwind */
    .animated-bubble {
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        pointer-events: none;
    }

    /* Active state para desktop (con bubble) */
    @media (min-width: 768px) {
        .animated-nav-btn.active {
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }
    }

    /* Active state para mobile (fondo rojo) */
    @media (max-width: 767px) {
        .animated-nav-btn.active {
            background-color: #dc2626 !important;
            transition: background-color 0.3s ease;
        }
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animated-nav-btn[data-aos] {
        animation: fadeUp 0.6s ease-out backwards;
    }

    /* Hide scrollbar pero mantener funcionalidad */
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
            class="relative flex gap-1 p-2 lg:justify-center lg:overflow-visible overflow-x-auto overflow-y-hidden hide-scrollbar">
            <!-- Bubble que se mueve (solo desktop) -->
            <span
                class="animated-bubble absolute inset-0 bg-primary mix-blend-difference rounded-full z-0 my-2 opacity-0 hidden md:block"
                id="<?php echo esc_attr($component_id); ?>-bubble"></span>

            <?php foreach ($buttons as $index => $button):
                $delay = $button['delay'] ?? ($index + 1) * 100;
                $btn_id = $component_id . '-btn-' . $index;
                ?>
                <a href="<?php echo esc_url($button['url']); ?>" id="<?php echo esc_attr($btn_id); ?>"
                    class="animated-nav-btn relative px-4 py-2 text-xs md:text-sm font-medium !text-white bg-transparent border-0 rounded-full cursor-pointer transition-colors duration-300 whitespace-nowrap no-underline inline-block z-10 outline-none hover:text-white focus-visible:outline-2 focus-visible:outline-primary focus-visible:outline-offset-2 <?php echo $index === 0 ? 'active' : ''; ?>"
                    data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                    data-aos-delay="<?php echo esc_attr($delay); ?>"
                    style="animation-delay: <?php echo esc_attr($delay); ?>ms; -webkit-tap-highlight-color: transparent;">
                    <?php echo esc_html($button['label']); ?>
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

        // Mover el bubble a un botón específico (solo desktop)
        function moveBubbleTo(button) {
            if (!button || !bubble || isMobile) return;

            const rect = button.getBoundingClientRect();
            const containerRect = scrollContainer.getBoundingClientRect();

            const left = rect.left - containerRect.left;
            const width = rect.width;
            const height = rect.height;

            bubble.style.width = width + 'px';
            bubble.style.height = 'auto';
            bubble.style.transform = `translateX(${left}px)`;
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

            // Remover clase active de todos
            buttons.forEach(btn => btn.classList.remove('active'));

            // Agregar clase active al nuevo
            if (button) {
                button.classList.add('active');

                if (isMobile) {
                    // En mobile, centrar el botón en la sección
                    scrollButtonIntoView(button);
                } else {
                    // En desktop, mover el bubble
                    moveBubbleTo(button);
                }
            }

            activeButton = button;
        }

        // Click en botones - smooth scroll
        buttons.forEach(button => {
            button.addEventListener('click', (e) => {
                const href = button.getAttribute('href');
                if (href && href.startsWith('#')) {
                    e.preventDefault();

                    const target = document.querySelector(href);
                    if (target) {
                        // Actualizar inmediatamente el botón activo
                        setActiveButton(button);

                        // Smooth scroll a la sección target
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });

            // Hover effect solo en desktop (dispositivos con puntero fino)
            if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
                button.addEventListener('mouseenter', () => {
                    if (button !== activeButton) {
                        moveBubbleTo(button);
                    }
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
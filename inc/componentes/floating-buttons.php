<?php

/**
 * Componente de Botones Flotantes
 */
?>

<div class="fixed right-4 top-1/2 -translate-y-1/2 z-[90] flex flex-col gap-3 items-end">
    <!-- Botón Cotizador (oculto en la página cotizador) -->
    <?php if (!is_page_template('inc/template-cotizador.php')): ?>
        <div class="relative">
            <!-- Globo de mensaje estilo WhatsApp -->
            <div id="cotizador-tooltip"
                class="absolute right-full top-1/2 -translate-y-1/2 mr-3 whitespace-nowrap bg-white text-dark-900 pl-4 pr-8 py-2 rounded-lg shadow-lg text-sm font-medium animate-bounce-slow opacity-0 invisible transition-opacity duration-300 hidden md:block">
                ¡Cotiza aquí tu solución!
                <button id="cotizador-tooltip-close" type="button" aria-label="Cerrar mensaje"
                    class="absolute z-50 -top-2 -right-2 w-6 h-6 rounded-full bg-gray-200 hover:bg-gray-300 text-dark-900 flex items-center justify-center shadow-md transition-colors duration-200 cursor-pointer leading-none p-0 border-0">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2L10 10M10 2L2 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
                <span
                    class="absolute top-1/2 -translate-y-1/2 left-full w-0 h-0 border-y-8 border-y-transparent border-l-8 border-l-white"></span>
            </div>

            <button id="floating-open-cotizador"
                class="w-14 h-14 bg-primary rounded-md shadow-lg flex items-center border-0 justify-center hover:bg-red-600 hover:scale-110 transition-all group duration-300 cursor-pointer">
                <svg class="text-white" width="21" height="30" viewBox="0 0 21 30" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.5 12.9847C9.66348 13.2079 9.888 13.3657 10.1395 13.4342C10.708 13.5978 11.2675 13.3103 11.3893 12.7925C11.511 12.2742 11.071 11.7092 10.5027 11.5453C9.9345 11.3814 9.49425 10.8167 9.616 10.2986C9.73775 9.78056 10.297 9.49333 10.8655 9.65694C11.111 9.7225 11.333 9.87722 11.5 10.0992M10.5303 13.48V14M10.5303 9V9.61111"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M17.4565 3H18.5C19.6046 3 20.5 3.89543 20.5 5V27C20.5 28.1046 19.6046 29 18.5 29H2.5C1.39543 29 0.5 28.1046 0.5 27V5C0.5 3.89543 1.39543 3 2.5 3H4.41304"
                        stroke="currentColor" stroke-linecap="round" />
                    <path d="M6.375 20H14.625M16.5 25H4.5" stroke="currentColor" stroke-linecap="round" />
                    <rect x="5.5" y="2" width="11" height="3" rx="0.6" fill="currentColor" />
                    <path
                        d="M8.32725 0.302317C8.43407 0.115372 8.63288 0 8.84819 0H13.6518C13.8671 0 14.0659 0.115372 14.1728 0.302317L15.487 2.60232C15.7156 3.00231 15.4268 3.5 14.9661 3.5H7.53391C7.07321 3.5 6.78439 3.00231 7.01296 2.60232L8.32725 0.302317Z"
                        fill="currentColor" />
                </svg>
            </button>
        </div>
    <?php endif; ?>

    <!-- Botón Scroll to Top -->
    <button id="scroll-to-top"
        class="w-14 h-14 bg-primary rounded-md shadow-lg flex items-center justify-center border-0 hover:bg-red-600 hover:scale-110 opacity-0 invisible translate-y-10 transition-all duration-300 group cursor-pointer">
        <svg class="text-white" width="30" height="30" viewBox="0 0 30 30" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M6.5 14.5L14.5 6.5M14.5 6.5L22.5 14.5M14.5 6.5V28.5M0.5 0.5H28.5" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</div>

<style>
    @keyframes cotizador-bounce {

        0%,
        100% {
            transform: translateY(-50%) translateX(0);
        }

        50% {
            transform: translateY(-50%) translateX(-6px);
        }
    }

    .animate-bounce-slow {
        animation: cotizador-bounce 1.8s ease-in-out infinite;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tooltip = document.getElementById('cotizador-tooltip');
        const closeBtn = document.getElementById('cotizador-tooltip-close');
        if (!tooltip || !closeBtn) return;

        if (sessionStorage.getItem('cotizadorTooltipDismissed') === '1') {
            tooltip.style.display = 'none';
            return;
        }

        let tooltipInterval;

        function showTooltip() {
            if (sessionStorage.getItem('cotizadorTooltipDismissed') === '1') return;
            tooltip.classList.remove('opacity-0', 'invisible');
            
            // Hide after 6 seconds
            setTimeout(() => {
                hideTooltip();
            }, 6000);
        }

        function hideTooltip() {
            tooltip.classList.add('opacity-0', 'invisible');
        }

        closeBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            hideTooltip();
            sessionStorage.setItem('cotizadorTooltipDismissed', '1');
            if (tooltipInterval) clearInterval(tooltipInterval);
            setTimeout(() => {
                tooltip.style.display = 'none';
            }, 300); // Wait for transition
        });

        // Initial delay then interval
        setTimeout(() => {
            showTooltip();
            // Repeat every 20 seconds
            tooltipInterval = setInterval(showTooltip, 20000);
        }, 3000);
    });
</script>
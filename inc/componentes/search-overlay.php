<?php

/**
 * Component: Search Overlay
 */
?>

<div id="search-overlay"
    class="fixed inset-0 z-[200] invisible opacity-0 transition-opacity duration-300 pointer-events-none">
    <!-- Blurry Background Overlay -->
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm pointer-events-auto" id="search-overlay-blur"></div>

    <!-- Search Container (Full width, top-aligned) -->
    <div id="search-modal-container"
        class="absolute top-0 left-0 w-full bg-white shadow-2xl transition-transform duration-500 ease-out transform -translate-y-full pointer-events-auto">
        <div
            class="w-full max-w-[1200px] mx-auto px-6 pt-20 pb-10 md:pt-24 md:pb-16 relative max-h-[600px] overflow-y-auto">

            <!-- Close Button -->
            <button id="search-close"
                class="absolute top-6 right-6 text-gray-400 hover:text-primary transition-all p-2 bg-transparent border-none cursor-pointer z-[210]">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Search Input Wrapper -->
            <div class="max-w-4xl mx-auto">
                <div class="relative mb-6 md:mb-8 group">
                    <!-- Icon -->
                    <span
                        class="pointer-events-none absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-primary">
                        <svg class="md:w-6 md:h-6 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>

                    <!-- Input -->
                    <input type="search" id="global-search-input" placeholder="¿Qué estás buscando?" autocomplete="off"
                        class="w-full !pl-[3.5rem] !pr-8 py-5 text-md !font-light bg-transparent
           border-b-2 border-gray-200
           focus:border-primary focus:ring-0
           placeholder:text-gray-300 
           transition-all duration-300
           outline-none" />

                    <!-- Clear button (opcional JS) -->
                    <button type="button"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition hidden"
                        aria-label="Limpiar búsqueda" id="clear-search">
                        ✕
                    </button>
                </div>


                <div id="search-initial-content">
                    <!-- Accesorios Rápidos -->
                    <div class="mb-10">
                        <p class="text-sm font-semibold text-gray-900 mb-4">Accesorios Rápidos</p>
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                            <?php for ($i = 0; $i < 4; $i++): ?>
                                <a href="#"
                                    class="group bg-gray-50 hover:bg-white hover:shadow-lg space-y-4 rounded-lg p-4 transition-all duration-300 text-left border border-transparent hover:border-gray-100">
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.5 13.5C16.5 14.61 15.61 15.5 14.5 15.5C13.39 15.5 12.5 14.61 12.5 13.5C12.5 12.39 13.4 11.5 14.5 11.5C15.6 11.5 16.5 12.4 16.5 13.5ZM7.5 11.5C6.4 11.5 5.5 12.4 5.5 13.5C5.5 14.6 6.4 15.5 7.5 15.5C8.6 15.5 9.5 14.61 9.5 13.5C9.5 12.39 8.61 11.5 7.5 11.5ZM22 13V16C22 16.55 21.55 17 21 17H20V18C20 19.11 19.11 20 18 20H4C3.46957 20 2.96086 19.7893 2.58579 19.4142C2.21071 19.0391 2 18.5304 2 18V17H1C0.45 17 0 16.55 0 16V13C0 12.45 0.45 12 1 12H2C2 8.13 5.13 5 9 5H10V3.73C9.4 3.39 9 2.74 9 2C9 0.9 9.9 0 11 0C12.1 0 13 0.9 13 2C13 2.74 12.6 3.39 12 3.73V5H13C16.87 5 20 8.13 20 12H21C21.55 12 22 12.45 22 13ZM20 14H18V12C18 9.24 15.76 7 13 7H9C6.24 7 4 9.24 4 12V14H2V15H4V18H18V15H20V14Z"
                                            fill="#FF4D4D" />
                                    </svg>
                                    <span class="text-sm font-medium text-gray-900 block">Reportar Robo</span>
                                </a>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <!-- Lo más buscado -->
                    <div>
                        <p class="text-sm font-semibold text-gray-900 mb-4">Lo más buscado</p>
                        <div class="flex flex-col gap-2">
                            <?php
                            $trending = ['Control de combustible', 'Monitoreo de presión', 'Sistema de refrigeración', 'Control de temperatura'];
                            foreach ($trending as $item):
                                ?>
                                <a href="#"
                                    class="flex items-center gap-3 text-gray-600 hover:text-primary transition-colors text-sm group">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.6933 3.70516L10.7479 9.21715C9.75585 11.0604 7.33846 8.54319 6.32148 10.522L4.30543 14.2937M13.6933 3.70516L15.1786 8.74068M13.6933 3.70516L8.65783 5.19045"
                                            stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                    <span><?php echo $item; ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- AJAX Results Container -->
                <div id="search-results-container" class="hidden">
                    <div class="flex items-center justify-between mb-8 border-b border-gray-50 pb-4">
                        <p class="text-xs font-semibold text-gray-400 uppercase mb-0">Resultados de búsqueda</p>
                        <button id="clear-search"
                            class="text-xs text-primary font-semibold hover:underline border-none bg-transparent cursor-pointer">LIMPIAR</button>
                    </div>
                    <div id="search-results-list" class="grid sm:grid-cols-2 gap-6 pb-8">
                        <!-- Results will be injected here -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    #search-overlay.active {
        visibility: visible;
        opacity: 1;
        pointer-events: auto;
    }

    #search-overlay.active #search-modal-container {
        transform: translateY(0);
    }
</style>
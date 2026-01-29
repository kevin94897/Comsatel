<?php

/**
 * Component: Search Overlay
 */
?>

<div id="search-overlay" class="fixed inset-0 z-[200] invisible opacity-0 transition-opacity duration-300 pointer-events-none">
    <!-- Blurry Background Overlay -->
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm pointer-events-auto" id="search-overlay-blur"></div>

    <!-- Search Container (Full width, top-aligned) -->
    <div id="search-modal-container" class="absolute top-0 left-0 w-full bg-white shadow-2xl transition-transform duration-500 ease-out transform -translate-y-full pointer-events-auto">
        <div class="w-full max-w-[1200px] mx-auto px-6 py-10 md:py-16 relative max-h-[600px] overflow-y-auto">

            <!-- Close Button -->
            <button id="search-close" class="absolute top-6 right-6 text-gray-400 hover:text-primary transition-all p-2 bg-transparent border-none cursor-pointer z-[210]">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Search Input Wrapper -->
            <div class="max-w-4xl mx-auto">
                <div class="relative mb-8 group">
                    <!-- Icon -->
                    <span class="pointer-events-none absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-primary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>

                    <!-- Input -->
                    <input
                        type="search"
                        id="global-search-input"
                        placeholder="¿Qué estás buscando?"
                        autocomplete="off"
                        class="w-full pl-14 !pr-12 py-5 text-xl font-medium bg-transparent
           border-b-2 border-gray-200
           focus:border-primary focus:ring-0
           placeholder:text-gray-300
           transition-all duration-300
           outline-none" />

                    <!-- Clear button (opcional JS) -->
                    <button
                        type="button"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition hidden"
                        aria-label="Limpiar búsqueda"
                        id="clear-search">
                        ✕
                    </button>
                </div>


                <div id="search-initial-content">
                    <!-- Accesorios Rápidos -->
                    <div class="mb-10">
                        <h3 class="text-md font-semibold text-gray-900 mb-4">Accesorios Rápidos</h3>
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                            <?php for ($i = 0; $i < 4; $i++): ?>
                                <a href="#" class="group bg-gray-50 hover:bg-white hover:shadow-lg rounded-xl p-4 transition-all duration-300 text-center border border-transparent hover:border-gray-100">
                                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform shadow-sm">
                                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900 block">Reportar Robo</span>
                                </a>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <!-- Lo más buscado -->
                    <div>
                        <h3 class="text-md font-semibold text-gray-900 mb-4">Lo más buscado</h3>
                        <div class="flex flex-col gap-2">
                            <?php
                            $trending = ['Control de combustible', 'Monitoreo de presión', 'Sistema de refrigeración', 'Control de temperatura'];
                            foreach ($trending as $item):
                            ?>
                                <a href="#" class="flex items-center gap-3 text-gray-600 hover:text-primary transition-colors text-base group">
                                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
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
                        <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Resultados de búsqueda</h3>
                        <button id="clear-search" class="text-xs text-primary font-semibold hover:underline border-none bg-transparent cursor-pointer">LIMPIAR</button>
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
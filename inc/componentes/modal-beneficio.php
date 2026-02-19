<?php

/**
 * Modal Beneficio Template
 */
?>

<div id="modal-beneficio" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/50 backdrop-blur-sm px-4">
    <div class="bg-white rounded-3xl w-full max-w-3xl overflow-hidden relative shadow-2xl animate-fade-in-up md:p-12 p-8" id="modal-container-beneficio">
        <!-- Close Button -->
        <button id="close-modal-beneficio" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600 transition-colors focus:outline-none border-none bg-transparent">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Content -->
        <div class="text-center">
            <h2 class="text-2xl md:text-4xl font-semibold text-[#1E1E1E] mb-4">
                Accede a tu beneficio <br>
                <span id="benefit-partner-name" class="text-primary">Fiocco</span> + Comsatel
            </h2>
            <p class="text-gray-600 mb-10 max-w-md mx-auto">
                ¡Estamos emocionados de ofrecerte esta especial! Contáctanos para más detalles.
            </p>

            <!-- Llamar Section -->
            <div class="mb-10">
                <h3 class="md:text-2xl text-xl font-semibold text-[#1E1E1E] mb-6">Llamar</h3>
                <div class="space-y-4 max-w-md mx-auto">
                    <a href="tel:(01)2248480" class="flex items-center justify-center gap-3 w-full py-2 border-2 border-gray-200 rounded-full text-gray-800 font-medium hover:border-primary hover:text-primary transition-all group">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Llamar al (01) 2248480
                    </a>
                    <a href="tel:(01)2248480" class="flex items-center justify-center gap-3 w-full py-2 border-2 border-gray-200 rounded-full text-gray-800 font-medium hover:border-primary hover:text-primary transition-all group">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Llamar al (01) 2248480
                    </a>
                    <a href="tel:(01)2248480" class="flex items-center justify-center gap-3 w-full py-2 border-2 border-gray-200 rounded-full text-gray-800 font-medium hover:border-primary hover:text-primary transition-all group">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Llamar al (01) 2248480
                    </a>
                </div>
            </div>

            <!-- Correo Section -->
            <div>
                <h3 class="md:text-2xl text-xl font-semibold text-[#1E1E1E] mb-6">Correo</h3>
                <div class="max-w-md mx-auto">
                    <a href="mailto:contato@comsatel.com.pe" class="flex items-center justify-center gap-3 w-full btn btn-primary font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Enviar correo
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal: Enviar Reporte por Correo -->
<div id="email-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 px-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl transform transition-all">
        <!-- Modal Header -->
        <div class="relative p-8 pb-6 text-center">
            <button id="close-modal" class="absolute top-6 right-6 text-gray-400 hover:text-black transition-colors bg-transparent border-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <h2 class="text-3xl font-medium text-black mb-3">
                Recibe tu ahorro detallado
            </h2>
            <p class="text-gray text-base mb-0">
                Recibe el detalle del cálculo y sugerencias para mejorar productividad y seguridad.
            </p>
        </div>

        <!-- Modal Body -->
        <form id="email-report-form" class="px-8 pb-8 text-center">
            <!-- Nombre -->
            <div class="mb-6">
                <label for="user-name" class="block text-black font-medium mb-3 text-base text-left">
                    Nombre
                </label>
                <input
                    type="text"
                    id="user-name"
                    name="user_name"
                    placeholder="Ej. Ana Torre"
                    required>
            </div>

            <!-- Correo -->
            <div class="mb-6">
                <label for="user-email" class="block text-black font-medium mb-3 text-base text-left">
                    Correo
                </label>
                <input
                    type="email"
                    id="user-email"
                    name="user_email"
                    placeholder="nombre@empresa.com"
                    required>
            </div>

            <!-- Checkbox de consentimiento -->
            <div class="mb-8">
                <label class="flex items-start gap-3 cursor-pointer group">
                    <input
                        type="checkbox"
                        id="consent-checkbox"
                        name="consent"
                        class="mt-1 w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary focus:ring-2 cursor-pointer"
                        required>
                    <span class="text-sm text-gray group-hover:text-gray-800 transition-colors font-normal">
                        Acepto ser contactado para ampliar el análisis.
                    </span>
                </label>
            </div>

            <!-- Botón de envío -->
            <button
                type="submit"
                id="submit-email-report"
                class="btn btn-primary !py-4 !text-base !font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                Enviar reporte por correo
            </button>
        </form>
    </div>
</div>
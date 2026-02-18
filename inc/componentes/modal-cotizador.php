<?php

/**
 * Componente: Modal Cotizador Multi-pasos
 */
?>

<!-- Floating Button (Bottom Left) -->
<div id="cotizador-widget" class="fixed bottom-8 left-8 z-50 flex flex-col items-start gap-4">
    <button id="open-cotizador"
        class="flex items-center justify-center w-16 h-16 p-4 bg-primary text-white rounded-full shadow-lg hover:shadow-xl hover:scale-110 transition-all duration-300 relative group overflow-hidden">
        <span
            class="absolute inset-0 w-full h-full bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300 rounded-full"></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
            <polyline points="14 2 14 8 20 8"></polyline>
            <line x1="16" y1="13" x2="8" y2="13"></line>
            <line x1="16" y1="17" x2="8" y2="17"></line>
            <polyline points="10 9 9 9 8 9"></polyline>
        </svg>
    </button>
</div>

<!-- Modal Container -->
<div id="cotizador-modal"
    class="fixed inset-0 bg-black/60 hidden items-center justify-center z-[60] px-4 backdrop-blur-sm">
    <div
        class="bg-white rounded-3xl max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl transform transition-all relative">

        <!-- Header -->
        <div class="p-8 pb-4 text-center sticky top-0 bg-white z-10">
            <h2 class="text-3xl font-semibold text-dark mb-0">Cotizador</h2>
            <button id="close-cotizador"
                class="absolute top-8 right-8 text-gray-400 hover:text-dark transition-colors bg-transparent border-0 p-0">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Form Content -->
        <form id="cotizador-form" class="p-8 pt-6">

            <!-- STEP 1: Personal Information -->
            <div id="step-1" class="step-container space-y-6">
                <!-- Tipo de Cliente -->
                <div>
                    <label class="flex items-center gap-3 mb-2">
                        <span
                            class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">1</span>
                        <span class="text-base md:text-lg font-medium text-dark">Tipo de cliente</span>
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <label class="relative cursor-pointer group mb-0">
                            <input type="radio" name="tipo_cliente" value="Persona Natural" class="peer sr-only"
                                checked>
                            <div
                                class="md:p-6 p-4 border-2 border-gray-200 rounded-md flex items-center justify-between group-hover:border-primary/30 peer-checked:border-primary peer-checked:bg-primary/5 transition-all">
                                <span class="text-sm md:text-lg font-medium">Persona Natural</span>
                                <svg class="w-10 h-10 text-gray-400 peer-checked:text-primary" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                </svg>
                            </div>
                        </label>
                        <label class="relative cursor-pointer group mb-0">
                            <input type="radio" name="tipo_cliente" value="Empresa" class="peer sr-only">
                            <div
                                class="md:p-6 p-4 border-2 border-gray-200 rounded-md flex items-center justify-between group-hover:border-primary/30 peer-checked:border-primary peer-checked:bg-primary/5 transition-all">
                                <span class="text-sm md:text-lg font-medium">Empresa</span>
                                <svg class="w-10 h-10 text-gray-400 peer-checked:text-primary" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z" />
                                </svg>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Documento -->
                <div>
                    <label class="flex items-center gap-3 mb-2">
                        <span
                            class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-md bg-gray-100 text-dark font-medium text-sm">2</span>
                        <span class="text-base md:text-lg font-medium text-dark">Nro de documento</span>
                    </label>

                    <div
                        class="document-input-group flex border border-gray-200 rounded-md overflow-hidden focus-within:border-primary transition-colors">
                        <select name="tipo_doc"
                            class="w-24 sm:w-32 p-4 border-r border-gray-200 text-sm md:text-lg focus:outline-none appearance-none bg-no-repeat bg-[right_1rem_center] bg-[length:1em_1em] !rounded-r-none">
                            <option value="DNI">DNI</option>
                            <option value="RUC" selected>RUC</option>
                            <option value="CE">CE</option>
                        </select>

                        <input type="text" name="nro_documento" placeholder="Nro de documento"
                            class="flex-grow p-4 outline-none text-sm md:text-lg !rounded-l-none text-dark" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="flex items-center gap-3 mb-2">
                            <span
                                class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">3</span>
                            <span class="text-base md:text-lg font-medium text-dark">Nombre Completo</span>
                        </label>
                        <input type="text" name="nombre_completo" placeholder="Ej. Nombre Apellido"
                            class="w-full p-4 border-2 border-gray-200  focus:border-primary outline-none" required>
                    </div>
                    <div id="phone-field-container">
                        <label class="flex items-center gap-3 mb-2">
                            <span
                                class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">4</span>
                            <span class="text-base md:text-lg font-medium text-dark">Nro Teléfono</span>
                        </label>
                        <input type="tel" name="telefono" placeholder="+51 9XX XXX XXX"
                            class="w-full p-4 border-2 border-gray-200  focus:border-primary outline-none" required>
                    </div>
                    <div id="razon-social-field-container" class="hidden">
                        <label class="flex items-center gap-3 mb-2">
                            <span
                                class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">4</span>
                            <span class="text-base md:text-lg font-medium text-dark">Razón Social</span>
                        </label>
                        <input type="text" name="razon_social" placeholder="Nombre de la empresa"
                            class="w-full p-4 border-2 border-gray-200  focus:border-primary outline-none">
                    </div>
                </div>

                <div>
                    <label class="flex items-center gap-3 mb-2">
                        <span
                            class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">5</span>
                        <span class="text-base md:text-lg font-medium text-dark">Correo Electrónico</span>
                    </label>
                    <input type="email" name="email" placeholder="Ej. correo@gmail.com"
                        class="w-full p-4 border-2 border-gray-200  focus:border-primary outline-none" required>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="button" id="next-to-step-2"
                        class="bg-transparent border-0 flex items-center gap-2 text-dark font-normal hover:text-primary transition-colors">
                        Siguiente <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- STEP 2: Product Information -->
            <div id="step-2" class="step-container space-y-8 hidden">
                <div>
                    <label class="flex items-center gap-3 mb-2">
                        <span
                            class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">6</span>
                        <span class="text-base md:text-lg font-medium text-dark">¿Dónde operan tus vehículos?</span>
                    </label>
                    <div class="flex flex-col sm:flex-row gap-2 md:gap-4">
                        <select name="region" class="flex-grow md:p-4 border-2 border-gray-200  outline-none" required>
                            <option value="" selected disabled>País</option>
                            <option value="Peru">Perú</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Colombia">Colombia</option>
                        </select>
                        <select name="provincia" class="flex-grow md:p-4 border-2 border-gray-200  outline-none" required>
                            <option value="" selected disabled>Provincia</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="flex items-center gap-3 mb-2">
                        <span
                            class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">7</span>
                        <span class="text-base md:text-lg font-medium text-dark">¿Qué productos desea cotizar?</span>
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 md:gap-4">
                        <!-- Product Category 1 -->
                        <div class="category-item-container flex flex-col gap-2 text-dark">
                            <div class="product-category border-2 border-gray-200 rounded-md md:p-6 p-4 cursor-pointer overflow-hidden transition-all duration-300 h-fit"
                                data-expanded="false">
                                <div class="category-header flex justify-between items-center mb-0">
                                    <span class="text-md font-medium">Monitoreo GPS</span>
                                    <svg width="37" height="45" viewBox="0 0 37 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2943 18.7432C9.36435 18.7726 8.85431 19.682 6.39198 27.1885C6.32022 27.4012 6.53501 27.5432 6.75917 27.5566C6.75917 27.5566 14.5828 28.251 18.5043 28.251C18.6636 28.251 18.863 28.2434 19.0346 28.2412C19.6545 26.1602 21.5876 24.6318 23.8637 24.6318C25.9376 24.6319 27.7279 25.9005 28.4984 27.7002C29.4969 27.6195 30.2247 27.5583 30.2445 27.5566C30.4691 27.5437 30.6844 27.4016 30.6127 27.1885C27.8944 19.9946 27.3256 19.002 22.6283 18.8398L24.5404 16.5957C27.2 16.9476 29.5255 17.7489 30.266 19.6328L33.2943 26.7393C33.4289 26.5861 33.605 26.4755 33.8012 26.4199L35.0209 26.0762C35.1549 26.0381 35.2956 26.0276 35.434 26.0439C35.5723 26.0603 35.7061 26.1038 35.8275 26.1719C35.9489 26.24 36.056 26.331 36.142 26.4404C36.2281 26.5501 36.292 26.6763 36.3295 26.8105L36.9642 29.0693C37.0022 29.2033 37.0137 29.3432 36.9975 29.4814C36.9811 29.6197 36.9376 29.7536 36.8695 29.875C36.8014 29.9965 36.7095 30.1034 36.6 30.1895C36.4905 30.2755 36.365 30.3395 36.2309 30.377L35.0111 30.7207C34.9705 30.7321 34.9297 30.7359 34.8891 30.7422C35.1217 31.3231 35.267 31.9618 35.267 32.3418V40.6006C35.267 41.0239 35.0903 41.2207 34.808 41.3125V43.5117C34.8083 43.7071 34.7703 43.9015 34.6957 44.082C34.6211 44.2624 34.5115 44.4265 34.3734 44.5645C34.2353 44.7025 34.0715 44.8122 33.891 44.8867C33.7104 44.9613 33.5161 44.9995 33.3207 44.999H29.3344C29.139 44.9994 28.9446 44.9613 28.7641 44.8867C28.5836 44.8122 28.4197 44.7025 28.2816 44.5645C28.1435 44.4263 28.034 44.2616 27.9594 44.0811C27.8849 43.9006 27.8467 43.7069 27.8471 43.5117V41.3926H9.15859V43.5117C9.15893 43.7069 9.12076 43.9007 9.04628 44.0811C8.9717 44.2616 8.86212 44.4264 8.72402 44.5645C8.58606 44.7024 8.42185 44.8112 8.24159 44.8857C8.06119 44.9603 7.86746 44.9993 7.67226 44.999H3.68398C3.48867 44.9994 3.29514 44.9603 3.11464 44.8857C2.93434 44.8112 2.77021 44.7024 2.63222 44.5645C2.49412 44.4264 2.38454 44.2616 2.30995 44.0811C2.23545 43.9006 2.19731 43.7069 2.19765 43.5117V41.3115C1.91567 41.2198 1.73769 41.0239 1.73769 40.6006V32.3408C1.73776 31.9607 1.88254 31.322 2.11562 30.7412C2.07506 30.7346 2.03411 30.7308 1.99355 30.7197L0.773821 30.377C0.639727 30.3395 0.514173 30.2755 0.40468 30.1895C0.295237 30.1035 0.204257 29.9964 0.136125 29.875C0.0679487 29.7535 0.0235783 29.6198 0.00721917 29.4814C-0.00913991 29.3431 0.00246115 29.2024 0.0404223 29.0684L0.676165 26.8096C0.713623 26.6754 0.77764 26.5499 0.863665 26.4404C0.949732 26.3309 1.05662 26.2391 1.17812 26.1709C1.29956 26.1028 1.4334 26.0593 1.57167 26.043C1.71007 26.0266 1.85068 26.0382 1.98476 26.0762L3.20351 26.4189C3.39999 26.4742 3.577 26.5856 3.71132 26.7393L6.73964 19.6328C7.45264 17.7177 9.75618 16.8816 12.4057 16.5273L14.2943 18.7432ZM5.43984 31.6553C4.66429 31.6687 3.77089 32.0907 3.77089 32.6309V34.9346C3.77072 35.0625 3.79526 35.1893 3.84413 35.3076C3.89307 35.426 3.96546 35.5335 4.05605 35.624C4.14662 35.7145 4.2541 35.7861 4.37245 35.835C4.49081 35.8838 4.61745 35.9094 4.7455 35.9092C6.65162 35.9018 11.3471 36.5334 11.3549 34.7139C11.3575 34.1736 10.8992 33.1905 10.3793 33.0439C10.3355 33.0292 6.21134 31.6428 5.43984 31.6553ZM31.5648 31.6553C30.789 31.6428 26.6254 33.0439 26.6254 33.0439C26.1055 33.1905 25.6482 34.1736 25.6508 34.7139C25.6586 36.5333 30.3532 35.9019 32.2592 35.9092C32.3873 35.9094 32.5148 35.8849 32.6332 35.8359C32.7515 35.787 32.859 35.7146 32.9496 35.624C33.0401 35.5335 33.1117 35.4259 33.1605 35.3076C33.2094 35.1893 33.235 35.0626 33.2348 34.9346V32.6309C33.2348 32.0906 32.3405 31.6682 31.5648 31.6553ZM3.44863 29.4658H3.56288C3.53334 29.4278 3.50745 29.3882 3.48085 29.3486L3.44863 29.4658ZM23.8637 26.3682C23.2508 26.3662 22.649 26.5357 22.1273 26.8574C21.6059 27.1791 21.1848 27.6401 20.9115 28.1885C22.8106 28.1104 24.8488 27.9761 26.6195 27.8447C26.3188 27.3893 25.9092 27.0156 25.4281 26.7578C24.9471 26.5001 24.4094 26.3664 23.8637 26.3682Z" fill="#B4B4B4" />
                                        <path d="M18.5029 0C16.3445 0.00254629 14.2753 0.861083 12.7491 2.38728C11.2229 3.91348 10.3644 5.98271 10.3618 8.14108C10.3598 9.9048 10.9359 11.6206 12.0019 13.0257C12.0019 13.0257 12.2239 13.3181 12.2602 13.3603L18.5029 20.7228L24.7486 13.3566C24.7812 13.3173 25.0039 13.0257 25.0039 13.0257L25.0047 13.0235C26.0699 11.6189 26.6457 9.90396 26.644 8.14108C26.6414 5.98271 25.7829 3.91348 24.2567 2.38728C22.7305 0.861083 20.6613 0.00254629 18.5029 0ZM18.5029 11.1015C17.9174 11.1015 17.345 10.9278 16.8582 10.6026C16.3714 10.2773 15.9919 9.81492 15.7679 9.27398C15.5438 8.73303 15.4852 8.1378 15.5994 7.56354C15.7136 6.98928 15.9956 6.46179 16.4096 6.04777C16.8236 5.63375 17.3511 5.3518 17.9254 5.23757C18.4996 5.12334 19.0949 5.18197 19.6358 5.40603C20.1767 5.6301 20.6391 6.00954 20.9644 6.49638C21.2897 6.98321 21.4633 7.55557 21.4633 8.14108C21.4623 8.92593 21.1501 9.67834 20.5951 10.2333C20.0402 10.7883 19.2877 11.1005 18.5029 11.1015Z" fill="#B4B4B4" />
                                    </svg>
                                </div>
                            </div><!-- .product-category -->
                            <div class="category-content hidden space-y-3 bg-white rounded-md p-4 border-2 border-primary">
                                <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                    <input type="checkbox" name="productos[]" value="GPS Portátil"
                                        class="product-checkbox w-4 h-4 text-primary border-gray-300 focus:ring-primary"
                                        data-required-group="productos">
                                    <span>GPS Portátil</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                    <input type="checkbox" name="productos[]" value="GPS Satelital"
                                        class="product-checkbox w-4 h-4 text-primary border-gray-300 focus:ring-primary"
                                        data-required-group="productos">
                                    <span>GPS Satelital</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                    <input type="checkbox" name="productos[]" value="Candado GPS"
                                        class="product-checkbox w-4 h-4 text-primary border-gray-300 focus:ring-primary"
                                        data-required-group="productos">
                                    <span>Candado GPS</span>
                                </label>
                            </div>
                        </div><!-- .category-item-container -->
                        <!-- Product Category 2 -->
                        <div class="category-item-container flex flex-col gap-2 text-dark">
                            <div class="product-category border-2 border-gray-200 rounded-md md:p-6 p-4 cursor-pointer overflow-hidden transition-all duration-300 h-fit"
                                data-expanded="false">
                                <div class="category-header flex justify-between items-center mb-0">
                                    <span class="text-md font-medium">Eficiencia y control</span>
                                    <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7539 7.18359C18.1213 8.82733 17.7744 10.6129 17.7744 12.4795C17.7744 14.6365 18.2372 16.6855 19.0693 18.5322C19.016 18.5311 18.9626 18.5283 18.9092 18.5283C16.9033 18.5283 14.9789 19.3257 13.5605 20.7441C12.1423 22.1625 11.3457 24.086 11.3457 26.0918C11.3457 28.0977 12.1421 30.022 13.5605 31.4404C14.9789 32.8588 16.9033 33.6553 18.9092 33.6553C20.9149 33.6552 22.8385 32.8586 24.2568 31.4404C25.6752 30.022 26.4717 28.0977 26.4717 26.0918C26.4717 26.038 26.4689 25.9843 26.4678 25.9307C28.3151 26.7635 30.3645 27.2275 32.5225 27.2275C34.3887 27.2275 36.1739 26.8804 37.8174 26.248V27.4512C37.8174 27.8726 37.6762 28.282 37.417 28.6143C37.1577 28.9466 36.7946 29.1827 36.3857 29.2852L32.4658 30.2666C32.2011 31.1236 31.8612 31.9432 31.4453 32.7246L33.5254 36.1904C33.7421 36.5517 33.8315 36.9754 33.7803 37.3936C33.7289 37.8118 33.539 38.2018 33.2412 38.5L31.3164 40.4248C31.0183 40.7225 30.6291 40.9115 30.2109 40.9629C29.7927 41.0143 29.3692 40.9248 29.0078 40.708L25.542 38.6279C24.7605 39.0439 23.9411 39.3847 23.084 39.6494L22.1025 43.5693C22.0001 43.978 21.7637 44.3404 21.4316 44.5996C21.0994 44.8589 20.69 44.9999 20.2686 45H17.5498C17.1283 45 16.718 44.8589 16.3857 44.5996C16.0537 44.3404 15.8173 43.9779 15.7148 43.5693L14.7334 39.6494C13.884 39.3869 13.0608 39.0445 12.2754 38.6279L8.80957 40.708C8.44822 40.9247 8.02464 41.0143 7.60645 40.9629C7.18834 40.9114 6.79907 40.7225 6.50098 40.4248L4.57617 38.5C4.27838 38.2018 4.08849 37.8118 4.03711 37.3936C3.98585 36.9754 4.07629 36.5517 4.29297 36.1904L6.37305 32.7246C5.95641 31.9391 5.61408 31.1161 5.35156 30.2666L1.43164 29.2852C1.02319 29.1828 0.660607 28.9471 0.401367 28.6152C0.142109 28.2833 0.000432288 27.8743 0 27.4531V24.7344C1.10778e-05 24.313 0.141201 23.9035 0.400391 23.5713C0.659674 23.239 1.02285 23.0029 1.43164 22.9004L5.35156 21.9189C5.61628 21.0618 5.95706 20.2425 6.37305 19.4609L4.29297 15.9951C4.07626 15.6338 3.9858 15.2102 4.03711 14.792C4.08848 14.3738 4.27852 13.9847 4.57617 13.6865L6.50098 11.7598C6.79909 11.4621 7.18829 11.2721 7.60645 11.2207C8.0246 11.1693 8.44824 11.259 8.80957 11.4756L12.2754 13.5557C13.0568 13.1397 13.8763 12.7989 14.7334 12.5342L15.7148 8.61523C15.8172 8.20666 16.0538 7.84329 16.3857 7.58398C16.7176 7.32491 17.1268 7.18403 17.5479 7.18359H18.7539Z" fill="#B4B4B4" />
                                        <path d="M36.3396 16.3398L32.5059 12.5061V4.83984" stroke="#B4B4B4" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" />
                                        <path d="M32.5 24C35.55 24 38.4751 22.7884 40.6317 20.6317C42.7884 18.4751 44 15.55 44 12.5C44 9.45001 42.7884 6.52494 40.6317 4.36827C38.4751 2.2116 35.55 1 32.5 1C29.45 1 26.5249 2.2116 24.3683 4.36827C22.2116 6.52494 21 9.45001 21 12.5C21 15.55 22.2116 18.4751 24.3683 20.6317C26.5249 22.7884 29.45 24 32.5 24Z" stroke="#B4B4B4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div><!-- .product-category -->
                            <div class="category-content hidden space-y-3 bg-white rounded-md p-4 border-2 border-primary">
                                <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                    <input type="checkbox" name="productos[]" value="Telemetría"
                                        class="product-checkbox w-4 h-4 text-primary border-gray-300 focus:ring-primary"
                                        data-required-group="productos">
                                    <span>Telemetría</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                    <input type="checkbox" name="productos[]" value="Control combustible"
                                        class="product-checkbox w-4 h-4 text-primary border-gray-300 focus:ring-primary"
                                        data-required-group="productos">
                                    <span>Control combustible</span>
                                </label>
                            </div>
                        </div><!-- .category-item-container -->
                        <!-- Product Category 3 -->
                        <div class="category-item-container flex flex-col gap-2 text-dark">
                            <div class="product-category border-2 border-gray-200 rounded-md md:p-6 p-4 cursor-pointer overflow-hidden transition-all duration-300 h-fit"
                                data-expanded="false">
                                <div class="category-header flex justify-between items-center mb-0">
                                    <span class="text-md font-medium">Video y seguridad</span>
                                    <svg width="44" height="45" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M38.2982 19.3417L36.6069 24.1959C36.4827 24.5398 36.1195 24.7118 35.7756 24.5972L25.513 21.0234L17.0564 29.48C16.6933 29.8336 16.206 30.0438 15.6996 30.0438H4.50063V40.4974C4.50063 42.9818 2.48439 44.9981 0 44.9981V11.2578C2.48439 11.2578 4.50063 13.274 4.50063 15.7584V26.2216H14.9065L21.4997 19.6283C13.6643 16.8955 11.8296 16.2553 11.4857 16.1311C11.4857 16.1311 11.4665 16.1311 11.457 16.1311C11.4474 16.1215 11.4474 16.1215 11.4378 16.1215C11.4188 16.1119 11.4092 16.1119 11.4092 16.1119C11.0747 15.9973 10.8932 15.6247 11.0079 15.2902L11.734 13.2262L33.6447 20.861C34.0747 21.0043 34.5142 21.0808 34.9633 21.0808C36.1291 21.0808 37.2375 20.5744 38.002 19.6857L38.2982 19.3417Z" fill="#B4B4B4" />
                                        <path d="M11.1181 10.9984L34.2745 19.0581C35.089 19.3415 35.9939 19.0974 36.5553 18.443L42.4784 11.5376C43.0572 10.8629 42.7752 9.81729 41.9357 9.52509L14.9054 0.117093C13.8117 -0.263574 12.6165 0.314454 12.2359 1.40816L9.82705 8.32886C9.44639 9.42257 10.0244 10.6177 11.1181 10.9984Z" fill="#B4B4B4" />
                                        <path d="M43.047 14.5296L42.5692 14.3672L41.7284 15.3418L39.0146 23.1104L39.9511 23.4353C40.6486 23.6742 41.4226 23.3015 41.671 22.5944L43.8783 16.24C44.1268 15.5329 43.7541 14.7685 43.047 14.5296Z" fill="#B4B4B4" />
                                    </svg>


                                </div>
                            </div><!-- .product-category -->
                            <div class="category-content hidden space-y-3 bg-white rounded-md p-4 border-2 border-primary">
                                <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                    <input type="checkbox" name="productos[]" value="Cámara DASH"
                                        class="product-checkbox w-4 h-4 text-primary border-gray-300 focus:ring-primary"
                                        data-required-group="productos">
                                    <span>Cámara DASH</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                    <input type="checkbox" name="productos[]" value="Sensor de fatiga"
                                        class="product-checkbox w-4 h-4 text-primary border-gray-300 focus:ring-primary"
                                        data-required-group="productos">
                                    <span>Sensor de fatiga</span>
                                </label>
                            </div>
                        </div><!-- .category-item-container -->
                    </div>

                    <!-- SELECTED PRODUCTS TAGS CONTAINER -->
                    <div id="selected-products-container"
                        class="mt-4 md:p-4 p-2 border-2 border-gray-100 rounded-md min-h-[60px] flex flex-wrap gap-2 items-center bg-gray-50/30">
                        <span class="text-gray-400 text-sm italic w-full text-center no-products-msg">Ningún producto
                            seleccionado</span>
                    </div>
                </div>

                <div>
                    <label class="flex items-center gap-3 mb-2">
                        <span
                            class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">8</span>
                        <span class="text-base md:text-lg font-medium text-dark">¿Cuántos vehículos deseas
                            gestionar?</span>
                    </label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 md:gap-4">
                        <?php foreach (['1-10', '11-20', '12-50', '+100'] as $range): ?>
                            <label class="relative cursor-pointer group mb-0">
                                <input type="radio" name="cantidad_vehiculos" value="<?php echo $range; ?>"
                                    class="peer sr-only" required>
                                <div
                                    class="p-4 border-2 border-gray-200 rounded-md text-center font-medium group-hover:border-primary/30 peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white transition-all">
                                    <?php echo $range; ?>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="flex flex-col-reverse md:flex-row justify-between gap-2 md:gap-4 pt-2">
                    <button type="button" id="prev-to-step-1"
                        class="bg-transparent border-0 flex items-center gap-2 text-dark font-normal hover:text-primary transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Atrás
                    </button>
                    <button id="submit-cotizacion" type="submit" class="btn btn-primary">
                        Solicitar cotización
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

<?php /* Script removed and moved to js/cotizador.js to avoid conflicts with ComsatelValidator */ ?>
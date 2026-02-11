(function ($) {
    'use strict';

    $(document).ready(function () {

        const $modal = $('#cotizador-modal');
        const $openBtn = $('#open-cotizador');
        const $closeBtn = $('#close-cotizador');
        const $form = $('#cotizador-form');
        const $step1 = $('#step-1');
        const $step2 = $('#step-2');
        const $nextBtn = $('#next-to-step-2');
        const $prevBtn = $('#prev-to-step-1');
        const $submitBtn = $('#submit-cotizacion');
        const $razonSocialContainer = $('#razon-social-field-container');
        const $phoneContainer = $('#phone-field-container');

        // Toggle Modal
        $openBtn.on('click', function () {
            $modal.removeClass('hidden').addClass('flex');
            $('body').css('overflow', 'hidden');
        });

        $closeBtn.on('click', function () {
            closeModal();
        });

        $(window).on('click', function (e) {
            if ($(e.target).is($modal)) {
                closeModal();
            }
        });

        function closeModal() {
            $modal.addClass('hidden').removeClass('flex');
            $('body').css('overflow', '');
        }

        // Toggle "Tipo de Cliente" fields
        $('input[name="tipo_cliente"]').on('change', function () {
            if ($(this).val() === 'Empresa') {
                $razonSocialContainer.removeClass('hidden');
            } else {
                $razonSocialContainer.addClass('hidden');
                $razonSocialContainer.find('input').val(''); // Clear value
            }
        });

        // Step Navigation: 1 -> 2
        $nextBtn.on('click', function () {
            if (validateStep1()) {
                $step1.addClass('hidden');
                $step2.removeClass('hidden');
                checkSubmitButtonState(); // Check state on enter
            }
        });

        // Step Navigation: 2 -> 1
        $prevBtn.on('click', function () {
            $step2.addClass('hidden');
            $step1.removeClass('hidden');
        });

        // Expand/Collapse Product Categories
        $('.product-category').on('click', function (e) {
            // Check if the click originated from within the expandable content
            // If so, we do NOT want to toggle (so users can check boxes freely)
            if ($(e.target).closest('.category-content').length > 0) {
                return;
            }

            const $category = $(this);
            const $content = $category.find('.category-content');
            const isExpanded = $category.attr('data-expanded') === 'true';

            if (isExpanded) {
                $content.addClass('hidden');
                $category.attr('data-expanded', 'false');
                $category.removeClass('border-primary bg-primary/5');
            } else {
                $content.removeClass('hidden');
                $category.attr('data-expanded', 'true');
                $category.addClass('border-primary bg-primary/5');
            }
        });

        // Handle Product Selection for Tags
        const $selectedContainer = $('#selected-products-container');
        const $noProductsMsg = $selectedContainer.find('.no-products-msg');

        $(document).on('change', '.product-checkbox', function () {
            updateSelectedProducts();
        });

        function updateSelectedProducts() {
            const selected = [];
            $('.product-checkbox:checked').each(function () {
                selected.push($(this).val());
            });

            $selectedContainer.find('.product-tag').remove();

            if (selected.length > 0) {
                $noProductsMsg.hide();
                // Limpieza robusta del error
                $selectedContainer.removeClass('border-red-500');
                $selectedContainer.parent().find('.error-msg').remove();

                selected.forEach(prod => {
                    // Corregido el string del botón y el atributo data-value
                    const tag = $(`
                <div class="product-tag btn btn-outline group flex items-center gap-2 animation-fade-in animate-duration-200 !pr-4 hover:bg-primary hover:border-primary transition-colors">
                    <span class="text-gray-800 group-hover:text-white transition-colors text-sm">    
                        ${prod}
                    </span>
                    <button type="button" class="remove-tag text-black 
                                   group-hover:!text-white 
                                   transition-colors bg-transparent border-none p-0 
                                   focus:outline-none" data-value="${prod}">
                        <svg
                                class="w-4 h-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                    </button>
                </div>
            `);
                    $selectedContainer.append(tag);
                });
            } else {
                $noProductsMsg.show();
            }
            checkSubmitButtonState();
        }

        // Remove tag click
        $(document).on('click', '.remove-tag', function () {
            const val = $(this).data('value');
            $(`.product-checkbox[value="${val}"]`).prop('checked', false);
            updateSelectedProducts();
        });


        // Handle Form Submission
        $submitBtn.on('click', function (e) {
            e.preventDefault();

            if (!validateStep2()) {
                return;
            }

            const formData = $form.serialize();
            const originalBtnText = $submitBtn.text();

            $submitBtn.prop('disabled', true).text('Enviando...');

            $.ajax({
                url: comsatel_ajax.ajax_url,
                type: 'POST',
                data: formData + '&action=submit_cotizacion_comsatel&nonce=' + comsatel_ajax.nonce,
                success: function (response) {
                    if (response.success) {
                        alert('¡Cotización enviada con éxito! Nos pondremos en contacto pronto.');
                        closeModal();
                        $form[0].reset();
                        // Reset Flow
                        $step2.addClass('hidden');
                        $step1.removeClass('hidden');
                        updateSelectedProducts();
                    } else {
                        alert(response.data || 'Ocurrió un error. Inténtalo de nuevo.');
                        // Re-enable button if error
                        checkSubmitButtonState();
                    }
                },
                error: function () {
                    alert('Error de conexión. Por favor verifica tu internet.');
                    checkSubmitButtonState();
                },
                complete: function () {
                    if ($submitBtn.text() === 'Enviando...') {
                        $submitBtn.text(originalBtnText);
                    }
                }
            });
        });

        // Listen for changes on new fields to update button state
        $('select[name="region"], select[name="provincia"], input[name="cantidad_vehiculos"]').on('change', function () {
            checkSubmitButtonState();
        });

        function checkSubmitButtonState() {
            const selectedCount = $('.product-checkbox:checked').length;
            const region = $('select[name="region"]').val();
            const provincia = $('select[name="provincia"]').val();
            const vehiculos = $('input[name="cantidad_vehiculos"]:checked').val();

            console.log('Checking Button State:', { selectedCount, region, provincia, vehiculos });

            if (selectedCount > 0 && region && provincia && vehiculos) {
                console.log('Enabling button');
                $submitBtn.prop('disabled', false).removeClass('opacity-50 cursor-not-allowed');
            } else {
                console.log('Disabling button');
                $submitBtn.prop('disabled', true).addClass('opacity-50 cursor-not-allowed');
            }
        }

        // Validation Functions
        function validateStep1() {
            let isValid = true;
            $step1.find('.error-msg').remove();
            $step1.find('.border-red-500').removeClass('border-red-500');

            // Name
            const $name = $('input[name="nombre_completo"]');
            if ($name.val().trim() === '') {
                showError($name, 'El nombre es obligatorio');
                isValid = false;
            }

            // Email
            const $email = $('input[name="email"]');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test($email.val())) {
                showError($email, 'Ingresa un email válido');
                isValid = false;
            }

            // Phone (Required)
            const $phone = $('input[name="telefono"]');
            if ($phone.val().trim() === '') {
                showError($phone, 'El teléfono es obligatorio');
                isValid = false;
            }

            // Document
            const $doc = $('input[name="nro_documento"]');
            if ($doc.val().trim() === '') {
                showError($doc, 'El documento es obligatorio');
                isValid = false;
            }

            return isValid;
        }

        // Validación de Paso 2 limpia
        function validateStep2() {
            const $container = $('#selected-products-container');
            let isValid = true;

            // 1. Validate Location
            const $region = $('select[name="region"]');
            const $provincia = $('select[name="provincia"]');

            if (!$region.val()) {
                $region.addClass('border-red-500');
                isValid = false;
            } else {
                $region.removeClass('border-red-500');
            }

            if (!$provincia.val()) {
                $provincia.addClass('border-red-500');
                isValid = false;
            } else {
                $provincia.removeClass('border-red-500');
            }

            // 2. Validate Products
            // Limpiar errores previos de productos
            $container.removeClass('border-red-500');
            $container.parent().find('.error-msg').remove();

            const selectedCount = $('.product-checkbox:checked').length;

            if (selectedCount === 0) {
                $container.addClass('border-red-500');
                $container.after('<p class="error-msg text-red-500 text-xs mt-1">Por favor selecciona al menos un producto.</p>');
                isValid = false;
            }

            // 3. Validate Vehicle Count
            const $vehiculos = $('input[name="cantidad_vehiculos"]');
            if ($('input[name="cantidad_vehiculos"]:checked').length === 0) {
                // Check if container already has error border/msg if needed, or just rely on button disabled state
                // Visual feedback for radio buttons can be complex, usually button disable is enough, 
                // but we can add a border to the container if we wrap them.
                // For now, ensuring isValid is false.
                isValid = false;
            }

            return isValid;
        }

        function showError($element, message) {
            $element.addClass('border-red-500');
            $element.after(`<span class="error-msg text-red-500 text-xs mt-1 block">${message}</span>`);
        }

        // Dynamic Provinces Logic
        const provincesByCountry = {
            'Peru': [
                'Amazonas', 'Ancash', 'Apurimac', 'Arequipa', 'Ayacucho', 'Cajamarca', 'Callao', 'Cusco',
                'Huancavelica', 'Huanuco', 'Ica', 'Junin', 'La Libertad', 'Lambayeque', 'Lima', 'Loreto',
                'Madre de Dios', 'Moquegua', 'Pasco', 'Piura', 'Puno', 'San Martin', 'Tacna', 'Tumbes', 'Ucayali'
            ],
            'Bolivia': [
                'Beni', 'Chuquisaca', 'Cochabamba', 'La Paz', 'Oruro', 'Pando', 'Potosi', 'Santa Cruz', 'Tarija'
            ],
            'Colombia': [
                'Amazonas', 'Antioquia', 'Arauca', 'Atlantico', 'Bolivar', 'Boyaca', 'Caldas', 'Caqueta',
                'Casanare', 'Cauca', 'Cesar', 'Choco', 'Cordoba', 'Cundinamarca', 'Guainia', 'Guaviare',
                'Huila', 'La Guajira', 'Magdalena', 'Meta', 'Narino', 'Norte de Santander', 'Putumayo',
                'Quindio', 'Risaralda', 'San Andres y Providencia', 'Santander', 'Sucre', 'Tolima',
                'Valle del Cauca', 'Vaupes', 'Vichada'
            ]
        };

        const $countrySelect = $('select[name="region"]');
        const $provinceSelect = $('select[name="provincia"]');

        $countrySelect.on('change', function () {
            const country = $(this).val();
            const provinces = provincesByCountry[country] || [];

            $provinceSelect.empty();
            $provinceSelect.append('<option value="" selected disabled>Provincia</option>');

            provinces.forEach(function (prov) {
                $provinceSelect.append(`<option value="${prov}">${prov}</option>`);
            });
        });

    });

})(jQuery);

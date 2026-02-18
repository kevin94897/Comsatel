/**
 * Cotizador Modal Functionality
 * Refactored to use ComsatelValidator (Vanilla JS)
 */
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('cotizador-modal');
    const openBtn = document.getElementById('open-cotizador');
    const closeBtn = document.getElementById('close-cotizador');
    const form = document.getElementById('cotizador-form');
    const step1 = document.getElementById('step-1');
    const step2 = document.getElementById('step-2');
    const nextBtn = document.getElementById('next-to-step-2');
    const prevBtn = document.getElementById('prev-to-step-1');

    if (!form) return;

    // --- Modal Logic ---
    const openModal = () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    };

    const closeModal = () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    };

    if (openBtn) openBtn.addEventListener('click', openModal);
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    // --- "Tipo de Cliente" Logic ---
    const tipoClienteRadios = form.querySelectorAll('input[name="tipo_cliente"]');
    const phoneContainer = document.getElementById('phone-field-container');
    const razonSocialContainer = document.getElementById('razon-social-field-container');

    const toggleFields = () => {
        const checkedRadio = form.querySelector('input[name="tipo_cliente"]:checked');
        const isEmpresa = checkedRadio && checkedRadio.value === 'Empresa';

        if (isEmpresa) {
            phoneContainer?.classList.add('hidden');
            phoneContainer?.querySelector('input')?.removeAttribute('required');
            razonSocialContainer?.classList.remove('hidden');
            razonSocialContainer?.querySelector('input')?.setAttribute('required', 'required');
        } else {
            phoneContainer?.classList.remove('hidden');
            phoneContainer?.querySelector('input')?.setAttribute('required', 'required');
            razonSocialContainer?.classList.add('hidden');
            razonSocialContainer?.querySelector('input')?.removeAttribute('required');
        }
    };

    tipoClienteRadios.forEach(radio => radio.addEventListener('change', toggleFields));
    toggleFields(); // Init

    // --- Product Selection (Accordions & Tags) ---
    const productCategories = document.querySelectorAll('.product-category');
    const productCheckboxes = document.querySelectorAll('.product-checkbox');
    const tagsContainer = document.getElementById('selected-products-container');

    const updateCategoryBorders = () => {
        productCategories.forEach(category => {
            const content = category.nextElementSibling;
            if (!content) return;

            const checkboxes = content.querySelectorAll('.product-checkbox');
            const isAnyChecked = Array.from(checkboxes).some(cb => cb.checked);
            const isExpanded = category.getAttribute('data-expanded') === 'true';

            if (isAnyChecked || isExpanded) {
                category.classList.add('border-primary', 'bg-primary/5');
                category.classList.remove('border-gray-200');
            } else {
                category.classList.remove('border-primary', 'bg-primary/5');
                category.classList.add('border-gray-200');
            }
        });
    };

    productCategories.forEach(category => {
        category.addEventListener('click', (e) => {
            if (e.target.closest('.product-checkbox') || e.target.closest('label')) return;
            const content = category.nextElementSibling;
            if (!content || !content.classList.contains('category-content')) return;

            const isExpanded = category.getAttribute('data-expanded') === 'true';

            // Close others
            productCategories.forEach(other => {
                if (other !== category) {
                    other.setAttribute('data-expanded', 'false');
                    other.nextElementSibling?.classList.add('hidden');
                }
            });

            // Toggle self
            if (isExpanded) {
                category.setAttribute('data-expanded', 'false');
                content.classList.add('hidden');
            } else {
                category.setAttribute('data-expanded', 'true');
                content.classList.remove('hidden');
            }
            updateCategoryBorders();
        });
    });

    const updateProductTags = () => {
        updateCategoryBorders();
        const selectedProducts = Array.from(productCheckboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);

        const tags = tagsContainer.querySelectorAll('.product-tag');
        tags.forEach(t => t.remove());

        const noMsg = tagsContainer.querySelector('.no-products-msg');

        if (selectedProducts.length > 0) {
            noMsg?.classList.add('hidden');
            selectedProducts.forEach(name => {
                const tag = document.createElement('div');
                tag.className = 'product-tag btn btn-outline group flex items-center gap-2 animation-fade-in animate-duration-200 !pr-4 hover:bg-primary hover:border-primary transition-colors';
                tag.innerHTML = `
                    <span class="text-gray-800 group-hover:text-white transition-colors text-sm">${name}</span>
                    <button type="button" class="remove-tag text-black group-hover:!text-white transition-colors bg-transparent border-none p-0 focus:outline-none" data-value="${name}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                `;
                tagsContainer.appendChild(tag);
            });
        } else {
            noMsg?.classList.remove('hidden');
        }

        // Trigger validator check if it exists
        if (window.cotizadorValidator) {
            window.cotizadorValidator.validateForm();
        }
    };

    productCheckboxes.forEach(cb => cb.addEventListener('change', updateProductTags));

    tagsContainer.addEventListener('click', (e) => {
        const btn = e.target.closest('.remove-tag');
        if (btn) {
            const val = btn.getAttribute('data-value');
            const cb = Array.from(productCheckboxes).find(c => c.value === val);
            if (cb) {
                cb.checked = false;
                updateProductTags();
            }
        }
    });

    // --- Dynamic Provinces ---
    const provincesByCountry = {
        'Peru': ['Amazonas', 'Ancash', 'Apurimac', 'Arequipa', 'Ayacucho', 'Cajamarca', 'Callao', 'Cusco', 'Huancavelica', 'Huanuco', 'Ica', 'Junin', 'La Libertad', 'Lambayeque', 'Lima', 'Loreto', 'Madre de Dios', 'Moquegua', 'Pasco', 'Piura', 'Puno', 'San Martin', 'Tacna', 'Tumbes', 'Ucayali'],
        'Bolivia': ['Beni', 'Chuquisaca', 'Cochabamba', 'La Paz', 'Oruro', 'Pando', 'Potosi', 'Santa Cruz', 'Tarija'],
        'Colombia': ['Amazonas', 'Antioquia', 'Arauca', 'Atlantico', 'Bolivar', 'Boyaca', 'Caldas', 'Caqueta', 'Casanare', 'Cauca', 'Cesar', 'Choco', 'Cordoba', 'Cundinamarca', 'Guainia', 'Guaviare', 'Huila', 'La Guajira', 'Magdalena', 'Meta', 'Narino', 'Norte de Santander', 'Putumayo', 'Quindio', 'Risaralda', 'San Andres y Providencia', 'Santander', 'Sucre', 'Tolima', 'Valle del Cauca', 'Vaupes', 'Vichada']
    };

    const countrySelect = form.querySelector('select[name="region"]');
    const provinceSelect = form.querySelector('select[name="provincia"]');

    if (countrySelect && provinceSelect) {
        countrySelect.addEventListener('change', function () {
            const provinces = provincesByCountry[this.value] || [];
            provinceSelect.innerHTML = '<option value="" selected disabled>Provincia</option>';
            provinces.forEach(p => {
                const opt = document.createElement('option');
                opt.value = p;
                opt.textContent = p;
                provinceSelect.appendChild(opt);
            });
        });
    }

    // --- Step Navigation ---
    nextBtn.addEventListener('click', () => {
        // ComsatelValidator handles enabling/disabling this button based on Step 1 validity
        step1.classList.add('hidden');
        step2.classList.remove('hidden');
        modal.scrollTo({ top: 0, behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', () => {
        step2.classList.add('hidden');
        step1.classList.remove('hidden');
        modal.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // --- AJAX Submission ---
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        if (window.cotizadorValidator && !window.cotizadorValidator.isFormValid()) return;

        // Custom validation for Step 2 (Products selected)
        const selectedCount = form.querySelectorAll('.product-checkbox:checked').length;
        if (selectedCount === 0) return; // Validator handles this with data-required-group

        const submitBtn = form.querySelector('[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Enviando...';

        const formData = new FormData(form);
        formData.append('action', 'submit_cotizacion_comsatel');

        // Access global vars localized in functions.php
        const ajaxUrl = (typeof comsatel_vars !== 'undefined') ? comsatel_vars.ajax_url : '/wp-admin/admin-ajax.php';
        const homeUrl = (typeof comsatel_vars !== 'undefined') ? comsatel_vars.home_url : '';

        fetch(ajaxUrl, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = homeUrl + '/gracias';
                } else {
                    window.cotizadorValidator.showNotification(data.data || 'Ocurrió un error al enviar el formulario.', 'error');
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                window.cotizadorValidator.showNotification('Error de conexión.', 'error');
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            });
    });
});

/**
 * Comsatel Form Validator Engine
 * Handles real-time validation and button state management across all site forms.
 */
class ComsatelValidator {
    constructor(formId, options = {}) {
        this.form = document.getElementById(formId);
        if (!this.form) return;

        this.options = Object.assign({
            onValid: () => { },
            onInvalid: () => { },
            submitButtonSelector: '[type="submit"]',
            nextButtonSelector: '.btn-next'
        }, options);

        this.submitButton = this.form.querySelector(this.options.submitButtonSelector);
        this.nextButtons = this.form.querySelectorAll(this.options.nextButtonSelector);

        this.fields = {
            email: this.form.querySelectorAll('input[type="email"]'),
            tel: this.form.querySelectorAll('input[type="tel"], [name="telefono"]'),
            dni_ruc: this.form.querySelectorAll('[name*="documento"], [name="tipo_doc"], [name="numero_documento"], [name="nro_documento"]'),
            required: this.form.querySelectorAll('[required]')
        };

        this.init();
    }

    init() {
        this.setupEventListeners();
        this.validateForm(); // Initial check
    }

    setupEventListeners() {
        // Validate on blur (when user leaves field) - better UX
        this.form.addEventListener('blur', (e) => {
            if (e.target.matches('input, select, textarea')) {
                this.handleInput(e.target);
                this.validateForm();
            }
        }, true); // Use capture phase to catch blur events

        // Clear errors on input (immediate feedback when correcting)
        this.form.addEventListener('input', (e) => {
            if (e.target.matches('input, select, textarea')) {
                // Only clear error if field was previously invalid
                const group = e.target.closest('.document-input-group, .input-group');
                const target = group || e.target;
                if (target.classList.contains('border-accent-red')) {
                    this.clearError(e.target);
                }
                this.validateForm(); // Update button states
            }
        });

        // Handle change events for selects and radios/checkboxes
        this.form.addEventListener('change', (e) => {
            if (e.target.matches('select, input[type="radio"], input[type="checkbox"]')) {
                this.handleInput(e.target);
                this.validateForm();
            }
        });

        // Special handling for document type changes
        const tipoDoc = this.form.querySelector('[name="tipo_doc"], [name="tipo_documento"]');
        if (tipoDoc) {
            tipoDoc.addEventListener('change', () => {
                const numDoc = this.form.querySelector('[name="numero_documento"], [name="nro_documento"]');
                if (numDoc) this.handleInput(numDoc);
                this.validateForm();
            });
        }
    }

    handleInput(input) {
        let isValid = true;
        let errorMessage = "";

        // Reset state
        this.clearError(input);

        // Required check
        if (input.hasAttribute('required') && !input.value.trim()) {
            isValid = false;
            errorMessage = "Este campo es requerido.";
        } else if (input.value.trim()) {
            // Format checks
            if (input.type === 'email') {
                isValid = this.validateEmail(input.value);
                if (!isValid) errorMessage = "Correo electrónico inválido.";
            } else if (input.type === 'tel' || input.name === 'telefono' || input.name === 'telefono_titular') {
                isValid = this.validatePhone(input.value);
                if (!isValid) errorMessage = "Ingresa un número de teléfono válido.";
            } else if (input.name === 'numero_documento' || input.name === 'num_doc' || input.id === 'numero_documento' || input.name === 'nro_documento') {
                const tipo = this.form.querySelector('[name="tipo_doc"], [name="tipo_documento"]')?.value || "DNI";
                isValid = this.validateDocument(input.value, tipo);
                if (!isValid) {
                    errorMessage = tipo === 'RUC' ? "RUC debe empezar con 10, 15 o 20 y tener 11 dígitos." : (tipo === 'DNI' ? "DNI debe tener 8 dígitos." : "Documento inválido.");
                }
            }
        }

        if (!isValid && errorMessage && input.value.trim() !== "") {
            this.showError(input, errorMessage);
        }

        return isValid;
    }

    validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    validatePhone(phone) {
        // Accept any international number: 7–15 digits (strip spaces, dashes, parens)
        const clean = phone.replace(/[\s\-().+]/g, '');
        return /^\d{7,15}$/.test(clean);
    }

    validateDocument(value, tipo) {
        const clean = value.replace(/\D/g, '');
        if (tipo === 'DNI') return clean.length === 8;
        if (tipo === 'RUC') {
            // RUC must be exactly 11 digits AND start with 10, 15, or 20
            if (clean.length !== 11) return false;
            const prefix = clean.substring(0, 2);
            return prefix === '10' || prefix === '15' || prefix === '20';
        }
        if (tipo === 'CE') return clean.length >= 8 && clean.length <= 12;
        return clean.length >= 8;
    }

    showError(input, message) {
        const group = input.closest('.document-input-group, .input-group');
        const itiWrapper = input.closest('.iti');
        const target = group || itiWrapper || input;
        const errorParent = (itiWrapper && !group) ? itiWrapper.parentElement : target.parentElement;

        target.classList.add('border-accent-red', 'text-accent-red', 'animate-shake');
        target.classList.remove('border-gray-200', 'border-gray-300');

        let errorDisplay = errorParent.querySelector(':scope > .error-msg');
        if (!errorDisplay) {
            errorDisplay = document.createElement('span');
            errorDisplay.className = 'error-msg text-xs text-accent-red mt-1 block opacity-0 transition-opacity duration-300';
            errorParent.appendChild(errorDisplay);
            setTimeout(() => errorDisplay.classList.remove('opacity-0'), 10);
        }
        errorDisplay.textContent = message;
    }

    clearError(input) {
        const group = input.closest('.document-input-group, .input-group');
        const itiWrapper = input.closest('.iti');
        const target = group || itiWrapper || input;
        const errorParent = (itiWrapper && !group) ? itiWrapper.parentElement : target.parentElement;

        target.classList.remove('border-accent-red', 'text-accent-red', 'animate-shake');
        target.classList.add(group ? 'border-gray-200' : 'border-gray-300');

        const errorDisplay = errorParent.querySelector(':scope > .error-msg');
        if (errorDisplay) {
            errorDisplay.classList.add('opacity-0');
            setTimeout(() => errorDisplay.remove(), 300);
        }
    }

    /**
     * Shows a modern toast notification
     * @param {string} message 
     * @param {string} type 'error' | 'success' | 'info'
     */
    showNotification(message, type = 'error') {
        let container = document.getElementById('comsatel-notifications');
        if (!container) {
            container = document.createElement('div');
            container.id = 'comsatel-notifications';
            container.className = 'fixed top-5 right-5 z-[9999] flex flex-col gap-3 pointer-events-none';
            document.body.appendChild(container);
        }

        const toast = document.createElement('div');
        const bgColor = type === 'success' ? 'bg-green-600' : (type === 'info' ? 'bg-blue-600' : 'bg-accent-red');

        toast.className = `${bgColor} text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-3 transform translate-x-full transition-all duration-500 ease-out pointer-events-auto min-w-[300px] max-w-md`;

        const icon = type === 'success' ?
            '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>' :
            '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';

        toast.innerHTML = `
            <div class="flex-shrink-0">${icon}</div>
            <div class="flex-grow font-medium">${message}</div>
            <button class="flex-shrink-0 hover:opacity-70 transition-opacity bg-transparent cursor-pointer border-none">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        `;

        container.appendChild(toast);

        // Animate in
        setTimeout(() => toast.classList.remove('translate-x-full'), 10);

        const closeToast = () => {
            toast.classList.add('translate-x-full', 'opacity-0');
            setTimeout(() => toast.remove(), 500);
        };

        toast.querySelector('button').onclick = closeToast;

        // Auto-dismiss
        setTimeout(closeToast, 5000);
    }

    validateForm() {
        let isFormValid = true;
        const requiredFields = Array.from(this.form.querySelectorAll('[required]'))
            .filter(el => el.type !== 'search' && !el.classList.contains('iti__search-input') && !el.closest('.iti__dropdown-content'));

        requiredFields.forEach(field => {
            // Simple validation for required
            if (!field.value.trim()) isFormValid = false;

            // Format validation
            if (field.type === 'email' && !this.validateEmail(field.value)) isFormValid = false;
            if ((field.type === 'tel' || field.name === 'telefono') && !this.validatePhone(field.value)) isFormValid = false;

            if (field.name === 'numero_documento' || field.id === 'numero_documento' || field.name === 'nro_documento') {
                const tipo = this.form.querySelector('[name="tipo_doc"], [name="tipo_documento"]')?.value || "DNI";
                if (!this.validateDocument(field.value, tipo)) isFormValid = false;
            }

            // Checkbox/Radio special handling for individual [required]
            if (field.type === 'checkbox' || field.type === 'radio') {
                const name = field.name;
                const group = this.form.querySelectorAll(`[name="${name}"]`);
                const checked = Array.from(group).some(i => i.checked);
                if (!checked) isFormValid = false;
            }
        });

        // Group validation for [data-required-group] (at least one selection)
        const groupFields = this.form.querySelectorAll('[data-required-group]');
        const uniqueGroups = new Set(Array.from(groupFields).map(f => f.getAttribute('data-required-group')));

        uniqueGroups.forEach(groupName => {
            const groupInputs = this.form.querySelectorAll(`[data-required-group="${groupName}"]`);
            const isAnyChecked = Array.from(groupInputs).some(input => input.checked);

            if (!isAnyChecked) {
                isFormValid = false;
                // Optionally show error for the group if needed, but usually the prompt is enough
            }
        });

        this.updateButtons(isFormValid);
        return isFormValid;
    }

    showLoader() { _showLoader(); }
    hideLoader() { _hideLoader(); }

    // Alias for better naming
    isFormValid() {
        return this.validateForm();
    }

    updateButtons(isValid) {
        if (this.submitButton) {
            this.submitButton.disabled = !isValid;
            this.submitButton.style.opacity = isValid ? '1' : '0.5';
            this.submitButton.style.cursor = isValid ? 'pointer' : 'not-allowed';
        }

        // Handle step buttons visibility/state if needed
        this.nextButtons.forEach(btn => {
            // We check only the current visible step for "Next" buttons
            const currentStep = btn.closest('.step-container');
            if (currentStep) {
                const stepValid = this.validateStep(currentStep);
                btn.disabled = !stepValid;
                btn.style.opacity = stepValid ? '1' : '0.5';
                btn.style.cursor = stepValid ? 'pointer' : 'not-allowed';
            }
        });
    }

    validateStep(stepElement) {
        let isValid = true;
        const fields = Array.from(stepElement.querySelectorAll('[required]'))
            .filter(el => el.type !== 'search' && !el.classList.contains('iti__search-input') && !el.closest('.iti__dropdown-content'));
        fields.forEach(field => {
            if (field.type === 'checkbox') {
                if (!field.checked) isValid = false;
                return;
            }
            if (!field.value.trim()) isValid = false;
            if (field.type === 'email' && !this.validateEmail(field.value)) isValid = false;
            if ((field.type === 'tel' || field.name === 'telefono') && !this.validatePhone(field.value)) isValid = false;
            if (field.name === 'numero_documento' || field.id === 'numero_documento' || field.name === 'nro_documento') {
                const tipo = this.form.querySelector('[name="tipo_doc"], [name="tipo_documento"]')?.value || "DNI";
                if (!this.validateDocument(field.value, tipo)) isValid = false;
            }
        });
        return isValid;
    }
}

// ── Loader overlay ──────────────────────────────────────────────────────────
function _showLoader() {
    document.querySelector('.comsatel-form-loader')?.remove();
    const el = document.createElement('div');
    el.className = 'comsatel-form-loader fixed inset-0 z-[9998] flex items-center justify-center';
    el.style.cssText = 'background:rgba(255,255,255,0.72);backdrop-filter:blur(4px);opacity:0;transition:opacity .25s;';
    el.innerHTML = `
        <div class="bg-white rounded-2xl shadow-2xl flex flex-col items-center gap-3 px-12 py-8">
            <svg class="animate-spin w-12 h-12 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="text-sm font-semibold text-gray-700">Enviando...</span>
        </div>
    `;
    document.body.appendChild(el);
    requestAnimationFrame(() => { el.style.opacity = '1'; });
}

function _hideLoader() {
    const el = document.querySelector('.comsatel-form-loader');
    if (!el) return;
    el.style.opacity = '0';
    setTimeout(() => el.remove(), 250);
}

// Global initialization helper
window.initComsatelValidator = function (formId, options) {
    return new ComsatelValidator(formId, options);
};

window.comsatelShowLoader = _showLoader;
window.comsatelHideLoader = _hideLoader;

// Exponer clase globalmente para compatibilidad con ES modules (Vite HMR)
window.ComsatelValidator = ComsatelValidator;
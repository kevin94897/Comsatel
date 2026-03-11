/**
 * Calculadora de Ahorros - Lógica de cálculo
 */

(function () {
    'use strict';

    // Configuración de la calculadora
    const CONFIG = {
        // Porcentajes de ahorro en combustible desglosados
        savingsPercentagesFuel: {
            savingEficiency:  0.02,   // 2%  — eficiencia de ruta
            savingDriving:    0.08,   // 8%  — mejora de conducción
            savingReduction:  0.03,   // 3%  — reducción de km innecesarios
        },

        // Porcentajes de ahorro en mantenimiento y llantas
        savingsPercentages: {
            maintenance: 0.075,       // 7.5%
            tires:       0.075,       // 7.5%
        },

        // Costos promedio de referencia
        averageCosts: {
            fuelPricePerGallon:  (window.CALCULATOR_DYNAMIC_CONFIG?.fuel_price_per_gallon) || 20.00,
            tiresPerMonth:       ((window.CALCULATOR_DYNAMIC_CONFIG?.tires_cost_annual) || 6000.00) / 12,
            maintenancePerMonth: ((window.CALCULATOR_DYNAMIC_CONFIG?.maintenance_cost_annual) || 9000.00) / 12,
        },
    };

    // Override percentages with dynamic config if available
    if (window.CALCULATOR_DYNAMIC_CONFIG) {
        CONFIG.savingsPercentagesFuel.savingEficiency = parseFloat(window.CALCULATOR_DYNAMIC_CONFIG.saving_efficiency) || CONFIG.savingsPercentagesFuel.savingEficiency;
        CONFIG.savingsPercentagesFuel.savingDriving   = parseFloat(window.CALCULATOR_DYNAMIC_CONFIG.saving_driving)    || CONFIG.savingsPercentagesFuel.savingDriving;
        CONFIG.savingsPercentagesFuel.savingReduction = parseFloat(window.CALCULATOR_DYNAMIC_CONFIG.saving_reduction)  || CONFIG.savingsPercentagesFuel.savingReduction;
        
        CONFIG.savingsPercentages.maintenance = parseFloat(window.CALCULATOR_DYNAMIC_CONFIG.maintenance_savings_pct) || CONFIG.savingsPercentages.maintenance;
        CONFIG.savingsPercentages.tires       = parseFloat(window.CALCULATOR_DYNAMIC_CONFIG.tires_savings_pct)       || CONFIG.savingsPercentages.tires;
    }

    console.log('Calculator Configuration:', CONFIG);
    console.log('Dynamic Data from ACF:', window.CALCULATOR_DYNAMIC_CONFIG);

    // Elementos del DOM
    const elements = {
        form:                    document.getElementById('calculator-form'),
        vehiclesCount:           document.getElementById('vehicles-count'),
        kmPerMonth:              document.getElementById('km-per-month'),
        kmPerGallon:             document.getElementById('km-per-gallon'),
        fuelUnit:                document.getElementById('fuel-unit'),
        overtimeRate:            document.getElementById('overtime-rate'),
        calculateBtn:            document.getElementById('calculate-btn'),

        // Resultados
        totalSavings:            document.getElementById('total-savings'),
        savingsPercentage:       document.getElementById('savings-percentage'),
        fuelSavings:             document.getElementById('fuel-savings'),
        maintenanceSavings:      document.getElementById('maintenance-savings'),
        tiresSavings:            document.getElementById('tires-savings'),
        productivitySavings:     document.getElementById('productivity-savings'),

        // Botones de acción
        emailReportBtn:          document.getElementById('email-report-btn'),
        requestConsultationBtn:  document.getElementById('request-consultation-btn'),
    };

    // Estado de la calculadora
    let calculatorState = {
        vehicles:    40,
        kmPerMonth:  1000,
        kmPerGallon: 40,
        fuelUnit:    'km_gl',
        overtimeRate: 30.00,
        results:     null,
    };

    // ─────────────────────────────────────────────────────────────
    // Inicialización
    // ─────────────────────────────────────────────────────────────
    function init() {
        if (!elements.form) {
            console.warn('Calculator form not found');
            return;
        }

        calculateSavings();

        elements.form.addEventListener('submit', handleFormSubmit);
        elements.vehiclesCount.addEventListener('input',  debounce(calculateSavings, 500));
        elements.kmPerMonth.addEventListener('input',     debounce(calculateSavings, 500));
        elements.kmPerGallon.addEventListener('input',    debounce(calculateSavings, 500));
        elements.fuelUnit.addEventListener('change',      calculateSavings);
        elements.overtimeRate.addEventListener('input',   debounce(calculateSavings, 500));

        if (elements.emailReportBtn) {
            elements.emailReportBtn.addEventListener('click', handleEmailReport);
        }
        if (elements.requestConsultationBtn) {
            elements.requestConsultationBtn.addEventListener('click', handleRequestConsultation);
        }

        initModalListeners();
    }

    // ─────────────────────────────────────────────────────────────
    // Envío del formulario
    // ─────────────────────────────────────────────────────────────
    function handleFormSubmit(e) {
        e.preventDefault();
        calculateSavings();

        elements.calculateBtn.innerHTML = '<span class="inline-block animate-pulse">Calculando...</span>';

        setTimeout(() => {
            elements.calculateBtn.innerHTML = 'Calcular';

            const resultsSection = document.getElementById('results');
            if (resultsSection) {
                resultsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }, 800);
    }

    // ─────────────────────────────────────────────────────────────
    // Cálculo principal
    // ─────────────────────────────────────────────────────────────
    function calculateSavings() {
        const vehicles    = parseFloat(elements.vehiclesCount.value) || 0;
        const kmPerMonth  = parseFloat(elements.kmPerMonth.value)    || 0;
        let   kmPerGallon = parseFloat(elements.kmPerGallon.value)   || 0;
        const fuelUnit    = elements.fuelUnit.value;
        const overtimeRate = parseFloat(elements.overtimeRate.value) || 0;

        if (vehicles <= 0 || kmPerMonth <= 0 || kmPerGallon <= 0) return;

        // Convertir a galones si el usuario ingresó km/litro
        if (fuelUnit === 'km_l') {
            kmPerGallon = kmPerGallon * 3.785; // 1 galón = 3.785 litros
        }

        calculatorState = { vehicles, kmPerMonth, kmPerGallon, fuelUnit, overtimeRate };

        // ── Costos mensuales de la flota ─────────────────────────
        const totalKmPerMonth  = vehicles * kmPerMonth;
        const gallonsPerMonth  = totalKmPerMonth / kmPerGallon;

        const fuelCostPerMonth        = gallonsPerMonth * CONFIG.averageCosts.fuelPricePerGallon;
        const maintenanceCostPerMonth = CONFIG.averageCosts.maintenancePerMonth * vehicles;
        const tiresCostPerMonth       = CONFIG.averageCosts.tiresPerMonth       * vehicles;

        console.log('Inputs:', { vehicles, kmPerMonth, kmPerGallon, fuelUnit, overtimeRate });
        console.log('Base Costs:', { fuelCostPerMonth, maintenanceCostPerMonth, tiresCostPerMonth });

        // ── Ahorros por categoría ────────────────────────────────
        const fuelTotalPct = CONFIG.savingsPercentagesFuel.savingDriving
                           + CONFIG.savingsPercentagesFuel.savingEficiency
                           + CONFIG.savingsPercentagesFuel.savingReduction; // 13%

        const fuelSavings        = fuelCostPerMonth       * fuelTotalPct;
        const maintenanceSavings = maintenanceCostPerMonth * CONFIG.savingsPercentages.maintenance;
        const tiresSavings       = tiresCostPerMonth       * CONFIG.savingsPercentages.tires;

        // Productividad — fórmula del Excel verificada:
        // =((kmPerMonth / 30) * overtimeRate) * savingEficiency * vehicles
        // Interpreta: km diarios promedio × costo hora extra × % de eficiencia recuperada
        // Con valores base: ((1000/30)*30)*0.02*1 = S/20 por vehículo ✓ → total = S/178.75 ✓
        const productivitySavings = ((kmPerMonth / 30) * overtimeRate)
                                  * CONFIG.savingsPercentagesFuel.savingEficiency
                                  * vehicles;

        const totalSavings = fuelSavings + maintenanceSavings + tiresSavings + productivitySavings;

        console.log('Savings:', { fuelSavings, maintenanceSavings, tiresSavings, productivitySavings, totalSavings });

        // Lógica de porcentaje basada en la suma de categorías (según Excel de Comsatel)
        const fuelPct         = (CONFIG.savingsPercentagesFuel.savingDriving + CONFIG.savingsPercentagesFuel.savingEficiency + CONFIG.savingsPercentagesFuel.savingReduction);
        const maintenancePct  = CONFIG.savingsPercentages.maintenance;
        const tiresPct        = CONFIG.savingsPercentages.tires;
        const productivityPct = totalSavings > 0 ? (productivitySavings / totalSavings) : 0;

        const savingsPercentage = ((fuelPct + maintenancePct + tiresPct + productivityPct) * 100).toFixed(2);

        console.log('Percentage Breakdown:', { fuelPct, maintenancePct, tiresPct, productivityPct, total: savingsPercentage });

        calculatorState.results = {
            fuelSavings,
            maintenanceSavings,
            tiresSavings,
            productivitySavings,
            totalSavings,
            savingsPercentage,
        };

        console.log('Calculation Results:', calculatorState.results);

        updateResults(calculatorState.results);
    }

    // ─────────────────────────────────────────────────────────────
    // Actualizar UI
    // ─────────────────────────────────────────────────────────────
    function updateResults(results) {
        animateValue(elements.totalSavings,        0, results.totalSavings,        1000, 'S/ ');
        animateValue(elements.fuelSavings,         0, results.fuelSavings,          800, 'S/ ');
        animateValue(elements.maintenanceSavings,  0, results.maintenanceSavings,   800, 'S/ ');
        animateValue(elements.tiresSavings,        0, results.tiresSavings,         800, 'S/ ');
        animateValue(elements.productivitySavings, 0, results.productivitySavings,  800, 'S/ ');

        elements.savingsPercentage.textContent = results.savingsPercentage + '%';
    }

    function animateValue(element, start, end, duration, prefix = '') {
        const startTime = performance.now();

        function update(currentTime) {
            const elapsed  = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easeOut  = 1 - Math.pow(1 - progress, 3);
            const current  = start + (end - start) * easeOut;

            element.textContent = prefix + current.toFixed(2);

            if (progress < 1) requestAnimationFrame(update);
        }

        requestAnimationFrame(update);
    }

    function debounce(func, wait) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func(...args), wait);
        };
    }

    // ─────────────────────────────────────────────────────────────
    // Modal de email
    // ─────────────────────────────────────────────────────────────
    function handleEmailReport() {
        if (!calculatorState.results) return;
        openEmailModal();
    }

    function openEmailModal() {
        const modal = document.getElementById('email-modal');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeEmailModal() {
        const modal = document.getElementById('email-modal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';

            const form = document.getElementById('email-report-form');
            if (form) form.reset();
        }
    }

    function handleEmailFormSubmit(e) {
        e.preventDefault();

        const form    = e.target;
        const name    = form.querySelector('#user-name').value;
        const email   = form.querySelector('#user-email').value;
        const consent = form.querySelector('#consent-checkbox').checked;

        if (!validateEmail(email) || !consent) return;

        const submitBtn   = form.querySelector('#submit-email-report');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span class="inline-block animate-pulse">Enviando...</span>';
        submitBtn.disabled  = true;

        const r = calculatorState.results;

        fetch('/wp-admin/admin-ajax.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                action:             'send_calculator_report',
                name,
                email,
                consent,
                vehicles:           calculatorState.vehicles,
                kmPerMonth:         calculatorState.kmPerMonth,
                kmPerGallon:        calculatorState.kmPerGallon,
                fuelUnit:           calculatorState.fuelUnit,
                totalSavings:       r.totalSavings.toFixed(2),
                savingsPercentage:  r.savingsPercentage,
                fuelSavings:        r.fuelSavings.toFixed(2),
                maintenanceSavings: r.maintenanceSavings.toFixed(2),
                tiresSavings:       r.tiresSavings.toFixed(2),
                productivitySavings: r.productivitySavings.toFixed(2),
            }),
        })
        .then(res => res.json())
        .then(data => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled  = false;

            if (data.success) {
                submitBtn.textContent = 'Reporte enviado exitosamente';
                submitBtn.disabled    = true;
                setTimeout(closeEmailModal, 3000);
            } else {
                const msg = 'Error al enviar el reporte: ' + (data.data || 'Inténtalo de nuevo');
                window.calculatorValidator
                    ? window.calculatorValidator.showNotification(msg)
                    : alert(msg);
            }
        })
        .catch(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled  = false;
            const msg = 'Error al enviar el reporte. Por favor, inténtalo de nuevo.';
            window.calculatorValidator
                ? window.calculatorValidator.showNotification(msg)
                : alert(msg);
        });
    }

    function initModalListeners() {
        document.getElementById('close-modal')
            ?.addEventListener('click', closeEmailModal);

        document.getElementById('email-modal')
            ?.addEventListener('click', e => { if (e.target === e.currentTarget) closeEmailModal(); });

        document.getElementById('email-report-form')
            ?.addEventListener('submit', handleEmailFormSubmit);

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeEmailModal();
        });
    }

    // ─────────────────────────────────────────────────────────────
    // Solicitud de asesoría
    // ─────────────────────────────────────────────────────────────
    function handleRequestConsultation() {
        if (!calculatorState.results) {
            alert('Por favor, calcula los ahorros primero');
            return;
        }

        const params = new URLSearchParams({
            vehicles: calculatorState.vehicles,
            savings:  calculatorState.results.totalSavings.toFixed(2),
        });

        // Descomentar para redirigir a contacto:
        // window.location.href = '/contacto?' + params.toString();

        window.calculatorValidator
            ? window.calculatorValidator.showNotification('Redirigiendo a formulario de contacto...', 'info')
            : alert('Redirigiendo a formulario de contacto...');
    }

    // ─────────────────────────────────────────────────────────────
    // Utilidades
    // ─────────────────────────────────────────────────────────────
    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // Arrancar
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
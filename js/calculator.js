/**
 * Calculadora de Ahorros - Lógica de cálculo
 */

(function () {
    'use strict';

    // Configuración de la calculadora
    const CONFIG = {
        // Porcentajes de ahorro por categoría (ajustar según datos reales)
        savingsPercentages: {
            fuel: 0.11,          // 11% de ahorro en combustible
            maintenance: 0.075,   // 7.5% de ahorro en mantenimiento
            tires: 0.075,         // 7.5% de ahorro en llantas
            productivity: 0.1119   // 11.19% de ahorro en productividad
        },

        // Costos promedio (según datos del administrador)
        averageCosts: {
            fuelPricePerGallon: 20.00,              // Precio del combustible: S/ 20.00 por galón
            tiresPerYear: 6000.00,                  // Precio de llantas: S/ 6,000.00 anual
            maintenancePerYear: 9000.00,            // Costos mantenimientos: S/ 9,000.00 anual
            overtimeHourRate: 30.00,                // Costo promedio hora extra: S/ 30.00
            // Convertir valores anuales a mensuales para cálculos
            tiresPerMonth: 6000.00 / 12,            // S/ 500 por mes
            maintenancePerMonth: 9000.00 / 12       // S/ 750 por mes
        },

        savingsPercentagesFuel: {
            savingEficiency: 0.02,
            savingDriving: 0.08,
            savingReduction: 0.03,
        },
    };

    // Elementos del DOM
    const elements = {
        form: document.getElementById('calculator-form'),
        vehiclesCount: document.getElementById('vehicles-count'),
        kmPerMonth: document.getElementById('km-per-month'),
        kmPerGallon: document.getElementById('km-per-gallon'),
        fuelUnit: document.getElementById('fuel-unit'),
        calculateBtn: document.getElementById('calculate-btn'),

        // Resultados
        totalSavings: document.getElementById('total-savings'),
        savingsPercentage: document.getElementById('savings-percentage'),
        fuelSavings: document.getElementById('fuel-savings'),
        maintenanceSavings: document.getElementById('maintenance-savings'),
        tiresSavings: document.getElementById('tires-savings'),
        productivitySavings: document.getElementById('productivity-savings'),

        // Botones de acción
        emailReportBtn: document.getElementById('email-report-btn'),
        requestConsultationBtn: document.getElementById('request-consultation-btn')
    };

    // Estado de la calculadora
    let calculatorState = {
        vehicles: 40,
        kmPerMonth: 1000,
        kmPerGallon: 40,
        fuelUnit: 'km_gl',
        results: null
    };

    /**
     * Inicializar la calculadora
     */
    function init() {
        if (!elements.form) {
            console.warn('Calculator form not found');
            return;
        }

        // Calcular valores iniciales
        calculateSavings();

        // Event Listeners
        elements.form.addEventListener('submit', handleFormSubmit);

        // Actualizar en tiempo real cuando cambian los valores
        elements.vehiclesCount.addEventListener('input', debounce(calculateSavings, 500));
        elements.kmPerMonth.addEventListener('input', debounce(calculateSavings, 500));
        elements.kmPerGallon.addEventListener('input', debounce(calculateSavings, 500));
        elements.fuelUnit.addEventListener('change', calculateSavings);

        // Botones de acción
        if (elements.emailReportBtn) {
            elements.emailReportBtn.addEventListener('click', handleEmailReport);
        }

        if (elements.requestConsultationBtn) {
            elements.requestConsultationBtn.addEventListener('click', handleRequestConsultation);
        }

        // Inicializar listeners del modal
        initModalListeners();

        console.log('Calculator initialized');
    }

    /**
     * Manejar envío del formulario
     */
    function handleFormSubmit(e) {
        e.preventDefault();
        calculateSavings();

        // Animación del botón
        elements.calculateBtn.innerHTML = '<span class="inline-block animate-pulse">Calculando...</span>';

        setTimeout(() => {
            elements.calculateBtn.innerHTML = 'Calcular';

            // Scroll suave a la sección de resultados
            const resultsSection = document.getElementById('results');
            if (resultsSection) {
                resultsSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start',
                    inline: 'nearest'
                });
            }
        }, 800);
    }

    /**
     * Calcular ahorros
     */
    function calculateSavings() {
        // Obtener valores del formulario
        const vehicles = parseFloat(elements.vehiclesCount.value) || 0;
        const kmPerMonth = parseFloat(elements.kmPerMonth.value) || 0;
        let kmPerGallon = parseFloat(elements.kmPerGallon.value) || 0;
        const fuelUnit = elements.fuelUnit.value;

        // Validar valores
        if (vehicles <= 0 || kmPerMonth <= 0 || kmPerGallon <= 0) {
            console.warn('Valores incorrectos');
            return;
        }

        // Convertir a galones si está en litros
        if (fuelUnit === 'km_l') {
            kmPerGallon = kmPerGallon * 3.785; // 1 galón = 3.785 litros
        }

        // Actualizar estado
        calculatorState = {
            vehicles,
            kmPerMonth,
            kmPerGallon,
            fuelUnit
        };

        // Calcular consumo total de combustible por mes
        const totalKmPerMonth = vehicles * kmPerMonth;
        const gallonsPerMonth = totalKmPerMonth / kmPerGallon;
        const fuelCostPerMonth = gallonsPerMonth * CONFIG.averageCosts.fuelPricePerGallon;

        // Calcular costos mensuales por vehículo
        const maintenanceCostPerMonth = CONFIG.averageCosts.maintenancePerMonth * vehicles;
        const tiresCostPerMonth = CONFIG.averageCosts.tiresPerMonth * vehicles;
        const productivityCostPerMonth = (kmPerMonth / 30) * CONFIG.savingsPercentagesFuel.savingEficiency * vehicles;

        // Calcular ahorros por categoría
        const fuelSavings = fuelCostPerMonth * CONFIG.savingsPercentagesFuel.savingDriving + fuelCostPerMonth * CONFIG.savingsPercentagesFuel.savingEficiency + fuelCostPerMonth * CONFIG.savingsPercentagesFuel.savingReduction;
        const maintenanceSavings = maintenanceCostPerMonth * CONFIG.savingsPercentages.maintenance;
        const tiresSavings = tiresCostPerMonth * CONFIG.savingsPercentages.tires;
        // const productivitySavings = productivityCostPerMonth * CONFIG.savingsPercentages.productivity;
        const productivitySavings = productivityCostPerMonth * CONFIG.averageCosts.overtimeHourRate;


        // Calcular ahorro total
        const totalSavings = fuelSavings + maintenanceSavings + tiresSavings + productivitySavings;

        const percentageProductivity = Number((productivitySavings / totalSavings).toFixed(4));

        // Calcular costos operativos totales
        const totalOperationalCosts = fuelCostPerMonth + maintenanceCostPerMonth + tiresCostPerMonth + productivityCostPerMonth;

        // Calcular porcentaje de ahorro
        const savingsPercentage = ((percentageProductivity + CONFIG.savingsPercentagesFuel.savingDriving + CONFIG.savingsPercentagesFuel.savingEficiency + CONFIG.savingsPercentagesFuel.savingReduction + CONFIG.savingsPercentages.maintenance + CONFIG.savingsPercentages.tires) * 100).toFixed(2);
        console.log("percentageProductivity:" + percentageProductivity);
        console.log("CONFIG.savingsPercentagesFuel.savingDriving:" + CONFIG.savingsPercentagesFuel.savingDriving);
        console.log("CONFIG.savingsPercentagesFuel.savingEficiency:" + CONFIG.savingsPercentagesFuel.savingEficiency);
        console.log("CONFIG.savingsPercentagesFuel.savingReduction:" + CONFIG.savingsPercentagesFuel.savingReduction);
        console.log("CONFIG.savingsPercentages.maintenance:" + CONFIG.savingsPercentages.maintenance);
        console.log("CONFIG.savingsPercentages.tires:" + CONFIG.savingsPercentages.tires);
        console.log("savingsPercentage:" + savingsPercentage);

        // Guardar resultados
        calculatorState.results = {
            fuelSavings,
            maintenanceSavings,
            tiresSavings,
            productivitySavings,
            totalSavings,
            savingsPercentage
        };

        // Actualizar UI
        updateResults(calculatorState.results);
    }

    /**
     * Actualizar resultados en la UI
     */
    function updateResults(results) {
        // Formatear números con animación
        animateValue(elements.totalSavings, 0, results.totalSavings, 1000, 'S/ ');
        animateValue(elements.fuelSavings, 0, results.fuelSavings, 800, 'S/ ');
        animateValue(elements.maintenanceSavings, 0, results.maintenanceSavings, 800, 'S/ ');
        animateValue(elements.tiresSavings, 0, results.tiresSavings, 800, 'S/ ');
        animateValue(elements.productivitySavings, 0, results.productivitySavings, 800, 'S/ ');

        // Actualizar porcentaje
        elements.savingsPercentage.textContent = results.savingsPercentage + '%';
    }

    /**
     * Animar valores numéricos
     */
    function animateValue(element, start, end, duration, prefix = '') {
        const startTime = performance.now();

        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Easing function (ease-out)
            const easeOut = 1 - Math.pow(1 - progress, 3);
            const current = start + (end - start) * easeOut;

            element.textContent = prefix + current.toFixed(2);

            if (progress < 1) {
                requestAnimationFrame(update);
            }
        }

        requestAnimationFrame(update);
    }

    /**
     * Debounce function
     */
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    /**
     * Manejar envío de reporte por correo
     */
    function handleEmailReport() {
        if (!calculatorState.results) {
            // Results section will show appropriate message
            return;
        }

        // Abrir el modal
        openEmailModal();
    }

    /**
     * Abrir modal de email
     */
    function openEmailModal() {
        const modal = document.getElementById('email-modal');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden'; // Prevenir scroll del body
        }
    }

    /**
     * Cerrar modal de email
     */
    function closeEmailModal() {
        const modal = document.getElementById('email-modal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = ''; // Restaurar scroll del body

            // Limpiar formulario
            const form = document.getElementById('email-report-form');
            if (form) {
                form.reset();
            }
        }
    }

    /**
     * Manejar envío del formulario de email
     */
    function handleEmailFormSubmit(e) {
        e.preventDefault();

        const form = e.target;
        const name = form.querySelector('#user-name').value;
        const email = form.querySelector('#user-email').value;
        const consent = form.querySelector('#consent-checkbox').checked;

        if (!validateEmail(email)) {
            // Form validator handles email validation inline
            return;
        }

        if (!consent) {
            // Checkbox validation handled by form validator
            return;
        }

        // Preparar datos para enviar
        const reportData = {
            name: name,
            email: email,
            consent: consent,
            calculatorData: {
                vehicles: calculatorState.vehicles,
                kmPerMonth: calculatorState.kmPerMonth,
                kmPerGallon: calculatorState.kmPerGallon,
                fuelUnit: calculatorState.fuelUnit,
                results: calculatorState.results
            }
        };

        // Mostrar mensaje de envío
        const submitBtn = form.querySelector('#submit-email-report');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span class="inline-block animate-pulse">Enviando...</span>';
        submitBtn.disabled = true;

        // Enviar reporte vía AJAX
        fetch('/wp-admin/admin-ajax.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'send_calculator_report',
                name: reportData.name,
                email: reportData.email,
                consent: reportData.consent,
                vehicles: reportData.calculatorData.vehicles,
                kmPerMonth: reportData.calculatorData.kmPerMonth,
                kmPerGallon: reportData.calculatorData.kmPerGallon,
                fuelUnit: reportData.calculatorData.fuelUnit,
                totalSavings: reportData.calculatorData.results.totalSavings.toFixed(2),
                savingsPercentage: reportData.calculatorData.results.savingsPercentage,
                fuelSavings: reportData.calculatorData.results.fuelSavings.toFixed(2),
                maintenanceSavings: reportData.calculatorData.results.maintenanceSavings.toFixed(2),
                tiresSavings: reportData.calculatorData.results.tiresSavings.toFixed(2),
                productivitySavings: reportData.calculatorData.results.productivitySavings.toFixed(2)
            })
        })
            .then(response => response.json())
            .then(data => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;

                if (data.success) {
                    console.log('¡Reporte enviado exitosamente! Revisa tu correo.');
                    submitBtn.textContent = 'Reporte enviado exitosamente';
                    submitBtn.disabled = true;
                    setTimeout(() => {
                        closeEmailModal();
                    }, 3000);
                } else {
                    if (window.calculatorValidator) {
                        window.calculatorValidator.showNotification('Error al enviar el reporte: ' + (data.data || 'Inténtalo de nuevo'));
                    } else {
                        alert('Error al enviar el reporte: ' + (data.data || 'Inténtalo de nuevo'));
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                if (window.calculatorValidator) {
                    window.calculatorValidator.showNotification('Error al enviar el reporte. Por favor, inténtalo de nuevo.');
                } else {
                    alert('Error al enviar el reporte. Por favor, inténtalo de nuevo.');
                }
            });
    }

    /**
     * Inicializar event listeners del modal
     */
    function initModalListeners() {
        // Botón cerrar modal
        const closeBtn = document.getElementById('close-modal');
        if (closeBtn) {
            closeBtn.addEventListener('click', closeEmailModal);
        }

        // Click fuera del modal para cerrar
        const modal = document.getElementById('email-modal');
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeEmailModal();
                }
            });
        }

        // Formulario de email
        const emailForm = document.getElementById('email-report-form');
        if (emailForm) {
            emailForm.addEventListener('submit', handleEmailFormSubmit);
        }

        // Cerrar con tecla ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeEmailModal();
            }
        });
    }


    /**
     * Manejar solicitud de asesoría
     */
    function handleRequestConsultation() {
        if (!calculatorState.results) {
            alert('Por favor, calcula los ahorros primero');
            return;
        }

        // Redirigir a página de contacto o abrir modal
        // Puedes pasar los datos de la calculadora como parámetros
        const params = new URLSearchParams({
            vehicles: calculatorState.vehicles,
            savings: calculatorState.results.totalSavings.toFixed(2)
        });

        // Opción 1: Redirigir a página de contacto
        // window.location.href = '/contacto?' + params.toString();

        // Opción 2: Abrir modal de contacto
        console.log('Solicitar asesoría con datos:', calculatorState);
        if (window.calculatorValidator) {
            window.calculatorValidator.showNotification('Redirigiendo a formulario de contacto...', 'info');
        } else {
            alert('Redirigiendo a formulario de contacto...');
        }

        // Implementar según tus necesidades
    }

    /**
     * Validar email
     */
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();

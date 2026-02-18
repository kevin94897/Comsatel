/**
 * Form Validator Initialization
 */
document.addEventListener('DOMContentLoaded', function () {
    // 1. Cotizador Form (Modal)
    if (document.getElementById('cotizador-form')) {
        window.cotizadorValidator = new ComsatelValidator('cotizador-form', {
            nextButtonSelector: '#next-to-step-2, .btn-next'
        });
    }

    // 2. Contact Form
    if (document.getElementById('contacto-form')) {
        window.contactoValidator = new ComsatelValidator('contacto-form');
    }

    // 3. Libro de Reclamaciones
    if (document.getElementById('reclamaciones-form')) {
        window.reclamosValidator = new ComsatelValidator('reclamaciones-form', {
            nextButtonSelector: '.btn-next'
        });
    }

    // 4. Update Data Form
    if (document.getElementById('actualizar-datos-form')) {
        window.actualizarValidator = new ComsatelValidator('actualizar-datos-form');
    }

    // 5. Calculator Form
    if (document.getElementById('calculator-form')) {
        window.calculatorValidator = new ComsatelValidator('calculator-form');
    }

    // 6. Email Report Modal
    if (document.getElementById('email-report-form')) {
        window.emailReportValidator = new ComsatelValidator('email-report-form');
    }

    // 7. Newsletter Forms
    const newsletterForms = document.querySelectorAll('section-newsletter form, .newsletter-form');
    newsletterForms.forEach((form, index) => {
        form.id = form.id || `newsletter-form-${index}`;
        new ComsatelValidator(form.id);
    });
});

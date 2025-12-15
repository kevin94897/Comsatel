<?php

/**
 * Template Name: Libro de Reclamaciones
 */

get_header();
?>

<style>
    /* Estilos para los pasos verticales */
    .step-indicator-vertical {
        position: relative;
    }

    .step-item-vertical {
        position: relative;
        transition: all 0.3s ease;
    }

    .step-item-vertical::before {
        content: '';
        position: absolute;
        left: 17px;
        top: 35px;
        width: 2px;
        height: calc(100% + 24px);
        background: #E5E7EB;
        z-index: 0;
    }

    .step-item-vertical:last-child::before {
        display: none;
    }

    .step-number {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        transition: all 0.3s ease;
        background: white;
        border: 2px solid #E5E7EB;
        color: #9CA3AF;
        position: relative;
        z-index: 1;
    }

    .step-item-vertical.active .step-number {
        background: linear-gradient(135deg, #FF4D4D 0%, #ff6b6b 100%);
        border-color: #FF4D4D;
        color: white;
        box-shadow: 0 4px 12px rgba(255, 77, 77, 0.3);
        transform: scale(1.1);
    }

    .step-item-vertical.completed .step-number {
        background: #10B981;
        border-color: #10B981;
        color: white;
    }

    .step-item-vertical.completed::before {
        background: #10B981;
    }

    .step-label {
        color: #6B7280;
        transition: color 0.3s ease;
    }

    .step-item-vertical.active .step-label {
        color: #FF4D4D;
    }

    .step-item-vertical.completed .step-label {
        color: #10B981;
    }

    /* Animaciones para transiciones de pasos */
    .step-content {
        animation: fadeInUp 0.5s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Estilos para inputs y selects usando Tailwind */
    .form-input,
    .form-select,
    .form-textarea {
        @apply w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300;
    }

    .form-label {
        @apply block text-sm font-medium text-gray-700 mb-2;
    }

    /* Botón de siguiente */
    .btn-next {
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-next::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn-next:hover::before {
        left: 100%;
    }

    .btn-next:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(255, 77, 77, 0.4);
    }

    /* Radio buttons personalizados */
    .custom-radio {
        position: relative;
        padding-left: 2rem;
        cursor: pointer;
    }

    .custom-radio input[type="radio"] {
        position: absolute;
        opacity: 0;
    }

    .custom-radio .radio-mark {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        border: 2px solid #D1D5DB;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .custom-radio input[type="radio"]:checked~.radio-mark {
        border-color: #FF4D4D;
        background: #FF4D4D;
        box-shadow: 0 0 0 4px rgba(255, 77, 77, 0.1);
    }

    .custom-radio .radio-mark::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
        transition: transform 0.2s ease;
    }

    .custom-radio input[type="radio"]:checked~.radio-mark::after {
        transform: translate(-50%, -50%) scale(1);
    }

    /* File upload personalizado */
    .file-upload-wrapper {
        position: relative;
        border: 2px dashed #D1D5DB;
        border-radius: 0.5rem;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .file-upload-wrapper:hover {
        border-color: #FF4D4D;
        background: rgba(255, 77, 77, 0.02);
    }

    .file-upload-wrapper input[type="file"] {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        cursor: pointer;
    }
</style>

<main id="primary" class="site-main">

    <!-- Formulario de Reclamaciones -->
    <section class="py-12 py-24 md:py-32 min-h-screen flex md:items-center items-start md:justify-center justify-start">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">

                <!-- Grid Layout: Sidebar + Formulario -->
                <div class="grid lg:grid-cols-3 gap-8 lg:gap-12">

                    <!-- Columna Izquierda: Step Indicator + Info -->
                    <aside class="lg:col-span-1" data-aos="fade-right" data-aos-duration="800">
                        <div class="lg:sticky lg:top-24 space-y-8">

                            <!-- Título y Descripción -->
                            <div class="mb-8">
                                <h2 class="text-2xl md:text-4xl font-normal text-dark mb-4">
                                    Lamentamos mucho lo sucedido
                                </h2>
                                <p class="text-gray-600 leading-relaxed">
                                    Cuéntanos tu reclamo para encontrar una pronta solución
                                </p>
                            </div>

                            <!-- Indicador de Pasos Vertical -->
                            <div class="step-indicator-vertical space-y-6">
                                <div class="step-item-vertical active" data-step="1">
                                    <div class="flex items-start gap-4">
                                        <div class="step-number flex-shrink-0">1</div>
                                        <div class="flex-1">
                                            <h3 class="step-label font-semibold text-base mb-1">Datos del Reclamante</h3>
                                            <p class="text-sm text-gray-500">Información personal del reclamante</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="step-item-vertical" data-step="2">
                                    <div class="flex items-start gap-4">
                                        <div class="step-number flex-shrink-0">2</div>
                                        <div class="flex-1">
                                            <h3 class="step-label font-semibold text-base mb-1">Datos del Usuario Titular</h3>
                                            <p class="text-sm text-gray-500">Solo si eres trabajador</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="step-item-vertical" data-step="3">
                                    <div class="flex items-start gap-4">
                                        <div class="step-number flex-shrink-0">3</div>
                                        <div class="flex-1">
                                            <h3 class="step-label font-semibold text-base mb-1">Detalle del reclamo</h3>
                                            <p class="text-sm text-gray-500">Describe tu situación</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </aside>

                    <!-- Columna Derecha: Formulario (más grande) -->
                    <div class="lg:col-span-2" data-aos="fade-left" data-aos-duration="1000">
                        <div class="bg-white md:p-10">
                            <form id="reclamaciones-form" class="space-y-8">

                                <!-- PASO 1: Datos del Reclamante -->
                                <div class="step-content" data-step-content="1">
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <!-- Nombre Completo -->
                                        <div>
                                            <label class="form-label" for="nombre_completo">Nombre Completo</label>
                                            <input type="text" id="nombre_completo" name="nombre_completo"
                                                class="form-input" placeholder="Ej. Ana Torre" required>
                                        </div>

                                        <!-- Tipo de Documento -->
                                        <div>
                                            <label class="form-label" for="tipo_documento">Tipo de Documento</label>
                                            <select id="tipo_documento" name="tipo_documento" class="form-select" required>
                                                <option value="">Selecciona</option>
                                                <option value="DNI">DNI</option>
                                                <option value="CE">Carnet de Extranjería</option>
                                                <option value="Pasaporte">Pasaporte</option>
                                                <option value="RUC">RUC</option>
                                            </select>
                                        </div>

                                        <!-- N° Documento -->
                                        <div>
                                            <label class="form-label" for="numero_documento">N° Documento</label>
                                            <input type="text" id="numero_documento" name="numero_documento"
                                                class="form-input" placeholder="Ej. 74218605" required>
                                        </div>

                                        <!-- Teléfono -->
                                        <div>
                                            <label class="form-label" for="telefono">Teléfono</label>
                                            <input type="tel" id="telefono" name="telefono"
                                                class="form-input" placeholder="Ej. 987654321" required>
                                        </div>

                                        <!-- Email -->
                                        <div class="md:col-span-2">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" name="email"
                                                class="form-input" placeholder="ejemplo@correo.com" required>
                                        </div>

                                        <!-- Tipo de Reclamante -->
                                        <div class="md:col-span-2">
                                            <label class="form-label">Tipo de Reclamante</label>
                                            <div class="grid md:grid-cols-2 gap-4">
                                                <label class="custom-radio flex items-center p-4 border border-gray-300 rounded-md hover:border-primary transition-colors">
                                                    <input type="radio" name="tipo_reclamante" value="Titular" required>
                                                    <span class="radio-mark"></span>
                                                    <span class="ml-3 font-medium">Titular</span>
                                                </label>
                                                <label class="custom-radio flex items-center p-4 border border-gray-300 rounded-md hover:border-primary transition-colors">
                                                    <input type="radio" name="tipo_reclamante" value="Trabajador" required>
                                                    <span class="radio-mark"></span>
                                                    <span class="ml-3 font-medium">Trabajador</span>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Departamento (solo visible si es Trabajador) -->
                                        <div id="departamento_field" class="md:col-span-2 hidden">
                                            <label class="form-label" for="departamento">Departamento</label>
                                            <select id="departamento" name="departamento" class="form-select">
                                                <option value="">Seleccione</option>
                                                <option value="Ventas">Ventas</option>
                                                <option value="Soporte Técnico">Soporte Técnico</option>
                                                <option value="Administración">Administración</option>
                                                <option value="Logística">Logística</option>
                                                <option value="Recursos Humanos">Recursos Humanos</option>
                                            </select>
                                        </div>

                                        <!-- Empresa (solo visible si es Trabajador) -->
                                        <div id="empresa_field" class="md:col-span-2 hidden">
                                            <label class="form-label" for="empresa">Empresa</label>
                                            <input type="text" id="empresa" name="empresa"
                                                class="form-input" placeholder="Nombre de la empresa">
                                        </div>
                                    </div>

                                    <div class="flex justify-end mt-8">
                                        <button type="button" class="btn-next bg-primary text-white px-8 py-3 rounded-md font-semibold flex items-center gap-2 hover:bg-primary-600 transition-all" onclick="nextStep(1)">
                                            Siguiente
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- PASO 2: Datos del Usuario Titular -->
                                <div class="step-content hidden" data-step-content="2">
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <!-- Nombre Completo Titular -->
                                        <div>
                                            <label class="form-label" for="nombre_titular">Nombre Completo</label>
                                            <input type="text" id="nombre_titular" name="nombre_titular"
                                                class="form-input" placeholder="Ej. Ana Torre">
                                        </div>

                                        <!-- Tipo de Documento Titular -->
                                        <div>
                                            <label class="form-label" for="tipo_documento_titular">Tipo de Documento</label>
                                            <select id="tipo_documento_titular" name="tipo_documento_titular" class="form-select">
                                                <option value="">Seleccione</option>
                                                <option value="DNI">DNI</option>
                                                <option value="CE">Carnet de Extranjería</option>
                                                <option value="Pasaporte">Pasaporte</option>
                                                <option value="RUC">RUC</option>
                                            </select>
                                        </div>

                                        <!-- N° Documento Titular -->
                                        <div>
                                            <label class="form-label" for="numero_documento_titular">N° Documento</label>
                                            <input type="text" id="numero_documento_titular" name="numero_documento_titular"
                                                class="form-input" placeholder="Ej. 74218605">
                                        </div>

                                        <!-- Teléfono Titular -->
                                        <div>
                                            <label class="form-label" for="telefono_titular">Teléfono</label>
                                            <input type="tel" id="telefono_titular" name="telefono_titular"
                                                class="form-input" placeholder="Ej. 987654321">
                                        </div>

                                        <!-- Email Titular -->
                                        <div class="md:col-span-2">
                                            <label class="form-label" for="email_titular">Email</label>
                                            <input type="email" id="email_titular" name="email_titular"
                                                class="form-input" placeholder="ejemplo@correo.com">
                                        </div>
                                    </div>

                                    <div class="flex justify-between mt-8">
                                        <button type="button" class="bg-gray-300 text-gray-700 px-8 py-3 rounded-md font-semibold flex items-center gap-2 hover:bg-gray-400 transition-all" onclick="prevStep(2)">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                            </svg>
                                            Anterior
                                        </button>
                                        <button type="button" class="btn-next bg-primary text-white px-8 py-3 rounded-md font-semibold flex items-center gap-2 hover:bg-primary-600 transition-all" onclick="nextStep(2)">
                                            Siguiente
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- PASO 3: Detalle del Reclamo -->
                                <div class="step-content hidden" data-step-content="3">
                                    <div class="space-y-6">
                                        <!-- Reclamo o Queja -->
                                        <div>
                                            <label class="form-label">Reclamo o Queja</label>
                                            <div class="grid md:grid-cols-2 gap-4">
                                                <label class="custom-radio flex items-center p-4 border border-gray-300 rounded-md hover:border-primary transition-colors">
                                                    <input type="radio" name="tipo_solicitud" value="Reclamo" required checked>
                                                    <span class="radio-mark"></span>
                                                    <span class="ml-3 font-medium">Reclamo</span>
                                                </label>
                                                <label class="custom-radio flex items-center p-4 border border-gray-300 rounded-md hover:border-primary transition-colors">
                                                    <input type="radio" name="tipo_solicitud" value="Queja" required>
                                                    <span class="radio-mark"></span>
                                                    <span class="ml-3 font-medium">Queja</span>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Plan -->
                                        <div>
                                            <label class="form-label" for="plan">Plan</label>
                                            <select id="plan" name="plan" class="form-select" required>
                                                <option value="">Selecciona</option>
                                                <option value="GPS Básico">GPS Básico</option>
                                                <option value="GPS Premium">GPS Premium</option>
                                                <option value="GPS Empresarial">GPS Empresarial</option>
                                                <option value="Monitoreo 24/7">Monitoreo 24/7</option>
                                            </select>
                                        </div>

                                        <!-- Tu Comentario -->
                                        <div>
                                            <label class="form-label" for="comentario">Tu Comentario</label>
                                            <textarea id="comentario" name="comentario" rows="5"
                                                class="form-textarea" placeholder="Describe tu reclamo o queja..." required></textarea>
                                        </div>

                                        <!-- Tipo del reclamo -->
                                        <div>
                                            <label class="form-label">Tipo del reclamo</label>
                                            <div class="grid md:grid-cols-2 gap-4">
                                                <label class="custom-radio flex items-center p-4 border border-gray-300 rounded-md hover:border-primary transition-colors">
                                                    <input type="radio" name="tipo_reclamo" value="Correo electrónico" required>
                                                    <span class="radio-mark"></span>
                                                    <span class="ml-3 font-medium">Correo electrónico</span>
                                                </label>
                                                <label class="custom-radio flex items-center p-4 border border-gray-300 rounded-md hover:border-primary transition-colors">
                                                    <input type="radio" name="tipo_reclamo" value="Vía telefónica" required>
                                                    <span class="radio-mark"></span>
                                                    <span class="ml-3 font-medium">Vía telefónica</span>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Archivo adjunto -->
                                        <div>
                                            <label class="form-label">Archivo adjunto en relación al Reclamo</label>
                                            <div class="file-upload-wrapper">
                                                <input type="file" id="archivo" name="archivo" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                                <div class="pointer-events-none">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <p class="text-sm text-gray-600">
                                                        <span class="font-semibold text-primary">Cargar un archivo</span> o arrastra y suelta
                                                    </p>
                                                    <p class="text-xs text-gray-500 mt-1">PDF, JPG, PNG hasta 10MB</p>
                                                </div>
                                            </div>
                                            <p id="file-name" class="text-sm text-gray-600 mt-2"></p>
                                        </div>
                                    </div>

                                    <div class="flex justify-between mt-8">
                                        <button type="button" class="bg-gray-300 text-gray-700 px-8 py-3 rounded-md font-semibold flex items-center gap-2 hover:bg-gray-400 transition-all" onclick="prevStep(3)">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                            </svg>
                                            Anterior
                                        </button>
                                        <button type="submit" class="btn-next bg-primary text-white px-8 py-3 rounded-md font-semibold flex items-center gap-2 hover:bg-primary-600 transition-all">
                                            Enviar
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>


                            </form>

                            <!-- Mensaje de Éxito (Oculto inicialmente) -->
                            <div id="success-message" class="hidden text-center py-12">
                                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">¡Reclamo Enviado!</h3>
                                <p class="text-gray-600 mb-8">Hemos recibido tu información correctamente. Te hemos enviado un correo de confirmación con los detalles.</p>
                                <button onclick="location.reload()" class="bg-primary text-white px-8 py-3 rounded-md font-semibold hover:bg-primary-600 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                    Volver al inicio
                                </button>
                            </div>

                        </div>
                    </div>
                    <!-- Fin Columna Derecha -->

                </div>
                <!-- Fin Grid Layout -->

            </div>
        </div>
    </section>

</main>

<script>
    const ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
    const security_nonce = '<?php echo wp_create_nonce('comsatel_reclamo_nonce'); ?>';

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('reclamaciones-form');
        const tipoReclamanteInputs = document.querySelectorAll('input[name="tipo_reclamante"]');
        const departamentoField = document.getElementById('departamento_field');
        const empresaField = document.getElementById('empresa_field');
        const fileInput = document.getElementById('archivo');
        const fileName = document.getElementById('file-name');
        const successMessage = document.getElementById('success-message');

        // Manejar cambio de tipo de reclamante
        tipoReclamanteInputs.forEach(input => {
            input.addEventListener('change', function() {
                if (this.value === 'Trabajador') {
                    departamentoField.classList.remove('hidden');
                    empresaField.classList.remove('hidden');
                    document.getElementById('departamento').required = true;
                    document.getElementById('empresa').required = true;
                } else {
                    departamentoField.classList.add('hidden');
                    empresaField.classList.add('hidden');
                    document.getElementById('departamento').required = false;
                    document.getElementById('empresa').required = false;
                }
            });
        });

        // Mostrar nombre del archivo seleccionado
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                fileName.textContent = 'Archivo seleccionado: ' + this.files[0].name;
            } else {
                fileName.textContent = '';
            }
        });

        // Manejar envío del formulario
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Botón de envío - Estado Cargando
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Enviando...
            `;

            // Preparar FormData
            const formData = new FormData(form);
            formData.append('action', 'enviar_reclamo');
            formData.append('security', security_nonce);

            // Enviar via Fetch
            fetch(ajax_url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Ocultar form y mostrar mensaje de éxito
                        form.classList.add('hidden');
                        successMessage.classList.remove('hidden');
                        document.querySelector('.step-indicator-vertical').style.display = 'none'; // Opcional: ocultar steps

                        // Scroll suave hacia el mensaje
                        successMessage.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });

                    } else {
                        alert('Error: ' + (data.data.message || 'Ocurrió un error inesperado.'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ocurrió un error al procesar tu solicitud. Por favor intenta nuevamente.');
                })
                .finally(() => {
                    // Restaurar botón (solo si hubo error, si hubo éxito el form se oculta)
                    if (!form.classList.contains('hidden')) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                    }
                });
        });
    });

    // Función para ir al siguiente paso
    function nextStep(currentStep) {
        const currentContent = document.querySelector(`[data-step-content="${currentStep}"]`);
        const inputs = currentContent.querySelectorAll('input[required], select[required], textarea[required]');

        // Validar campos requeridos
        let valid = true;
        inputs.forEach(input => {
            if (!input.value && !input.disabled && !input.classList.contains('hidden')) {
                if (input.type === 'radio') {
                    const radioGroup = document.querySelectorAll(`input[name="${input.name}"]`);
                    const isChecked = Array.from(radioGroup).some(radio => radio.checked);
                    if (!isChecked) {
                        valid = false;
                        input.closest('.md\\:col-span-2, div').classList.add('error');
                    }
                } else {
                    valid = false;
                    input.classList.add('border-red-500');
                    setTimeout(() => input.classList.remove('border-red-500'), 3000);
                }
            }
        });

        if (!valid) {
            alert('Por favor, completa todos los campos requeridos.');
            return;
        }

        // Lógica especial para el paso 1
        if (currentStep === 1) {
            const tipoReclamante = document.querySelector('input[name="tipo_reclamante"]:checked');
            if (tipoReclamante && tipoReclamante.value === 'Titular') {
                // Si es Titular, saltar al paso 3
                goToStep(3);
                return;
            }
        }

        // Ir al siguiente paso normal
        goToStep(currentStep + 1);
    }

    // Función para ir al paso anterior
    function prevStep(currentStep) {
        // Si estamos en el paso 3 y el tipo de reclamante es Titular, volver al paso 1
        if (currentStep === 3) {
            const tipoReclamante = document.querySelector('input[name="tipo_reclamante"]:checked');
            if (tipoReclamante && tipoReclamante.value === 'Titular') {
                goToStep(1);
                return;
            }
        }

        goToStep(currentStep - 1);
    }

    // Función para ir a un paso específico
    function goToStep(stepNumber) {
        // Ocultar todos los contenidos
        document.querySelectorAll('[data-step-content]').forEach(content => {
            content.classList.add('hidden');
        });

        // Mostrar el contenido del paso actual
        const targetContent = document.querySelector(`[data-step-content="${stepNumber}"]`);
        if (targetContent) {
            targetContent.classList.remove('hidden');
        }

        // Actualizar indicadores de paso verticales
        document.querySelectorAll('.step-item-vertical').forEach((item, index) => {
            const itemStep = parseInt(item.dataset.step);
            item.classList.remove('active', 'completed');

            if (itemStep === stepNumber) {
                item.classList.add('active');
            } else if (itemStep < stepNumber) {
                item.classList.add('completed');
            }
        });

        // Scroll suave al inicio del formulario
        document.querySelector('#reclamaciones-form').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
</script>

<?php
get_footer();
?>
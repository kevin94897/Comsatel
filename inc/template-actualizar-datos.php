<?php

/**
 * Template Name: Actualizar datos
 */

get_header();
?>

<main id="primary" class="site-main bg-gray-50">

    <!-- Hero Banner -->
    <section class="relative min-h-[500px] flex items-end <?php echo wp_title(); ?>">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_tyc_banner.png');"
            data-aos="fade-in"
            data-aos-duration="1200">
        </div>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="">
                <span class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"
                    data-aos="fade-right"
                    data-aos-duration="800"
                    data-aos-delay="200"></span>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-10 leading-tight mt-2 uppercase"
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="400"
                    data-aos-easing="ease-out-cubic">
                    Actualiza tus datos
                </h1>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 relative overflow-hidden bg-gray-50">
        <!-- Background Vector -->
        <div class="absolute inset-0 bg-auto bg-[center_left] bg-no-repeat opacity-20 pointer-events-none"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_vector.png');">
        </div>

        <div class="container mx-auto px-4 z-10 relative">
            <div class="mx-auto">
                <!-- Form Container Card -->
                <div class="bg-white rounded-[2rem] shadow-xl md:p-12 p-8" data-aos="fade-up" data-aos-duration="1000">

                    <!-- Header -->
                    <div class="text-center mb-12">
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-medium text-black mb-6">
                            Ingresa tus datos y actualiza tu información
                        </h2>
                        <p class="text-dark text-sm md:text-base max-w-2xl mx-auto leading-relaxed">
                            Tus datos actualizados nos permiten mantenerte informado sobre tu servicio de una forma más ágil y cercana.
                        </p>
                    </div>

                    <!-- Form -->
                    <form id="actualizar-datos-form" class="space-y-8">
                        <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">

                            <!-- Tipo de Documento -->
                            <div>
                                <label class="form-label" for="tipo_documento">Tipo de Documetno</label>
                                <select id="tipo_documento" name="tipo_documento" class="form-select w-full" required>
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

                            <!-- Nombre y Apellidos -->
                            <div>
                                <label class="form-label" for="nombre_apellidos">Nombre y Apellidos</label>
                                <input type="text" id="nombre_apellidos" name="nombre_apellidos"
                                    class="form-input" placeholder="Ej. Nombre Apellido" required>
                            </div>

                            <!-- Teléfono -->
                            <div>
                                <label class="form-label" for="telefono">Teléfono</label>
                                <input type="tel" id="telefono" name="telefono"
                                    class="form-input" placeholder="+51 9XX XXX XXX" required>
                            </div>

                            <!-- Correo (Full Width) -->
                            <div class="md:col-span-2 space-y-2">
                                <label class="form-label" for="email">Correo</label>
                                <input type="email" id="email" name="email"
                                    class="form-input" placeholder="Ej. correo@empresa.com" required>
                            </div>

                            <!-- Departamento -->
                            <div>
                                <label class="form-label" for="departamento">Departamento</label>
                                <select id="departamento" name="departamento" class="form-select w-full" required>
                                    <option value="">Selecciona</option>
                                </select>
                            </div>

                            <!-- Provincia -->
                            <div>
                                <label class="form-label" for="provincia">Provincia</label>
                                <select id="provincia" name="provincia" class="form-select w-full" required>
                                    <option value="">Selecciona</option>
                                </select>
                            </div>

                            <!-- Distrito -->
                            <div>
                                <label class="form-label" for="distrito">Distrito</label>
                                <select id="distrito" name="distrito" class="form-select w-full" required>
                                    <option value="">Selecciona</option>
                                </select>
                            </div>

                            <!-- Dirección -->
                            <div>
                                <label class="form-label" for="direccion">Dirección</label>
                                <input type="text" id="direccion" name="direccion"
                                    class="form-input" placeholder="Ej. correo@empresa.com" required>
                            </div>

                        </div>

                        <!-- Política de Privacidad -->
                        <div class="flex items-center gap-4 pt-4">
                            <div class="flex items-center h-5">
                                <input type="checkbox" id="acepta_politica" name="acepta_politica"
                                    class="w-5 h-5 text-primary border-gray-300 focus:ring-primary h-5 w-5" required>
                            </div>
                            <label for="acepta_politica" class="text-sm text-gray-600 leading-tight font-normal mb-0">
                                Al enviar esta información, autorizas a Comsatel Perú a tratar tus datos personales. Conoce nuestra <a href="#" class="text-black underline font-medium hover:text-primary transition-colors">Política de Privacidad</a>.
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-16 py-4 text-base font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 active:translate-y-0 transition-all">
                                Actualizar
                            </button>
                        </div>

                    </form>

                    <!-- Success Message (Initialy Hidden) -->
                    <div id="success-message" class="hidden text-center py-8">
                        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-medium text-gray-900 mb-2">¡Datos actualizados!</h3>
                        <p class="text-gray-600">Tu información ha sido guardada correctamente.</p>
                        <button onclick="location.reload()" class="mt-8 text-primary font-medium hover:underline">
                            Volver a editar
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('actualizar-datos-form');
        const successMessage = document.getElementById('success-message');

        // Initialize Ubicaciones Helper
        // Selectors are #departamento, #provincia, #distrito
        if (typeof PeruUbicaciones !== 'undefined') {
            new PeruUbicaciones({
                departamento: '#departamento',
                provincia: '#provincia',
                distrito: '#distrito'
            });
        }

        // Handle Form Submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Simulate loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Actualizando...
            `;

            // Here you would normally send the data via AJAX
            // For now, we'll just show the success message after a delay
            setTimeout(() => {
                form.classList.add('hidden');
                successMessage.classList.remove('hidden');

                // Scroll to success message
                successMessage.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 1500);
        });
    });
</script>
<?php
get_footer();
?>
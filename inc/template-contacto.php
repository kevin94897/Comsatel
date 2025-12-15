<?php

/**
 * Template Name: Contacto
 * 
 * Plantilla personalizada para el blog con búsqueda, filtros y carga de posts
 */

get_header();
?>

<main id="primary" class="site-main bg-gray-50">
    <!-- Hero Banner -->
    <section class="relative min-h-[500px] flex items-end <?php echo wp_title(); ?>">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_blog_banner.png');">
        </div>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="">
                <span class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold text-white mb-10 leading-tight mt-2 uppercase" data-aos="fade-up"
                    data-aos-duration="1000">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>

        <!-- Tracking Pin Graphic (Optional) -->
        <div class="absolute top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none">
            <div class="relative">
                <!-- You can add your custom tracking pin SVG or icon here -->
            </div>
        </div>
    </section>

    <!-- Formulario de Contacto -->
    <section class="py-16 md:py-24 relative">
        <div class="absolute inset-0 bg-auto bg-[center_left] bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_vector.png');">
        </div>
        <div class="container mx-auto px-4 z-10 relative">
            <div class="">

                <!-- Contenedor del Formulario -->
                <div class="bg-white rounded-md shadow-lg p-8 md:p-12">

                    <!-- Formulario -->
                    <form id="contacto-form" class="space-y-6">

                        <!-- Título y Descripción -->
                        <div class="text-center mb-8">
                            <h2 class="text-2xl md:text-3xl font-normal text-dark mb-4">Enviar una solicitud</h2>
                            <p class="text-gray-600">Ingresa tus datos y describe tu solicitud. Uno de nuestros representantes se pondrá en contacto contigo.</p>
                        </div>

                        <!-- Tipo de Cliente -->
                        <div>
                            <label class="block text-sm font-semibold text-dark mb-3">Tipo de cliente</label>
                            <div class="flex gap-6">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="tipo_cliente" value="Persona" class="w-4 h-4 text-primary border-gray-300 focus:ring-primary" required>
                                    <span class="ml-2 text-gray-700">Persona</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="tipo_cliente" value="Empresa" class="w-4 h-4 text-primary border-gray-300 focus:ring-primary" checked required>
                                    <span class="ml-2 text-gray-700">Empresa</span>
                                </label>
                            </div>
                        </div>

                        <!-- Grid de 2 columnas -->
                        <div class="grid md:grid-cols-2 gap-6">

                            <!-- Nombre y Apellido -->
                            <div>
                                <label for="nombre" class="block text-sm font-semibold text-dark mb-2">Nombre y Apellido</label>
                                <input
                                    type="text"
                                    id="nombre"
                                    name="nombre"
                                    placeholder="Ej. Carlos Flores"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                    required>
                            </div>

                            <!-- Teléfono -->
                            <div>
                                <label for="telefono" class="block text-sm font-semibold text-dark mb-2">Teléfono</label>
                                <input
                                    type="tel"
                                    id="telefono"
                                    name="telefono"
                                    placeholder="+51 9XX XXX XXX"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                    required>
                            </div>

                            <!-- Correo -->
                            <div>
                                <label for="email" class="block text-sm font-semibold text-dark mb-2">Correo</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="correo@empresa.com"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                    required>
                            </div>

                            <!-- Empresa (condicional) -->
                            <div id="empresa_field">
                                <label for="empresa" class="block text-sm font-semibold text-dark mb-2">Empresa</label>
                                <input
                                    type="text"
                                    id="empresa"
                                    name="empresa"
                                    placeholder="Nombre de la empresa"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                            </div>

                        </div>

                        <!-- Asunto (Dropdown) -->
                        <div>
                            <label for="asunto" class="block text-sm font-semibold text-dark mb-2">Asunto</label>
                            <select
                                id="asunto"
                                name="asunto"
                                class="w-full px-4 py-3 rounded-md transition-all appearance-none bg-white cursor-pointer leading-[100%]"
                                required>
                                <option value="">Motivo de contacto</option>
                                <option value="Consulta General">Consulta General</option>
                                <option value="Soporte Técnico">Soporte Técnico</option>
                                <option value="Ventas">Ventas</option>
                                <option value="Reclamo">Reclamo</option>
                                <option value="Sugerencia">Sugerencia</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        <!-- Mensaje -->
                        <div>
                            <label for="mensaje" class="block text-sm font-semibold text-dark mb-2">Mensaje</label>
                            <textarea
                                id="mensaje"
                                name="mensaje"
                                rows="5"
                                placeholder="Detalla tu necesidad: servicio, problema, ubicación, horario de contacto, etc."
                                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-primary transition-all resize-none"
                                required></textarea>
                        </div>

                        <!-- Política de Privacidad -->
                        <div class="flex items-start gap-3">
                            <input
                                type="checkbox"
                                id="acepta_politica"
                                name="acepta_politica"
                                class="w-4 h-4 mt-1 text-primary border-gray-300 rounded focus:ring-primary"
                                required>
                            <label for="acepta_politica" class="text-sm text-gray-600">
                                Al proporcionar esta información usted autoriza a Comsatel Perú el tratamiento de sus datos personales. Para mayor información conoce nuestra
                                <a href="#" class="text-primary underline hover:text-primary-600">Política de Privacidad</a>
                            </label>
                        </div>

                        <!-- Botón de Envío -->
                        <div class="text-center">
                            <button
                                type="submit"
                                class="btn btn-primary">
                                Enviar solicitud
                            </button>
                        </div>

                    </form>

                    <!-- Mensaje de Éxito (Oculto inicialmente) -->
                    <div id="success-message-contacto" class="hidden text-center py-12">
                        <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">¡Solicitud Enviada!</h3>
                        <p class="text-gray-600 mb-8">Hemos recibido tu información correctamente. Nos pondremos en contacto contigo pronto.</p>
                        <button onclick="location.reload()" class="bg-primary text-white px-8 py-3 rounded-full font-semibold hover:bg-primary-600 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            Enviar otra solicitud
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="pb-8 md:pb-16 relative">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl">
                <h2 class="md:text-3xl text-2xl font-normal text-dark mb-5 text-left">Centros de atención Comsatel</h2>
                <p class="text-left mb-0">Contamos con oficinas y centros de atención en todo el país para brindarte soporte, asesoría y acompañamiento cuando lo necesites.</p>
            </div>
        </div>
    </section>

    <script>
        const ajax_url_contacto = '<?php echo admin_url('admin-ajax.php'); ?>';
        const security_nonce_contacto = '<?php echo wp_create_nonce('comsatel_contacto_nonce'); ?>';

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contacto-form');
            const tipoClienteInputs = document.querySelectorAll('input[name="tipo_cliente"]');
            const empresaField = document.getElementById('empresa_field');
            const empresaInput = document.getElementById('empresa');
            const successMessage = document.getElementById('success-message-contacto');

            // Manejar cambio de tipo de cliente
            tipoClienteInputs.forEach(input => {
                input.addEventListener('change', function() {
                    if (this.value === 'Empresa') {
                        empresaField.style.display = 'block';
                        empresaInput.required = true;
                    } else {
                        empresaField.style.display = 'none';
                        empresaInput.required = false;
                        empresaInput.value = '';
                    }
                });
            });

            // Inicializar estado del campo empresa
            const tipoClienteChecked = document.querySelector('input[name="tipo_cliente"]:checked');
            if (tipoClienteChecked && tipoClienteChecked.value === 'Persona') {
                empresaField.style.display = 'none';
                empresaInput.required = false;
            }

            // Manejar envío del formulario
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Botón de envío - Estado Cargando
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Enviando...
                `;

                // Preparar FormData
                const formData = new FormData(form);
                formData.append('action', 'enviar_contacto');
                formData.append('security', security_nonce_contacto);

                // Enviar via Fetch
                fetch(ajax_url_contacto, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Ocultar form y mostrar mensaje de éxito
                            form.classList.add('hidden');
                            successMessage.classList.remove('hidden');

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
                        // Restaurar botón (solo si hubo error)
                        if (!form.classList.contains('hidden')) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnText;
                        }
                    });
            });
        });
    </script>

    <section class="pb-16 md:pb-32 relative">
        <div class="container">

            <div class="cards grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white rounded-md overflow-hidden transition-all duration-200 shadow-md hover:shadow-xl hover:-translate-y-2 flex flex-col h-full animate-fadeInUp">
                    <a href="#" class="no-underline text-inherit flex flex-col h-full group">
                        <div class="p-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_contacto_img.png" alt="Contacto" class="w-full h-auto">
                        </div>

                        <div class="md:p-6 p-4 flex flex-col gap-2 flex-1">
                            <!-- Ubicacion -->
                            <span class="text-xs md:text-lg text-[#47444D] flex items-center gap-2 font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="w-4 h-4">
                                    <path d="M6.66667 7.91667C7.125 7.91667 7.51736 7.76163 7.84375 7.45156C8.17014 7.14149 8.33333 6.76875 8.33333 6.33333C8.33333 5.89792 8.17014 5.52517 7.84375 5.2151C7.51736 4.90503 7.125 4.75 6.66667 4.75C6.20833 4.75 5.81597 4.90503 5.48958 5.2151C5.16319 5.52517 5 5.89792 5 6.33333C5 6.76875 5.16319 7.14149 5.48958 7.45156C5.81597 7.76163 6.20833 7.91667 6.66667 7.91667ZM6.66667 13.7354C8.36111 12.2576 9.61806 10.9151 10.4375 9.70781C11.2569 8.50052 11.6667 7.42847 11.6667 6.49167C11.6667 5.05347 11.184 3.87587 10.2187 2.95885C9.25347 2.04184 8.06944 1.58333 6.66667 1.58333C5.26389 1.58333 4.07986 2.04184 3.11458 2.95885C2.14931 3.87587 1.66667 5.05347 1.66667 6.49167C1.66667 7.42847 2.07639 8.50052 2.89583 9.70781C3.71528 10.9151 4.97222 12.2576 6.66667 13.7354ZM6.66667 15.8333C4.43056 14.0257 2.76042 12.3467 1.65625 10.7964C0.552083 9.24601 0 7.81111 0 6.49167C0 4.5125 0.670139 2.93576 2.01042 1.76146C3.35069 0.587153 4.90278 0 6.66667 0C8.43056 0 9.98264 0.587153 11.3229 1.76146C12.6632 2.93576 13.3333 4.5125 13.3333 6.49167C13.3333 7.81111 12.7812 9.24601 11.6771 10.7964C10.5729 12.3467 8.90278 14.0257 6.66667 15.8333Z" fill="#47444D" />
                                </svg>
                                Lima
                            </span>

                            <!-- Título -->
                            <h5 class="md:text-xl text-sm font-semibold leading-tight text-[#47444D] transition-colors duration-200 group-hover:text-primary m-0">
                                Oficina administrativa
                            </h5>

                            <!-- Meta información -->
                            <div class="flex items-center gap-2 text-sm text-[#7F7B85] text-md">
                                <span class="flex items-center gap-1">
                                    Calle Diego Gavilán Nro. 165
                                </span>
                            </div>

                            <!-- Extracto -->
                            <div class="md:text-[15px] text-[12px] leading-relaxed text-[#7F7B85] flex items-center gap-2 font-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="23" viewBox="0 0 25 23" fill="none" class="w-4 h-4">
                                    <path d="M3.40098 0.75H8.70294L11.3539 6.83519L8.0402 8.66075C9.45974 11.3036 11.7893 13.4425 14.6676 14.7459L16.6559 11.7033L23.2833 14.1374V19.0056C23.2833 19.6511 23.004 20.2703 22.5069 20.7267C22.0097 21.1832 21.3354 21.4397 20.6324 21.4397C15.462 21.1512 10.5853 19.1352 6.92258 15.7721C3.25982 12.409 1.06421 7.93142 0.75 3.18408C0.75 2.53852 1.0293 1.9194 1.52645 1.46292C2.02361 1.00645 2.6979 0.75 3.40098 0.75Z" stroke="#7F7B85" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                (01) 5135111
                            </div>

                            <!-- Botón Leer Más -->
                            <span class="inline-flex items-center justify-start gap-2 text-sm font-bold text-primary uppercase tracking-wider transition-all duration-200 group-hover:gap-3 mt-2">
                                Ver Ubicación
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                    <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>

                <div class="bg-white rounded-md overflow-hidden transition-all duration-200 shadow-md hover:shadow-xl hover:-translate-y-2 flex flex-col h-full animate-fadeInUp">
                    <a href="#" class="no-underline text-inherit flex flex-col h-full group">
                        <div class="p-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_contacto_img.png" alt="Contacto" class="w-full h-auto">
                        </div>

                        <div class="md:p-6 p-4 flex flex-col gap-2 flex-1">
                            <!-- Ubicacion -->
                            <span class="text-xs md:text-lg text-[#47444D] flex items-center gap-2 font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="w-4 h-4">
                                    <path d="M6.66667 7.91667C7.125 7.91667 7.51736 7.76163 7.84375 7.45156C8.17014 7.14149 8.33333 6.76875 8.33333 6.33333C8.33333 5.89792 8.17014 5.52517 7.84375 5.2151C7.51736 4.90503 7.125 4.75 6.66667 4.75C6.20833 4.75 5.81597 4.90503 5.48958 5.2151C5.16319 5.52517 5 5.89792 5 6.33333C5 6.76875 5.16319 7.14149 5.48958 7.45156C5.81597 7.76163 6.20833 7.91667 6.66667 7.91667ZM6.66667 13.7354C8.36111 12.2576 9.61806 10.9151 10.4375 9.70781C11.2569 8.50052 11.6667 7.42847 11.6667 6.49167C11.6667 5.05347 11.184 3.87587 10.2187 2.95885C9.25347 2.04184 8.06944 1.58333 6.66667 1.58333C5.26389 1.58333 4.07986 2.04184 3.11458 2.95885C2.14931 3.87587 1.66667 5.05347 1.66667 6.49167C1.66667 7.42847 2.07639 8.50052 2.89583 9.70781C3.71528 10.9151 4.97222 12.2576 6.66667 13.7354ZM6.66667 15.8333C4.43056 14.0257 2.76042 12.3467 1.65625 10.7964C0.552083 9.24601 0 7.81111 0 6.49167C0 4.5125 0.670139 2.93576 2.01042 1.76146C3.35069 0.587153 4.90278 0 6.66667 0C8.43056 0 9.98264 0.587153 11.3229 1.76146C12.6632 2.93576 13.3333 4.5125 13.3333 6.49167C13.3333 7.81111 12.7812 9.24601 11.6771 10.7964C10.5729 12.3467 8.90278 14.0257 6.66667 15.8333Z" fill="#47444D" />
                                </svg>
                                Lima
                            </span>

                            <!-- Título -->
                            <h5 class="md:text-xl text-sm font-semibold leading-tight text-[#47444D] transition-colors duration-200 group-hover:text-primary m-0">
                                Oficina administrativa
                            </h5>

                            <!-- Meta información -->
                            <div class="flex items-center gap-2 text-sm text-[#7F7B85] text-md">
                                <span class="flex items-center gap-1">
                                    Calle Diego Gavilán Nro. 165
                                </span>
                            </div>

                            <!-- Extracto -->
                            <div class="md:text-[15px] text-[12px] leading-relaxed text-[#7F7B85] flex items-center gap-2 font-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="23" viewBox="0 0 25 23" fill="none" class="w-4 h-4">
                                    <path d="M3.40098 0.75H8.70294L11.3539 6.83519L8.0402 8.66075C9.45974 11.3036 11.7893 13.4425 14.6676 14.7459L16.6559 11.7033L23.2833 14.1374V19.0056C23.2833 19.6511 23.004 20.2703 22.5069 20.7267C22.0097 21.1832 21.3354 21.4397 20.6324 21.4397C15.462 21.1512 10.5853 19.1352 6.92258 15.7721C3.25982 12.409 1.06421 7.93142 0.75 3.18408C0.75 2.53852 1.0293 1.9194 1.52645 1.46292C2.02361 1.00645 2.6979 0.75 3.40098 0.75Z" stroke="#7F7B85" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                (01) 5135111
                            </div>

                            <!-- Botón Leer Más -->
                            <span class="inline-flex items-center justify-start gap-2 text-sm font-bold text-primary uppercase tracking-wider transition-all duration-200 group-hover:gap-3 mt-2">
                                Ver Ubicación
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                    <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>

                <div class="bg-white rounded-md overflow-hidden transition-all duration-200 shadow-md hover:shadow-xl hover:-translate-y-2 flex flex-col h-full animate-fadeInUp">
                    <a href="#" class="no-underline text-inherit flex flex-col h-full group">
                        <div class="p-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_contacto_img.png" alt="Contacto" class="w-full h-auto">
                        </div>

                        <div class="md:p-6 p-4 flex flex-col gap-2 flex-1">
                            <!-- Ubicacion -->
                            <span class="text-xs md:text-lg text-[#47444D] flex items-center gap-2 font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="w-4 h-4">
                                    <path d="M6.66667 7.91667C7.125 7.91667 7.51736 7.76163 7.84375 7.45156C8.17014 7.14149 8.33333 6.76875 8.33333 6.33333C8.33333 5.89792 8.17014 5.52517 7.84375 5.2151C7.51736 4.90503 7.125 4.75 6.66667 4.75C6.20833 4.75 5.81597 4.90503 5.48958 5.2151C5.16319 5.52517 5 5.89792 5 6.33333C5 6.76875 5.16319 7.14149 5.48958 7.45156C5.81597 7.76163 6.20833 7.91667 6.66667 7.91667ZM6.66667 13.7354C8.36111 12.2576 9.61806 10.9151 10.4375 9.70781C11.2569 8.50052 11.6667 7.42847 11.6667 6.49167C11.6667 5.05347 11.184 3.87587 10.2187 2.95885C9.25347 2.04184 8.06944 1.58333 6.66667 1.58333C5.26389 1.58333 4.07986 2.04184 3.11458 2.95885C2.14931 3.87587 1.66667 5.05347 1.66667 6.49167C1.66667 7.42847 2.07639 8.50052 2.89583 9.70781C3.71528 10.9151 4.97222 12.2576 6.66667 13.7354ZM6.66667 15.8333C4.43056 14.0257 2.76042 12.3467 1.65625 10.7964C0.552083 9.24601 0 7.81111 0 6.49167C0 4.5125 0.670139 2.93576 2.01042 1.76146C3.35069 0.587153 4.90278 0 6.66667 0C8.43056 0 9.98264 0.587153 11.3229 1.76146C12.6632 2.93576 13.3333 4.5125 13.3333 6.49167C13.3333 7.81111 12.7812 9.24601 11.6771 10.7964C10.5729 12.3467 8.90278 14.0257 6.66667 15.8333Z" fill="#47444D" />
                                </svg>
                                Lima
                            </span>

                            <!-- Título -->
                            <h5 class="md:text-xl text-sm font-semibold leading-tight text-[#47444D] transition-colors duration-200 group-hover:text-primary m-0">
                                Oficina administrativa
                            </h5>

                            <!-- Meta información -->
                            <div class="flex items-center gap-2 text-sm text-[#7F7B85] text-md">
                                <span class="flex items-center gap-1">
                                    Calle Diego Gavilán Nro. 165
                                </span>
                            </div>

                            <!-- Extracto -->
                            <div class="md:text-[15px] text-[12px] leading-relaxed text-[#7F7B85] flex items-center gap-2 font-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="23" viewBox="0 0 25 23" fill="none" class="w-4 h-4">
                                    <path d="M3.40098 0.75H8.70294L11.3539 6.83519L8.0402 8.66075C9.45974 11.3036 11.7893 13.4425 14.6676 14.7459L16.6559 11.7033L23.2833 14.1374V19.0056C23.2833 19.6511 23.004 20.2703 22.5069 20.7267C22.0097 21.1832 21.3354 21.4397 20.6324 21.4397C15.462 21.1512 10.5853 19.1352 6.92258 15.7721C3.25982 12.409 1.06421 7.93142 0.75 3.18408C0.75 2.53852 1.0293 1.9194 1.52645 1.46292C2.02361 1.00645 2.6979 0.75 3.40098 0.75Z" stroke="#7F7B85" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                (01) 5135111
                            </div>

                            <!-- Botón Leer Más -->
                            <span class="inline-flex items-center justify-start gap-2 text-sm font-bold text-primary uppercase tracking-wider transition-all duration-200 group-hover:gap-3 mt-2">
                                Ver Ubicación
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                    <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>

                <div class="bg-white rounded-md overflow-hidden transition-all duration-200 shadow-md hover:shadow-xl hover:-translate-y-2 flex flex-col h-full animate-fadeInUp">
                    <a href="#" class="no-underline text-inherit flex flex-col h-full group">
                        <div class="p-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_contacto_img.png" alt="Contacto" class="w-full h-auto">
                        </div>

                        <div class="md:p-6 p-4 flex flex-col gap-2 flex-1">
                            <!-- Ubicacion -->
                            <span class="text-xs md:text-lg text-[#47444D] flex items-center gap-2 font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="w-4 h-4">
                                    <path d="M6.66667 7.91667C7.125 7.91667 7.51736 7.76163 7.84375 7.45156C8.17014 7.14149 8.33333 6.76875 8.33333 6.33333C8.33333 5.89792 8.17014 5.52517 7.84375 5.2151C7.51736 4.90503 7.125 4.75 6.66667 4.75C6.20833 4.75 5.81597 4.90503 5.48958 5.2151C5.16319 5.52517 5 5.89792 5 6.33333C5 6.76875 5.16319 7.14149 5.48958 7.45156C5.81597 7.76163 6.20833 7.91667 6.66667 7.91667ZM6.66667 13.7354C8.36111 12.2576 9.61806 10.9151 10.4375 9.70781C11.2569 8.50052 11.6667 7.42847 11.6667 6.49167C11.6667 5.05347 11.184 3.87587 10.2187 2.95885C9.25347 2.04184 8.06944 1.58333 6.66667 1.58333C5.26389 1.58333 4.07986 2.04184 3.11458 2.95885C2.14931 3.87587 1.66667 5.05347 1.66667 6.49167C1.66667 7.42847 2.07639 8.50052 2.89583 9.70781C3.71528 10.9151 4.97222 12.2576 6.66667 13.7354ZM6.66667 15.8333C4.43056 14.0257 2.76042 12.3467 1.65625 10.7964C0.552083 9.24601 0 7.81111 0 6.49167C0 4.5125 0.670139 2.93576 2.01042 1.76146C3.35069 0.587153 4.90278 0 6.66667 0C8.43056 0 9.98264 0.587153 11.3229 1.76146C12.6632 2.93576 13.3333 4.5125 13.3333 6.49167C13.3333 7.81111 12.7812 9.24601 11.6771 10.7964C10.5729 12.3467 8.90278 14.0257 6.66667 15.8333Z" fill="#47444D" />
                                </svg>
                                Lima
                            </span>

                            <!-- Título -->
                            <h5 class="md:text-xl text-sm font-semibold leading-tight text-[#47444D] transition-colors duration-200 group-hover:text-primary m-0">
                                Oficina administrativa
                            </h5>

                            <!-- Meta información -->
                            <div class="flex items-center gap-2 text-sm text-[#7F7B85] text-md">
                                <span class="flex items-center gap-1">
                                    Calle Diego Gavilán Nro. 165
                                </span>
                            </div>

                            <!-- Extracto -->
                            <div class="md:text-[15px] text-[12px] leading-relaxed text-[#7F7B85] flex items-center gap-2 font-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="23" viewBox="0 0 25 23" fill="none" class="w-4 h-4">
                                    <path d="M3.40098 0.75H8.70294L11.3539 6.83519L8.0402 8.66075C9.45974 11.3036 11.7893 13.4425 14.6676 14.7459L16.6559 11.7033L23.2833 14.1374V19.0056C23.2833 19.6511 23.004 20.2703 22.5069 20.7267C22.0097 21.1832 21.3354 21.4397 20.6324 21.4397C15.462 21.1512 10.5853 19.1352 6.92258 15.7721C3.25982 12.409 1.06421 7.93142 0.75 3.18408C0.75 2.53852 1.0293 1.9194 1.52645 1.46292C2.02361 1.00645 2.6979 0.75 3.40098 0.75Z" stroke="#7F7B85" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                (01) 5135111
                            </div>

                            <!-- Botón Leer Más -->
                            <span class="inline-flex items-center justify-start gap-2 text-sm font-bold text-primary uppercase tracking-wider transition-all duration-200 group-hover:gap-3 mt-2">
                                Ver Ubicación
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                    <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>

                <div class="bg-white rounded-md overflow-hidden transition-all duration-200 shadow-md hover:shadow-xl hover:-translate-y-2 flex flex-col h-full animate-fadeInUp">
                    <a href="#" class="no-underline text-inherit flex flex-col h-full group">
                        <div class="p-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_contacto_img.png" alt="Contacto" class="w-full h-auto">
                        </div>

                        <div class="md:p-6 p-4 flex flex-col gap-2 flex-1">
                            <!-- Ubicacion -->
                            <span class="text-xs md:text-lg text-[#47444D] flex items-center gap-2 font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="w-4 h-4">
                                    <path d="M6.66667 7.91667C7.125 7.91667 7.51736 7.76163 7.84375 7.45156C8.17014 7.14149 8.33333 6.76875 8.33333 6.33333C8.33333 5.89792 8.17014 5.52517 7.84375 5.2151C7.51736 4.90503 7.125 4.75 6.66667 4.75C6.20833 4.75 5.81597 4.90503 5.48958 5.2151C5.16319 5.52517 5 5.89792 5 6.33333C5 6.76875 5.16319 7.14149 5.48958 7.45156C5.81597 7.76163 6.20833 7.91667 6.66667 7.91667ZM6.66667 13.7354C8.36111 12.2576 9.61806 10.9151 10.4375 9.70781C11.2569 8.50052 11.6667 7.42847 11.6667 6.49167C11.6667 5.05347 11.184 3.87587 10.2187 2.95885C9.25347 2.04184 8.06944 1.58333 6.66667 1.58333C5.26389 1.58333 4.07986 2.04184 3.11458 2.95885C2.14931 3.87587 1.66667 5.05347 1.66667 6.49167C1.66667 7.42847 2.07639 8.50052 2.89583 9.70781C3.71528 10.9151 4.97222 12.2576 6.66667 13.7354ZM6.66667 15.8333C4.43056 14.0257 2.76042 12.3467 1.65625 10.7964C0.552083 9.24601 0 7.81111 0 6.49167C0 4.5125 0.670139 2.93576 2.01042 1.76146C3.35069 0.587153 4.90278 0 6.66667 0C8.43056 0 9.98264 0.587153 11.3229 1.76146C12.6632 2.93576 13.3333 4.5125 13.3333 6.49167C13.3333 7.81111 12.7812 9.24601 11.6771 10.7964C10.5729 12.3467 8.90278 14.0257 6.66667 15.8333Z" fill="#47444D" />
                                </svg>
                                Lima
                            </span>

                            <!-- Título -->
                            <h5 class="md:text-xl text-sm font-semibold leading-tight text-[#47444D] transition-colors duration-200 group-hover:text-primary m-0">
                                Oficina administrativa
                            </h5>

                            <!-- Meta información -->
                            <div class="flex items-center gap-2 text-sm text-[#7F7B85] text-md">
                                <span class="flex items-center gap-1">
                                    Calle Diego Gavilán Nro. 165
                                </span>
                            </div>

                            <!-- Extracto -->
                            <div class="md:text-[15px] text-[12px] leading-relaxed text-[#7F7B85] flex items-center gap-2 font-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="23" viewBox="0 0 25 23" fill="none" class="w-4 h-4">
                                    <path d="M3.40098 0.75H8.70294L11.3539 6.83519L8.0402 8.66075C9.45974 11.3036 11.7893 13.4425 14.6676 14.7459L16.6559 11.7033L23.2833 14.1374V19.0056C23.2833 19.6511 23.004 20.2703 22.5069 20.7267C22.0097 21.1832 21.3354 21.4397 20.6324 21.4397C15.462 21.1512 10.5853 19.1352 6.92258 15.7721C3.25982 12.409 1.06421 7.93142 0.75 3.18408C0.75 2.53852 1.0293 1.9194 1.52645 1.46292C2.02361 1.00645 2.6979 0.75 3.40098 0.75Z" stroke="#7F7B85" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                (01) 5135111
                            </div>

                            <!-- Botón Leer Más -->
                            <span class="inline-flex items-center justify-start gap-2 text-sm font-bold text-primary uppercase tracking-wider transition-all duration-200 group-hover:gap-3 mt-2">
                                Ver Ubicación
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                    <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>

                <div class="bg-white rounded-md overflow-hidden transition-all duration-200 shadow-md hover:shadow-xl hover:-translate-y-2 flex flex-col h-full animate-fadeInUp">
                    <a href="#" class="no-underline text-inherit flex flex-col h-full group">
                        <div class="p-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_contacto_img.png" alt="Contacto" class="w-full h-auto">
                        </div>

                        <div class="md:p-6 p-4 flex flex-col gap-2 flex-1">
                            <!-- Ubicacion -->
                            <span class="text-xs md:text-lg text-[#47444D] flex items-center gap-2 font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="w-4 h-4">
                                    <path d="M6.66667 7.91667C7.125 7.91667 7.51736 7.76163 7.84375 7.45156C8.17014 7.14149 8.33333 6.76875 8.33333 6.33333C8.33333 5.89792 8.17014 5.52517 7.84375 5.2151C7.51736 4.90503 7.125 4.75 6.66667 4.75C6.20833 4.75 5.81597 4.90503 5.48958 5.2151C5.16319 5.52517 5 5.89792 5 6.33333C5 6.76875 5.16319 7.14149 5.48958 7.45156C5.81597 7.76163 6.20833 7.91667 6.66667 7.91667ZM6.66667 13.7354C8.36111 12.2576 9.61806 10.9151 10.4375 9.70781C11.2569 8.50052 11.6667 7.42847 11.6667 6.49167C11.6667 5.05347 11.184 3.87587 10.2187 2.95885C9.25347 2.04184 8.06944 1.58333 6.66667 1.58333C5.26389 1.58333 4.07986 2.04184 3.11458 2.95885C2.14931 3.87587 1.66667 5.05347 1.66667 6.49167C1.66667 7.42847 2.07639 8.50052 2.89583 9.70781C3.71528 10.9151 4.97222 12.2576 6.66667 13.7354ZM6.66667 15.8333C4.43056 14.0257 2.76042 12.3467 1.65625 10.7964C0.552083 9.24601 0 7.81111 0 6.49167C0 4.5125 0.670139 2.93576 2.01042 1.76146C3.35069 0.587153 4.90278 0 6.66667 0C8.43056 0 9.98264 0.587153 11.3229 1.76146C12.6632 2.93576 13.3333 4.5125 13.3333 6.49167C13.3333 7.81111 12.7812 9.24601 11.6771 10.7964C10.5729 12.3467 8.90278 14.0257 6.66667 15.8333Z" fill="#47444D" />
                                </svg>
                                Lima
                            </span>

                            <!-- Título -->
                            <h5 class="md:text-xl text-sm font-semibold leading-tight text-[#47444D] transition-colors duration-200 group-hover:text-primary m-0">
                                Oficina administrativa
                            </h5>

                            <!-- Meta información -->
                            <div class="flex items-center gap-2 text-sm text-[#7F7B85] text-md">
                                <span class="flex items-center gap-1">
                                    Calle Diego Gavilán Nro. 165
                                </span>
                            </div>

                            <!-- Extracto -->
                            <div class="md:text-[15px] text-[12px] leading-relaxed text-[#7F7B85] flex items-center gap-2 font-normal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="23" viewBox="0 0 25 23" fill="none" class="w-4 h-4">
                                    <path d="M3.40098 0.75H8.70294L11.3539 6.83519L8.0402 8.66075C9.45974 11.3036 11.7893 13.4425 14.6676 14.7459L16.6559 11.7033L23.2833 14.1374V19.0056C23.2833 19.6511 23.004 20.2703 22.5069 20.7267C22.0097 21.1832 21.3354 21.4397 20.6324 21.4397C15.462 21.1512 10.5853 19.1352 6.92258 15.7721C3.25982 12.409 1.06421 7.93142 0.75 3.18408C0.75 2.53852 1.0293 1.9194 1.52645 1.46292C2.02361 1.00645 2.6979 0.75 3.40098 0.75Z" stroke="#7F7B85" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                (01) 5135111
                            </div>

                            <!-- Botón Leer Más -->
                            <span class="inline-flex items-center justify-start gap-2 text-sm font-bold text-primary uppercase tracking-wider transition-all duration-200 group-hover:gap-3 mt-2">
                                Ver Ubicación
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                    <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Modal de Mapa -->
    <div id="map-modal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-md max-w-5xl w-full relative animate-fadeInUp">
            <!-- Header del Modal -->
            <div class="flex items-center justify-between p-6 border-b">
                <h3 id="modal-title" class="text-2xl font-semibold text-dark mb-0">Lima - Oficina Administrativa</h3>
                <button onclick="closeMapModal()" class="text-gray-500 hover:text-gray-700 transition-colors bg-transparent border-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Contenido del Modal - Iframe del Mapa -->
            <div class="p-6 relative">
                <div class="relative w-full" style="padding-bottom: 56.25%;">
                    <iframe
                        id="map-iframe"
                        class="absolute top-0 left-0 w-full h-full rounded-md"
                        frameborder="0"
                        style="border:0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Información adicional -->
                <div class="mt-6 p-4 rounded-md max-w-xl absolute ml-6 top-5 bg-white">
                    <div class="flex items-start gap-1 mb-4">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20" fill="none">
                                <path d="M8 10C8.55 10 9.02083 9.80417 9.4125 9.4125C9.80417 9.02083 10 8.55 10 8C10 7.45 9.80417 6.97917 9.4125 6.5875C9.02083 6.19583 8.55 6 8 6C7.45 6 6.97917 6.19583 6.5875 6.5875C6.19583 6.97917 6 7.45 6 8C6 8.55 6.19583 9.02083 6.5875 9.4125C6.97917 9.80417 7.45 10 8 10ZM8 17.35C10.0333 15.4833 11.5417 13.7875 12.525 12.2625C13.5083 10.7375 14 9.38333 14 8.2C14 6.38333 13.4208 4.89583 12.2625 3.7375C11.1042 2.57917 9.68333 2 8 2C6.31667 2 4.89583 2.57917 3.7375 3.7375C2.57917 4.89583 2 6.38333 2 8.2C2 9.38333 2.49167 10.7375 3.475 12.2625C4.45833 13.7875 5.96667 15.4833 8 17.35ZM8 20C5.31667 17.7167 3.3125 15.5958 1.9875 13.6375C0.6625 11.6792 0 9.86667 0 8.2C0 5.7 0.804167 3.70833 2.4125 2.225C4.02083 0.741667 5.88333 0 8 0C10.1167 0 11.9792 0.741667 13.5875 2.225C15.1958 3.70833 16 5.7 16 8.2C16 9.86667 15.3375 11.6792 14.0125 13.6375C12.6875 15.5958 10.6833 17.7167 8 20Z" fill="#FF4D4D" />
                            </svg>
                        </div>
                        <div class="">
                            <span class="font-semibold text-dark mb-1">COMSATEL</span>
                        </div>
                    </div>
                    <p id="modal-address" class="text-dark mb-1">Av. Calle 26 No. 69-63 Torre 26 Centro Empresarial Oficina 307 Bogotá</p>
                    <p id="modal-hours" class="text-sm text-gray-600 mb-4"><span class="text-green">Abierto</span> Lun a Dom: 24 hrs.</p>
                    <a id="modal-directions" href="#" target="_blank" class="inline-flex items-center gap-2 text-sm font-bold tracking-wider text-primary hover:text-primary-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <g clip-path="url(#clip0_1194_3723)">
                                <path d="M10.0018 15L8.3351 11.6667L2.50177 8.75C2.42198 8.71344 2.35437 8.65474 2.30697 8.58088C2.25957 8.50701 2.23438 8.4211 2.23438 8.33333C2.23437 8.24557 2.25957 8.15965 2.30697 8.08579C2.35437 8.01193 2.42198 7.95323 2.50177 7.91667L17.5018 2.5L14.4884 10.8458" stroke="#FF4D4D" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.332 18.3346L17.4987 14.168" stroke="#FF4D4D" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17.5 17.918V14.168H13.75" stroke="#FF4D4D" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1194_3723">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        CÓMO LLEGAR
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                            <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Datos de ubicaciones (puedes expandir esto con más oficinas)
        const locations = {
            'oficina-administrativa': {
                title: 'Lima - Oficina Administrativa',
                address: 'Calle Diego Gavilán Nro. 165',
                hours: 'Abierto Lun a Dom: 24 hrs.',
                mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.3!2d-77.0428!3d-12.0464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDAyJzQ3LjAiUyA3N8KwMDInMzQuMSJX!5e0!3m2!1ses!2spe!4v1234567890',
                directionsUrl: 'https://www.google.com/maps/dir/?api=1&destination=Calle+Diego+Gavilan+165+Lima+Peru'
            }
        };

        function openMapModal(locationKey = 'oficina-administrativa') {
            const modal = document.getElementById('map-modal');
            const location = locations[locationKey];

            if (location) {
                // Actualizar contenido del modal
                document.getElementById('modal-title').textContent = location.title;
                document.getElementById('modal-address').textContent = location.address;
                document.getElementById('modal-hours').textContent = location.hours;
                document.getElementById('modal-directions').href = location.directionsUrl;
                document.getElementById('map-iframe').src = location.mapUrl;

                // Mostrar modal
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevenir scroll del body
            }
        }

        function closeMapModal() {
            const modal = document.getElementById('map-modal');
            modal.classList.add('hidden');
            document.body.style.overflow = ''; // Restaurar scroll

            // Limpiar iframe para detener la carga del mapa
            document.getElementById('map-iframe').src = '';
        }

        // Cerrar modal al hacer clic fuera del contenido
        document.getElementById('map-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeMapModal();
            }
        });

        // Cerrar modal con tecla ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMapModal();
            }
        });

        // Agregar event listeners a todos los botones "Ver Ubicación"
        document.addEventListener('DOMContentLoaded', function() {
            const locationButtons = document.querySelectorAll('.cards a');
            locationButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    openMapModal('oficina-administrativa');
                });
            });
        });
    </script>
</main>

<?php
get_footer();

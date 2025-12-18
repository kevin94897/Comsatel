<?php

/**
 * Template para la Página de Inicio (Home)
 */

get_header(); ?>

<main id="home">
    <!-- Hero Banner -->
    <section class="relative h-screen min-h-[600px] flex items-start">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_home_banner.png');">
        </div>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="max-w-2xl mt-[15rem]">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-bold text-white mb-8 leading-tight" data-aos="fade-up"
                    data-aos-duration="1000">
                    Tecnología de Vanguardia, Máxima Protección
                </h1>
                <p class="text-white text-sm md:text-lg ">Soluciones avanzadas de rastreo y gestión de flotas. <br>Recupera tu inversión y opera sin riesgos.</p>
                <div class="flex gap-4 md:flex-row flex-col">
                    <a href="#" class="btn-primary flex items-center gap-2 w-max">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM8 14.5V5.5L14 10L8 14.5Z" fill="white" />
                        </svg>
                        Conseguir una Demo
                    </a>
                    <a href="#" class="btn-outline-white flex items-center gap-2 w-max">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20" fill="none">
                            <path d="M1 15.345C1.65391 16.1483 2.552 16.7163 3.558 16.963C5.832 17.552 8.07 16.517 8.557 14.653C9.044 12.787 7.284 10.753 5.011 10.163C2.738 9.573 0.977 7.54 1.464 5.675C1.951 3.81 4.188 2.776 6.462 3.365C7.444 3.601 8.332 4.158 9 4.957M5.121 17.128V19M5.121 1V3.2" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Calcular ahorro
                    </a>
                </div>
            </div>
        </div>

        <!-- Tracking Pin Graphic (Optional) -->
        <div class="absolute top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none">
            <div class="relative">
                <!-- You can add your custom tracking pin SVG or icon here -->
            </div>
        </div>
    </section>

    <?php
    $nav_buttons = array(
        array(
            'label' => 'Seguridad y recupero',
            'url' => '#challenge',
            'style' => 'btn-primary',
            'delay' => 100
        ),
        array(
            'label' => 'Portafolio de soluciones',
            'url' => '#solutions',
            'style' => 'btn-outline-white',
            'delay' => 200
        ),
        array(
            'label' => 'Testimonios',
            'url' => '#testimonials',
            'style' => 'btn-outline-white',
            'delay' => 300
        ),
        array(
            'label' => 'Preguntas frecuentes',
            'url' => '#faqs',
            'style' => 'btn-outline-white',
            'delay' => 400
        ),
    );
    get_template_part('inc/componentes/section-nav-buttons', null, array('buttons' => $nav_buttons));
    ?>

    <!-- Solutions Grid -->
    <section class="py-16 lg:py-24 bg-gray-50" id="solutions">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-down" data-aos-delay="200">
                    Soluciones</p>
                <h2 class="text-2xl lg:text-4xl font-semibold mb-4" data-aos="fade-up" data-aos-delay="300">
                    <span class="text-primary">Una solución a la medida de cada operación</span>
                </h2>
            </div>
            <!-- Solution 1: Sistema de video -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-24 items-center mb-12 lg:mb-20">
                <div class="order-2 lg:order-1" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_home_solucion-01.png"
                        alt="Sistema de video"
                        class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                </div>
                <div class="order-1 lg:order-2" data-aos="fade-left" data-aos-delay="200">
                    <div class="flex items-center gap-2 text-sm uppercase tracking-wider mb-3 text-gray font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="37" viewBox="0 0 36 37" fill="none">
                            <path d="M29.9093 0H5.98185C2.67817 0 0 2.67825 0 5.98205V30.0267C0 33.3305 2.67817 36.0088 5.98185 36.0088H29.9093C33.213 36.0088 35.8912 33.3305 35.8912 30.0267V5.98205C35.8912 2.67825 33.213 0 29.9093 0Z" fill="#FF4D4D" />
                            <path d="M25.8706 17.3571C25.8706 17.3571 25.8706 19.2857 27.6968 19.2857C29.0969 19.2857 29.036 14.1429 28.9751 11.0571C28.9751 9.9 28.0621 9 26.9663 9C26.4794 9 25.9315 9.19286 25.5663 9.57857L20.6964 14.4643M20.6964 14.4643L22.7052 16.5857C22.9487 16.8429 23.1313 17.2286 23.1313 17.6143V19.9929C23.1313 20.4429 22.7661 20.8286 22.34 20.8286H10.4698C10.1045 20.8286 9.73928 20.5071 9.73928 20.0571V12.7929C9.73928 12.2143 9.98278 11.6357 10.348 11.25C10.7133 10.8643 11.2611 10.6071 11.809 10.6071H16.3744C16.8006 10.6071 17.2267 10.8 17.531 11.1214L20.6964 14.4643ZM14.2441 10.6071V16.3929H22.2185M13.0873 20.8929V24.1071M19.3571 20.8929V24.1071M26.7837 27H8.52182C7.6696 27 7 26.2929 7 25.3929C7 24.4929 7.6696 23.7857 8.52182 23.7857H26.7837C27.6359 23.7857 28.3055 24.4929 28.3055 25.3929C28.3055 26.2929 27.6359 27 26.7837 27Z" stroke="white" stroke-miterlimit="10" />
                        </svg>
                        Localización y rastreo vehicular
                    </div>
                    <h3 class="text-2xl lg:text-4xl font-semibold text-black mb-6">Rastrea y recupera tu vehículo en caso de robo</h3>
                    <p class="leading-relaxed mb-6 text-gray">
                        Recupera tu vehículo con un 96% de efectividad gracias a nuestro sistema SVR y monitoreo en tiempo real.
                    </p>
                    <a href="#" class="btn-primary flex items-center gap-2 w-max">Ver Solución</a>
                </div>
            </div>

            <!-- Solution 2: Sistema de rastreo satelital -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-24 items-center mb-12 lg:mb-20">
                <div class="order-2" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_home_solucion-01.png"
                        alt="Sistema de rastreo satelital"
                        class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                </div>
                <div class="order-1" data-aos="fade-left" data-aos-delay="200">
                    <div class="flex items-center gap-2 text-sm uppercase tracking-wider mb-3 text-gray font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="37" viewBox="0 0 36 37" fill="none">
                            <path d="M29.9093 0H5.98185C2.67817 0 0 2.67825 0 5.98205V30.0267C0 33.3305 2.67817 36.0088 5.98185 36.0088H29.9093C33.213 36.0088 35.8912 33.3305 35.8912 30.0267V5.98205C35.8912 2.67825 33.213 0 29.9093 0Z" fill="#FF4D4D" />
                            <path d="M25.8706 17.3571C25.8706 17.3571 25.8706 19.2857 27.6968 19.2857C29.0969 19.2857 29.036 14.1429 28.9751 11.0571C28.9751 9.9 28.0621 9 26.9663 9C26.4794 9 25.9315 9.19286 25.5663 9.57857L20.6964 14.4643M20.6964 14.4643L22.7052 16.5857C22.9487 16.8429 23.1313 17.2286 23.1313 17.6143V19.9929C23.1313 20.4429 22.7661 20.8286 22.34 20.8286H10.4698C10.1045 20.8286 9.73928 20.5071 9.73928 20.0571V12.7929C9.73928 12.2143 9.98278 11.6357 10.348 11.25C10.7133 10.8643 11.2611 10.6071 11.809 10.6071H16.3744C16.8006 10.6071 17.2267 10.8 17.531 11.1214L20.6964 14.4643ZM14.2441 10.6071V16.3929H22.2185M13.0873 20.8929V24.1071M19.3571 20.8929V24.1071M26.7837 27H8.52182C7.6696 27 7 26.2929 7 25.3929C7 24.4929 7.6696 23.7857 8.52182 23.7857H26.7837C27.6359 23.7857 28.3055 24.4929 28.3055 25.3929C28.3055 26.2929 27.6359 27 26.7837 27Z" stroke="white" stroke-miterlimit="10" />
                        </svg>
                        gestión de flotas Y TELEMETRÍA
                    </div>
                    <h3 class="text-2xl lg:text-4xl font-semibold text-black mb-6">Monitorea tu flota de unidades y conductores</h3>
                    <p class="leading-relaxed mb-6 text-gray">
                        Recupera tu vehículo con un 96% de efectividad gracias a nuestro sistema SVR y monitoreo en tiempo real.
                    </p>
                    <a href="#" class="btn-primary flex items-center gap-2 w-max">Ver Solución</a>
                </div>
            </div>

            <!-- Solution 3: Sello electrónico ThunderLock -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-24 items-center mb-12 lg:mb-20">
                <div class="order-2 lg:order-1" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_home_solucion-01.png"
                        alt="Sistema de video"
                        class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                </div>
                <div class="order-1 lg:order-2" data-aos="fade-left" data-aos-delay="200">
                    <div class="flex items-center gap-2 text-sm uppercase tracking-wider mb-3 text-gray font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="37" viewBox="0 0 36 37" fill="none">
                            <path d="M29.9093 0H5.98185C2.67817 0 0 2.67825 0 5.98205V30.0267C0 33.3305 2.67817 36.0088 5.98185 36.0088H29.9093C33.213 36.0088 35.8912 33.3305 35.8912 30.0267V5.98205C35.8912 2.67825 33.213 0 29.9093 0Z" fill="#FF4D4D" />
                            <path d="M25.8706 17.3571C25.8706 17.3571 25.8706 19.2857 27.6968 19.2857C29.0969 19.2857 29.036 14.1429 28.9751 11.0571C28.9751 9.9 28.0621 9 26.9663 9C26.4794 9 25.9315 9.19286 25.5663 9.57857L20.6964 14.4643M20.6964 14.4643L22.7052 16.5857C22.9487 16.8429 23.1313 17.2286 23.1313 17.6143V19.9929C23.1313 20.4429 22.7661 20.8286 22.34 20.8286H10.4698C10.1045 20.8286 9.73928 20.5071 9.73928 20.0571V12.7929C9.73928 12.2143 9.98278 11.6357 10.348 11.25C10.7133 10.8643 11.2611 10.6071 11.809 10.6071H16.3744C16.8006 10.6071 17.2267 10.8 17.531 11.1214L20.6964 14.4643ZM14.2441 10.6071V16.3929H22.2185M13.0873 20.8929V24.1071M19.3571 20.8929V24.1071M26.7837 27H8.52182C7.6696 27 7 26.2929 7 25.3929C7 24.4929 7.6696 23.7857 8.52182 23.7857H26.7837C27.6359 23.7857 28.3055 24.4929 28.3055 25.3929C28.3055 26.2929 27.6359 27 26.7837 27Z" stroke="white" stroke-miterlimit="10" />
                        </svg>
                        VIDEO TELEMATICA
                    </div>
                    <h3 class="text-2xl lg:text-4xl font-semibold text-black mb-6">Realiza seguimiento vivo de tus unidades en rutas</h3>
                    <p class="leading-relaxed mb-6 text-gray">
                        Recupera tu vehículo con un 96% de efectividad gracias a nuestro sistema SVR y monitoreo en tiempo real.
                    </p>
                    <a href="#" class="btn-primary flex items-center gap-2 w-max">Ver Solución</a>
                </div>
            </div>

        </div>
    </section>

    <!-- SECCIÓN CTA -->
    <?php get_template_part('inc/componentes/section-cta-2'); ?>

    <!-- SECCIÓN CLIENTES -->
    <?php include get_template_directory() . '/inc/componentes/section-clientes.php'; ?>

</main>

<?php get_footer();

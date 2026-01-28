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
            <div class="max-w-2xl mt-[15rem] text-center md:text-left">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-medium text-white mb-8 leading-tight"
                    data-aos="fade-up" data-aos-duration="1000">
                    Tecnología de Vanguardia, Máxima Protección
                </h1>
                <p class="text-white text-sm md:text-lg ">Soluciones avanzadas de rastreo y gestión de flotas.
                    <br>Recupera tu inversión y opera sin riesgos.
                </p>
                <div class="flex gap-4 md:flex-row flex-col md:items-start items-center">
                    <a href="#" class="btn-primary flex items-center gap-2 w-max">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path
                                d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM8 14.5V5.5L14 10L8 14.5Z"
                                fill="white" />
                        </svg>
                        Conseguir una Demo
                    </a>
                    <a href="#" class="btn-outline-white flex items-center gap-2 w-max">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20" fill="none">
                            <path
                                d="M1 15.345C1.65391 16.1483 2.552 16.7163 3.558 16.963C5.832 17.552 8.07 16.517 8.557 14.653C9.044 12.787 7.284 10.753 5.011 10.163C2.738 9.573 0.977 7.54 1.464 5.675C1.951 3.81 4.188 2.776 6.462 3.365C7.444 3.601 8.332 4.158 9 4.957M5.121 17.128V19M5.121 1V3.2"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
            'label' => 'Portafolio de soluciones',
            'url' => '#solutions',
            'style' => 'btn-outline-white',
            'delay' => 200
        ),
        array(
            'label' => 'Soluciones',
            'url' => '#slider-solutions',
            'style' => 'btn-outline-white',
            'delay' => 200
        ),
        array(
            'label' => 'Beneficios',
            'url' => '#benefits',
            'style' => 'btn-outline-white',
            'delay' => 300
        ),
        array(
            'label' => 'Clientes',
            'url' => '#clients',
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
                <h2 class="text-2xl lg:text-4xl font-medium mb-4" data-aos="fade-up" data-aos-delay="300">
                    <span>Una <span class="text-primary">solución</span> a la medida de cada operación</span>
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
                            <path
                                d="M29.9093 0H5.98185C2.67817 0 0 2.67825 0 5.98205V30.0267C0 33.3305 2.67817 36.0088 5.98185 36.0088H29.9093C33.213 36.0088 35.8912 33.3305 35.8912 30.0267V5.98205C35.8912 2.67825 33.213 0 29.9093 0Z"
                                fill="#FF4D4D" />
                            <path
                                d="M25.8706 17.3571C25.8706 17.3571 25.8706 19.2857 27.6968 19.2857C29.0969 19.2857 29.036 14.1429 28.9751 11.0571C28.9751 9.9 28.0621 9 26.9663 9C26.4794 9 25.9315 9.19286 25.5663 9.57857L20.6964 14.4643M20.6964 14.4643L22.7052 16.5857C22.9487 16.8429 23.1313 17.2286 23.1313 17.6143V19.9929C23.1313 20.4429 22.7661 20.8286 22.34 20.8286H10.4698C10.1045 20.8286 9.73928 20.5071 9.73928 20.0571V12.7929C9.73928 12.2143 9.98278 11.6357 10.348 11.25C10.7133 10.8643 11.2611 10.6071 11.809 10.6071H16.3744C16.8006 10.6071 17.2267 10.8 17.531 11.1214L20.6964 14.4643ZM14.2441 10.6071V16.3929H22.2185M13.0873 20.8929V24.1071M19.3571 20.8929V24.1071M26.7837 27H8.52182C7.6696 27 7 26.2929 7 25.3929C7 24.4929 7.6696 23.7857 8.52182 23.7857H26.7837C27.6359 23.7857 28.3055 24.4929 28.3055 25.3929C28.3055 26.2929 27.6359 27 26.7837 27Z"
                                stroke="white" stroke-miterlimit="10" />
                        </svg>
                        Localización y rastreo vehicular
                    </div>
                    <h3 class="text-2xl lg:text-4xl font-medium text-black mb-6">Rastrea y recupera tu vehículo en
                        caso de robo</h3>
                    <p class="leading-relaxed mb-6 text-gray">
                        Recupera tu vehículo con un 96% de efectividad gracias a nuestro sistema SVR y monitoreo en
                        tiempo real.
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
                            <path
                                d="M29.9093 0H5.98185C2.67817 0 0 2.67825 0 5.98205V30.0267C0 33.3305 2.67817 36.0088 5.98185 36.0088H29.9093C33.213 36.0088 35.8912 33.3305 35.8912 30.0267V5.98205C35.8912 2.67825 33.213 0 29.9093 0Z"
                                fill="#FF4D4D" />
                            <path
                                d="M25.8706 17.3571C25.8706 17.3571 25.8706 19.2857 27.6968 19.2857C29.0969 19.2857 29.036 14.1429 28.9751 11.0571C28.9751 9.9 28.0621 9 26.9663 9C26.4794 9 25.9315 9.19286 25.5663 9.57857L20.6964 14.4643M20.6964 14.4643L22.7052 16.5857C22.9487 16.8429 23.1313 17.2286 23.1313 17.6143V19.9929C23.1313 20.4429 22.7661 20.8286 22.34 20.8286H10.4698C10.1045 20.8286 9.73928 20.5071 9.73928 20.0571V12.7929C9.73928 12.2143 9.98278 11.6357 10.348 11.25C10.7133 10.8643 11.2611 10.6071 11.809 10.6071H16.3744C16.8006 10.6071 17.2267 10.8 17.531 11.1214L20.6964 14.4643ZM14.2441 10.6071V16.3929H22.2185M13.0873 20.8929V24.1071M19.3571 20.8929V24.1071M26.7837 27H8.52182C7.6696 27 7 26.2929 7 25.3929C7 24.4929 7.6696 23.7857 8.52182 23.7857H26.7837C27.6359 23.7857 28.3055 24.4929 28.3055 25.3929C28.3055 26.2929 27.6359 27 26.7837 27Z"
                                stroke="white" stroke-miterlimit="10" />
                        </svg>
                        gestión de flotas Y TELEMETRÍA
                    </div>
                    <h3 class="text-2xl lg:text-4xl font-medium text-black mb-6">Monitorea tu flota de unidades y
                        conductores</h3>
                    <p class="leading-relaxed mb-6 text-gray">
                        Recupera tu vehículo con un 96% de efectividad gracias a nuestro sistema SVR y monitoreo en
                        tiempo real.
                    </p>
                    <a href="#" class="btn-primary flex items-center gap-2 w-max">Ver Solución</a>
                </div>
            </div>

            <!-- Solution 3: Sello electrónico ThunderLock -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-24 items-center">
                <div class="order-2 lg:order-1" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_home_solucion-01.png"
                        alt="Sistema de video"
                        class="rounded-2xl shadow-lg w-full transition-transform duration-500 hover:scale-105">
                </div>
                <div class="order-1 lg:order-2" data-aos="fade-left" data-aos-delay="200">
                    <div class="flex items-center gap-2 text-sm uppercase tracking-wider mb-3 text-gray font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="37" viewBox="0 0 36 37" fill="none">
                            <path
                                d="M29.9093 0H5.98185C2.67817 0 0 2.67825 0 5.98205V30.0267C0 33.3305 2.67817 36.0088 5.98185 36.0088H29.9093C33.213 36.0088 35.8912 33.3305 35.8912 30.0267V5.98205C35.8912 2.67825 33.213 0 29.9093 0Z"
                                fill="#FF4D4D" />
                            <path
                                d="M25.8706 17.3571C25.8706 17.3571 25.8706 19.2857 27.6968 19.2857C29.0969 19.2857 29.036 14.1429 28.9751 11.0571C28.9751 9.9 28.0621 9 26.9663 9C26.4794 9 25.9315 9.19286 25.5663 9.57857L20.6964 14.4643M20.6964 14.4643L22.7052 16.5857C22.9487 16.8429 23.1313 17.2286 23.1313 17.6143V19.9929C23.1313 20.4429 22.7661 20.8286 22.34 20.8286H10.4698C10.1045 20.8286 9.73928 20.5071 9.73928 20.0571V12.7929C9.73928 12.2143 9.98278 11.6357 10.348 11.25C10.7133 10.8643 11.2611 10.6071 11.809 10.6071H16.3744C16.8006 10.6071 17.2267 10.8 17.531 11.1214L20.6964 14.4643ZM14.2441 10.6071V16.3929H22.2185M13.0873 20.8929V24.1071M19.3571 20.8929V24.1071M26.7837 27H8.52182C7.6696 27 7 26.2929 7 25.3929C7 24.4929 7.6696 23.7857 8.52182 23.7857H26.7837C27.6359 23.7857 28.3055 24.4929 28.3055 25.3929C28.3055 26.2929 27.6359 27 26.7837 27Z"
                                stroke="white" stroke-miterlimit="10" />
                        </svg>
                        VIDEO TELEMATICA
                    </div>
                    <h3 class="text-2xl lg:text-4xl font-medium text-black mb-6">Realiza seguimiento vivo de tus
                        unidades en rutas</h3>
                    <p class="leading-relaxed mb-6 text-gray">
                        Recupera tu vehículo con un 96% de efectividad gracias a nuestro sistema SVR y monitoreo en
                        tiempo real.
                    </p>
                    <a href="#" class="btn-primary flex items-center gap-2 w-max">Ver Solución</a>
                </div>
            </div>

        </div>
    </section>

    <?php

    $scroll_carousel_args = array(
        'section_id' => 'how-it-works',

        // Banner configuration
        'banner' => array(
            'title' => 'CANDADO GPS',
            'subtitle' => 'SOLUCIÓN INTELIGENTE',
            'description' => 'El dispositivo de seguridad más avanzado para el transporte de carga. Monitoreo en tiempo real y control total de tus activos.',
            'images' => array(
                array(
                    'url' => get_template_directory_uri() . '/images/comsatel_gps-img.png',
                    'alt' => 'Candado GPS vista frontal'
                ),
            )
        ),

        // Cards for carousel
        'cards' => array(
            array(
                'title' => 'Reduce el riesgo de accidentes, con una conducción segura',
                'description' => 'Asigna responsables, controla documentos y previene el uso no autorizado.',
                'image' => get_template_directory_uri() . '/images/comsatel_home_solucion-01.png'
            ),
            array(
                'title' => 'Reduce el riesgo de accidentes, con una conducción segura',
                'description' => 'Asigna responsables, controla documentos y previene el uso no autorizado.',
                'image' => get_template_directory_uri() . '/images/comsatel_home_solucion-01.png'
            ),
            array(
                'title' => 'Reduce el riesgo de accidentes, con una conducción segura',
                'description' => 'Asigna responsables, controla documentos y previene el uso no autorizado.',
                'image' => get_template_directory_uri() . '/images/comsatel_home_solucion-01.png'
            ),
            array(
                'title' => 'Reduce el riesgo de accidentes, con una conducción segura',
                'description' => 'Asigna responsables, controla documentos y previene el uso no autorizado.',
                'image' => get_template_directory_uri() . '/images/comsatel_home_solucion-01.png'
            ),
            array(
                'title' => 'Reduce el riesgo de accidentes, con una conducción segura',
                'description' => 'Asigna responsables, controla documentos y previene el uso no autorizado.',
                'image' => get_template_directory_uri() . '/images/comsatel_home_solucion-01.png'
            ),
        )
    );

    // Render the component
    get_template_part('inc/componentes/section-carousel', null, $scroll_carousel_args);
    ?>

    <!-- Beneficios -->
    <section class="py-16 lg:py-24 bg-gray-50" id="benefits">
        <div class="container mx-auto">
            <h2 class="text-2xl md:text-4xl font-medium text-center text-gray-800 md:mb-12 mb-6">
                Líderes en <span class="text-primary">Tecnología GPS</span> para Flotas
            </h2>

            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-6 gap-4 w-full lg:w-2/3">

                    <div
                        class="group bg-white p-6 md:p-8 md:rounded-2xl rounded-lg shadow-lg transform md:hover:scale-105 transition duration-300 md:hover:bg-primary">
                        <div class="text-primary mb-4 transition-colors duration-300 md:group-hover:!text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="162.000000pt"
                                height="132.000000pt" viewBox="0 0 162.000000 132.000000"
                                preserveAspectRatio="xMidYMid meet" style="width: 61.0286px; height: auto;">
                                <g transform="translate(0.000000,132.000000) scale(0.100000,-0.100000)"
                                    fill="currentColor" stroke="none">
                                    <path
                                        d="M1229 1273 c-1 -5 -2 -24 -3 -43 l-1 -35 -300 -5 -300 -5 -58 -30 -59 -29 -43 -48 c-24 -26 -52 -66 -64 -88 l-21 -41 0 -83 0 -83 20 -45 c11 -24 38 -66 61 -92 l42 -47 61 -31 61 -31 142 -2 143 -3 20 -23 19 -24 1 -32 0 -32 -27 -21 -28 -22 -254 4 -254 3 -15 14 -14 15 5 38 5 38 -13 0 c-7 0 -29 -14 -51 -30 -21 -17 -88 -65 -150 -106 -62 -41 -115 -82 -118 -90 -7 -18 0 -34 16 -34 5 0 27 -14 48 -30 21 -17 41 -30 45 -30 4 0 24 -13 45 -30 21 -16 41 -30 45 -30 4 0 30 -18 57 -40 63 -49 68 -50 68 -1 0 21 6 43 13 49 l12 11 300 3 300 3 37 21 c152 86 229 252 180 389 -36 102 -129 194 -230 228 l-54 19 -118 -3 -119 -3 -20 18 -21 19 0 34 0 33 20 20 20 20 264 0 264 0 11 -14 11 -13 -6 -31 -6 -32 15 -6 15 -5 64 45 c34 25 70 52 78 58 8 7 22 18 31 23 62 37 138 92 138 101 1 9 -146 116 -217 159 -9 6 -33 22 -53 38 -37 27 -58 34 -60 20z"
                                        class="" />
                                </g>
                            </svg>



                        </div>
                        <h2
                            class="text-base md:text-xl font-medium text-primary mb-2 uppercase tracking-wide transition-colors duration-300 md:group-hover:!text-white">
                            29 Años de Experiencia
                        </h2>
                        <p class="text-sm opacity-90 transition-colors duration-300 md:group-hover:!text-white mb-0">
                            Pioneros en
                            rastreo y seguridad GPS. Presencia en Perú,
                            Bolivia y Colombia.</p>
                    </div>

                    <div
                        class="group bg-white p-6 md:p-8 md:rounded-2xl rounded-lg shadow-md border border-gray-100 transform transition duration-300 md:hover:scale-105 md:hover:bg-primary">

                        <div class="text-primary mb-4 transition-colors duration-300 md:group-hover:!text-white">
                            <svg width="42" height="36" viewBox="0 0 42 36" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.58066 0L42 10.3562L38.4407 13.9711L40.9088 14.6451L38.6185 23.3161L31.22 21.305L27.5633 25.0192L18.4224 22.4731L13.2791 31.5105L13.2737 31.5078V31.5115L4.42459 31.5102V36H0V22.5347H4.42459V27.0217H10.723L14.0118 21.2446L0 17.342L4.58066 0Z"
                                    fill="currentColor" />
                            </svg>
                        </div>

                        <h2
                            class="text-base md:text-xl font-medium text-primary mb-2 uppercase tracking-wide transition-colors duration-300 md:group-hover:!text-white">
                            Soporte y Monitoreo 24/7
                        </h2>

                        <p class="text-sm text-black transition-colors duration-300 md:group-hover:!text-white mb-0">
                            Nuestro equipo de seguridad y tráfico cuida tu flota sin descanso.
                        </p>
                    </div>


                    <div
                        class="group bg-white p-6 md:p-8 md:rounded-2xl rounded-lg shadow-md border border-gray-100 transform md:hover:scale-105 transition duration-300 md:hover:bg-primary">
                        <div class="text-primary mb-4 transition-colors duration-300 md:group-hover:!text-white">
                            <svg width="43" height="26" viewBox="0 0 43 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.67499 19.5C11.4561 19.5 12.9 20.9551 12.9 22.75C12.9 24.5449 11.4561 26 9.67499 26C7.89389 26 6.44999 24.5449 6.44999 22.75C6.44999 20.9551 7.89389 19.5 9.67499 19.5ZM35.475 19.5C37.2561 19.5 38.7 20.9551 38.7 22.75C38.7 24.5449 37.2561 26 35.475 26C33.6939 26 32.25 24.5449 32.25 22.75C32.25 20.9551 33.6939 19.5 35.475 19.5ZM25.8 0V15.1666H27.9499V2.16663H38.7L43 10.8334V21.6666H40.7425C40.2443 19.1942 38.0752 17.3334 35.4749 17.3334C32.8745 17.3334 30.7054 19.1942 30.2074 21.6666H14.9424C14.4445 19.1942 12.2754 17.3334 9.67499 17.3334C7.07454 17.3334 4.90552 19.1942 4.40756 21.6666H0V0H25.8ZM36.55 6.5H32.25V10.8334H38.7L36.55 6.5Z"
                                    fill="currentColor" />
                            </svg>

                        </div>
                        <h2
                            class="text-base md:text-xl font-medium text-primary mb-2 uppercase tracking-wide transition-colors duration-300 md:group-hover:!text-white">
                            +50 Mil Vehículos Activos</h2>
                        <p class="text-sm text-black transition-colors duration-300 md:group-hover:!text-white mb-0">
                            Ubica,
                            gestiona y protege tus activos con nuestra tecnología GPS.</p>
                    </div>

                    <div
                        class="group bg-white p-6 md:p-8 md:rounded-2xl rounded-lg shadow-md border border-gray-100 transform md:hover:scale-105 transition duration-300 md:hover:bg-primary">
                        <div class="text-primary mb-4 transition-colors duration-300 md:group-hover:!text-white">
                            <svg width="40" height="39" viewBox="0 0 40 39" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.22 24.0717C13.22 19.565 15.18 15.5783 18.2 13H4L7 3.25H29L31.44 11.18C33.12 11.9817 34.6 13.1517 35.82 14.6033L31.84 2.16667C31.44 0.91 30.32 0 29 0H7C5.68 0 4.56 0.91 4.16 2.16667L0 15.1667V32.5C0 33.6917 0.9 34.6667 2 34.6667H4C5.1 34.6667 6 33.6917 6 32.5V30.3333H14.58C13.72 28.4483 13.22 26.325 13.22 24.0717ZM7 23.8333C5.34 23.8333 4 22.3817 4 20.5833C4 18.785 5.34 17.3333 7 17.3333C8.66 17.3333 10 18.785 10 20.5833C10 22.3817 8.66 23.8333 7 23.8333ZM26.22 14.3217C31.22 14.3217 35.22 18.655 35.22 24.0717C35.22 26 34.72 27.7767 33.84 29.25L40 35.9883L37.22 39L31 32.3483C29.6 33.28 28 33.8217 26.22 33.8217C21.22 33.8217 17.22 29.4883 17.22 24.0717C17.22 18.655 21.22 14.3217 26.22 14.3217ZM26.22 18.655C25.2311 18.655 24.2644 18.9727 23.4421 19.5679C22.6199 20.1631 21.979 21.009 21.6006 21.9988C21.2222 22.9886 21.1231 24.0777 21.3161 25.1284C21.509 26.1791 21.9852 27.1443 22.6845 27.9018C23.3837 28.6594 24.2746 29.1753 25.2445 29.3843C26.2145 29.5933 27.2198 29.486 28.1334 29.076C29.0471 28.666 29.8279 27.9718 30.3773 27.081C30.9268 26.1902 31.22 25.143 31.22 24.0717C31.22 21.06 29 18.655 26.22 18.655Z"
                                    fill="currentColor" />
                            </svg>

                        </div>
                        <h2
                            class="text-base md:text-xl font-medium text-primary mb-2 uppercase tracking-wide transition-colors duration-300 md:group-hover:!text-white">
                            +10 Mil Recuperaciones</h2>
                        <p class="text-sm text-black transition-colors duration-300 md:group-hover:!text-white mb-0">
                            Centro
                            de control 24/7 y equipo especializado en acción inmediata.</p>
                    </div>
                </div>

                <div class="w-full lg:w-1/3 md:flex justify-center hidden">
                    <div class="relative max-w-[280px]">
                        <img src="<?php echo get_template_directory_uri() . '/images/comsatel_cards-phone.png'; ?>"
                            alt="App Interface" class="w-full" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN CTA -->
    <?php get_template_part('inc/componentes/section-cta-2'); ?>

    <!-- SECCIÓN BLOG -->
    <?php get_template_part('inc/componentes/section-blog'); ?>

    <!-- SECCIÓN CLIENTES -->
    <?php include get_template_directory() . '/inc/componentes/section-clientes.php'; ?>

</main>

<?php get_footer();

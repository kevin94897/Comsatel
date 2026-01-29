<?php

/**
 * Template Name: Nosotros
 */

get_header(); ?>

<main id="home" class="bg-dark-50">
    <!-- Hero Banner -->
    <section class="relative h-screen max-h-[500px] flex items-end">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/comsatel_nosotros_banner.png');">
        </div>

        <!-- Content -->
        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <span
                    class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"></span>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-20 leading-tight mt-2"
                    data-aos="fade-up" data-aos-duration="1000">
                    NOSOTROS
                </h1>
            </div>
        </div>

    </section>

    <!-- Intro Section -->
    <section class="py-12 lg:py-16 bg-gray-50 motion-safe:animate-fade-in" id="challenge">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-down">Acerca de nosotros</p>
                <p class="leading-relaxed mb-0 md:text-xl text-lg font-medium tracking-[-0.08px]" data-aos="fade-up"
                    data-aos-delay="100">
                    COMSATEL es una empresa peruana con 28 años de experiencia en soluciones de rastreo satelital,
                    telemetría y gestión de flotas. Ayudamos a las empresas a operar con mayor seguridad, eficiencia y
                    control mediante plataformas de monitoreo en tiempo real y tecnologías de análisis inteligente.
                </p>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="bg-[#EEE] py-[56px] overflow-hidden">
        <div class="container mx-auto !px-0">
            <div class="max-w-5xl mx-auto text-center">
                <div class="overflow-x-auto lg:overflow-visible flex flex-col snap-x snap-mandatory no-scrollbar">

                    <div class="flex flex-col min-w-[1000px] lg:min-w-full relative px-4 md:px-8">

                        <div class="flex items-start gap-x-8">
                            <div class="w-1/3 flex-shrink-0 snap-center pb-[24px]" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                                    <div class="flex items-center gap-2 mb-2 font-bold text-[#1A1A1A] text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_2460_5954)">
                                                <path
                                                    d="M13.1629 2.16709L21.1839 7.99509C21.8779 8.49909 22.1679 9.39209 21.9029 10.2071L18.8389 19.6371C18.7098 20.0344 18.4583 20.3806 18.1204 20.6262C17.7825 20.8717 17.3756 21.004 16.9579 21.0041H7.04186C6.62415 21.004 6.21719 20.8717 5.87928 20.6262C5.54138 20.3806 5.28989 20.0344 5.16086 19.6371L2.09686 10.2071C1.96771 9.8097 1.96771 9.38162 2.09688 8.98424C2.22605 8.58686 2.47774 8.24059 2.81586 7.99509L10.8369 2.16709C11.1749 1.9214 11.582 1.78906 11.9999 1.78906C12.4177 1.78906 12.8249 1.9214 13.1629 2.16709Z"
                                                    stroke="#E60000" stroke-width="1.25" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M10 10L12 8V16" stroke="#E60000" stroke-width="1.25"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2460_5954">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>1996 - Primeros en el Perú</span>
                                    </div>
                                    <p class="text-[14px] leading-relaxed text-gray-600 text-left">Comsatel introduce en
                                        Perú el
                                        primer sistema de rastreo y localización satelital GPS enfocado en seguridad
                                        vehicular.
                                    </p>
                                </div>
                            </div>

                            <div class="w-1/3 flex-shrink-0 snap-center pb-[24px]" data-aos="fade-up"
                                data-aos-delay="200">
                                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                                    <div class="flex items-center gap-2 mb-2 font-bold text-[#1A1A1A] text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_2460_5954)">
                                                <path
                                                    d="M13.1629 2.16709L21.1839 7.99509C21.8779 8.49909 22.1679 9.39209 21.9029 10.2071L18.8389 19.6371C18.7098 20.0344 18.4583 20.3806 18.1204 20.6262C17.7825 20.8717 17.3756 21.004 16.9579 21.0041H7.04186C6.62415 21.004 6.21719 20.8717 5.87928 20.6262C5.54138 20.3806 5.28989 20.0344 5.16086 19.6371L2.09686 10.2071C1.96771 9.8097 1.96771 9.38162 2.09688 8.98424C2.22605 8.58686 2.47774 8.24059 2.81586 7.99509L10.8369 2.16709C11.1749 1.9214 11.582 1.78906 11.9999 1.78906C12.4177 1.78906 12.8249 1.9214 13.1629 2.16709Z"
                                                    stroke="#E60000" stroke-width="1.25" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M10 10L12 8V16" stroke="#E60000" stroke-width="1.25"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2460_5954">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>2000 - Expansión al sector transporte</span>
                                    </div>
                                    <p class="text-[14px] leading-relaxed text-gray-600 text-left">La tecnología se
                                        adopta en
                                        flotas para trazabilidad y control logístico.</p>
                                </div>
                            </div>

                            <div class="w-1/3 snap-center pb-[24px]" data-aos="fade-up" data-aos-delay="300">
                                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                                    <div class="flex items-center gap-2 mb-2 font-bold text-[#1A1A1A] text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_2460_5954)">
                                                <path
                                                    d="M13.1629 2.16709L21.1839 7.99509C21.8779 8.49909 22.1679 9.39209 21.9029 10.2071L18.8389 19.6371C18.7098 20.0344 18.4583 20.3806 18.1204 20.6262C17.7825 20.8717 17.3756 21.004 16.9579 21.0041H7.04186C6.62415 21.004 6.21719 20.8717 5.87928 20.6262C5.54138 20.3806 5.28989 20.0344 5.16086 19.6371L2.09686 10.2071C1.96771 9.8097 1.96771 9.38162 2.09688 8.98424C2.22605 8.58686 2.47774 8.24059 2.81586 7.99509L10.8369 2.16709C11.1749 1.9214 11.582 1.78906 11.9999 1.78906C12.4177 1.78906 12.8249 1.9214 13.1629 2.16709Z"
                                                    stroke="#E60000" stroke-width="1.25" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M10 10L12 8V16" stroke="#E60000" stroke-width="1.25"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2460_5954">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>Avance tecnológico</span>
                                    </div>
                                    <p class="text-[14px] leading-relaxed text-gray-600 text-left">Los equipos
                                        evolucionan de
                                        grandes dispositivos a formatos compactos y de alta precisión.</p>
                                </div>
                            </div>
                        </div>

                        <div class="relative w-full h-[1px] bg-gray-300">
                            <div class="absolute top-1/2 left-0 h-[2px] bg-black -translate-y-1/2 flex justify-end items-center"
                                data-aos="width-expand" data-aos-duration="1500" style="width: 15%;">
                                <div class="w-2.5 h-2.5 bg-black rounded-full border-2 border-[#F2F2F2]"></div>
                            </div>
                        </div>

                        <div class="flex items-start gap-x-8">
                            <div class="w-[16.6%] flex-shrink-0"></div>

                            <div class="w-1/3 flex-shrink-0 snap-center pt-[24px]" data-aos="fade-up"
                                data-aos-delay="400">
                                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                                    <div class="flex items-center gap-2 mb-2 font-bold text-[#1A1A1A] text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_2460_5954)">
                                                <path
                                                    d="M13.1629 2.16709L21.1839 7.99509C21.8779 8.49909 22.1679 9.39209 21.9029 10.2071L18.8389 19.6371C18.7098 20.0344 18.4583 20.3806 18.1204 20.6262C17.7825 20.8717 17.3756 21.004 16.9579 21.0041H7.04186C6.62415 21.004 6.21719 20.8717 5.87928 20.6262C5.54138 20.3806 5.28989 20.0344 5.16086 19.6371L2.09686 10.2071C1.96771 9.8097 1.96771 9.38162 2.09688 8.98424C2.22605 8.58686 2.47774 8.24059 2.81586 7.99509L10.8369 2.16709C11.1749 1.9214 11.582 1.78906 11.9999 1.78906C12.4177 1.78906 12.8249 1.9214 13.1629 2.16709Z"
                                                    stroke="#E60000" stroke-width="1.25" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M10 10L12 8V16" stroke="#E60000" stroke-width="1.25"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2460_5954">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>2013 - Conectividad en tiempo real</span>
                                    </div>
                                    <p class="text-[14px] leading-relaxed text-gray-600 text-left">Se pasa de
                                        transmisión
                                        analógica a datos digitales 24/7 vía red celular.</p>
                                </div>
                            </div>

                            <div class="w-1/3 flex-shrink-0 snap-center pt-[24px]" data-aos="fade-up"
                                data-aos-delay="500">
                                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                                    <div class="flex items-center gap-2 mb-2 font-bold text-[#1A1A1A] text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_2460_5954)">
                                                <path
                                                    d="M13.1629 2.16709L21.1839 7.99509C21.8779 8.49909 22.1679 9.39209 21.9029 10.2071L18.8389 19.6371C18.7098 20.0344 18.4583 20.3806 18.1204 20.6262C17.7825 20.8717 17.3756 21.004 16.9579 21.0041H7.04186C6.62415 21.004 6.21719 20.8717 5.87928 20.6262C5.54138 20.3806 5.28989 20.0344 5.16086 19.6371L2.09686 10.2071C1.96771 9.8097 1.96771 9.38162 2.09688 8.98424C2.22605 8.58686 2.47774 8.24059 2.81586 7.99509L10.8369 2.16709C11.1749 1.9214 11.582 1.78906 11.9999 1.78906C12.4177 1.78906 12.8249 1.9214 13.1629 2.16709Z"
                                                    stroke="#E60000" stroke-width="1.25" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M10 10L12 8V16" stroke="#E60000" stroke-width="1.25"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2460_5954">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg> <span>Hoy - Cobertura y confianza</span>
                                    </div>
                                    <p class="text-[14px] leading-relaxed text-gray-600 text-left">Se integran
                                        comunicaciones
                                        duales y miles de flotas son monitoreadas a nivel nacional.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="bg-dark-50 px-6 md:px-24 overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="space-y-8">
                <header class="space-y-4">
                    <h2 class="text-4xl md:text-5xl font-medium text-gray-900 leading-tight">
                        Presencia en <br> <span class="text-gray-800">Latinoamerica</span>
                    </h2>
                    <p class="text-gray-600 text-lg leading-relaxed max-w-lg">
                        Operamos en los principales mercados de la región, ofreciendo soluciones de rastreo vehicular,
                        gestión de flotas, telemetría y seguridad operativa para empresas de todos los tamaños.
                    </p>
                </header>

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h3 class="font-medium text-xl mb-4 text-gray-900">Operamos en</h3>
                        <ul class="space-y-2 text-gray-600 pl-4">
                            <li>Colombia</li>
                            <li>Perú</li>
                            <li>Ecuador</li>
                            <li>Bolivia</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-medium text-xl mb-4 text-gray-900">Clientes</h3>
                        <ul class="space-y-2 text-gray-600 pl-4">
                            <li>Ecuador</li>
                            <li>EEUU</li>
                        </ul>
                    </div>
                </div>
            </div>

            
            <div class="relative w-full max-w-2xl mx-auto overflow-hidden">
                <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_mapa-peru.png" 
                    alt="Mapa" class="w-full h-auto block">

                <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 500 700" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <filter id="glow-line" x="-20%" y="-20%" width="140%" height="140%">
                            <feGaussianBlur stdDeviation="3" result="blur" />
                            <feComposite in="SourceGraphic" in2="blur" operator="over" />
                        </filter>
                        
                        <linearGradient id="lineGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#FF0000" stop-opacity="0.2" />
                            <stop offset="100%" stop-color="#FF0000" stop-opacity="1" />
                        </linearGradient>
                    </defs>

                    <path id="route" d="M220,180 Q250,250 210,320 T230,450 T320,580" 
                        stroke="url(#lineGradient)" stroke-width="3" fill="none"
                        stroke-linecap="round" stroke-dasharray="1000" stroke-dashoffset="1000"
                        filter="url(#glow-line)"
                        class="animate-draw-path" />

                    <g class="node animate-pop-in" style="animation-delay: 0.2s;">
                        <circle cx="220" cy="180" r="5" fill="#FF0000" />
                        <circle cx="220" cy="180" r="12" stroke="#FF0000" stroke-width="2" fill="none" class="animate-ping-slow" />
                    </g>

                    <g class="node animate-pop-in" style="animation-delay: 1.5s;">
                        <circle cx="210" cy="320" r="5" fill="#FF0000" />
                        <circle cx="210" cy="320" r="10" stroke="#FF0000" stroke-width="1.5" fill="none" class="animate-ping-slow" />
                    </g>

                    <g class="node animate-pop-in" style="animation-delay: 3s;">
                        <circle cx="320" cy="580" r="6" fill="#FF0000" />
                        <circle cx="320" cy="580" r="15" stroke="#FF0000" stroke-width="2" fill="none" class="animate-ping-slow" />
                    </g>
                </svg>
            </div>



        </div>
    </section>

    <!-- Counters Section -->
    <?php
    $counters_args = array(
        'counters' => array(
            array(
                'number' => '50000',
                'prefix' => '+',
                'label' => 'Vehículos monitoreados'
            ),
            array(
                'number' => '2600',
                'prefix' => '+',
                'label' => 'Empresas confían en nosotros'
            ),
            array(
                'number' => '96',
                'suffix' => '%',
                'label' => 'Tasa de efectividad en el recupero'
            ),
            array(
                'number' => '20',
                'prefix' => '+',
                'label' => 'Años de experiencia en el mercado'
            ),
        )
    );
    get_template_part('inc/componentes/section-counters', null, $counters_args);
    ?>



    <!-- SECCIÓN TRABAJA CON NOSOTROS -->
    <?php get_template_part('inc/componentes/section-trabaja-con-nosotros'); ?>

    <!-- SECCION CLIENTES -->
    <?php get_template_part('inc/componentes/section-clientes'); ?>

    <!-- SECCIÓN FAQS -->
    <?php get_template_part('inc/componentes/section-faqs'); ?>

</main>

<?php get_footer();

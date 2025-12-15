<?php

/**
 * Template Name: Sistema de Gestion
 */

get_header();
?>

<main id="primary" class="site-main">
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
                <h1 class="text-2xl md:text-4xl lg:text-5xl font-semibold text-white mb-10 leading-tight mt-2 uppercase"
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="400"
                    data-aos-easing="ease-out-cubic">
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

    <section class="py-8 md:py-16 relative">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="md:text-4xl text-2xl font-semibold text-primary mb-12 text-center">Sistemas de Gestión</h2>
                <p class="text-center mb-0">En COMSATEL se tiene cultura de mejora continua, excelencia operativa y desarrollo sostenible. Manteniendo estándares de los sistemas de gestión enfocados en Calidad (ISO 9001), Seguridad de la información (ISO 27001) además del Control y seguridad de las operaciones comerciales (BASC).</p>
            </div>
        </div>
    </section>

    <section class="space-y-6 mb-32">
        <div class="container mx-auto px-4">
            <div class="border border-dark rounded-md p-6 shadow-lg hover:border-primary mb-6">
                <p class="text-sm font-semibold text-red-600 uppercase">BASADO EN</p>
                <h2 class="text-3xl font-semibold text-red-600 mb-4">ISO 9001</h2>

                <h3 class="text-xl font-semibold mb-2">Política del Sistema de Gestión de calidad (SGC)</h3>

                <div class="space-y-2 text-gray-700 mb-4">
                    <p class="text-sm">(SGC)</p>
                    <p class="text-sm md:text-base">Brindamos un servicio de calidad en todos nuestros procesos internos, logrando la mejora continua y la satisfacción de todas las partes interesadas.</p>
                </div>

                <button class="btn btn-primary">
                    Descargar Documento
                </button>
            </div>

            <div class="border border-dark rounded-md p-6 shadow-lg hover:border-primary mb-6">
                <p class="text-sm font-semibold text-primary uppercase">BASADO EN</p>
                <h2 class="text-3xl font-semibold text-primary mb-4">ISO 9001</h2>

                <h3 class="text-xl font-semibold mb-2">Política del Sistema de Gestión de calidad (SGC)</h3>

                <div class="space-y-2 text-gray-700 mb-4">
                    <p class="text-sm">(SGC)</p>
                    <p class="text-sm md:text-base">Brindamos un servicio de calidad en todos nuestros procesos internos, logrando la mejora continua y la satisfacción de todas las partes interesadas.</p>
                </div>

                <button class="btn btn-primary">
                    Descargar Documento
                </button>
            </div>

            <div class="border border-dark rounded-md p-6 shadow-lg hover:border-primary mb-6">
                <div class="w-16 h-16 mr-4 flex-shrink-0">
                    <img src="path/to/your/iso_logo.png" alt="Logo Certificado ISO" class="w-full h-full object-contain">
                </div>
                <h3 class="text-xl font-semibold pt-4">Política del Sistema de Gestión de Seguridad la Información (SGSI)</h3>

                <p class="text-sm md:text-base">Establecemos las directrices y principios para proteger la información contra riesgos, garantizando su confidencialidad, integridad y disponibilidad, cumpliendo con las normativas vigentes, y promoviendo una cultura de seguridad dentro de la organización.</p>

                <div class="flex-col space-y-2 md:flex-row md:space-x-4">
                    <button class="btn btn-primary">
                        Descargar
                    </button>
                    <button class="btn btn-primary">
                        Ver ISO 27001
                    </button>
                    <button class="btn btn-primary">
                        Ver ISO 27017
                    </button>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();

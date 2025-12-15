<?php

/**
 * Template Name: Términos y Condiciones
 */

get_header();
?>

<style>
    /* Animaciones modernas para el menú */
    .anchor-btn {
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .anchor-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 77, 77, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .anchor-btn:hover::before {
        left: 100%;
    }

    .anchor-btn:hover {
        transform: translateX(8px);
        box-shadow: 0 10px 25px -5px rgba(255, 77, 77, 0.2);
        border-color: #FF4D4D;
    }

    .anchor-btn.active {
        background: linear-gradient(135deg, #FF4D4D 0%, #ff6b6b 100%);
        color: white;
        border-color: #FF4D4D;
        box-shadow: 0 10px 25px -5px rgba(255, 77, 77, 0.4);
    }

    .anchor-btn.active span {
        color: white;
    }

    .anchor-btn.active svg path {
        fill: white;
    }

    .anchor-btn svg {
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .anchor-btn:hover svg {
        transform: translateX(4px);
    }

    /* Animación de pulso en hover */
    /* .anchor-btn:hover {
        animation: subtle-pulse 2s infinite;
    }

    @keyframes subtle-pulse {

        0%,
        100% {
            box-shadow: 0 10px 25px -5px rgba(255, 77, 77, 0.2);
        }

        50% {
            box-shadow: 0 10px 35px -5px rgba(255, 77, 77, 0.3);
        }
    } */

    /* Mejora del sticky */
    .sticky-menu {
        transition: all 0.3s ease;
    }

    /* Animación de entrada para las secciones */
    section[id] {
        scroll-margin-top: 100px;
    }
</style>

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
                <h1 class="text-2xl md:text-4xl lg:text-5xl font-semibold text-white mb-10 leading-tight mt-2 uppercase"
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="400"
                    data-aos-easing="ease-out-cubic">
                    Protección de Datos
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
            <h2 class="md:text-4xl text-2xl font-semibold text-primary mb-12 text-center">Política de Protección de Datos Personales</h2>
            <section class="grid md:grid-cols-3 gap-10">

                <!-- LEFT COLUMN (Sticky) -->
                <aside class="md:col-span-1"
                    data-aos="fade-right"
                    data-aos-duration="1000"
                    data-aos-delay="200">
                    <div class="sticky top-24 flex flex-col gap-3 sticky-menu">

                        <button
                            data-target="#aspectos"
                            class="anchor-btn p-4 border rounded-md bg-white shadow hover:bg-gray-50 flex items-center justify-between transition w-full text-left">
                            <span class="font-medium mr-4">Aspectos Generales</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                            </svg>
                        </button>

                        <button
                            data-target="#tratamiento"
                            class="anchor-btn p-4 border rounded-md bg-white shadow hover:bg-gray-50 flex items-center justify-between transition w-full text-left">
                            <span class="font-medium mr-4">Tratamiento de los Datos Personales</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                            </svg>
                        </button>

                        <button
                            data-target="#transferencia"
                            class="anchor-btn p-4 border rounded-md bg-white shadow hover:bg-gray-50 flex items-center justify-between transition w-full text-left">
                            <span class="font-medium mr-4">Transferencia de Datos Personales</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                            </svg>
                        </button>

                        <button
                            data-target="#finalidad"
                            class="anchor-btn p-4 border rounded-md bg-white shadow hover:bg-gray-50 flex items-center justify-between transition w-full text-left">
                            <span class="font-medium mr-4">Finalidad del Tratamiento</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                            </svg>
                        </button>
                    </div>
                </aside>

                <!-- RIGHT COLUMN (Content) -->
                <article class="md:col-span-2 space-y-24">

                    <!-- SECTION 1 -->
                    <section id="aspectos"
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="400">
                        <h2 class="text-2xl font-semibold text-dark mb-4">Aspectos Generales</h2>
                        <p class="text-gray-700 leading-relaxed">
                            COMSATEL PERU S.A.C. (en adelante COMSATEL) valora a sus usuarios (entiéndase por usuarios a los clientes y ciudadanos que hacen uso de los diferentes bienes y servicios y acceden a los contenidos de la empresa) y está comprometida con la protección de su privacidad. Como parte de este compromiso, la empresa ha desarrollado la presente política de protección de datos personales (en adelante "Política de protección de datos personales") que describe detalladamente la manera en la que COMSATEL trata los datos personales en el marco de la relación que mantiene el usuario con los productos o servicios de la misma, esto incluye el uso del sitio web https://www.comsatel.com.pe/ (en adelante "Sitio Web") y los aplicativos respectivos (en adelante "aplicativos"). Dentro del contexto de la Ley N° 29733 (en adelante, la Ley) y el Decreto Supremo No. 016-2024-Jus (en adelante, el Reglamento), normas que se refieren a la protección de datos personales, el usuario expresa su consentimiento libre, previo, expreso, inequívoco e informado, por un plazo indefinido, y mientras no solicite su cancelación o revoque la presente autorización, a realizar el tratamiento de los datos que se declaren a través del presente canal (en adelante, los "Datos Personales"), que incluyen la transferencia de datos personales conforme al Capitulo III del Reglamento. De conformidad con el artículo 5 del Reglamento de la Ley dicho Consentimiento expreso e inequívoco de los términos y condiciones, y el tratamiento de los datos personales que le proporcione a COMSATEL se podrá realizar de las siguientes formas: 1. Verbal, cuando el titular del dato personal lo exterioriza oralmente de manera presencial o mediante el uso de cualquier tecnología que permita la interlocución oral. 2. Escrito, cuando se exterioriza mediante un documento o medio electrónico con su firma autógrafa, electrónica o digital, huella dactilar o cualquier otro mecanismo electrónico autorizado por el ordenamiento jurídico que pueda reflejar la manifestación de voluntad expresa. 3. Por canales digitales, cuando se firma un documento a través de medios electrónicos o digitales, o cualquier otro mecanismo electrónico autorizado por el ordenamiento jurídico que pueda reflejar la manifestación expresa, así como la manifestación consistente en "hacer clic", "cliquear" o "pinchar", "dar un toque", "touch" o "pad" u otros similares. 4. Mediante cualquier otro medio conforme a lo establecido en el artículo 141 del Código Civil
                        </p>
                    </section>

                    <!-- SECTION 2 -->
                    <section id="tratamiento"
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200">
                        <h2 class="text-2xl font-semibold text-dark mb-4">Tratamiento de los Datos Personales</h2>
                        <p class="text-gray-700 leading-relaxed">
                            1- COMSATEL, con domicilio en Diego Gavilán N° 165, Magdalena, será responsable del uso, tratamiento y seguridad de los datos personales que yo le proporcione o que éste recopile, los que estarán almacenados en un banco de datos de su titularidad y que serán gestionados y tratados con todas las medidas de seguridad y confidencialidad por cualquiera de sus oficinas, la cual conservará los datos personales mientras sean necesarios para cumplir con las finalidades por las cuales se recopilaron o hasta que sean modificados, dependiendo de la naturaleza de los mismos, con la finalidad de utilizarlos en gestiones comerciales y administrativas. COMSATEL se obliga limitar el acceso a los datos personales a los que tienen acceso en virtud de la suscripción y/o ejecución del presente acuerdo, al personal estrictamente necesario para cumplir con la prestación de servicios a su cargo, comprometiéndose a suscribir con sus empleados y terceros de quienes se valga para el cumplimiento de sus obligaciones derivadas del presente acuerdo, un convenio de confidencialidad que disponga cuando menos, las mismas obligaciones de confidencialidad que las que son de su cargo
                        </p>
                    </section>

                    <!-- SECTION 3 -->
                    <section id="transferencia"
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200">
                        <h2 class="text-2xl font-semibold text-dark mb-4">Transferencia de Datos Personales</h2>
                        <p class="text-gray-700 leading-relaxed">
                            1- COMSATEL, con domicilio en Diego Gavilán N° 165, Magdalena, será responsable del uso, tratamiento y seguridad de los datos personales que yo le proporcione o que éste recopile, los que estarán almacenados en un banco de datos de su titularidad y que serán gestionados y tratados con todas las medidas de seguridad y confidencialidad por cualquiera de sus oficinas, la cual conservará los datos personales mientras sean necesarios para cumplir con las finalidades por las cuales se recopilaron o hasta que sean modificados, dependiendo de la naturaleza de los mismos, con la finalidad de utilizarlos en gestiones comerciales y administrativas. COMSATEL se obliga limitar el acceso a los datos personales a los que tienen acceso en virtud de la suscripción y/o ejecución del presente acuerdo, al personal estrictamente necesario para cumplir con la prestación de servicios a su cargo, comprometiéndose a suscribir con sus empleados y terceros de quienes se valga para el cumplimiento de sus obligaciones derivadas del presente acuerdo, un convenio de confidencialidad que disponga cuando menos, las mismas obligaciones de confidencialidad que las que son de su cargo
                        </p>
                    </section>

                    <!-- SECTION 4 -->
                    <section id="finalidad"
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200">
                        <h2 class="text-2xl font-semibold text-dark mb-4">Finalidad del Tratamiento</h2>
                        <p class="text-gray-700 leading-relaxed">
                            2- Finalidad del tratamiento de datos personales. Mis datos personales serán utilizados a través de canales presenciales y no presenciales con las siguientes finalidades: i) se me informe a través de cualquier medio de comunicación física o electrónica (teléfono, correo electrónico, medios telemáticos, aplicativos de mensajes instantáneos, SMS, redes sociales, páginas web, WhatsApp o cualquier otra aplicación móvil, o medios similares creados o por crearse) cualquier hecho o evento referido a la relación comercial establecida entre las partes, tales como bienes o servicios vendidos, precio de venta, condiciones de venta, instalaciones, plazos y datos similares; ii) se me envíe, a través de cualquier medio de comunicación física o electrónica (teléfono, correo electrónico, medios telemáticos, aplicativos de mensajes instantáneos, SMS, redes sociales, páginas web, WhatsApp o cualquier otra aplicación móvil, o medios similares creados o por crearse) publicidad, obsequios e información sobre los diferentes productos que provee COMSATEL iii) se realicen actividades de mercadeo (informes comerciales, estadísticas, encuestas y estudios de mercado); iv) se verifique que la información que se proporcione sea correcta, verdadera y se encuentre actualizada. COMSATEL podrá dar tratamiento a mis datos personales de manera directa o a través de proveedores de servicio que serán considerados como encargados de tratamiento de mis datos personales.
                        </p>
                    </section>

                </article>
            </section>

        </div>
    </section>

</main>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const buttons = document.querySelectorAll(".anchor-btn");
        const sections = document.querySelectorAll("section[id]");

        // Función para activar botón
        function activateButton(targetId) {
            buttons.forEach(b => b.classList.remove("active"));
            const activeBtn = document.querySelector(`[data-target="#${targetId}"]`);
            if (activeBtn) {
                activeBtn.classList.add("active");
            }
        }

        // Click en botones
        buttons.forEach(btn => {
            btn.addEventListener("click", () => {
                const targetId = btn.dataset.target.substring(1);
                activateButton(targetId);

                // Scroll suave con offset mejorado
                const target = document.querySelector(btn.dataset.target);
                const yOffset = -120;
                const y = target.getBoundingClientRect().top + window.scrollY + yOffset;

                window.scrollTo({
                    top: y,
                    behavior: "smooth"
                });
            });
        });

        // Intersection Observer para activar botón según scroll
        const observerOptions = {
            root: null,
            rootMargin: "-20% 0px -70% 0px",
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    activateButton(entry.target.id);
                }
            });
        }, observerOptions);

        sections.forEach(section => {
            observer.observe(section);
        });

        // Activar primer botón al cargar
        if (buttons.length > 0) {
            buttons[0].classList.add("active");
        }
    });
</script>
<style>
    .site-main,
    .container,
    .container-full {
        overflow: visible !important;
    }
</style>
<?php
get_footer();
?>
<?php

/**
 * Template Name: Cookies
 */

get_header();
?>

<style>
    .anchor-btn {
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .anchor-btn:hover::before {
        left: 100%;
    }

    .anchor-btn:hover {
        /* box-shadow: 0 10px 25px -5px rgba(255, 77, 77, 0.2); */
        border-color: #FF4D4D;
    }

    .anchor-btn.active {
        background: linear-gradient(135deg, #FF4D4D 0%, #ff6b6b 100%);
        color: white;
        border-color: #FF4D4D;
        /* box-shadow: 0 10px 25px -5px rgba(255, 77, 77, 0.4); */
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

    /* Mejora del sticky */
    .sticky-menu {
        position: -webkit-sticky;
        position: sticky;
        top: 100px;
        z-index: 10;
        transition: all 0.3s ease;
    }

    /* Animación de entrada para las secciones */
    section[id] {
        scroll-margin-top: 100px;
    }

    @media (min-width: 768px) {
        .anchor-btn:hover svg {
            transform: translateX(4px);
        }

        .anchor-btn:hover {
            transform: translateX(8px);
        }
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
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-10 leading-tight mt-2 uppercase"
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-delay="400"
                    data-aos-easing="ease-out-cubic">
                    Política de Cookies
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
            <h2 class="md:text-4xl text-2xl font-medium text-primary mb-12 text-center">Política de Cookies</h2>
            <p class="mb-12 text-center text-sm">
                En COMSATEL respetamos tu privacidad. Por ello, te informamos, de manera clara y detallada, sobre las cookies que utilizamos y la forma segura en la que tratamos cualquier información derivada de tu navegación, dentro de nuestra página web. Ten en cuenta que las cookies que utilizamos, esenciales y no esenciales, tanto propias como de terceros, nos ayudan a mejorar el servicio que te ofrecemos y nos permiten darte una mejor experiencia de navegación en nuestra página web. Es importante que sepas que el uso de las cookies esenciales es indispensable para una navegación óptima en nuestra página web.
            </p>
            <section class="grid md:grid-cols-3 gap-10">

                <!-- LEFT COLUMN (Sticky) -->
                <aside class="md:col-span-1">
                    <div class="sticky top-24 flex flex-col gap-3 sticky-menu">

                        <button
                            data-target="#uso"
                            class="anchor-btn p-4 border rounded-md bg-white shadow hover:bg-gray-50 flex items-center justify-between transition w-full text-left">
                            <span class="font-medium mr-4">Uso de Cookies</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                            </svg>
                        </button>

                        <button
                            data-target="#listado"
                            class="anchor-btn p-4 border rounded-md bg-white shadow hover:bg-gray-50 flex items-center justify-between transition w-full text-left">
                            <span class="font-medium mr-4">Listado de Cookies</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                            </svg>
                        </button>

                        <button
                            data-target="#consentimiento"
                            class="anchor-btn p-4 border rounded-md bg-white shadow hover:bg-gray-50 flex items-center justify-between transition w-full text-left">
                            <span class="font-medium mr-4">Consentimiento de Uso</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="min-w-[12px]">
                                <path d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z" fill="#FF4D4D" />
                            </svg>
                        </button>
                    </div>
                </aside>

                <!-- RIGHT COLUMN (Content) -->
                <article class="md:col-span-2 space-y-24">

                    <!-- SECTION 1 -->
                    <section id="uso"
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="400">
                        <h2 class="text-2xl font-medium text-black mb-4">Uso De Cookies</h2>
                        <p class="text-black leading-relaxed">
                            Una cookie es un fichero que se descarga en el dispositivo del Usuario al acceder a determinadas páginas web y/o aplicaciones. Las cookies permiten, entre otras cosas, almacenar y recuperar información sobre el número de visitas, hábitos de navegación o del dispositivo del cual se navegue. Este sitio web utiliza cookies, que son pequeños archivos que se almacenan en las computadoras y que nos permiten recordar características o preferencias de la navegación que tienes en nuestra web. Gracias a esto podemos personalizar los ingresos a la web en futuras visitas, hacer más segura la navegación y conocer tus preferencias para ofrecerte información de tu interés. En el Sitio Web se utilizan los siguientes tipos de cookies: - Cookies necesarias: Son archivos de datos almacenados en el navegador del usuario que garantizan que la página web funcione correctamente, permitiendo el acceso a funciones básicas y de seguridad, protegiendo la integridad de la navegación. No pueden desactivarse en los sistemas del sitio. - Cookies no necesarias: Estas cookies no son esenciales para el funcionamiento básico del sitio web, pero que mejoran la experiencia del usuario, recopilan datos analíticos o sirven para personalizar el contenido y la publicidad. </p>
                    </section>

                    <!-- SECTION 2 -->
                    <section id="listado"
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200">
                        <h2 class="text-2xl font-medium text-black mb-4">Listado De Cookies</h2>
                        <ul class="text-black leading-relaxed ml-8">
                            <li>
                                Te mostramos los tipos de cookies y sus funciones. • Cookies esenciales: Son necesarias para permitir la navegación en la web y recordar las preferencias del usuario, así como para su funcionamiento del sitio (inicio de sesión y seguridad). Recuerda que, seguir navegando en nuestra web, significa tu aceptación a estas cookies.
                            </li>
                            <li>
                                Cookies de Marketing: Son utilizadas para mostrarte publicidad en función a tus preferencias e intereses. Para ello, el sistema desarrolla un perfil anónimo, por lo que no tienes que preocuparte por la reserva de tu identidad.
                            </li>
                        </ul>
                    </section>

                    <!-- SECTION 3 -->
                    <section id="consentimiento"
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="200">
                        <h2 class="text-2xl font-medium text-black mb-4">Consentimiento de Uso</h2>
                        <p class="text-black leading-relaxed">
                            Al ingresar a nuestra página web, nos autorizas a utilizar las cookies que libremente has aceptado en el mensaje emergente del Sitio Web (pop-up), de acuerdo con tus preferencias. El detalle de las funcionalidades de las cookies que has aceptado fue puesto a tu disposición en el momento de tu autorización. Ten en cuenta que, si no autorizas el uso de cookies esenciales, algunas funcionalidades de nuestra web se bloquearán o se limitará tu acceso a ciertos contenidos. Por ello, si no deseas autorizarlas, deberás dejar de navegar en nuestra web. Puedes administrar el uso de cookies en cualquier momento desde la configuración de tu navegador o accediendo a nuestro panel de preferencias de cookies. </p>
                        <p class="text-black leading-relaxed">
                            Estas acciones se realizan de forma diferente en función del navegador que esté usando. 
                        </p>
                        <ul class="text-black leading-relaxed ml-8">
                            <li>
                                Internet Explorer: Herramientas > Opciones de Internet > Privacidad > Configuración. Para más información, puede consultar el Soporte de Microsoft o la Ayuda del navegador. 
                            </li>
                            <li>
                                Mozilla Firefox: Herramientas > Opciones > Privacidad > Historial > Configuración Personalizada. Para más información, puede consultar el Soporte de Mozilla o la Ayuda del navegador.
                            </li>
                            <li>
                                Google Chrome: Configuración > Mostrar opciones avanzadas > Privacidad > Configuración de contenido. Para más información, puede consultar el Soporte de Google o la Ayuda del navegador.
                            </li>
                            <li>
                                Safari: Preferencias > Seguridad. Para más información, puede consultar el Soporte de Apple o la Ayuda del navegador.
                            </li>
                        </ul>
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
<?php

/**
 * Template Name: Gracias
 * 
 * Plantilla personalizada para el blog con búsqueda, filtros y carga de posts
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-center md:justify-between gap-8 md:gap-16 h-[100vh]">
            <div class="text-left">
                <h2 class="text-2xl lg:text-4xl font-semibold text-dark mb-4" data-aos="fade-up">
                    Gracias por tu solicitud de cotización
                </h2>
                <p>Hemos registrado tu solicitud y en breve nos comunicaremos contigo para brindarte tu cotización.</p>
                <a href="<?php echo home_url(); ?>" class="btn btn-primary mt-4">Ir al Inicio</a>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/images/comsatel_gracias.png" alt="Gracias por tu mensaje">
        </div>
    </div>
</main>

<?php get_footer(); ?>
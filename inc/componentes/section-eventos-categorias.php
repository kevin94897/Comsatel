<?php

/**
 * Componente: Sección Categorías de Eventos
 *
 * Grid de categorías del post type 'Evento'
 * con imagen ACF y contador real de posts.
 */

// Configuración
$post_type = 'Evento';
$taxonomy  = 'category'; // o 'categoria_evento'

// Obtener términos con posts
$terms = get_terms([
    'taxonomy'   => $taxonomy,
    'hide_empty' => true,
]);

if (!empty($terms) && !is_wp_error($terms)) :
?>

    <section class="py-12 lg:py-20 bg-gray-50 mb-10">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <p class="text-sm text-gray uppercase tracking-wider mb-4" data-aos="fade-down">
                    ESTAMOS CONTIGO EN EL CAMINO
                </p>
                <h2 class="text-3xl lg:text-4xl font-semibold text-primary" data-aos="fade-up">
                    Asistencia Vial
                </h2>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto" data-aos="fade-up">
                    Disfruta de los beneficios incluidos en tu membresía para atender
                    emergencias en carretera cuando más lo necesitas.
                </p>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 auto-rows-[300px]">
                <?php foreach ($terms as $term) :

                    // Contador real de eventos
                    $events_query = new WP_Query([
                        'post_type'      => $post_type,
                        'posts_per_page' => -1,
                        'fields'         => 'ids',
                        'tax_query'      => [
                            [
                                'taxonomy' => $taxonomy,
                                'field'    => 'term_id',
                                'terms'    => $term->term_id,
                            ],
                        ],
                    ]);

                    $event_count = $events_query->found_posts;
                    if ($event_count === 0) continue;

                    // Imagen ACF
                    $image = get_field('imagen_de_categoria', $taxonomy . '_' . $term->term_id);
                    $image_url = '';

                    if ($image) {
                        if (is_array($image)) {
                            $image_url = $image['url'];
                        } elseif (is_numeric($image)) {
                            $image_url = wp_get_attachment_url($image);
                        } else {
                            $image_url = $image;
                        }
                    } else {
                        $image_url = get_template_directory_uri() . '/images/placeholder.jpg';
                    }
                ?>

                    <!-- Card -->
                    <div
                        class="group relative h-full min-h-[300px] cursor-pointer rounded-[20px]
                border-[0px] border-transparent
                transition-[transform,box-shadow,border]
                hover:border-primary hover:-translate-y-2 hover:shadow-2xl"
                        style="will-change: transform">

                        <!-- Inner Card -->
                        <div
                            class="relative h-full rounded-[20px] overflow-hidden
                    transition-transform duration-700 ease-out">

                            <!-- Header Rojo -->
                            <div
                                class="absolute top-0 left-0 right-0 z-20
                        -translate-y-full group-hover:translate-y-0
                        transition-transform duration-700 ease-out delay-100
                        rounded-t-2xl">
                                <div class="text-center py-2 px-2 bg-primary">
                                    <h3 class="text-white text-lg font-semibold mb-0">
                                        <?php echo esc_html($term->name); ?>
                                    </h3>
                                    <p class="text-white/90 text-sm mb-0">
                                        <?php echo $event_count; ?>
                                        evento<?php echo $event_count !== 1 ? 's' : ''; ?>
                                    </p>
                                </div>
                                <div class="flex justify-between border-l-8 border-r-8 border-primary">
                                    <img src="<?php echo get_template_directory_uri() . '/images/comsatel-border.png'; ?>" alt="Comsatel Border">
                                    <img src="<?php echo get_template_directory_uri() . '/images/comsatel-border.png'; ?>" alt="Comsatel Border" class="rotate-90">
                                </div>

                            </div>

                            <!-- Imagen -->
                            <div class="absolute inset-0">
                                <img
                                    src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr($term->name); ?>"
                                    class="w-full h-full object-cover
                            transition-transform duration-1000 ease-out
                            group-hover:scale-110">

                                <!-- Overlay -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t
                                from-black/80 via-black/20 to-transparent
                                border-0 border-transparent rounded-[20px]
                                transition-[border-width,border-color]
                                duration-[2000ms]
                                group-hover:duration-0
                                group-hover:from-black/90
                                group-hover:via-black/40
                                group-hover:border-primary
                                group-hover:border-8">
                                </div>
                            </div>


                            <!-- Badge contador -->
                            <div
                                class="absolute top-2 right-0 z-10
                        transition-transform duration-500 ease-in delay-100
                        group-hover:translate-x-full">
                                <span class="bg-primary text-white text-md font-medium px-4 py-2 rounded-bl-lg shadow-lg">
                                    <?php echo $event_count; ?>
                                    evento<?php echo $event_count !== 1 ? 's' : ''; ?>
                                </span>
                            </div>

                            <!-- Contenido -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 z-10">

                                <!-- Título -->
                                <h3
                                    class="text-white text-xl font-semibold mb-4 leading-tight
                            transition-[opacity,transform] duration-500 ease-out
                            group-hover:opacity-0 group-hover:-translate-y-3">
                                    <?php echo esc_html($term->name); ?>
                                </h3>

                                <!-- Botón -->
                                <a
                                    href="<?php echo esc_url(get_term_link($term)); ?>"
                                    class="btn btn-primary font-normal !text-sm inline-block
                            transition-[transform,box-shadow] duration-500 ease-out delay-150
                            group-hover:-translate-y-4 group-hover:scale-105 group-hover:shadow-xl">
                                    Leer más
                                </a>
                            </div>

                        </div>
                    </div>

                <?php endforeach;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

<?php endif; ?>
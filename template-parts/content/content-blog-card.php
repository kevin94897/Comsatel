<?php

/**
 * Template part para mostrar una tarjeta de post en el blog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-md overflow-hidden transition-all duration-200 shadow-md hover:shadow-xl hover:-translate-y-2 flex flex-col h-full animate-fadeInUp'); ?>>
    <a href="<?php the_permalink(); ?>" class="no-underline text-inherit flex flex-col h-full group">
        <?php if (has_post_thumbnail()) : ?>
            <div class="relative w-full h-60 overflow-hidden bg-gray-100">
                <?php the_post_thumbnail('large', array('loading' => 'lazy', 'class' => 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-105')); ?>

                <!-- Badge de categoría -->
                <?php
                $categories = get_the_category();
                if (!empty($categories)) :
                    $category = $categories[0];
                ?>
                    <span class="absolute top-4 left-4 z-10 inline-flex items-center px-3 py-1 text-xs font-semibold uppercase tracking-wider bg-primary text-white rounded-full">
                        <?php echo esc_html($category->name); ?>
                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="md:p-6 p-4 flex flex-col gap-4 flex-1">
            <!-- Título -->
            <h3 class="md:text-xl text-sm font-semibold leading-tight text-dark transition-colors duration-200 group-hover:text-primary m-0">
                <?php the_title(); ?>
            </h3>

            <!-- Meta información -->
            <div class="flex items-center gap-2 text-sm text-gray-500 text-xs my-2">
                <span class="flex items-center gap-1">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 14.5C11.5899 14.5 14.5 11.5899 14.5 8C14.5 4.41015 11.5899 1.5 8 1.5C4.41015 1.5 1.5 4.41015 1.5 8C1.5 11.5899 4.41015 14.5 8 14.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8 4V8L10.5 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Lectura de <?php echo comsatel_reading_time(); ?>
                </span>
                <span class="text-gray-300">|</span>
                <span>
                    <?php echo get_the_date('d \D\e Y'); ?>
                </span>
            </div>

            <!-- Extracto -->
            <div class="md:text-[15px] text-[12px] leading-relaxed text-black flex-1">
                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
            </div>

            <!-- Botón Leer Más -->
            <?php
            get_template_part('inc/componentes/button-arrow', null, array(
                'text' => 'LEER MÁS',
                'url' => get_the_permalink(),
                'class' => 'mt-4 justify-end'
            ));
            ?>
        </div>
    </a>
</article>
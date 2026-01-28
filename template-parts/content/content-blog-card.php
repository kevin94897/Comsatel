<?php

/**
 * Template part para mostrar una tarjeta de post en el blog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-md overflow-hidden transition-all duration-200 shadow-md hover:shadow-xl hover:-translate-y-2 flex flex-col h-full animate-fadeInUp'); ?>>
    <a href="<?php the_permalink(); ?>" class="no-underline text-inherit flex flex-col h-full group">
        <?php if (has_post_thumbnail()) : ?>
            <div class="relative w-full h-60 overflow-hidden p-5">
                <?php the_post_thumbnail('large', array('loading' => 'lazy', 'class' => 'w-full h-full object-cover transition-transform duration-300 rounded-md')); ?>

                <!-- Badge de categoría -->
                <!-- <?php
                        $categories = get_the_category();
                        if (!empty($categories)) :
                            $category = $categories[0];
                        ?>
                    <span class="absolute top-4 left-4 z-10 inline-flex items-center px-3 py-1 text-xs font-medium uppercase tracking-wider bg-primary text-white rounded-full">
                        <?php echo esc_html($category->name); ?>
                    </span>
                <?php endif; ?> -->
            </div>
        <?php endif; ?>

        <div class="md:px-6 px-4 flex flex-col flex-1">
            <!-- Título -->
            <h3 class="mb-3 md:text-lg text-sm font-medium leading-tight text-dark transition-colors duration-200 group-hover:text-primary m-0">
                <?php the_title(); ?>
            </h3>

            <!-- Meta información -->
            <div class="flex items-center gap-2 text-sm text-gray-500 text-xs mb-2">
                <span class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M10 17.5C14.1421 17.5 17.5 14.1421 17.5 10C17.5 5.85786 14.1421 2.5 10 2.5C5.85786 2.5 2.5 5.85786 2.5 10C2.5 14.1421 5.85786 17.5 10 17.5Z" stroke="#A19EA5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.16406 6.66797V10.8346H13.3307" stroke="#A19EA5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    Lectura de <?php echo comsatel_reading_time(); ?>
                </span>
                <span class="text-gray-400">|</span>
                <span class="flex items-center gap-1">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1430_3276)">
                            <path d="M14.5 16H1.5C0.67 16 0 15.33 0 14.5V2.5C0 1.67 0.67 1 1.5 1H14.5C15.33 1 16 1.67 16 2.5V14.5C16 15.33 15.33 16 14.5 16ZM1.5 2C1.22 2 1 2.22 1 2.5V14.5C1 14.78 1.22 15 1.5 15H14.5C14.78 15 15 14.78 15 14.5V2.5C15 2.22 14.78 2 14.5 2H1.5Z" fill="#A19EA5" />
                            <path d="M4.5 4C4.22 4 4 3.78 4 3.5V0.5C4 0.22 4.22 0 4.5 0C4.78 0 5 0.22 5 0.5V3.5C5 3.78 4.78 4 4.5 4ZM11.5 4C11.22 4 11 3.78 11 3.5V0.5C11 0.22 11.22 0 11.5 0C11.78 0 12 0.22 12 0.5V3.5C12 3.78 11.78 4 11.5 4ZM15.5 6H0.5C0.22 6 0 5.78 0 5.5C0 5.22 0.22 5 0.5 5H15.5C15.78 5 16 5.22 16 5.5C16 5.78 15.78 6 15.5 6Z" fill="#A19EA5" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1430_3276">
                                <rect width="16" height="16" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                    <?php echo get_the_date('d \D\e Y'); ?>
                </span>
            </div>

            <!-- Extracto -->
            <div class="md:text-[15px] text-[12px] leading-relaxed text-gray-400 flex-1">
                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
            </div>

            <!-- Botón Leer Más -->
            <?php
            get_template_part('inc/componentes/button-arrow', null, array(
                'text' => 'LEER MÁS',
                'url' => get_the_permalink(),
                'class' => 'mt-4 justify-end mb-6'
            ));
            ?>
        </div>
    </a>
</article>
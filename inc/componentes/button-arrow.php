<?php

/**
 * Componente: Botón con flecha animada
 * 
 * @param array $args {
 *     Argumentos opcionales para personalizar el botón
 *     
 *     @type string $text        Texto del botón. Default: 'LEER MÁS'
 *     @type string $url         URL del enlace. Default: '#'
 *     @type string $class       Clases CSS adicionales. Default: ''
 *     @type string $target      Target del enlace (_blank, _self, etc). Default: '_self'
 *     @type string $rel         Atributo rel del enlace. Default: ''
 *     @type bool   $show_arrow  Mostrar flecha. Default: true
 * }
 */

// Valores por defecto
$defaults = array(
    'text'       => 'LEER MÁS',
    'url'        => '#',
    'class'      => '',
    'target'     => '_self',
    'rel'        => '',
    'show_arrow' => true,
);

// Combinar argumentos con valores por defecto
$args = wp_parse_args($args ?? array(), $defaults);

// Sanitizar valores
$text       = esc_html($args['text']);
$url        = esc_url($args['url']);
$class      = esc_attr($args['class']);
$target     = esc_attr($args['target']);
$rel        = esc_attr($args['rel']);
$show_arrow = (bool) $args['show_arrow'];

// Construir clases
$button_classes = 'group relative inline-flex items-center text-primary font-semishow_arrowbold hover:text-primary transition-colors duration-300';
if (!empty($class)) {
    $button_classes .= ' ' . $class;
}

// Construir atributos del enlace
$link_attrs = array();
$link_attrs[] = 'href="' . $url . '"';
$link_attrs[] = 'class="' . $button_classes . '"';

if (!empty($target) && $target !== '_self') {
    $link_attrs[] = 'target="' . $target . '"';
}

if (!empty($rel)) {
    $link_attrs[] = 'rel="' . $rel . '"';
}

// Si el target es _blank, agregar rel="noopener noreferrer" por seguridad
if ($target === '_blank' && empty($rel)) {
    $link_attrs[] = 'rel="noopener noreferrer"';
}
?>

<a <?php echo implode(' ', $link_attrs); ?>>
    <span class="relative text-xs md:text-md font-semibold">
        <?php echo $text; ?>
        <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-primary group-hover:w-full transition-all duration-300"></span>
    </span>

    <?php if ($show_arrow) : ?>
        <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
        </svg>
    <?php endif; ?>
</a>
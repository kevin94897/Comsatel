<?php
/**
 * Componente: Barra de navegación de botones
 *
 * Args esperados:
 * $args['buttons'] = array(
 *    array(
 *      'label' => 'Texto',
 *      'url'   => '#anchor',
 *      'style' => 'btn-primary' | 'btn-outline-white', // opcional, default: btn-outline-white
 *      'delay' => 100 // opcional
 *    )
 * )
 */

$buttons = $args['buttons'] ?? [];

if (empty($buttons))
    return;
?>
<section class="bg-dark">
    <div
        class="flex flex-row gap-4 items-center lg:justify-center py-4 px-4 overflow-x-scroll lg:overflow-x-hidden w-full whitespace-nowrap">
        <?php foreach ($buttons as $index => $button):
            $delay = $button['delay'] ?? ($index + 1) * 100; // Auto-increment delay if not set
            $style = $button['style'] ?? 'btn-outline-white';
            ?>
            <a href="<?php echo esc_url($button['url']); ?>" class="btn <?php echo esc_attr($style); ?>" data-aos="zoom-in"
                data-aos-delay="<?php echo esc_attr($delay); ?>">
                <?php echo esc_html($button['label']); ?>
            </a>
        <?php endforeach; ?>
    </div>
</section>
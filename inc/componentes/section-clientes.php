<!-- SECCIÓN CLIENTES -->
<?php
$banner_con_logos = get_field('banner_con_logos', 'options');
$logos_de_clientes = get_field('logos_de_clientes', 'options');
$bg_image_clientes = !empty($banner_con_logos['imagen']) ? $banner_con_logos['imagen']['url'] : get_template_directory_uri() . '/images/comsatel_soluciones-clientes.png';
?>
<section class="md:h-[600px] h-full relative flex-col flex py-16 lg:py-0" id="clients">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('<?php echo esc_url($bg_image_clientes); ?>');">
    </div>

    <div class="container mx-auto px-4 lg:px-8 z-10 h-full">
        <div class="flex items-center h-full">
            <div class="max-w-2xl flex-1">
                <p class="text-sm text-white uppercase tracking-wider mb-4" data-aos="fade-down"><?php echo esc_html($banner_con_logos['subtitulo'] ?? 'Más de 24,000 clientes'); ?></p>
                <h2 class="text-2xl lg:text-4xl font-medium text-white mb-4" data-aos="fade-up" data-aos-delay="100"><?php echo esc_html($banner_con_logos['titulo'] ?? 'Personas y empresas de múltiples sectores confían en Comsatel.'); ?></h2>
            </div>
        </div>
    </div>

    <div class="container z-10">
        <span class="border-t border-[#F0F0F0] h-2 inline-block mr-2 w-full mb-4"></span>
    </div>


    <div class="container mx-auto !pr-0 lg:!px-8 z-10">
        <div class="
        grid grid-flow-col auto-cols-[55%]
        md:grid-flow-row 
        md:auto-cols-auto
        md:grid-cols-2 
        lg:grid-cols-5
        gap-6 
        items-center 
        justify-items-center 
        pb-8 
        pt-4
        overflow-x-auto 
        md:overflow-visible
        scroll-smooth
        scrollbar-hide
    ">
            <?php if (!empty($logos_de_clientes)): ?>
                <?php foreach ($logos_de_clientes as $index => $item): ?>
                    <div class="col-span-1 m-auto max-w-[150px]" data-aos="zoom-in" data-aos-delay="<?php echo ($index + 1) * 100; ?>">
                        <?php if (!empty($item['logo'])): ?>
                            <img src="<?php echo esc_url($item['logo']['url']); ?>"
                                alt="Cliente Comsatel">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback logos -->
                <div class="col-span-1 m-l-0 max-w-[150px]" data-aos="zoom-in" data-aos-delay="100">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/ccl_logo.png"
                        alt="Comsatel Soluciones Clientes">
                </div>
                <div class="col-span-1 m-auto max-w-[180px]" data-aos="zoom-in" data-aos-delay="200">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/oracle_logo.png"
                        alt="Comsatel Soluciones Clientes">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
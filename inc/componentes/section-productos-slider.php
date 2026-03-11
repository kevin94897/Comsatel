<?php
$acf_group = get_field('sliders_productos', get_the_ID());
$acf_subtitulo = $acf_group['subtitulo'] ?? null;
$acf_titulo = $acf_group['titulo'] ?? null;
$acf_desc = $acf_group['descripcion'] ?? null;
$acf_slides = $acf_group['slider'] ?? null;
?>

<section class="py-16 lg:py-24 relative" id="other-solutions">
    <div class="container mx-auto px-4 lg:px-8">

        <!-- Header -->
        <?php if (!empty($acf_subtitulo) || !empty($acf_titulo) || !empty($acf_desc)): ?>
            <div class="text-center mb-10">
                <div class="max-w-2xl mx-auto">
                    <?php if (!empty($acf_subtitulo)): ?>
                        <p class="text-sm text-gray-400 uppercase tracking-wider mb-4">
                            <?php echo esc_html($acf_subtitulo); ?>
                        </p>
                    <?php endif; ?>
                    <?php if (!empty($acf_titulo)): ?>
                        <h2 class="text-2xl lg:text-4xl font-medium text-primary mb-4">
                            <?php echo esc_html($acf_titulo); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if (!empty($acf_desc)): ?>
                        <p class="mb-8">
                            <?php echo esc_html($acf_desc); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- SWIPER WRAPPER -->
        <div class="swiper myProductosSlider">
            <div class="swiper-wrapper">

                <?php if (!empty($acf_slides)): ?>
                    <?php foreach ($acf_slides as $slide):
                        $s_titulo = $slide['titulo'] ?? '';
                        $s_desc = $slide['descripcion'] ?? '';
                        $s_boton = $slide['boton'] ?? [];
                        $s_imagen = $slide['imagen'] ?? [];
                        ?>
                        <div class="swiper-slide">
                            <div class="grid lg:grid-cols-2 gap-8 items-center bg-white rounded-2xl shadow-lg overflow-hidden my-4 p-4"
                                data-aos="fade-in" data-aos-delay="300" data-aos-duration="1000">

                                <div class="p-8 lg:p-12">
                                    <?php if ($s_titulo): ?>
                                        <h3 class="text-2xl font-medium"><?php echo esc_html($s_titulo); ?></h3>
                                    <?php endif; ?>

                                    <?php if ($s_desc): ?>
                                        <p class="my-6"><?php echo esc_html($s_desc); ?></p>
                                    <?php endif; ?>

                                    <?php if (!empty($s_boton['url'])): ?>
                                        <a href="<?php echo esc_url($s_boton['url']); ?>"
                                            target="<?php echo esc_attr($s_boton['target'] ?? '_self'); ?>" class="btn btn-primary">
                                            <?php echo esc_html($s_boton['title'] ?? 'Más información'); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($s_imagen['url'])): ?>
                                    <div>
                                        <img src="<?php echo esc_url($s_imagen['url']); ?>"
                                            alt="<?php echo esc_attr($s_imagen['alt'] ?? $s_titulo); ?>"
                                            class="w-full h-full object-cover rounded-md">
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php endif; ?>

            </div>
        </div>

        <!-- BOTONES -->
        <div class="flex justify-end gap-4 mb-6 mt-4">
            <button
                class="productos-prev group py-2.5 px-3 rounded-full border border-dark flex items-center justify-center hover:border-red-600 hover:text-primary transition-all bg-transparent">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 30 24" fill="none">
                    <path
                        d="M13.2411 22.8154C12.8411 23.2153 12.2986 23.44 11.7329 23.44C11.1672 23.44 10.6247 23.2153 10.2246 22.8154L0.62461 13.2154C0.224672 12.8153 -1.55764e-06 12.2728 -1.55764e-06 11.7071C-1.55764e-06 11.1414 0.224672 10.5989 0.62461 10.1989L10.2246 0.598857C10.627 0.210254 11.1658 -0.00477437 11.7252 8.62612e-05C12.2846 0.00494689 12.8196 0.229307 13.2152 0.624844C13.6107 1.02038 13.8351 1.55545 13.8399 2.1148C13.8448 2.67416 13.6297 3.21304 13.2411 3.61539L7.46621 9.57379L27.7329 9.57379C28.2987 9.57379 28.8413 9.79855 29.2414 10.1986C29.6414 10.5987 29.8662 11.1413 29.8662 11.7071C29.8662 12.2729 29.6414 12.8155 29.2414 13.2156C28.8413 13.6157 28.2987 13.8405 27.7329 13.8405L7.46621 13.8405L13.2411 19.7989C13.6411 20.1989 13.8658 20.7414 13.8658 21.3071C13.8658 21.8728 13.6411 22.4153 13.2411 22.8154Z"
                        class="fill-[#1E1E1E] group-hover:fill-red-600 transition-colors duration-200" />
                </svg>
            </button>
            <button
                class="productos-next group py-2.5 px-3 rounded-full border border-dark flex items-center justify-center hover:border-red-600 hover:text-primary transition-all bg-transparent">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 30 24" fill="none">
                    <path
                        d="M16.6251 0.624611C17.0251 0.224673 17.5676 0 18.1333 0C18.699 0 19.2415 0.224673 19.6416 0.624611L29.2416 10.2246C29.6415 10.6247 29.8662 11.1672 29.8662 11.7329C29.8662 12.2986 29.6415 12.8411 29.2416 13.2411L19.6416 22.8411C19.2393 23.2297 18.7004 23.4448 18.141 23.4399C17.5817 23.4351 17.0466 23.2107 16.6511 22.8152C16.2555 22.4196 16.0312 21.8846 16.0263 21.3252C16.0214 20.7658 16.2365 20.227 16.6251 19.8246L22.4 13.8662H2.13333C1.56754 13.8662 1.02492 13.6414 0.624839 13.2414C0.224761 12.8413 0 12.2987 0 11.7329C0 11.1671 0.224761 10.6245 0.624839 10.2244C1.02492 9.82431 1.56754 9.59954 2.13333 9.59954H22.4L16.6251 3.64114C16.2251 3.24109 16.0005 2.69856 16.0005 2.13288C16.0005 1.56719 16.2251 1.02467 16.6251 0.624611Z"
                        class="fill-[#1E1E1E] group-hover:fill-red-600" />
                </svg>
            </button>
        </div>

    </div>
</section>
<!-- Recibir datos desde el template padre -->
<?php
$sobre_nosotros = $args['sobre_nosotros'] ?? null;
$trabajos = $args['trabajos'] ?? null;

$sn_titulo = $sobre_nosotros['titulo'] ?? null;
$sn_vision = $sobre_nosotros['vision'] ?? null;
$sn_mision = $sobre_nosotros['mision'] ?? null;
$sn_fondo_vision = $sobre_nosotros['fondo_vision']['url'] ?? null;
$sn_fondo_mision = $sobre_nosotros['fondo_mision']['url'] ?? null;

$trab_titulo = $trabajos['titulo'] ?? null;
$trab_desc = $trabajos['descripcion'] ?? null;
$habilidades = $trabajos['habilidades'] ?? [];

$hab_top = !empty($habilidades) ? array_slice($habilidades, 0, 6) : [];
// $hab_bottom = array_slice($habilidades, 3, 3);
?>

<section class="py-20 px-4 max-w-7xl mx-auto">

    <!-- Título principal -->
    <?php if (!empty($sn_titulo)): ?>
        <h2 class="heading-h2 font-medium text-center mb-16 text-gray-900 motion-preset-fade motion-delay-100">
            <?php echo esc_html($sn_titulo); ?>
        </h2>
    <?php endif; ?>

    <!-- Visión y Misión Grid -->
    <div class="grid md:grid-cols-2 gap-6 mb-20">

        <!-- Visión Card -->
        <?php if (!empty($sn_vision)): ?>
            <div
                class="relative overflow-hidden rounded-2xl aspect-[16/10] group cursor-pointer motion-preset-slide-right motion-delay-200">
                <img src="<?php echo esc_url($sn_fondo_vision); ?>" alt="Visión"
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/20 p-4 md:p-8 flex flex-col justify-end transition-all duration-500 group-hover:from-black/90">
                    <h3
                        class="heading-h3 text-white font-semibold mb-4 transform transition-transform duration-500 group-hover:translate-y-[-4px]">
                        Visión
                    </h3>
                    <p
                        class="text-white/95 text-sm leading-tight transform transition-all duration-500 opacity-90 group-hover:opacity-100">
                        <?php echo nl2br(wp_kses_post($sn_vision)); ?>
                    </p>
                </div>
            </div>
        <?php endif; ?>

        <!-- Misión Card -->
        <?php if (!empty($sn_mision)): ?>
            <div
                class="relative overflow-hidden rounded-2xl aspect-[16/10] group cursor-pointer motion-preset-slide-left motion-delay-300">
                <img src="<?php echo esc_url($sn_fondo_mision); ?>" alt="Misión"
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/20 p-4 md:p-8 flex flex-col justify-end transition-all duration-500 group-hover:from-black/90">
                    <h3
                        class="heading-h3 text-white font-semibold mb-4 transform transition-transform duration-500 group-hover:translate-y-[-4px]">
                        Misión
                    </h3>
                    <p
                        class="text-white/95 text-sm leading-tight transform transition-all duration-500 opacity-90 group-hover:opacity-100">
                        <?php echo nl2br(wp_kses_post($sn_mision)); ?>
                    </p>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <!-- Valores y Texto Grid -->
    <div class="grid lg:grid-cols-2 gap-16 items-center">

        <!-- Grid de Habilidades/Valores -->
        <div class="order-2 lg:order-1">
            <div class="grid grid-cols-3 gap-3 md:gap-4">

                <?php if (!empty($habilidades)): ?>

                    <!-- Fila superior: cards con imagen de fondo -->
                    <?php foreach ($hab_top as $i => $hab):
                        $hab_imagen = $hab['imagen'] ?? [];
                        $hab_titulo = $hab['titulo'] ?? '';
                        $hab_fondo = $hab['imagen_de_fondo'] ?? [];
                        $fondo_url = $hab_fondo['url'] ?? null;
                        ?>
                        <div
                            class="aspect-square rounded-md overflow-hidden relative group cursor-pointer motion-preset-fade motion-delay-400">
                            <img src="<?php echo esc_url($fondo_url); ?>" alt="<?php echo esc_attr($hab_titulo); ?>"
                                class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col items-center justify-center p-3 transition-all duration-300 group-hover:from-black/70 gap-2">
                                <?php if (!empty($hab_imagen['url'])): ?>
                                    <img src="<?php echo esc_url($hab_imagen['url']); ?>" alt="<?php echo esc_attr($hab_titulo); ?>"
                                        class="w-12 h-12 object-contain">
                                <?php endif; ?>
                                <span class="text-sm text-white">
                                    <?php echo esc_html($hab_titulo); ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>

        <!-- Texto Descriptivo -->
        <div class="order-1 lg:order-2 space-y-6 motion-preset-slide-left motion-delay-400">
            <?php if (!empty($trab_titulo)): ?>
                <h3 class="heading-h3 font-medium text-gray-900">
                    <?php echo esc_html($trab_titulo); ?>
                </h3>
            <?php endif; ?>
            <?php if (!empty($trab_desc)): ?>
                <div class="space-y-4">
                    <p class="text-gray-600 text-md md:text-lg">
                        <?php echo nl2br(wp_kses_post($trab_desc)); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

    </div>

</section>

<script>
    if (typeof motion !== 'undefined') {
        motion.init();
    }

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('motion-preset-fade-in');
            }
        });
    }, observerOptions);

    document.querySelectorAll('[class*="motion-"]').forEach(el => {
        observer.observe(el);
    });
</script>
<?php
/**
 * Template Name: Politicas
 */

get_header();

// ── ACF Data ──────────────────────────────────────────────
$encabezado = get_field('encabezado') ?? [];
$enc_titulo = $encabezado['titulo'] ?? '';
$enc_descripcion = $encabezado['descripcion'] ?? '';
$temas = get_field('temas') ?? [];
?>

<main id="primary" class="site-main bg-gray-50">

    <!-- Hero Banner -->
    <section class="relative min-h-[500px] flex items-end">
        <?php $hero_img = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
        <?php if ($hero_img): ?>
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('<?php echo esc_url($hero_img); ?>');" data-aos="fade-in"
                data-aos-duration="1200">
            </div>
        <?php endif; ?>

        <div class="container-full md:mx-auto md:px-4 lg:px-8 relative z-10">
            <div>
                <span class="border-t-4 border-[#FF4D4D] inline-block mr-2 w-full mb-2 md:max-w-[100px] max-w-[50px]"
                    data-aos="fade-right" data-aos-duration="800" data-aos-delay="200"></span>
                <h1 class="heading-h1 font-bold text-white mb-10 leading-tight mt-2 uppercase"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" data-aos-easing="ease-out-cubic">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </section>

    <section class="py-8 md:py-16 relative">
        <div class="container mx-auto px-4">

            <!-- Encabezado -->
            <?php if ($enc_titulo || $enc_descripcion): ?>
                <div class="mb-12 text-center">
                    <?php if ($enc_titulo): ?>
                        <h2 class="md:text-4xl text-2xl font-medium text-primary mb-6">
                            <?php echo esc_html($enc_titulo); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if ($enc_descripcion): ?>
                        <p class="text-sm max-w-4xl mx-auto">
                            <?php echo esc_html($enc_descripcion); ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Layout: sidebar + contenido -->
            <?php if (!empty($temas)): ?>
                <div class="grid md:grid-cols-3 gap-10">

                    <!-- LEFT: Menú sticky generado dinámicamente -->
                    <aside class="md:col-span-1 self-start sticky top-24">
                        <div class="flex flex-col gap-3">
                            <?php foreach ($temas as $i => $tema):
                                $t_titulo = $tema['titulo'] ?? '';
                                if (!$t_titulo)
                                    continue;
                                $slug = 'tema-' . $i;
                                ?>
                                <button data-target="#<?php echo esc_attr($slug); ?>"
                                    class="anchor-btn p-4 border rounded-md bg-white shadow flex items-center justify-between transition-all duration-300 w-full text-left hover:border-primary <?php echo $i === 0 ? 'active' : ''; ?>">
                                    <span class="font-medium mr-4"><?php echo esc_html($t_titulo); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11"
                                        fill="none" class="min-w-[12px] transition-transform duration-300">
                                        <path
                                            d="M7.793 0.292786C7.98053 0.105315 8.23484 0 8.5 0C8.76516 0 9.01947 0.105315 9.207 0.292786L13.707 4.79279C13.8945 4.98031 13.9998 5.23462 13.9998 5.49979C13.9998 5.76495 13.8945 6.01926 13.707 6.20679L9.207 10.7068C9.0184 10.8889 8.7658 10.9897 8.5036 10.9875C8.2414 10.9852 7.99059 10.88 7.80518 10.6946C7.61977 10.5092 7.5146 10.2584 7.51233 9.99619C7.51005 9.73399 7.61084 9.48139 7.793 9.29279L10.5 6.49979H1C0.734784 6.49979 0.48043 6.39443 0.292893 6.20689C0.105357 6.01936 0 5.765 0 5.49979C0 5.23457 0.105357 4.98022 0.292893 4.79268C0.48043 4.60514 0.734784 4.49979 1 4.49979H10.5L7.793 1.70679C7.60553 1.51926 7.50021 1.26495 7.50021 0.999786C7.50021 0.734622 7.60553 0.480314 7.793 0.292786Z"
                                            fill="#FF4D4D" />
                                    </svg>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </aside>

                    <!-- RIGHT: Contenido dinámico -->
                    <article class="md:col-span-2 space-y-24">
                        <?php foreach ($temas as $i => $tema):
                            $t_titulo = $tema['titulo'] ?? '';
                            $t_texto = $tema['texto'] ?? '';
                            if (!$t_titulo && !$t_texto)
                                continue;
                            $slug = 'tema-' . $i;
                            ?>
                            <section id="<?php echo esc_attr($slug); ?>" style="scroll-margin-top: 100px;" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="200">
                                <?php if ($t_titulo): ?>
                                    <h2 class="text-2xl font-medium text-black mb-4">
                                        <?php echo esc_html($t_titulo); ?>
                                    </h2>
                                <?php endif; ?>
                                <?php if ($t_texto): ?>
                                    <div
                                        class="wysiwyg-content text-black text-sm md:text-base leading-relaxed
                                    [&_p]:mb-3
                                    [&_strong]:font-semibold [&_strong]:text-black
                                    [&_em]:italic
                                    [&_ul]:pl-5 [&_ul]:mb-4 [&_ul]:space-y-1 [&_ul]:list-disc
                                    [&_ol]:pl-5 [&_ol]:mb-4 [&_ol]:space-y-1 [&_ol]:list-decimal
                                    [&_li]:text-gray-700
                                    [&_a]:text-primary [&_a]:underline [&_a:hover]:text-primary/80
                                    [&_h2]:text-xl [&_h2]:font-medium [&_h2]:text-black [&_h2]:mb-3 [&_h2]:mt-6
                                    [&_h3]:text-lg [&_h3]:font-medium [&_h3]:text-black [&_h3]:mb-2 [&_h3]:mt-4
                                    [&_blockquote]:border-l-4 [&_blockquote]:border-primary [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:text-gray-600">
                                        <?php echo wp_kses_post($t_texto); ?>
                                    </div>
                                <?php endif; ?>
                            </section>
                        <?php endforeach; ?>
                    </article>

                </div>
            <?php endif; ?>

        </div>
    </section>

</main>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const buttons = document.querySelectorAll(".anchor-btn");
        const sections = document.querySelectorAll("section[id]");

        function activateButton(targetId) {
            buttons.forEach(b => {
                const isActive = b.dataset.target === '#' + targetId;
                b.classList.toggle("active", isActive);
                // Tailwind activo: fondo rojo, texto e icono blancos
                b.classList.toggle("bg-gradient-to-br", isActive);
                b.classList.toggle("from-[#FF4D4D]", isActive);
                b.classList.toggle("to-[#ff6b6b]", isActive);
                b.classList.toggle("text-white", isActive);
                b.classList.toggle("border-[#FF4D4D]", isActive);
                b.classList.toggle("bg-white", !isActive);
                const span = b.querySelector("span");
                if (span) span.classList.toggle("text-white", isActive);
                const path = b.querySelector("svg path");
                if (path) path.setAttribute("fill", isActive ? "white" : "#FF4D4D");
            });
        }

        // Click
        buttons.forEach(btn => {
            btn.addEventListener("click", () => {
                const targetId = btn.dataset.target.substring(1);
                activateButton(targetId);
                const target = document.querySelector(btn.dataset.target);
                if (!target) return;
                const y = target.getBoundingClientRect().top + window.scrollY - 120;
                window.scrollTo({ top: y, behavior: "smooth" });
            });
        });

        // Scroll spy
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) activateButton(entry.target.id);
            });
        }, { root: null, rootMargin: "-20% 0px -70% 0px", threshold: 0 });

        sections.forEach(s => observer.observe(s));

        // Activar primer botón
        if (buttons.length > 0) {
            const firstId = buttons[0].dataset.target.substring(1);
            activateButton(firstId);
        }
    });
</script>

<?php get_footer(); ?>
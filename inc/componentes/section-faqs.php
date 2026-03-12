<!-- FAQ Section -->
<section class="py-16 lg:py-24" id="preguntas-frecuentes">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <?php
        $faqs_group = get_field('faqs');
        $faq_list = ($faqs_group && isset($faqs_group['lista_de_preguntas'])) ? $faqs_group['lista_de_preguntas'] : null;

        if ($faq_list):
            ?>
            <!-- Header (Dynamic) -->
            <div class="text-center mb-12 lg:mb-16">
                <p class="text-gray text-sm font-medium tracking-wider uppercase mb-3" data-aos="fade-down">
                    Preguntas frecuentes
                </p>
                <h2 class="text-2xl lg:text-4xl font-medium mb-4" data-aos="fade-up" data-aos-delay="100">
                    Tu operación, nuestras respuestas
                </h2>
                <p class="text-dark text-lg max-w-2xl mx-auto mt-8" data-aos="fade-up" data-aos-delay="200">
                    Aquí resolvemos lo esencial para empezar sin fricción.
                </p>
            </div>

            <!-- FAQ List (Dynamic) -->
            <div class="max-w-5xl mx-auto space-y-4">
                <?php foreach ($faq_list as $index => $faq):
                    $pregunta = $faq['pregunta'] ?? null;
                    $respuesta = $faq['respuesta'] ?? null;
                    if (empty($pregunta) || empty($respuesta))
                        continue;
                    $delay = 100 + ($index * 50);
                    $isOpen = ($index === 0);
                    ?>
                    <!-- FAQ Item -->
                    <div class="bg-white rounded-md shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md"
                        data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <button onclick="toggleFAQ(this)"
                            class="w-full px-6 py-5 lg:px-8 lg:py-6 flex items-center justify-between text-left transition-colors duration-200 bg-gray-100 border-none">
                            <span class="font-medium text-black text-sm lg:text-base pr-4 uppercase">
                                <?php echo wp_kses_post($pregunta); ?>
                            </span>
                            <span class="flex-shrink-0 text-red-500">
                                <svg class="arrow-up w-5 h-5 transform <?php echo $isOpen ? 'rotate-45' : '-rotate-45'; ?> transition-transform duration-300"
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 30 24" fill="none"
                                    class="transition-colors">
                                    <path
                                        d="M16.6251 0.624611C17.0251 0.224673 17.5676 0 18.1333 0C18.699 0 19.2415 0.224673 19.6416 0.624611L29.2416 10.2246C29.6415 10.6247 29.8662 11.1672 29.8662 11.7329C29.8662 12.2986 29.6415 12.8411 29.2416 13.2411L19.6416 22.8411C19.2393 23.2297 18.7004 23.4448 18.141 23.4399C17.5817 23.4351 17.0466 23.2107 16.6511 22.8152C16.2555 22.4196 16.0312 21.8846 16.0263 21.3252C16.0214 20.7658 16.2365 20.227 16.6251 19.8246L22.4 13.8662H2.13333C1.56754 13.8662 1.02492 13.6414 0.624839 13.2414C0.224761 12.8413 0 12.2987 0 11.7329C0 11.1671 0.224761 10.6245 0.624839 10.2244C1.02492 9.82431 1.56754 9.59954 2.13333 9.59954H22.4L16.6251 3.64114C16.2251 3.24109 16.0005 2.69856 16.0005 2.13288C16.0005 1.56719 16.2251 1.02467 16.6251 0.624611Z"
                                        class="fill-[#1E1E1E] group-hover:fill-red-600" />
                                </svg>
                            </span>
                        </button>
                        <div
                            class="accordion-content <?php echo $isOpen ? 'max-h-96' : 'max-h-0 opacity-0'; ?> overflow-hidden transition-all duration-300 bg-gray-100">
                            <div class="px-6 pb-6 lg:px-8 lg:pb-8 pt-2">
                                <div class="text-gray-700 leading-relaxed">
                                    <?php echo wp_kses_post($respuesta); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
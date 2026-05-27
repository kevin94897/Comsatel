<?php

/**
 * Template Name: Cotizador
 */

get_header();

$acf_titulo      = get_field('titulo');
$acf_descripcion = get_field('descripcion');
$acf_tabs        = get_field('tabs');
?>

<style>
    /* Vertical Step Indicator Styles (Adapted from Libro de Reclamaciones) */
    .step-indicator-vertical {
        position: relative;
    }

    .step-item-vertical {
        position: relative;
        transition: all 0.3s ease;
    }

    .step-item-vertical::before {
        content: '';
        position: absolute;
        left: 17px;
        top: 35px;
        width: 2px;
        height: calc(100% + 24px);
        background: #E5E7EB;
        z-index: 0;
    }

    .step-item-vertical:last-child::before {
        display: none;
    }

    .step-number {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        transition: all 0.3s ease;
        background: white;
        border: 2px solid #E5E7EB;
        color: #9CA3AF;
        position: relative;
        z-index: 1;
    }

    .step-item-vertical.page-active .step-number {
        background: linear-gradient(135deg, #FF4D4D 0%, #ff6b6b 100%);
        border-color: #FF4D4D;
        color: white;
        box-shadow: 0 4px 12px rgba(255, 77, 77, 0.3);
        transform: scale(1.1);
    }

    .step-item-vertical.page-completed .step-number {
        background: #10B981;
        border-color: #10B981;
        color: white;
    }

    .step-item-vertical.page-completed::before {
        background: #10B981;
    }

    .step-label {
        color: #6B7280;
        transition: color 0.3s ease;
    }

    .step-item-vertical.page-active .step-label {
        color: #FF4D4D;
    }

    .step-item-vertical.page-completed .step-label {
        color: #10B981;
    }

    /* Animation for step transitions */
    .step-content-animated {
        animation: fadeInUp 0.5s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Estilos para inputs y selects usando Tailwind (Matching Libro) */
    .form-input,
    .form-select,
    .form-textarea {
        @apply w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300;
    }

    .form-label {
        @apply block text-sm font-medium text-gray-700 mb-2;
    }

    /* Botón Siguiente */
    .btn-next-step {
        @apply bg-primary text-white px-8 py-3 rounded-md font-medium flex items-center gap-2 hover:bg-opacity-90 transition-all shadow-lg shadow-primary/20;
    }

    /* Category selection refinement */
    .page-product-category[data-expanded="true"] {
        border-color: #000 !important;
    }
</style>

<main id="primary" class="site-main">
    <section class="py-24 md:py-32 min-h-screen flex md:items-center items-start md:justify-center justify-start">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <!-- Grid Layout: Sidebar + Formulario -->
                <div class="grid lg:grid-cols-3 gap-8 lg:gap-12">

                    <!-- Columna Izquierda: Step Indicator + Info -->
                    <aside class="lg:col-span-1">
                        <div class="lg:sticky lg:top-24 space-y-8">

                            <?php if ($acf_titulo || $acf_descripcion) : ?>
                                <!-- Título y Descripción desde ACF -->
                                <div class="mb-8">
                                    <?php if ($acf_titulo) : ?>
                    <h2 class="text-2xl md:text-4xl font-normal text-dark mb-4">
                        <?php echo esc_html($acf_titulo); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($acf_descripcion) : ?>
                    <p class="text-black leading-relaxed">
                        <?php echo esc_html($acf_descripcion); ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Indicador de Pasos Vertical -->
        <div class="step-indicator-vertical space-y-6">

            <?php if (!empty($acf_tabs) && is_array($acf_tabs)) : ?>
                <?php foreach ($acf_tabs as $index => $tab) :
                    $step_number = $index + 1;
                    $tab_titulo  = isset($tab['titulo']) ? $tab['titulo'] : '';
                    if (!$tab_titulo) continue; // no renderizar tabs sin título
                ?>
                    <div class="step-item-vertical <?php echo $step_number === 1 ? 'page-active' : ''; ?>"
                         data-step="<?php echo esc_attr($step_number); ?>">
                        <div class="flex items-center gap-4">
                            <div class="step-number flex-shrink-0"><?php echo esc_html($step_number); ?></div>
                            <div class="flex-1">
                                <h3 class="step-label font-medium text-base mb-1">
                                    <?php echo esc_html($tab_titulo); ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php else : ?>
                <?php
                /**
                 * Fallback hardcode — se muestra SOLO si el repetidor ACF
                 * está vacío o no configurado. Remover cuando el cliente
                 * haya completado los tabs en el panel.
                 */
                ?>
                <div class="step-item-vertical page-active" data-step="1">
                    <div class="flex items-center gap-4">
                        <div class="step-number flex-shrink-0">1</div>
                        <div class="flex-1">
                            <h3 class="step-label font-medium text-base mb-1">Cuéntanos quién eres</h3>
                        </div>
                    </div>
                </div>
                <div class="step-item-vertical" data-step="2">
                    <div class="flex items-center gap-4">
                        <div class="step-number flex-shrink-0">2</div>
                        <div class="flex-1">
                            <h3 class="step-label font-medium text-base mb-1">Completa tu solicitud</h3>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</aside>

                    <!-- Columna Derecha: Formulario -->
                    <div class="lg:col-span-2">
                        <div class="bg-white">
                            <form id="page-cotizador-form" class="" novalidate>
                                <!-- STEP 1: Personal Information -->
                                <div id="page-step-1" class="step-container space-y-6">
                                    <!-- Tipo de Cliente -->
                                    <div>
                                        <label class="flex items-center gap-3 mb-2">
                                            <span
                                                class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">1</span>
                                            <span class="text-base md:text-lg font-medium text-dark">Tipo de cliente</span>
                                        </label>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            <label class="relative cursor-pointer group mb-0">
                                                <input type="radio" name="tipo_cliente" value="Persona Natural" class="peer sr-only"
                                                    checked>
                                                <div
                                                    class="md:p-6 p-4 border-2 border-gray-200 rounded-md flex items-center justify-between group-hover:border-primary/30 peer-checked:border-primary peer-checked:bg-primary/5 transition-all">
                                                    <span class="text-sm md:text-lg font-medium">Persona Natural</span>
                                                    <svg class="w-10 h-10 text-gray-400 peer-checked:text-primary" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                                    </svg>
                                                </div>
                                            </label>
                                            <label class="relative cursor-pointer group mb-0">
                                                <input type="radio" name="tipo_cliente" value="Empresa" class="peer sr-only">
                                                <div
                                                    class="md:p-6 p-4 border-2 border-gray-200 rounded-md flex items-center justify-between group-hover:border-primary/30 peer-checked:border-primary peer-checked:bg-primary/5 transition-all">
                                                    <span class="text-sm md:text-lg font-medium">Empresa</span>
                                                    <svg class="w-10 h-10 text-gray-400 peer-checked:text-primary" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z" />
                                                    </svg>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Documento -->
                                    <div>
                                        <label class="flex items-center gap-3 mb-2">
                                            <span
                                                class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">2</span>
                                            <span class="text-base md:text-lg font-medium text-dark">Nro de documento</span>
                                        </label>

                                        <div
                                            class="document-input-group flex border border-gray-200 rounded-md overflow-hidden focus-within:border-primary transition-colors">
                                            <select name="tipo_doc"
                                                class="w-24 sm:w-32 p-4 border-r border-gray-200 text-sm md:text-lg focus:outline-none appearance-none bg-no-repeat bg-[right_1rem_center] bg-[length:1em_1em] !rounded-r-none">
                                                <option value="DNI" selected>DNI</option>
                                                <option value="RUC">RUC</option>
                                                <option value="CE">CE</option>
                                            </select>

                                            <input type="text" name="nro_documento" placeholder="Nro de documento"
                                                class="flex-grow p-4 outline-none text-sm md:text-lg !rounded-l-none text-dark" required>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div id="page-nombre-field-container">
                                            <label class="flex items-center gap-3 mb-2">
                                                <span
                                                    class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">3</span>
                                                <span class="text-base md:text-lg font-medium text-dark">Nombre Completo</span>
                                            </label>
                                            <input type="text" name="nombre_completo" placeholder="Ej. Nombre Apellido"
                                                class="w-full p-4 border-2 border-gray-200  focus:border-primary outline-none" required>
                                        </div>
                                        <div id="page-razon-social-field-container" class="hidden">
                                            <label class="flex items-center gap-3 mb-2">
                                                <span
                                                    class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">3</span>
                                                <span class="text-base md:text-lg font-medium text-dark">Razón Social</span>
                                            </label>
                                            <input type="text" name="razon_social" placeholder="Nombre de la empresa"
                                                class="w-full p-4 border-2 border-gray-200  focus:border-primary outline-none">
                                        </div>
                                        <div id="page-phone-field-container">
                                            <label class="flex items-center gap-3 mb-2">
                                                <span
                                                    class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">4</span>
                                                <span class="text-base md:text-lg font-medium text-dark">Nro Teléfono</span>
                                            </label>
                                            <input type="tel" name="telefono" placeholder=""
                                                class="w-full p-4 border-2 border-gray-200  focus:border-primary outline-none" required>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="flex items-center gap-3 mb-2">
                                            <span
                                                class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">5</span>
                                            <span class="text-base md:text-lg font-medium text-dark">Correo Electrónico</span>
                                        </label>
                                        <input type="email" name="email" placeholder="Ej. correo@gmail.com"
                                            class="w-full p-4 border-2 border-gray-200  focus:border-primary outline-none" required>
                                    </div>

                                    <div class="flex justify-end pt-4">
                                        <button type="button" id="page-next-to-step-2"
                                            class="btn-next bg-transparent border-0 flex items-center gap-2 text-dark font-normal hover:text-primary transition-colors">
                                            Siguiente <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- STEP 2: Product Information -->
                                <div id="page-step-2" class="step-container space-y-8 hidden">
                                    <div>
                                        <label class="flex items-center gap-3 mb-2">
                                            <span
                                                class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">6</span>
                                            <span class="text-base md:text-lg font-medium text-dark">¿Dónde operan tus vehículos?</span>
                                        </label>
                                        <div class="flex flex-col sm:flex-row gap-2 md:gap-4">
                                            <select name="region" class="flex-grow md:p-4 border-2 border-gray-200  outline-none" required>
                                                <option value="" selected disabled>País</option>
                                                <option value="Peru">Perú</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Colombia">Colombia</option>
                                            </select>
                                            <select name="provincia" class="flex-grow md:p-4 border-2 border-gray-200  outline-none" required>
                                                <option value="" selected disabled>Provincia</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="flex items-center gap-3 mb-2">
                                            <span
                                                class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">7</span>
                                            <span class="text-base md:text-lg font-medium text-dark">¿Qué productos desea cotizar?</span>
                                        </label>
                                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 md:gap-4">
                                            <?php
                                            $activar_productos_reales = get_field('activar_productos_reales');
                                            
                                            if ($activar_productos_reales === 'Si') {
                                                $categorias_de_producto = get_field('categorias_de_producto');
                                                $cats = [
                                                    [
                                                        'titulo' => 'Rastreo GPS',
                                                        'productos_obj' => !empty($categorias_de_producto['rastreo_gps']) ? $categorias_de_producto['rastreo_gps'] : []
                                                    ],
                                                    [
                                                        'titulo' => 'Eficiencia y control',
                                                        'productos_obj' => !empty($categorias_de_producto['eficiencia_y_control']) ? $categorias_de_producto['eficiencia_y_control'] : []
                                                    ],
                                                    [
                                                        'titulo' => 'Video y seguridad',
                                                        'productos_obj' => !empty($categorias_de_producto['video_y_seguridad']) ? $categorias_de_producto['video_y_seguridad'] : []
                                                    ]
                                                ];
                                                
                                                foreach ($cats as $cat) {
                                                    ?>
                                                    <div class="category-item-container flex flex-col gap-2 text-dark">
                                                        <div class="page-product-category border-2 border-gray-200 rounded-md md:p-6 p-4 cursor-pointer overflow-hidden transition-all duration-300 h-fit" data-expanded="false">
                                                            <div class="category-header flex justify-between items-center mb-0">
                                                                <span class="text-md font-medium"><?php echo esc_html($cat['titulo']); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="page-category-content hidden space-y-3 bg-white rounded-md p-4 border-2 border-primary">
                                                            <?php if (!empty($cat['productos_obj'])): ?>
                                                                <?php foreach ($cat['productos_obj'] as $prod): ?>
                                                                    <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                                                        <input type="checkbox" name="productos[]" value="<?php echo esc_attr(get_the_title($prod->ID)); ?>"
                                                                            class="page-product-checkbox w-4 h-4 text-primary border-gray-300 focus:ring-primary"
                                                                            data-required-group="productos">
                                                                        <span><?php echo esc_html(get_the_title($prod->ID)); ?></span>
                                                                    </label>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <span class="text-sm text-gray-500">No hay productos disponibles.</span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                $categorias_editables = get_field('categorias_editables');
                                                if (!empty($categorias_editables['lista_de_categorias'])) {
                                                    foreach ($categorias_editables['lista_de_categorias'] as $cat) {
                                                        // ACF puede retornar array (imagen normal) o entero (SVG sin metadatos)
                                                        $icono_data = !empty($cat['icono']) ? $cat['icono'] : null;
                                                        $icono_url  = null;
                                                        if (is_array($icono_data) && isset($icono_data['url'])) {
                                                            $icono_url = $icono_data['url'];
                                                        } elseif (is_numeric($icono_data)) {
                                                            $icono_url = wp_get_attachment_url((int)$icono_data);
                                                        }
                                                        $icono_alt = is_array($icono_data) ? ($icono_data['alt'] ?? $cat['categoria']) : $cat['categoria'];
                                                        ?>
                                                        <div class="category-item-container flex flex-col gap-2 text-dark">
                                                            <div class="page-product-category border-2 border-gray-200 rounded-md md:p-6 p-4 cursor-pointer overflow-hidden transition-all duration-300 h-fit" data-expanded="false">
                                                                <div class="category-header flex justify-between items-center mb-0">
                                                                    <span class="text-md font-medium"><?php echo esc_html($cat['categoria']); ?></span>
                                                                    <?php if (!empty($icono_url)): ?>
                                                                        <img src="<?php echo esc_url($icono_url); ?>" alt="<?php echo esc_attr($icono_alt); ?>" class="w-10 h-10 object-contain">
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="page-category-content hidden space-y-3 bg-white rounded-md p-4 border-2 border-primary">
                                                                <?php if (!empty($cat['opciones'])): ?>
                                                                    <?php foreach ($cat['opciones'] as $opcion): ?>
                                                                        <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                                                            <input type="checkbox" name="productos[]" value="<?php echo esc_attr($opcion['producto']); ?>"
                                                                                class="page-product-checkbox w-4 h-4 text-primary border-gray-300 focus:ring-primary"
                                                                                data-required-group="productos">
                                                                            <span><?php echo esc_html($opcion['producto']); ?></span>
                                                                        </label>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <span class="text-sm text-gray-500">No hay productos disponibles.</span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>

                                        <!-- SELECTED PRODUCTS TAGS CONTAINER -->
                                        <div id="page-selected-products-container"
                                            class="mt-4 md:p-4 p-2 border-2 border-gray-100 rounded-md min-h-[60px] flex flex-wrap gap-2 items-center bg-gray-50/30">
                                            <span class="text-gray-400 text-sm italic w-full text-center no-products-msg">Ningún producto
                                                seleccionado</span>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="flex items-center gap-3 mb-2">
                                            <span
                                                class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">8</span>
                                            <span class="text-base md:text-lg font-medium text-dark">¿Cuántos vehículos deseas
                                                gestionar?</span>
                                        </label>
                                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 md:gap-4">
                                            <?php foreach (['1-10', '11-20', '12-50', '+100'] as $range): ?>
                                                <label class="relative cursor-pointer group mb-0">
                                                    <input type="radio" name="cantidad_vehiculos" value="<?php echo $range; ?>"
                                                        class="peer sr-only" required>
                                                    <div
                                                        class="p-4 border-2 border-gray-200 rounded-md text-center font-medium group-hover:border-primary/30 peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white transition-all">
                                                        <?php echo $range; ?>
                                                    </div>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <label class="flex items-start gap-3 cursor-pointer">
                                        <input type="checkbox" name="acepto_politica" required
                                            class="mt-0.5 w-4 h-4 flex-shrink-0 text-primary border-gray-300 rounded focus:ring-primary cursor-pointer">
                                        <span class="text-sm text-gray-600">Acepto la <a href="<?php echo esc_url( home_url( '/politica-de-datos/' ) ); ?>" target="_blank" rel="noopener" class="text-primary underline hover:no-underline">política de privacidad de datos</a></span>
                                    </label>

                                    <div class="flex flex-col-reverse md:flex-row justify-between gap-2 md:gap-4 pt-2">
                                        <button type="button" id="page-prev-to-step-1"
                                            class="bg-transparent border-0 flex items-center gap-2 text-dark font-normal hover:text-primary transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                            </svg>
                                            Atrás
                                        </button>
                                        <button id="page-submit-cotizacion" type="submit" class="btn btn-primary">
                                            Solicitar cotización
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Standalone Cotizador
            const formId = 'page-cotizador-form';

            // Use the global validator
            if (window.initComsatelValidator) {
                window.pageCotizadorValidator = window.initComsatelValidator(formId, {
                    submitButtonSelector: '[type="submit"]',
                    nextButtonSelector: '.btn-next'
                });
            }

            // Stepper Logic (Ported and adapted from cotizador.js)
            const form = document.getElementById(formId);
            const nextBtn = form.querySelector('.btn-next');
            const backBtn = document.getElementById('page-prev-to-step-1');
            const step1 = document.getElementById('page-step-1');
            const step2 = document.getElementById('page-step-2');
            const sideSteps = document.querySelectorAll('.step-item-vertical');

            function updateSidebar(step) {
                sideSteps.forEach(item => {
                    const s = parseInt(item.dataset.step);
                    item.classList.remove('page-active', 'page-completed');
                    if (s === step) item.classList.add('page-active');
                    if (s < step) item.classList.add('page-completed');
                });
            }

            nextBtn.addEventListener('click', () => {
                if (window.pageCotizadorValidator.validateStep(step1)) {
                    step1.classList.add('hidden');
                    step2.classList.remove('hidden');
                    updateSidebar(2);
                    window.scrollTo({
                        top: form.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });

            backBtn.addEventListener('click', () => {
                step2.classList.add('hidden');
                step1.classList.remove('hidden');
                updateSidebar(1);
                window.scrollTo({
                    top: form.offsetTop - 100,
                    behavior: 'smooth'
                });
            });

            // Category Toggle Logic & Border Updates
            const categories = document.querySelectorAll('.page-product-category');

            function updateCategoryBorders() {
                categories.forEach(category => {
                    const content = category.nextElementSibling;
                    if (!content) return;

                    const checkboxes = content.querySelectorAll('.page-product-checkbox');
                    const isAnyChecked = Array.from(checkboxes).some(cb => cb.checked);
                    const isExpanded = category.getAttribute('data-expanded') === 'true';

                    if (isAnyChecked || isExpanded) {
                        category.classList.add('border-primary', 'bg-primary/5');
                        category.classList.remove('border-gray-200');
                    } else {
                        category.classList.remove('border-primary', 'bg-primary/5');
                        category.classList.add('border-gray-200');
                    }
                });
            }

            categories.forEach(cat => {
                cat.addEventListener('click', function(e) {
                    if (e.target.closest('.page-product-checkbox') || e.target.closest('label')) return;

                    const content = this.nextElementSibling;
                    const isExpanded = this.getAttribute('data-expanded') === 'true';

                    // Close others
                    categories.forEach(other => {
                        if (other !== this) {
                            other.setAttribute('data-expanded', 'false');
                            other.nextElementSibling?.classList.add('hidden');
                        }
                    });

                    // Toggle self
                    this.setAttribute('data-expanded', !isExpanded);
                    content.classList.toggle('hidden');

                    updateCategoryBorders();
                });
            });

            // Tag Handling and Logic
            const productCheckboxes = document.querySelectorAll('.page-product-checkbox');
            const tagsContainer = document.getElementById('page-selected-products-container');

            function updateProductTags() {
                updateCategoryBorders();

                const selected = Array.from(productCheckboxes).filter(cb => cb.checked).map(cb => cb.value);

                // Clear tags but keep the message structure available in memory or rebuild it
                // Easiest is to rebuild based on state
                tagsContainer.innerHTML = '';

                if (selected.length === 0) {
                    tagsContainer.innerHTML = '<span class="text-gray-400 text-sm italic w-full text-center no-products-msg">Ningún producto seleccionado</span>';
                } else {
                    selected.forEach(val => {
                        const tag = document.createElement('div');
                        tag.className = 'page-product-tag btn btn-outline group flex items-center gap-2 animation-fade-in animate-duration-200 !pr-4 hover:bg-primary hover:border-primary transition-colors';
                        tag.innerHTML = `
                            <span class="text-gray-800 group-hover:text-white transition-colors text-sm">${val}</span>
                            <button type="button" class="text-black group-hover:!text-white transition-colors bg-transparent border-none p-0 focus:outline-none" onclick="document.querySelector('input[value=\\'${val}\\']').click();">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        `;
                        tagsContainer.appendChild(tag);
                    });
                }

                // Re-validate group
                if (window.pageCotizadorValidator) window.pageCotizadorValidator.validateForm();
            }

            productCheckboxes.forEach(cb => {
                cb.addEventListener('change', updateProductTags);
            });

            // Form Submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (!window.pageCotizadorValidator.isFormValid()) return;

                // Normalize phone to E.164 before serializing
                const phoneEl = form.querySelector('input[name="telefono"]');
                if (phoneEl && window.comsatelGetPhoneIti) {
                    const iti = window.comsatelGetPhoneIti(phoneEl);
                    if (iti) phoneEl.value = iti.getNumber();
                }

                const formData = new FormData(this);
                formData.append('action', 'submit_cotizacion_comsatel');

                this.style.opacity = '0.7';
                this.style.pointerEvents = 'none';
                window.comsatelShowLoader?.();

                fetch(comsatel_vars.ajax_url, {
                        method: 'POST',
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // Redirigir a página de gracias (idioma-aware via Polylang)
                            window.location.href = comsatel_vars.gracias_url || (comsatel_vars.home_url + '/gracias');
                        } else {
                            window.comsatelHideLoader?.();
                            window.pageCotizadorValidator.showNotification(data.data || 'Ocurrió un error.', 'error');
                        }
                    })
                    .catch(err => {
                        window.comsatelHideLoader?.();
                        window.pageCotizadorValidator.showNotification('Error de conexión.', 'error');
                    })
                    .finally(() => {
                        this.style.opacity = '1';
                        this.style.pointerEvents = 'auto';
                    });
            });

            // Dynamic Provinces (Ported from cotizador.js)
            const provincesByCountry = {
                'Peru': ['Amazonas', 'Ancash', 'Apurimac', 'Arequipa', 'Ayacucho', 'Cajamarca', 'Callao', 'Cusco', 'Huancavelica', 'Huanuco', 'Ica', 'Junin', 'La Libertad', 'Lambayeque', 'Lima', 'Loreto', 'Madre de Dios', 'Moquegua', 'Pasco', 'Piura', 'Puno', 'San Martin', 'Tacna', 'Tumbes', 'Ucayali'],
                'Bolivia': ['Beni', 'Chuquisaca', 'Cochabamba', 'La Paz', 'Oruro', 'Pando', 'Potosi', 'Santa Cruz', 'Tarija'],
                'Colombia': ['Amazonas', 'Antioquia', 'Arauca', 'Atlantico', 'Bolivar', 'Boyaca', 'Caldas', 'Caqueta', 'Casanare', 'Cauca', 'Cesar', 'Choco', 'Cordoba', 'Cundinamarca', 'Guainia', 'Guaviare', 'Huila', 'La Guajira', 'Magdalena', 'Meta', 'Narino', 'Norte de Santander', 'Putumayo', 'Quindio', 'Risaralda', 'San Andres y Providencia', 'Santander', 'Sucre', 'Tolima', 'Valle del Cauca', 'Vaupes', 'Vichada']
            };

            const countrySelect = form.querySelector('select[name="region"]');
            const provinceSelect = form.querySelector('select[name="provincia"]');

            if (countrySelect && provinceSelect) {
                countrySelect.addEventListener('change', function() {
                    const provinces = provincesByCountry[this.value] || [];
                    provinceSelect.innerHTML = '<option value="" selected disabled>Provincia</option>';
                    provinces.forEach(p => {
                        const opt = document.createElement('option');
                        opt.value = p;
                        opt.textContent = p;
                        provinceSelect.appendChild(opt);
                    });
                });
            }

            // Conditional fields by tipo_cliente
            const tipoClienteInputs = form.querySelectorAll('input[name="tipo_cliente"]');
            const nombreContainer = document.getElementById('page-nombre-field-container');
            const razonSocialContainer = document.getElementById('page-razon-social-field-container');
            const razonSocialInput = razonSocialContainer.querySelector('input');
            const phoneContainer = document.getElementById('page-phone-field-container');
            const tipoDocSelect = form.querySelector('select[name="tipo_doc"]');

            function syncTipoClienteFields(value) {
                const isEmpresa = value === 'Empresa';

                // Phone always visible and required
                phoneContainer.querySelector('input[type="tel"]').setAttribute('required', 'required');

                if (isEmpresa) {
                    // Empresa: hide nombre, show [Teléfono | Razón Social]
                    nombreContainer.classList.add('hidden');
                    nombreContainer.querySelector('input').removeAttribute('required');
                    razonSocialContainer.classList.remove('hidden');
                    razonSocialInput.setAttribute('required', 'required');
                    if (tipoDocSelect) tipoDocSelect.value = 'RUC';
                } else {
                    // Persona Natural: show [Nombre | Teléfono], hide Razón Social
                    nombreContainer.classList.remove('hidden');
                    nombreContainer.querySelector('input').setAttribute('required', 'required');
                    razonSocialContainer.classList.add('hidden');
                    razonSocialInput.removeAttribute('required');
                    if (tipoDocSelect) tipoDocSelect.value = 'DNI';
                }

                if (window.pageCotizadorValidator) window.pageCotizadorValidator.validateForm();
            }

            tipoClienteInputs.forEach(input => {
                input.addEventListener('change', function() {
                    syncTipoClienteFields(this.value);
                });
            });

            // Init on load
            const initialChecked = form.querySelector('input[name="tipo_cliente"]:checked');
            if (initialChecked) syncTipoClienteFields(initialChecked.value);
        });
    </script>

    <?php get_footer(); ?>
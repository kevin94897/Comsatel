<?php

/**
 * Componente: Modal Cotizador Multi-pasos
 */
?>

<!-- Floating Button (Bottom Left) -->
<!-- <div id="cotizador-widget" class="fixed bottom-8 left-8 z-50 flex flex-col items-start gap-4">
    <button id="open-cotizador"
        class="flex items-center justify-center w-16 h-16 p-4 bg-primary text-white rounded-full shadow-lg hover:shadow-xl hover:scale-110 transition-all duration-300 relative group overflow-hidden">
        <span
            class="absolute inset-0 w-full h-full bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300 rounded-full"></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
            <polyline points="14 2 14 8 20 8"></polyline>
            <line x1="16" y1="13" x2="8" y2="13"></line>
            <line x1="16" y1="17" x2="8" y2="17"></line>
            <polyline points="10 9 9 9 8 9"></polyline>
        </svg>
    </button>
</div> -->

<!-- Modal Container -->
<div id="cotizador-modal"
    class="fixed inset-0 bg-black/60 hidden items-center justify-center z-[60] px-4 backdrop-blur-sm">
    <div
        class="bg-white rounded-3xl max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl transform transition-all relative">

        <!-- Header -->
        <div class="p-8 pb-4 text-center sticky top-0 bg-white z-10">
            <h2 class="text-3xl font-semibold text-dark mb-0">Cotizador</h2>
            <button id="close-cotizador"
                class="absolute top-8 right-8 text-gray-400 hover:text-dark transition-colors bg-transparent border-0 p-0">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Form Content -->
        <form id="cotizador-form" class="p-8 pt-6" novalidate>

            <!-- STEP 1: Personal Information -->
            <div id="step-1" class="step-container space-y-6">
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
                    <div id="nombre-field-container">
                        <label class="flex items-center gap-3 mb-2">
                            <span
                                class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">3</span>
                            <span class="text-base md:text-lg font-medium text-dark">Nombre Completo</span>
                        </label>
                        <input type="text" name="nombre_completo" placeholder="Ej. Nombre Apellido"
                            class="w-full p-4 border-2 border-gray-200  focus:border-primary outline-none" required>
                    </div>
                    <div id="razon-social-field-container" class="hidden">
                        <label class="flex items-center gap-3 mb-2">
                            <span
                                class="flex items-center justify-center w-6 h-6 md:w-8 md:h-8 rounded-full bg-gray-100 text-dark font-medium text-sm">3</span>
                            <span class="text-base md:text-lg font-medium text-dark">Razón Social</span>
                        </label>
                        <input type="text" name="razon_social" placeholder="Nombre de la empresa"
                            class="w-full p-4 border-2 border-gray-200  focus:border-primary outline-none">
                    </div>
                    <div id="phone-field-container">
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
                    <button type="button" id="next-to-step-2"
                        class="bg-transparent border-0 flex items-center gap-2 text-dark font-normal hover:text-primary transition-colors">
                        Siguiente <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- STEP 2: Product Information -->
            <div id="step-2" class="step-container space-y-8 hidden">
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
                        <select name="provincia" class="flex-grow md:p-4 border-2 border-gray-200  outline-none"
                            required>
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
                        $activar_productos_reales = get_field('activar_productos_reales', 'cotizador-options');

                        if ($activar_productos_reales === 'Si') {
                            $categorias_de_producto = get_field('categorias_de_producto', 'cotizador-options');
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
                                    <div class="product-category border-2 border-gray-200 rounded-md md:p-6 p-4 cursor-pointer overflow-hidden transition-all duration-300 h-fit" data-expanded="false">
                                        <div class="category-header flex justify-between items-center mb-0">
                                            <span class="text-md font-medium"><?php echo esc_html($cat['titulo']); ?></span>
                                        </div>
                                    </div>
                                    <div class="category-content hidden space-y-3 bg-white rounded-md p-4 border-2 border-primary">
                                        <?php if (!empty($cat['productos_obj'])): ?>
                                            <?php foreach ($cat['productos_obj'] as $prod): ?>
                                                <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                                    <input type="checkbox" name="productos[]" value="<?php echo esc_attr(get_the_title($prod->ID)); ?>"
                                                        class="product-checkbox w-4 h-4 text-primary border-gray-300 focus:ring-primary"
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
                            $categorias_editables = get_field('categorias_editables', 'cotizador-options');
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
                                        <div class="product-category border-2 border-gray-200 rounded-md md:p-6 p-4 cursor-pointer overflow-hidden transition-all duration-300 h-fit" data-expanded="false">
                                            <div class="category-header flex justify-between items-center mb-0">
                                                <span class="text-md font-medium"><?php echo esc_html($cat['categoria']); ?></span>
                                                <?php if (!empty($icono_url)): ?>
                                                    <img src="<?php echo esc_url($icono_url); ?>" alt="<?php echo esc_attr($icono_alt); ?>" class="w-10 h-10 object-contain">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="category-content hidden space-y-3 bg-white rounded-md p-4 border-2 border-primary">
                                            <?php if (!empty($cat['opciones'])): ?>
                                                <?php foreach ($cat['opciones'] as $opcion): ?>
                                                    <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                                                        <input type="checkbox" name="productos[]" value="<?php echo esc_attr($opcion['producto']); ?>"
                                                            class="product-checkbox w-4 h-4 text-primary border-gray-300 focus:ring-primary"
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
                    <div id="selected-products-container"
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
                    <button type="button" id="prev-to-step-1"
                        class="bg-transparent border-0 flex items-center gap-2 text-dark font-normal hover:text-primary transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Atrás
                    </button>
                    <button id="submit-cotizacion" type="submit" class="btn btn-primary">
                        Solicitar cotización
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

<?php /* Script removed and moved to js/cotizador.js to avoid conflicts with ComsatelValidator */ ?>
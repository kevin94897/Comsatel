<?php

/**
 * Template Name: Calculadora de Ahorro
 */

get_header();
?>

<main class="calculator-page">

    <!-- Calculator Section -->
    <section class="">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <div class="min-h-screen flex items-center justify-center">
                    <div class="flex items-start md:flex-row flex-col md:gap-24 gap-4">
                        <div class="basis-[30%]">
                            <h2 class="text-2xl md:text-4xl font-medium text-black mb-2">
                                Calcule cuánto podría ahorrar
                            </h2>
                            <p class="text-black text-lg mt-4">
                                Historias reales de clientes que han recuperado sus vehículos gracias a </p>
                        </div>
                        <div class="basis-[70%]">
                            <!-- Left Column - Calculator Form -->
                            <div data-aos="fade-right">
                                <form id="calculator-form" class="space-y-8">

                                    <!-- Question 1 -->
                                    <div class="calculator-question">
                                        <label class="flex items-start gap-3 mb-4">
                                            <span class="flex-shrink-0 w-10 h-10 bg-gray-200 text-gray-900 rounded-full flex items-center justify-center font-medium md:text-lg text-sm">
                                                1
                                            </span>
                                            <span class="md:text-2xl text-lg font-semibold text-gray-900 pt-0.5">
                                                ¿Cuántos vehículos tienes en tu flota?
                                            </span>
                                        </label>
                                        <input
                                            type="number"
                                            id="vehicles-count"
                                            name="vehicles_count"
                                            class="w-full md:max-w-[300px] max-w-[200px] md:h-[56px] h-[40px] text-center text-xl"
                                            placeholder="40"
                                            value="40"
                                            min="1"
                                            required>
                                    </div>

                                    <!-- Question 2 -->
                                    <div class="calculator-question">
                                        <label class="flex items-start gap-3 mb-4">
                                            <span class="flex-shrink-0 w-10 h-10 bg-gray-200 text-gray-900 rounded-full flex items-center justify-center font-medium md:text-lg text-sm">
                                                2
                                            </span>
                                            <span class="md:text-2xl text-lg font-semibold text-gray-900 pt-0.5">
                                                ¿Cuántos kilómetros recorre cada vehículo al mes?
                                            </span>
                                        </label>
                                        <div class="flex gap-2">
                                            <input
                                                type="number"
                                                id="km-per-month"
                                                name="km_per_month"
                                                class="w-full md:max-w-[300px] max-w-[200px] md:h-[56px] h-[40px] text-center text-xl"
                                                placeholder="1000"
                                                value="1000"
                                                min="1"
                                                required>
                                            <div class="flex items-center px-2 py-2">
                                                <span class="text-black font-semibold">KM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Question 3 -->
                                    <div class="calculator-question">
                                        <label class="flex items-start gap-3 mb-4">
                                            <span class="flex-shrink-0 w-10 h-10 bg-gray-200 text-gray-900 rounded-full flex items-center justify-center font-medium md:text-lg text-sm">
                                                3
                                            </span>
                                            <span class="md:text-2xl text-lg font-semibold text-gray-900 pt-0.5">
                                                ¿Cuántos km rinde un galón en tu flota?
                                            </span>
                                        </label>
                                        <div class="flex gap-2">
                                            <input
                                                type="number"
                                                id="km-per-gallon"
                                                name="km_per_gallon"
                                                class="w-full md:max-w-[300px] max-w-[200px] md:h-[56px] h-[40px] text-center text-xl"
                                                placeholder="40"
                                                value="40"
                                                min="1"
                                                step="0.1"
                                                required>
                                            <select
                                                id="fuel-unit"
                                                name="fuel_unit"
                                                class="w-full max-w-[150px] md:h-[56px] h-[40px]">
                                                <option value="km_gl">KM / GL</option>
                                                <option value="km_l">KM / L</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Calculate Button -->
                                    <div class="pt-4 text-center">
                                        <button
                                            type="submit"
                                            id="calculate-btn"
                                            class="btn btn-primary transform hover:scale-105 transition-all duration-300">
                                            Calcular
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Results -->
                <div class="lg:sticky lg:top-8 pt-8 min-h-screen" id="results">
                    <div class="" data-aos="fade-left">

                        <!-- Main Result -->
                        <div class="md:mb-10 mb-6">
                            <h2 class="md:text-3xl text-2xl font-medium text-gray-900 mb-2">
                                Ahorro estimado mensual
                            </h2>
                            <div class="flex items-baseline gap-2 mb-3">
                                <span class="text-4xl lg:text-6xl font-semibold text-primary" id="total-savings">
                                    S/ 178.75
                                </span>
                            </div>
                            <p class="text-black text-lg md:mb-12 mt-6">
                                Equivalente a un <span class="font-semibold text-black" id="savings-percentage">37%</span> menos en costos operativos
                            </p>
                        </div>

                        <!-- Savings Breakdown -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            <!-- Combustible -->
                            <div class="border border-primary rounded-xl p-6 hover:border-primary/50 transition-all duration-300">
                                <div class="flex items-center gap-6 mb-3 items-center h-full justify-center flex-col md:flex-row">
                                    <div class="md:w-32 md:h-32 w-20 h-20 flex items-center justify-center flex-shrink-0">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/comsatel_icon_gasolina.png" alt="Fuel">
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-black text-xl md:mb-4 mb-2">
                                            Ahorros en<br>Combustible
                                        </h3>
                                        <p class="md:text-3xl text-2xl font-semibold text-primary mb-0" id="fuel-savings">
                                            S/ 65.00
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <!-- Mantenimiento -->
                            <div class="border border-primary rounded-xl p-6 hover:border-primary/50 transition-all duration-300">
                                <div class="flex items-center gap-6 mb-3 items-center h-full justify-center flex-col md:flex-row">
                                    <div class="md:w-32 md:h-32 w-20 h-20 flex items-center justify-center flex-shrink-0">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/comsatel_icon_herramientas.png" alt="Ahorros en mantenimiento">
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-black text-xl mb-4">
                                            Ahorros en<br>Mantenimiento
                                        </h3>
                                        <p class="md:text-3xl text-2xl font-semibold text-primary mb-0" id="maintenance-savings">
                                            S/ 65.00
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Llantas -->
                            <div class="border border-primary rounded-xl p-6 hover:border-primary/50 transition-all duration-300">
                                <div class="flex items-center gap-6 mb-3 items-center h-full justify-center flex-col md:flex-row">
                                    <div class="md:w-32 md:h-32 w-20 h-20 flex items-center justify-center flex-shrink-0">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/comsatel_icon_llanta.png" alt="Ahorros en llantas">
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-black text-xl mb-4">
                                            Ahorros en<br>llantas
                                        </h3>
                                        <p class="md:text-3xl text-2xl font-semibold text-primary mb-0" id="tires-savings">
                                            S/ 65.00
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Productividad -->
                            <div class="border border-primary rounded-xl p-6 hover:border-primary/50 transition-all duration-300">
                                <div class="flex items-center gap-6 mb-3 items-center h-full justify-center flex-col md:flex-row">
                                    <div class="md:w-32 md:h-32 w-20 h-20 flex items-center justify-center flex-shrink-0">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/comsatel_icon_stonks.png" alt="Ahorros en productividad">
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-black text-xl mb-4">
                                            Ahorros en<br>productividad
                                        </h3>
                                        <p class="md:text-3xl text-2xl font-semibold text-primary mb-0" id="productivity-savings">
                                            S/ 65.00
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-10 flex flex-col sm:flex-row gap-4">
                            <button
                                type="button"
                                id="email-report-btn"
                                class="btn btn-outline flex-1 !py-3">
                                Enviar reporte por correo
                            </button>
                            <button
                                type="button"
                                id="request-consultation-btn"
                                class="btn btn-primary flex-1 !py-3">
                                Solicitar asesoría personalizada
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<?php get_template_part('inc/componentes/modal-email-report'); ?>
<?php
get_footer();
?>
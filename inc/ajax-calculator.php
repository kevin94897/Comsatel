<?php

/**
 * AJAX Handler: Enviar Reporte de Calculadora por Correo
 */
function comsatel_send_calculator_report()
{
    // Verificar datos recibidos
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $consent = isset($_POST['consent']) && $_POST['consent'] === 'true';

    // Datos de la calculadora
    $vehicles = intval($_POST['vehicles'] ?? 0);
    $kmPerMonth = floatval($_POST['kmPerMonth'] ?? 0);
    $kmPerGallon = floatval($_POST['kmPerGallon'] ?? 0);
    $fuelUnit = sanitize_text_field($_POST['fuelUnit'] ?? 'km_gl');

    // Resultados
    $totalSavings = floatval($_POST['totalSavings'] ?? 0);
    $savingsPercentage = sanitize_text_field($_POST['savingsPercentage'] ?? '0');
    $fuelSavings = floatval($_POST['fuelSavings'] ?? 0);
    $maintenanceSavings = floatval($_POST['maintenanceSavings'] ?? 0);
    $tiresSavings = floatval($_POST['tiresSavings'] ?? 0);
    $productivitySavings = floatval($_POST['productivitySavings'] ?? 0);

    // Validaciones
    if (empty($name) || empty($email) || !is_email($email)) {
        wp_send_json_error('Datos inválidos');
        return;
    }

    // Preparar el email
    $to = $email;
    $subject = 'Tu Reporte de Ahorros - COMSATEL';
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: COMSATEL <noreply@comsatel.com>'
    );

    // Template del email
    $message = comsatel_get_email_template($name, array(
        'vehicles' => $vehicles,
        'kmPerMonth' => $kmPerMonth,
        'kmPerGallon' => $kmPerGallon,
        'fuelUnit' => $fuelUnit,
        'totalSavings' => $totalSavings,
        'savingsPercentage' => $savingsPercentage,
        'fuelSavings' => $fuelSavings,
        'maintenanceSavings' => $maintenanceSavings,
        'tiresSavings' => $tiresSavings,
        'productivitySavings' => $productivitySavings
    ));

    // Enviar email
    $sent = wp_mail($to, $subject, $message, $headers);

    if ($sent) {
        // Opcional: Guardar lead en base de datos
        // comsatel_save_calculator_lead($name, $email, $totalSavings);

        wp_send_json_success('Reporte enviado exitosamente');
    } else {
        wp_send_json_error('Error al enviar el email');
    }
}

// Registrar AJAX para usuarios logueados y no logueados
add_action('wp_ajax_send_calculator_report', 'comsatel_send_calculator_report');
add_action('wp_ajax_nopriv_send_calculator_report', 'comsatel_send_calculator_report');

/**
 * Template de Email Profesional con Colores Globales
 */
function comsatel_get_email_template($name, $data)
{
    $fuelUnitLabel = $data['fuelUnit'] === 'km_gl' ? 'KM/GL' : 'KM/L';

    ob_start();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tu Reporte de Ahorros</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #F5F5F5;
                color: #1E1E1E;
            }

            .email-container {
                max-width: 600px;
                margin: 40px auto;
                background-color: #FFFFFF;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }

            .header {
                background: linear-gradient(135deg, #E31E25 0%, #CC0000 100%);
                padding: 40px 30px;
                text-align: center;
            }

            .header h1 {
                margin: 0;
                color: #FFFFFF;
                font-size: 28px;
                font-weight: 700;
            }

            .header p {
                margin: 10px 0 0 0;
                color: #FFFFFF;
                font-size: 16px;
                opacity: 0.95;
            }

            .content {
                padding: 40px 30px;
            }

            .greeting {
                font-size: 18px;
                color: #1E1E1E;
                margin-bottom: 20px;
            }

            .intro-text {
                color: #7A7A7A;
                line-height: 1.6;
                margin-bottom: 30px;
            }

            .results-box {
                background: linear-gradient(135deg, #FF4D4D 0%, #E31E25 100%);
                border-radius: 12px;
                padding: 30px;
                text-align: center;
                margin-bottom: 30px;
            }

            .results-box h2 {
                margin: 0 0 10px 0;
                color: #FFFFFF;
                font-size: 16px;
                font-weight: 500;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .total-savings {
                font-size: 48px;
                font-weight: 700;
                color: #FFFFFF;
                margin: 10px 0;
            }

            .percentage {
                font-size: 18px;
                color: #FFFFFF;
                opacity: 0.95;
            }

            .data-section {
                background-color: #F9F9F9;
                border-radius: 12px;
                padding: 25px;
                margin-bottom: 25px;
            }

            .data-section h3 {
                margin: 0 0 20px 0;
                color: #1E1E1E;
                font-size: 18px;
                font-weight: 600;
                border-bottom: 2px solid #E31E25;
                padding-bottom: 10px;
            }

            .data-row {
                display: flex;
                justify-content: space-between;
                padding: 12px 0;
                border-bottom: 1px solid #E0E0E0;
            }

            .data-row:last-child {
                border-bottom: none;
            }

            .data-label {
                color: #7A7A7A;
                font-size: 14px;
            }

            .data-value {
                color: #1E1E1E;
                font-weight: 600;
                font-size: 14px;
            }

            .savings-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 15px;
                margin-bottom: 30px;
            }

            .savings-card {
                background-color: #FFFFFF;
                border: 2px solid #E31E25;
                border-radius: 12px;
                padding: 20px;
                text-align: center;
            }

            .savings-card h4 {
                margin: 0 0 10px 0;
                color: #1E1E1E;
                font-size: 14px;
                font-weight: 500;
            }

            .savings-card .amount {
                color: #E31E25;
                font-size: 24px;
                font-weight: 700;
            }

            .cta-section {
                text-align: center;
                padding: 30px 0;
            }

            .cta-button {
                display: inline-block;
                background: linear-gradient(135deg, #FF4D4D 0%, #E31E25 100%);
                color: #FFFFFF;
                text-decoration: none;
                padding: 16px 40px;
                border-radius: 50px;
                font-weight: 600;
                font-size: 16px;
                box-shadow: 0 4px 15px rgba(227, 30, 37, 0.3);
                transition: all 0.3s ease;
            }

            .footer {
                background-color: #1E1E1E;
                padding: 30px;
                text-align: center;
            }

            .footer p {
                margin: 5px 0;
                color: #FFFFFF;
                font-size: 14px;
                opacity: 0.8;
            }

            .footer a {
                color: #FF4D4D;
                text-decoration: none;
            }

            @media only screen and (max-width: 600px) {
                .email-container {
                    margin: 20px;
                }

                .header {
                    padding: 30px 20px;
                }

                .content {
                    padding: 30px 20px;
                }

                .total-savings {
                    font-size: 36px;
                }

                .savings-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>

    <body>
        <div class="email-container">
            <!-- Header -->
            <div class="header">
                <h1>🎉 Tu Reporte de Ahorros</h1>
                <p>Análisis detallado de tu flota vehicular</p>
            </div>

            <!-- Content -->
            <div class="content">
                <p class="greeting">Hola <strong><?php echo esc_html($name); ?></strong>,</p>

                <p class="intro-text">
                    Gracias por usar nuestra calculadora de ahorros. Aquí está el análisis detallado de los ahorros potenciales que podrías obtener con nuestras soluciones de gestión de flotas.
                </p>

                <!-- Total Savings -->
                <div class="results-box">
                    <h2>Ahorro Mensual Estimado</h2>
                    <div class="total-savings">S/ <?php echo number_format($data['totalSavings'], 2); ?></div>
                    <p class="percentage">Equivalente a un <?php echo esc_html($data['savingsPercentage']); ?>% menos en costos operativos</p>
                </div>

                <!-- Input Data -->
                <div class="data-section">
                    <h3>📊 Datos de tu Flota</h3>
                    <div class="data-row">
                        <span class="data-label">Número de vehículos</span>
                        <span class="data-value"><?php echo esc_html($data['vehicles']); ?> vehículos</span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">Kilómetros por mes (por vehículo)</span>
                        <span class="data-value"><?php echo number_format($data['kmPerMonth'], 0); ?> KM</span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">Rendimiento de combustible</span>
                        <span class="data-value"><?php echo number_format($data['kmPerGallon'], 1); ?> <?php echo esc_html($fuelUnitLabel); ?></span>
                    </div>
                </div>

                <!-- Savings Breakdown -->
                <div class="data-section">
                    <h3>💰 Desglose de Ahorros Mensuales</h3>
                    <div class="savings-grid">
                        <div class="savings-card">
                            <h4>⛽ Combustible</h4>
                            <div class="amount">S/ <?php echo number_format($data['fuelSavings'], 2); ?></div>
                        </div>
                        <div class="savings-card">
                            <h4>🔧 Mantenimiento</h4>
                            <div class="amount">S/ <?php echo number_format($data['maintenanceSavings'], 2); ?></div>
                        </div>
                        <div class="savings-card">
                            <h4>🛞 Llantas</h4>
                            <div class="amount">S/ <?php echo number_format($data['tiresSavings'], 2); ?></div>
                        </div>
                        <div class="savings-card">
                            <h4>📈 Productividad</h4>
                            <div class="amount">S/ <?php echo number_format($data['productivitySavings'], 2); ?></div>
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                <div class="cta-section">
                    <p style="margin-bottom: 20px; color: #7A7A7A;">
                        ¿Quieres saber cómo podemos ayudarte a alcanzar estos ahorros?
                    </p>
                    <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="cta-button">
                        Solicitar Asesoría Personalizada
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <p><strong>COMSATEL</strong></p>
                <p>Soluciones tecnológicas para gestión de flotas</p>
                <p>
                    <a href="<?php echo esc_url(home_url()); ?>">Visita nuestro sitio web</a>
                </p>
                <p style="font-size: 12px; margin-top: 20px;">
                    Este correo fue enviado porque solicitaste un reporte de ahorros en nuestra calculadora.
                </p>
            </div>
        </div>
    </body>

    </html>
<?php
    return ob_get_clean();
}

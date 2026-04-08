<?php

/**
 * AJAX Handler: Cotizador Form
 */

add_action('wp_ajax_submit_cotizacion_comsatel', 'handle_cotizacion_submission');
add_action('wp_ajax_nopriv_submit_cotizacion_comsatel', 'handle_cotizacion_submission');

function handle_cotizacion_submission()
{
    // Basic security check
    if (!isset($_POST['email']) || !isset($_POST['nombre_completo'])) {
        wp_send_json_error('Datos incompletos.');
    }

    $nombre           = sanitize_text_field($_POST['nombre_completo']);
    $email            = sanitize_email($_POST['email']);
    $telefono         = sanitize_text_field($_POST['telefono']);
    $razon_social     = sanitize_text_field($_POST['razon_social']);
    $nro_doc          = sanitize_text_field($_POST['nro_documento']);
    $tipo_doc         = sanitize_text_field($_POST['tipo_doc']);
    $tipo_cliente     = sanitize_text_field($_POST['tipo_cliente']);
    $region           = sanitize_text_field($_POST['region']);
    $provincia        = sanitize_text_field($_POST['provincia']);
    $productos        = isset($_POST['productos']) ? $_POST['productos'] : [];
    $cant_vehiculos   = sanitize_text_field($_POST['cantidad_vehiculos']);

    // Logo URL
    $logo_url = get_template_directory_uri() . '/images/comsatel_logo.png';
    if (has_custom_logo()) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
    }

    $productos_list = !empty($productos) ? implode(', ', array_map('sanitize_text_field', $productos)) : 'No especificado';

    // Prepare email content
    $to = comsatel_get_recipient_email('cotizador');
    $subject = 'Nueva Solicitud de Cotización - Comsatel';

    $message = "
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; margin: 0; padding: 0; }
            .container { max-width: 600px; margin: 20px auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
            .header { background-color: #FF4D4D; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
            .header img { max-width: 160px; height: auto; padding: 10px; }
            .header h1 { color: white; margin: 10px 0 0; font-size: 24px; }
            .content { padding: 20px; }
            .row { border-bottom: 1px solid #eee; padding: 10px 0; }
            .label { font-weight: bold; color: #555; width: 40%; display: inline-block; }
            .value { width: 55%; display: inline-block; }
            .footer { text-align: center; font-size: 12px; color: #999; margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee; }
            .badge { display: inline-block; padding: 4px 12px; background: #FF4D4D; color: white; border-radius: 12px; font-size: 12px; font-weight: bold; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <img src='$logo_url' alt='Comsatel'>
                <h1>Nueva Solicitud de Cotización</h1>
            </div>
            
            <div class='content'>
                <h3>Datos del Solicitante</h3>
                <div class='row'><span class='label'>Tipo de Cliente:</span> <span class='value'><span class='badge'>$tipo_cliente</span></span></div>
                <div class='row'><span class='label'>Nombre:</span> <span class='value'>$nombre</span></div>
                <div class='row'><span class='label'>Documento ($tipo_doc):</span> <span class='value'>$nro_doc</span></div>
                <div class='row'><span class='label'>Email:</span> <span class='value'>$email</span></div>
                " . (!empty($telefono) ? "<div class='row'><span class='label'>Teléfono:</span> <span class='value'>$telefono</span></div>" : "") . "
                " . ($tipo_cliente === 'Empresa' && !empty($razon_social) ? "<div class='row'><span class='label'>Razón Social:</span> <span class='value'>$razon_social</span></div>" : "") . "

                <h3>Detalles de la Solicitud</h3>
                <div class='row'><span class='label'>Ubicación:</span> <span class='value'>$region / $provincia</span></div>
                <div class='row'><span class='label'>Cantidad de vehículos:</span> <span class='value'>$cant_vehiculos</span></div>
                <div class='row'><span class='label'>Productos de interés:</span> <span class='value' style='color: #FF4D4D; font-weight: bold;'>$productos_list</span></div>
            </div>

            <div class='footer'>
                <p>Este correo fue enviado automáticamente desde el formulario del cotizador web de Comsatel.</p>
                <p>&copy; " . date('Y') . " Comsatel Perú. Todos los derechos reservados.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $headers = array('Content-Type: text/html; charset=UTF-8', 'From: Comsatel Web <noreply@comsatel.pe>');

    $sent = wp_mail($to, $subject, $message, $headers);

    if ($sent) {
        wp_send_json_success('Solicitud enviada correctamente.');
    } else {
        wp_send_json_error('Error al enviar el correo. Por favor intente más tarde.');
    }

    wp_die();
}

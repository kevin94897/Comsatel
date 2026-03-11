<?php

/**
 * AJAX Handler para Formulario de Contacto
 */

// Registrar acciones AJAX
add_action('wp_ajax_enviar_contacto', 'comsatel_handle_submit_contacto');
add_action('wp_ajax_nopriv_enviar_contacto', 'comsatel_handle_submit_contacto');

function comsatel_handle_submit_contacto()
{
    check_ajax_referer('comsatel_contacto_nonce', 'security');

    // Validar campos requeridos
    $required_fields = ['nombre', 'telefono', 'email', 'asunto', 'mensaje'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            wp_send_json_error(['message' => 'Por favor completa todos los campos obligatorios.']);
        }
    }

    // Sanitización
    $tipo_cliente = sanitize_text_field($_POST['tipo_cliente']); // Persona o Empresa
    $nombre = sanitize_text_field($_POST['nombre']);
    $telefono = sanitize_text_field($_POST['telefono']);
    $email = sanitize_email($_POST['email']);
    $empresa = isset($_POST['empresa']) ? sanitize_text_field($_POST['empresa']) : '-';
    $asunto = sanitize_text_field($_POST['asunto']);
    $mensaje = sanitize_textarea_field($_POST['mensaje']);
    $acepta_politica = isset($_POST['acepta_politica']) ? 'Sí' : 'No';

    // Configurar correo
    $to = 'atencionalcliente@comsatel.com.pe'; // Cambiar por el correo real
    $subject = "Nueva Solicitud de Contacto: $asunto";

    // Logo URL
    $logo_url = get_template_directory_uri() . '/images/logo.png';
    if (has_custom_logo()) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
    }

    // Template HTML
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
                <h1>Nueva Solicitud de Contacto</h1>
            </div>
            
            <div class='content'>
                <h3>Información del Cliente</h3>
                <div class='row'><span class='label'>Tipo de Cliente:</span> <span class='value'><span class='badge'>$tipo_cliente</span></span></div>
                <div class='row'><span class='label'>Nombre:</span> <span class='value'>$nombre</span></div>
                <div class='row'><span class='label'>Teléfono:</span> <span class='value'>$telefono</span></div>
                <div class='row'><span class='label'>Email:</span> <span class='value'>$email</span></div>
                " . ($tipo_cliente === 'Empresa' ? "<div class='row'><span class='label'>Empresa:</span> <span class='value'>$empresa</span></div>" : "") . "

                <h3>Detalles de la Solicitud</h3>
                <div class='row'><span class='label'>Asunto:</span> <span class='value' style='color: #FF4D4D; font-weight: bold;'>$asunto</span></div>
                
                <div style='background: #f9f9f9; padding: 15px; margin-top: 20px; border-left: 4px solid #FF4D4D;'>
                    <strong>Mensaje:</strong><br>
                    " . nl2br($mensaje) . "
                </div>

                <div class='row'><span class='label'>Acepta Política de Privacidad:</span> <span class='value'>$acepta_politica</span></div>
            </div>

            <div class='footer'>
                <p>Este correo fue enviado automáticamente desde el formulario de contacto del sitio web de Comsatel.</p>
                <p>&copy; " . date('Y') . " Comsatel Perú. Todos los derechos reservados.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $headers = array('Content-Type: text/html; charset=UTF-8');

    // Enviar correo
    $sent = wp_mail($to, $subject, $message, $headers);

    if ($sent) {
        wp_send_json_success(['message' => 'Tu solicitud se envió correctamente. Nos pondremos en contacto contigo pronto.']);
    } else {
        wp_send_json_error(['message' => 'Hubo un error al enviar tu solicitud. Por favor intenta nuevamente.']);
    }
}

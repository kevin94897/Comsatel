<?php

/**
 * AJAX Handler para Formulario "Actualizar Datos"
 * Envía a teamsac@comsatelglobal.com (modo producción)
 */

add_action('wp_ajax_enviar_actualizar_datos', 'comsatel_handle_submit_actualizar_datos');
add_action('wp_ajax_nopriv_enviar_actualizar_datos', 'comsatel_handle_submit_actualizar_datos');

function comsatel_handle_submit_actualizar_datos()
{
    check_ajax_referer('comsatel_actualizar_datos_nonce', 'security');

    $required_fields = ['tipo_documento', 'numero_documento', 'nombre_apellidos', 'telefono', 'email', 'departamento', 'provincia', 'distrito', 'direccion'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            wp_send_json_error(['message' => 'Por favor completa todos los campos obligatorios.']);
        }
    }

    $tipo_documento = sanitize_text_field($_POST['tipo_documento']);
    $numero_documento = sanitize_text_field($_POST['numero_documento']);
    $nombre = sanitize_text_field($_POST['nombre_apellidos']);
    $telefono = sanitize_text_field($_POST['telefono']);
    $email = sanitize_email($_POST['email']);
    $departamento = sanitize_text_field($_POST['departamento']);
    $provincia = sanitize_text_field($_POST['provincia']);
    $distrito = sanitize_text_field($_POST['distrito']);
    $direccion = sanitize_text_field($_POST['direccion']);
    $acepta_politica = isset($_POST['acepta_politica']) ? 'Sí' : 'No';

    $to = comsatel_get_recipient_email('actualizar_datos');
    $subject = "Actualización de Datos: $nombre";

    $logo_fallback = get_template_directory_uri() . '/images/comsatel_logo.png';
    $logo_url = $logo_fallback;
    if (has_custom_logo()) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $resolved = wp_get_attachment_image_url($custom_logo_id, 'full');
        if ($resolved) {
            $logo_url = $resolved;
        }
    }

    $message = "
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; margin: 0; padding: 0; }
            .container { max-width: 600px; margin: 20px auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
            .header { background-color: #FF4D4D; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
            .header img { max-width: 160px; height: auto; padding: 10px; }
            .header h1 { color: white; margin: 10px 0 0; font-size: 22px; }
            .content { padding: 20px; }
            .row { border-bottom: 1px solid #eee; padding: 10px 0; }
            .label { font-weight: bold; color: #555; width: 40%; display: inline-block; }
            .value { width: 55%; display: inline-block; }
            .footer { text-align: center; font-size: 12px; color: #999; margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <img src='$logo_url' alt='Comsatel' width='160' style='max-width:160px;height:auto;display:block;margin:0 auto;padding:10px;'>
                <h1>Actualización de Datos del Cliente</h1>
            </div>

            <div class='content'>
                <h3>Datos del Cliente</h3>
                <div class='row'><span class='label'>Nombre y Apellidos:</span> <span class='value'>$nombre</span></div>
                <div class='row'><span class='label'>Documento ($tipo_documento):</span> <span class='value'>$numero_documento</span></div>
                <div class='row'><span class='label'>Teléfono:</span> <span class='value'>$telefono</span></div>
                <div class='row'><span class='label'>Email:</span> <span class='value'>$email</span></div>

                <h3>Ubicación</h3>
                <div class='row'><span class='label'>Departamento:</span> <span class='value'>$departamento</span></div>
                <div class='row'><span class='label'>Provincia:</span> <span class='value'>$provincia</span></div>
                <div class='row'><span class='label'>Distrito:</span> <span class='value'>$distrito</span></div>
                <div class='row'><span class='label'>Dirección:</span> <span class='value'>$direccion</span></div>

                <div class='row'><span class='label'>Acepta Política de Privacidad:</span> <span class='value'>$acepta_politica</span></div>
            </div>

            <div class='footer'>
                <p>Este correo fue enviado automáticamente desde el formulario de actualización de datos del sitio web de Comsatel.</p>
                <p>&copy; " . date('Y') . " Comsatel Perú. Todos los derechos reservados.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $headers = array('Content-Type: text/html; charset=UTF-8');

    $mail_error_reason = '';
    $capture_error = function ($wp_error) use (&$mail_error_reason) {
        $mail_error_reason = $wp_error->get_error_message();
    };
    add_action('wp_mail_failed', $capture_error);

    $sent = wp_mail($to, $subject, $message, $headers);

    remove_action('wp_mail_failed', $capture_error);

    if ($sent) {
        wp_send_json_success(['message' => 'Tus datos se enviaron correctamente.']);
    } else {
        error_log('[Comsatel actualizar-datos] wp_mail falló: ' . $mail_error_reason);
        $debug_suffix = (defined('WP_DEBUG') && WP_DEBUG && $mail_error_reason) ? ' (' . $mail_error_reason . ')' : '';
        wp_send_json_error(['message' => 'Hubo un error al enviar tu solicitud. Por favor intenta nuevamente.' . $debug_suffix]);
    }
}

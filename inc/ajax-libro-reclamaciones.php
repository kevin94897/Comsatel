<?php

/**
 * AJAX Handler para Libro de Reclamaciones
 */

// Registrar acciones AJAX
add_action('wp_ajax_enviar_reclamo', 'comsatel_handle_submit_reclamo');
add_action('wp_ajax_nopriv_enviar_reclamo', 'comsatel_handle_submit_reclamo');

function comsatel_handle_submit_reclamo()
{
    check_ajax_referer('comsatel_reclamo_nonce', 'security');

    // Validar campos requeridos básicos
    $required_fields = ['nombre_completo', 'tipo_documento', 'numero_documento', 'telefono', 'email', 'tipo_solicitud', 'comentario'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            wp_send_json_error(['message' => 'Por favor completa todos los campos obligatorios.']);
        }
    }

    // Sanitización
    $nombre = sanitize_text_field($_POST['nombre_completo']);
    $tipo_doc = sanitize_text_field($_POST['tipo_documento']);
    $num_doc = sanitize_text_field($_POST['numero_documento']);
    $telefono = sanitize_text_field($_POST['telefono']);
    $email = sanitize_email($_POST['email']);
    $tipo_reclamante = sanitize_text_field($_POST['tipo_reclamante']);
    $tipo_solicitud = sanitize_text_field($_POST['tipo_solicitud']); // Reclamo o Queja
    $plan = sanitize_text_field($_POST['plan']);
    $comentario = sanitize_textarea_field($_POST['comentario']);
    $tipo_via_respuesta = sanitize_text_field($_POST['tipo_reclamo']); // Correo o Telefono

    // Datos opcionales (Trabajador)
    $departamento = isset($_POST['departamento']) ? sanitize_text_field($_POST['departamento']) : '-';
    $empresa = isset($_POST['empresa']) ? sanitize_text_field($_POST['empresa']) : '-';

    // Datos opcionales (Titular)
    $nombre_titular = isset($_POST['nombre_titular']) ? sanitize_text_field($_POST['nombre_titular']) : '-';

    // Manejo de archivo adjunto
    $attachments = [];
    if (!empty($_FILES['archivo']['name'])) {
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');

        $upload = wp_handle_upload($_FILES['archivo'], ['test_form' => false]);
        if (isset($upload['file'])) {
            $attachments[] = $upload['file'];
        }
    }

    // Configurar correo
    $to = 'atencionalcliente@comsatel.com.pe'; // Cambiar por el correo real de recepción
    $subject = "Nuevo Registro en Libro de Reclamaciones: $tipo_solicitud - $nombre";

    // Logo URL
    $logo_url = get_template_directory_uri() . '/images/logo.png'; // Asegúrate de tener un logo aquí o usa uno público
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
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <img src='$logo_url' alt='Comsatel'>
                <h1>Nuevo Registro de $tipo_solicitud</h1>
            </div>
            
            <div class='content'>
                <h3>Datos Generales</h3>
                <div class='row'><span class='label'>Tipo de Reclamante:</span> <span class='value'>$tipo_reclamante</span></div>
                <div class='row'><span class='label'>Nombre Completo:</span> <span class='value'>$nombre</span></div>
                <div class='row'><span class='label'>Documento:</span> <span class='value'>$tipo_doc $num_doc</span></div>
                <div class='row'><span class='label'>Teléfono:</span> <span class='value'>$telefono</span></div>
                <div class='row'><span class='label'>Email:</span> <span class='value'>$email</span></div>

                " . ($tipo_reclamante === 'Trabajador' ? "
                <h3>Datos Laborales</h3>
                <div class='row'><span class='label'>Empresa:</span> <span class='value'>$empresa</span></div>
                <div class='row'><span class='label'>Departamento:</span> <span class='value'>$departamento</span></div>
                
                <h3>Datos del Titular (Si aplica)</h3>
                <div class='row'><span class='label'>Nombre Titular:</span> <span class='value'>$nombre_titular</span></div>
                " : "") . "

                <h3>Detalle del Reclamo</h3>
                <div class='row'><span class='label'>Tipo de Solicitud:</span> <span class='value' style='color: #FF4D4D; font-weight: bold;'>$tipo_solicitud</span></div>
                <div class='row'><span class='label'>Plan Relacionado:</span> <span class='value'>$plan</span></div>
                <div class='row'><span class='label'>Vía de Respuesta Preferida:</span> <span class='value'>$tipo_via_respuesta</span></div>
                
                <div style='background: #f9f9f9; padding: 15px; margin-top: 20px; border-left: 4px solid #FF4D4D;'>
                    <strong>Comentario del Usuario:</strong><br>
                    " . nl2br($comentario) . "
                </div>
            </div>

            <div class='footer'>
                <p>Este correo fue enviado automáticamente desde el sitio web de Comsatel.</p>
                <p>&copy; " . date('Y') . " Comsatel Perú. Todos los derechos reservados.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $headers = array('Content-Type: text/html; charset=UTF-8');

    // Enviar correo
    $sent = wp_mail($to, $subject, $message, $headers, $attachments);

    // Borrar adjuntos temporales si existen
    if (!empty($attachments)) {
        foreach ($attachments as $file) {
            @unlink($file);
        }
    }

    if ($sent) {
        wp_send_json_success(['message' => 'El reclamo se envió correctamente.']);
    } else {
        wp_send_json_error(['message' => 'Hubo un error al enviar el correo. Por favor intenta nuevamente.']);
    }
}

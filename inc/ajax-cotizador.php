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

    // Prepare email content
    $to = 'kevin.gomez@nerd.pe';
    $subject = 'Nueva Solicitud de Cotización - Comsatel';

    $message = "Nueva solicitud de cotización recibida desde el sitio web:\n\n";
    $message .= "--- DATOS DEL SOLICITANTE ---\n";
    $message .= "Nombre: $nombre\n";
    $message .= "Email: $email\n";

    if ($tipo_cliente === 'Persona Natural' && !empty($telefono)) {
        $message .= "Teléfono: $telefono\n";
    }

    $message .= "Tipo de Cliente: $tipo_cliente\n";

    if ($tipo_cliente === 'Empresa' && !empty($razon_social)) {
        $message .= "Razón Social: $razon_social\n";
    }

    $message .= "Documento: $tipo_doc - $nro_doc\n\n";

    $message .= "--- DETALLES DE LA SOLICITUD ---\n";
    $message .= "Ubicación: $region / $provincia\n";
    $message .= "Cantidad de vehículos: $cant_vehiculos\n";

    if (!empty($productos)) {
        $message .= "Productos de interés: " . implode(', ', array_map('sanitize_text_field', $productos)) . "\n";
    } else {
        $message .= "Productos de interés: No especificado\n";
    }

    $headers = ['Content-Type: text/plain; charset=UTF-8', 'From: Comsatel Web <noreply@comsatel.pe>'];

    $sent = wp_mail($to, $subject, $message, $headers);

    if ($sent) {
        wp_send_json_success('Solicitud enviada correctamente.');
    } else {
        wp_send_json_error('Error al enviar el correo. Por favor intente más tarde.');
    }

    wp_die();
}

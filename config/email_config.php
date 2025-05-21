<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Asegúrate de que tienes PHPMailer instalado con Composer

function enviarCorreoConfirmacion($correo, $nombre, $pedido_id, $total) {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Usa el host de tu servicio de correo
        $mail->SMTPAuth   = true;
        $mail->Username   = 'noelno28@gmail.com'; // Cambia por tu correo
        $mail->Password   = 'Christopher98732'; // Usa contraseña de app si es Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Datos del remitente y receptor
        $mail->setFrom('c', 'ScentHunter');
        $mail->addAddress($correo, $nombre);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = "Confirmación de tu pedido #$pedido_id";
        $mail->Body    = "<h3>Gracias por tu compra, $nombre</h3>
                          <p>Tu pedido con ID <strong>$pedido_id</strong> ha sido registrado exitosamente.</p>
                          <p>Total: <strong>$$total MXN</strong></p>
                          <p>Pronto recibirás más detalles del envío.</p>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function enviarCorreoConfirmacion($correo, $nombre, $pedido_id, $total) {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'noelno28@gmail.com'; // Cambia por tu correo
        $mail->Password   = 'jgll stol pmcf bdmc'; // Usa contraseña de app si es Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Remitente y receptor
        $mail->setFrom('noelno28@gmail.com', 'ScentHunter');
        $mail->addAddress($correo, $nombre);

        // Contenido del mensaje
        $mail->isHTML(true);
        $mail->Subject = "Confirmacion de tu pedido #$pedido_id";
        $mail->Body    = "<h3>Gracias por tu compra, $nombre</h3>
                          <p>Tu pedido con ID <strong>$pedido_id</strong> ha sido registrado exitosamente.</p>
                          <p>Total: <strong>$$total MXN</strong></p>
                          <p>Pronto recibirás más detalles del envío.</p>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Error al enviar correo: " . $mail->ErrorInfo);
        return false;
    }
}


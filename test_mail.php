<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'noelno28@gmail.com';  // Cambia por tu correo
    $mail->Password   = 'jgll stol pmcf bdmc'; // Contraseña de aplicación
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('noelno28@gmail.com', 'ScentHunter');
    $mail->addAddress('christophercamachoceballos@gmail.com', 'Usuario de Prueba'); // Cambia por tu correo real

    $mail->isHTML(true);
    $mail->Subject = 'Correo de prueba';
    $mail->Body    = '<h1>Este es un correo de prueba</h1><p>Enviado desde PHPMailer</p>';

    $mail->send();
    echo 'Correo enviado correctamente.';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}

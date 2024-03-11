<!-- path del archivo: sendEmail.php -->
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($email, $nombre, $subject, $body) {
    // Cargar Composer's autoloader
    require '../vendor/autoload.php';

    // Crear una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        //Configuraciones del servidor
        // $mail->SMTPDebug = SMTP::DEBUG_OFF; // Habilitar salida de depuración detallada
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Habilitar salida de depuración detallada
        $mail->isSMTP(); // Enviar usando SMTP
        $mail->Host       = 'smtp.serviciodecorreo.es'; // Configurar el servidor SMTP para enviar a través de
        $mail->SMTPAuth   = true; // Habilitar autenticación SMTP
        $mail->Username   = 'info@paulmoyaf.com'; // Nombre de usuario SMTP
        $mail->Password   = 'Paul!234'; // Contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Habilitar encriptación TLS; `PHPMailer::ENCRYPTION_SMTPS` alentó
        $mail->Port       = 465; // Puerto TCP para conectarse, use 465 para `PHPMailer::ENCRYPTION_SMTPS` arriba

        //Recipients
        $mail->setFrom('info@paulmoyaf.com', 'IlargiCreative');
        $mail->addAddress($email, $nombre); // Añadir un destinatario

        // Contenido
        $mail->isHTML(true); // Establecer formato de correo electrónico a HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        return false;
    }
}
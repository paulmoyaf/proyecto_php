<?php

require_once('conexion.php');
require_once('lib/enviarCorreo.php');

// Verifica que el método de la petición sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inserta el mensaje

    // $conn = conexionMySql();
    $db = new PDO (DB_PATH);
    // Prepara y vincula los parámetros
    $stmt = $db->prepare("INSERT INTO mensajes (name, phone, email, message, create_time) VALUES (?, ?, ?, ?, ?)");

    // Obtener la fecha actual
    $currentTime = date("Y-m-d H:i:s");

    // Definir las variables antes de vincular los parámetros
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $msn = $_POST['message'];

    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $phone);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $msn);
    $stmt->bindParam(5, $currentTime);
    $stmt->execute();

    
    if ($stmt->execute()) {
        $subject = 'Confirmación de Mensaje';
        $encoded_subject = mb_encode_mimeheader($subject, 'UTF-8', 'B', "\r\n", strlen('Subject: '));
        $body = "Hola $name,\n\nTu Mensaje ha sido enviado correctamente.\n\nGracias por comunicarte.";
        $encoded_body = mb_convert_encoding($body, 'UTF-8', mb_detect_encoding($body));
        if (sendEmail($email, $name, $encoded_subject, $encoded_body)) {
            echo 'Mensaje enviado correctamente y correo de confirmación enviado.';
        } else {
            echo "Mensaje enviado correctamente, pero el correo de confirmación no pudo ser enviado.";
        }
    } else {
        echo 'Hubo un error al enviar el mensaje.';
    }
} else {
    // Maneja otros métodos HTTP o devuelve un error
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
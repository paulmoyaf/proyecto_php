<?php

require_once('conexion.php');

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

    echo json_encode(["message" => "Mensaje enviado con éxito"]);

    // $stmt->close();
    // $conn->close();

} else {
    // Maneja otros métodos HTTP o devuelve un error
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
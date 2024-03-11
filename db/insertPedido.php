<!-- path del archivo: db/insertPedido.php -->
<?php

// Importar PHPMailer classes al "namespace" global
// Estos deben estar en la parte superior de tu script, no dentro de una función
require_once('conexion.php');
require_once('lib/enviarCorreo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $db = new PDO (DB_PATH);

    // Obtener la fecha actual
    $currentTime = date("Y-m-d H:i:s");
    $productos = json_decode($_POST['productos'], true);
    $totalProductos = $_POST['totalProductos'];
    $precioTotal = $_POST['precioTotal'];

    $stmt = $db->prepare('INSERT INTO clientes (nombre, email, direccion, ciudad, codigoPostal, total_productos, precio_total, estado, create_date) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)');
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $codigoPostal = $_POST['codigoPostal'];
    $estado = 'pendiente';
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $direccion);
    $stmt->bindParam(4, $ciudad);
    $stmt->bindParam(5, $codigoPostal);
    $stmt->bindParam(6, $totalProductos);
    $stmt->bindParam(7, $precioTotal);
    $stmt->bindParam(8, $estado);
    $stmt->bindParam(9, $currentTime);


    $stmt->execute();
    $clienteId = $db->lastInsertId();


    $cantidadProductos = array();

    foreach ($productos as $producto) {
        if (isset($cantidadProductos[$producto['id']])) {
            $cantidadProductos[$producto['id']]['cantidad']++;
        } else {
            $cantidadProductos[$producto['id']] = ['cantidad' => 1, 'precio_final' => $producto['precio_final']];
        }
    }
    
    // Inserta los productos en la base de datos
    foreach ($cantidadProductos as $id => $producto) {
        $stmt = $db->prepare('INSERT INTO pedidos (cliente_id, producto_id, cantidad, precio, create_date, estado) VALUES (?, ?, ?, ?, ?,?)');
        $stmt->execute([$clienteId, $id, $producto['cantidad'], $producto['precio_final'], $currentTime, 'pendiente']);
    }

    $subject = 'Confirmación de Pedido';
    $encoded_subject = mb_encode_mimeheader($subject, 'UTF-8', 'B', "\r\n", strlen('Subject: '));
    $body = "Hola $nombre,\n\nTu Pedido ha sido enviado correctamente.\n\nGracias por tu compra.";
    $encoded_body = mb_convert_encoding($body, 'UTF-8', mb_detect_encoding($body));
    if (sendEmail($email, $nombre, $encoded_subject, $encoded_body)) {
        echo 'Pedido registrado correctamente y correo de confirmación enviado.';
    } else {
        echo "Pedido registrado correctamente, pero el correo de confirmación no pudo ser enviado.";
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}

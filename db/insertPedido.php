
<!-- path del archivo: db/insertPedido.php -->
<?php

require_once('conexion.php');

// Verifica que el método de la petición sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inserta el mensaje

    // $conn = conexionMySql();
    $db = new PDO (DB_PATH);
    // Prepara y vincula los parámetros  

    // Obtener la fecha actual
    $currentTime = date("Y-m-d H:i:s");

    $data = json_decode(file_get_contents('php://input'), true);
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
            $cantidadProductos[$producto['id']]++;
        } else {
            $cantidadProductos[$producto['id']] = 1;
        }
    }

    // Inserta los productos en la base de datos
    foreach ($cantidadProductos as $id => $cantidad) {
        $stmt = $db->prepare('INSERT INTO pedidos (cliente_id, producto_id, cantidad, precio, create_date, estado) VALUES (?, ?, ?, ?, ?,?)');
        $stmt->execute([$clienteId, $id, $cantidad, $data[$producto['id']]['precio'], $currentTime, 'pendiente']);
    
    }
    echo json_encode(['message' => 'Pedido insertado correctamente']);
} else {
    // Maneja otros métodos HTTP o devuelve un error
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
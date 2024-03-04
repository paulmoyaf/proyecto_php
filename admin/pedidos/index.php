<?php
session_start();

$admin = isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin";

require('../../db/db_connection_pedidos.php');
require('../../db/db_connection_clientes.php');
require('../../src/objects/clientes.php');
require('../../src/objects/pedidos.php');

if (!$admin) {
    header("location: ../index.php");
    exit;
}

function validateInput($input) {
    $id = filter_var($input, FILTER_VALIDATE_INT);
    if ($id === false) {
        throw new Exception("Invalid input");
    }
    return $id;
}

function createMensajeFromId($id) {
    $pedido = new Pedido();
    $pedido->setId($id);
    return $pedido;
}

try {
    if (isset($_POST['eliminar'], $_POST['id'])) {
        $id = validateInput($_POST['id']);
        $pedido = createMensajeFromId($id);

        if (PedidosDB::removePedido($pedido) > 0) {
            header("Location: index.php"); 
            exit;
        } else {
            $messageError = "Error: No se ha podido completar la acción deseada";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['ver-item'], $_POST['id'])) {
            $id = validateInput($_POST['id']);
            $pedido = createMensajeFromId($id);
            $emailCliente = PedidosDB::obtenerMailCliente($id);
            $pedido = PedidosDB::selectPedido($id);
            if ($pedido === false) {
                throw new Exception("Mensaje not found");
            }
            require('view-pedido.php');
            exit;
        } else {
            $id = validateInput($_POST['id']);
            $status = isset($_POST['status']) ? filter_var($_POST['status']) : null;
            if ($status === false) {
                throw new Exception("Invalid status");
            }
            $pedido = createMensajeFromId($id);
            $pedido->setStatus($status);
            if (PedidosDB::updatePedido($pedido) > 0) {
                $pedido = PedidosDB::selectPedido($id);
                require('view-pedido.php');
                exit;
            } else {
                $messageError = "Error: No se ha podido completar la acción deseada";
            }
        }
    }
} catch (Exception $e) {
    header("HTTP/1.0 400 Bad Request");
    include '../../src/views/400.php';
    exit;
}

$clientes = ClientesDB::selectAllClientes();
$todosPedidos = array();

foreach($clientes as $cliente) {
    $clienteId = $cliente->getId();
    $emailCliente = $cliente->getEmail();    
    $pedidosCliente = PedidosDB::selectPedidosByCliente($clienteId);
    $todosPedidos = array_merge($todosPedidos, $pedidosCliente);
}
$productos = PedidosDB::selectPedidos();
$pedidos = $todosPedidos;

require('pedidos-page-view.php');
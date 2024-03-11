<!-- path del archivo: admin/pedidos/index.php -->
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
    
        // Primero, eliminar los pedidos del cliente
        if (PedidosDB::eliminarPedidoCliente($id)) {
            // Luego, si los pedidos se eliminaron correctamente, eliminar al cliente
            if (ClientesDB::eliminarCliente($id)) {
                header("Location: index.php"); 
                exit;
            } else {
                $messageError = "Error: No se pudo eliminar al cliente";
            }
        } else {
            $messageError = "Error: No se pudieron eliminar los pedidos del cliente";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['ver-item'], $_POST['id'])) {
            $id = validateInput($_POST['id']);
            $pedido = createMensajeFromId($id);
            $emailCliente = PedidosDB::obtenerMailCliente($id);
            $pedidos = PedidosDB::selectPedidosByCliente($id);
            $cliente = ClientesDB::selectCliente($id);
            if ($pedidos === false) {
                throw new Exception("Mensaje not found");
            }
            require('view-pedido.php');
            exit;
        } else {
            $id = validateInput($_POST['id']);
            $estado = isset($_POST['estado']) ? filter_var($_POST['estado'], FILTER_SANITIZE_STRING) : null;
            if ($estado === false) {
                throw new Exception("Invalid estado");
            }
            if(ClientesDB::cambiarEstadoCliente($id, $estado)) {
                
                header("Location: index.php"); 
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
    $pedido = PedidosDB::selectPedido($clienteId);
    $pedidosCliente = PedidosDB::selectPedidosByCliente($clienteId);
    $todosPedidos = array_merge($todosPedidos, $pedidosCliente);
}
$productos = PedidosDB::selectPedidos();
$pedidos = $todosPedidos;

require('pedidos-page-view.php');
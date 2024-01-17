<?php
session_start();

$admin = isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin";

require('../../db/db_connection_mensajes.php');
require('../../src/objects/mensajes.php');

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
    $mensaje = new Mensaje();
    $mensaje->setId($id);
    return $mensaje;
}

try {
    if (isset($_POST['eliminar'], $_POST['id'])) {
        $id = validateInput($_POST['id']);
        $mensaje = createMensajeFromId($id);

        if (MensajesDB::removeMensaje($mensaje) > 0) {
            header("Location: index.php"); 
            exit;
        } else {
            $messageError = "Error: No se ha podido completar la acción deseada";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['ver-item'], $_POST['id'])) {
            $id = validateInput($_POST['id']);
            $mensaje = createMensajeFromId($id);
            $mensaje = MensajesDB::selectMensaje($id);
            if ($mensaje === false) {
                throw new Exception("Mensaje not found");
            }
            require('view-message.php');
            exit;
        } else {
            $id = validateInput($_POST['id']);
            $status = isset($_POST['status']) ? filter_var($_POST['status']) : null;
            if ($status === false) {
                throw new Exception("Invalid status");
            }
            $mensaje = createMensajeFromId($id);
            $mensaje->setStatus($status);
            if (MensajesDB::updateMensaje($mensaje) > 0) {
                $mensaje = MensajesDB::selectMensaje($id);
                require('view-message.php');
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

$mensajes = MensajesDB::selectMensajes();
$mensajesJSON = MensajesDB::selectMensajesJSON();
require('message-page-view.php');
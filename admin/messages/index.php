<?php
session_start();

$admin = isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin";

require('../../db/db_connection_mensajes.php');
require('../../src/objects/mensajes.php');

if (!$admin) {
    header("location: ../index.php");
    exit;
}

if (isset($_POST['eliminar'], $_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

    if ($id === false) {
        header("HTTP/1.0 400 Bad Request");
        include '../../src/views/400.php';
        exit;
    }

    $mensaje = new Mensaje();
    $mensaje->setId($id);

    if (MensajesDB::removeMensaje($mensaje) > 0) {
        header("Location: index.php"); 
        exit;
    } else {
        $messageError = "Error: No se ha podido completar la acción deseada";
    }
}

$mensajes = MensajesDB::selectMensajes();
$mensajesJSON = MensajesDB::selectMensajesJSON();
require('message-page-view.php');
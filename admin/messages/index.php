<?php
//esto no tiene las cookies
session_start();

$admin = false;
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin") {
    $admin = true;
    // esto con la cookie
    // if(isset($_COOKIE['usuario']) && $_COOKIE['usuario'] == "admin"){
    //     $admin = true;
}
require('../../db/db_connection_mensajes.php');
require('../../src/objects/mensajes.php');

if ($admin == true) {

    $mensajes = MensajesDB::selectMensajes();
    $mensajesJSON = MensajesDB::selectMensajesJSON();
    require('message-page-view.php');

} else {
    header("location: ../index.php");
}

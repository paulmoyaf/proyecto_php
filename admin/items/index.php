<?php
session_start();
require('../../db/db_connection.php');
require('../../src/objects/productos.php');
$admin = false;
if (isset($_POST['ingresar'])) {
    if ($_POST['usuario'] == "admin" && $_POST['password'] == "admin") {
        $admin = true;
        $_SESSION['usuario'] = "admin";
        header('Location: ../index.php');
        exit;
    }
} else if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin") {
    $admin = true;
}
if ($admin == true) {
    $productos = ProductosDB::selectProductos();
    include 'view-items.php';
} 

else {
    // if (isset($_POST['ingresar'])) {
    //     $error_message = "Datos incorrectos...";
    // }
    // include 'login.php';
}
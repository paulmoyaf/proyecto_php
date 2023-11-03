<?php
    //esto no tiene las cookies
    session_start();

    $admin = false;
        if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin"){
        $admin = true;


    // esto con la cookie
    // if(isset($_COOKIE['usuario']) && $_COOKIE['usuario'] == "admin"){
    //     $admin = true;

    }

    if ($admin == false){
        header ("location: index.php");
    }


    require('../../db/db_connection.php');
    require('../../src/objects/productos.php');

    $id = $_GET['id'];

        // $albistea = AlbisteaDB::selectAlbistea($id);
        $producto = ProductosDB::selectProducto($id);
?>
<?php
    //esto no tiene las cookies
    // session_start();

    // $admin = false;
    //     if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin"){
    //     $admin = true;
    // }

    // if ($admin == false){
    //     header ("location: index.php");
    // }


    require('../db/db_connection.php');
    require('../src/objects/productos.php');

    // $id = $_GET['id'];

    $id = $_GET['id'];

    // $tiene_descuento_id = $_GET['tiene_descuento_id'];
    
    
            $producto = ProductosDB::selectProducto($id);
            $nombre_tiene_descuento = ProductosDB::obtenerNombreTieneDescuento($producto->getTieneDescuentoId());
            

?>
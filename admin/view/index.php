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

    $filteredId = filter_var($id, FILTER_VALIDATE_INT);
        if ($filteredId === false) {
            header("HTTP/1.0 400 Bad Request");
            include '../../src/views/400.php';
            exit;
        }
        
        $producto = ProductosDB::selectProducto($id);
        
        if ($producto == null) {
            header("HTTP/1.0 404 Not Found");
            // echo "Error 404: Página no encontrada";
            include '../../src/views/404.php';
            exit;
        }

        $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
        $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getCategoriaId());
        $nombre_talla = ProductosDB::obtenerNombreTalla($producto->getTallaId());

        // $tallas = ProductosDB::selectTallas();
        // $tiposProducto = ProductosDB::selectTipoProducto();
        require('product-page-view.php');
?>
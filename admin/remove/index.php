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

    if (isset($_POST['eliminar'])) {

            $producto = new Producto();

            $producto->setId($id);

            if (ProductosDB::removeProduct($producto) > 0) {
                echo "<div class=\"alert alert-success\" role=\"alert\">
                El Producto se ha borrado exitosamente... </div> \n";
                require('remove-page-results.php');
                exit;
                
            } else {
                echo "<div class=\"alert alert-warning\" role=\"alert\">
                El Producto no se ha borrado, ha ocurrido algun error... </div> \n";
                require('remove-page.php');
                exit;
            }
        
    }else{
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
    }
    
    require('remove-page.php');

    
    ?>

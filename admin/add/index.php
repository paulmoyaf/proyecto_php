<?php
session_start();
require('../../db/db_connection.php');
require('../../src/objects/productos.php');
$admin = false;

if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin"){
    $admin = true;
}

if ($admin == true) {
    $tallas = ProductosDB::selectTallas();
    $categorias = ProductosDB::selectCategorias();
    $tipos_producto = ProductosDB::selectTipoProducto();
    if (isset($_POST['guardar'])) {

        $nombre          = $_POST['nombre'];
        $descripcion     = $_POST['descripcion'];
        $categoria_id    = $_POST['categoria_id'];
        $talla_id        = $_POST['talla_id'];
        $tipo_producto_id   = $_POST['tipo_producto_id'];
        $descuento       = $_POST['descuento'];
        $precio          = $_POST['precio'];
        $imagen_url      = $_POST['imagen_url'];
    
        // if ($descuento == ""){
        //     $descuento = 0.00;
        // }
    
        $nombre_categoria_nuevo = ProductosDB::obtenerNombreTipoCategoria($categoria_id);
        $nombre_talla_nuevo = ProductosDB::obtenerNombreTalla($talla_id);
        $nombre_tipo_nuevo = ProductosDB::obtenerNombreTipoProducto($tipo_producto_id);
        
        if (strlen($nombre) > 0 && strlen($descripcion) > 0 && strlen($categoria_id) > 0 &&
        strlen($talla_id) > 0 && strlen($tipo_producto_id) > 0  
        && strlen($precio) > 0 && strlen($imagen_url) > 0  
        ) {
            $producto = new Producto();
            $producto->setNombre($nombre);
            $producto->setDescripcion($descripcion);
            $producto->setCategoriaId($categoria_id);
            $producto->setTallaId($talla_id);
            $producto->setTipoProductoId($tipo_producto_id);
            $producto->setDescuento($descuento);
            $producto->setPrecio($precio);
            $producto->setImagenUrl($imagen_url);
    
            $precio = filter_var($precio, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $descuento = filter_var($descuento, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    
            if ($precio === false || $descuento === false ) {
                $messageError = "El precio o descuento debe ser un número decimal válido";
                require ('view-add.php');
            } else{
                if (ProductosDB::insertProduct($producto) > 0) {
                        $message = "La acción se ha completado correctamente!!!";
                    require ('view-add-results.php');
                } else {
                    $messageError = "Error: No se ha podido completar la acción deseada";
                    require ('view-add-results.php');
                }
            }
        } else {
            $messageWarning = "Upps parece que ha ocurrido algo, parece que no tiene toda la informacion...";
            require ('view-add.php');
    
        }
    } else {
        $nombre           = "";
        $descripcion      = ""; 
        $nombre_categoria_nuevo    = ""; 
        $nombre_talla_nuevo       = ""; 
        $nombre_tipo_nuevo = ""; 
        $descuento        = ""; 
        $precio           = ""; 
        $imagen_url       = ""; 
        include('view-add.php');
    }
    
    
    }else {
    header("location: ../index.php");
}





?>
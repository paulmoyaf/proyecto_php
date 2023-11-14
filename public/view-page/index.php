<?php

    require('../../db/db_connection.php');
    require('../../src/objects/productos.php');


//     $directorio = $_SERVER['REQUEST_URI'];

// // Verificar si el directorio no es válido
// if (!file_exists($directorio)) {
//     // Enviar encabezado de respuesta 404
//     echo $directorio;
//     header("HTTP/1.0 404 Not Found");
    
//     // Mostrar mensaje de error
//     echo "Lo sentimos, la página que buscas no se encuentdsdra.";
//     exit;
// }

    $id = $_GET['id'];

    // $tipo_producto_id = $_GET['tipo_producto_id'];
    
            // $productos = ProductosDB::selectProductos();
            $producto = ProductosDB::selectProducto($id);
            $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
            $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getCategoriaId());
            $tallas = ProductosDB::selectTallas();
            $tiposProducto = ProductosDB::selectTipoProducto();
    
    require('view-page.php');

?>
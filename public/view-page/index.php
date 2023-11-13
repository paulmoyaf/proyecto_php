<?php

    require('../../db/db_connection.php');
    require('../../src/objects/productos.php');


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
<?php
    require('../db/db_connection.php');
    require('../src/objects/productos.php');
    $currentPage = 'catalogo';

    // $productos = ProductosDB::selectProductos();
    // $tallas = ProductosDB::selectTallas();
    // $tiposProducto = ProductosDB::selectTipoProducto();
    
    // include 'catalogo.php';
    // require ('catalogo.php');
    header('Location: catalogo.php');
    // exit;
?>
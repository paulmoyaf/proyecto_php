<?php
require('../db/db_connection.php');
require('../src/objects/productos.php');


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $producto = ProductosDB::selectProducto($id);
    $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
    $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getCategoriaId());
    $tallas = ProductosDB::selectTallas();
    $tiposProducto = ProductosDB::selectTipoProducto();
    // 
    include 'includes/header.php';
    include 'includes/nav.php'; 
    include 'view-page.php';
    include 'includes/footer.php';
} else {
    $productos = ProductosDB::selectProductos();
    $currentPage = 'catalogo';
    include 'includes/header.php';
    include 'includes/nav.php'; 
    include 'catalogo.php';
    include 'includes/footer.php';
}

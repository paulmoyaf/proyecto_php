<?php
require('../db/db_connection.php');
require('../src/objects/productos.php');

$categorias = ProductosDB::selectCategorias();
$tallas = ProductosDB::selectTallas();
$tiposProducto = ProductosDB::selectTipoProducto();

$title = "Catalogo";
$favicon = "../assets/img/logo/favicon.ico";
$css = "../assets/css/style.css";
$currentPage = 'catalogo';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $filteredId = filter_var($id, FILTER_VALIDATE_INT);
    if ($filteredId === false) {
        header("HTTP/1.0 400 Bad Request");
        include '../src/views/400.php';
        exit;
    }

    $producto = ProductosDB::selectProducto($id);

    if ($producto == null) {
        header("HTTP/1.0 404 Not Found");
        // echo "Error 404: Página no encontrada";

        include '../src/views/404.php';
        exit;
    }

    $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
    $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getCategoriaId());
    // $tallas = ProductosDB::selectTallas();
    // $tiposProducto = ProductosDB::selectTipoProducto();
    // 

    include '../src/views/product-page.php';

} else {
    
    $productos = ProductosDB::selectProductos();
    $productosJSON = ProductosDB::selectProductosJSON();
    // $categorias = ProductosDB::selectCategorias();
    // $tallas = ProductosDB::selectTallas();
    // $tiposProducto = ProductosDB::selectTipoProducto();
    $title = "Catalogo";
    $favicon = "../assets/img/logo/favicon.ico";
    $css = "../assets/css/style.css";
    // $currentPage = 'catalogo';
    // header("Location: ../src/views/catalogo.php");
    require '../src/views/catalogo.php';
}

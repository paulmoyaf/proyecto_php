<?php
session_start();

define('BASE_PATH', '../../../');

require(BASE_PATH . '/db/db_connection.php');
require(BASE_PATH . '/src/objects/productos.php');

function isAdmin() {
    return isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin";
}

function redirectToIndex() {
    header("location: ../index.php");
    exit;
}

function validateId($id) {
    $filteredId = filter_var($id, FILTER_VALIDATE_INT);
    if ($filteredId === false) {
        header("HTTP/1.0 400 Bad Request");
        include '../../src/views/400.php';
        exit;
    }
    return $filteredId;
}

if (!isAdmin()) {
    redirectToIndex();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    redirectToIndex();
}

if (isset($_GET['id'])) {
    $id = validateId($_GET['id']);

    $producto = ProductosDB::selectProducto($id);

    if ($producto == null) {
        header("HTTP/1.0 404 Not Found");
        include '../../src/views/404.php';
        exit;
    }

    $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
    $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getCategoriaId());
    $nombre_talla = ProductosDB::obtenerNombreTalla($producto->getTallaId());

    require('view-page-view.php');
} else {
    redirectToIndex();
}
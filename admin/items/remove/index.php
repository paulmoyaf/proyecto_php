<!-- path de la página: /admin/items/remove/index.php -->
<?php
//esto no tiene las cookies
session_start();

$admin = false;
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin") {
    $admin = true;
    // esto con la cookie
    // if(isset($_COOKIE['usuario']) && $_COOKIE['usuario'] == "admin"){
    //     $admin = true;
}

define('BASE_PATH', '../../../');

require(BASE_PATH . '/db/db_connection.php');
require(BASE_PATH . '/src/objects/productos.php');


if ($admin == true) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $filteredId = filter_var($id, FILTER_VALIDATE_INT);
        if ($filteredId === false) {
            header("HTTP/1.0 400 Bad Request");
            include '../../src/views/400.php';
            exit;
        }

        if (isset($_POST['eliminar'])) {

            $producto = new Producto();

            $producto->setId($id);
            // $id = $_SESSION['product_id'];
            // $producto = ProductosDB::selectProducto($id);
            // $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
            // $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getCategoriaId());
            // $nombre_talla = ProductosDB::obtenerNombreTalla($producto->getTallaId());
            

            if (ProductosDB::removeProduct($producto) > 0) {

                require('remove-page-results.php');
                exit;
            } else {
                $messageError = "Error: No se ha podido completar la acción deseada, el item puede estar siendo utilizado en una orden o no existe.";

                require('remove-page-results-bad.php');
                exit;
            }
        } else {
            $producto = ProductosDB::selectProducto($id);

            if ($producto == null) {
                header("HTTP/1.0 404 Not Found");
                include '../../src/views/404.php';
                exit;
            }

            $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
            $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getCategoriaId());
            $nombre_talla = ProductosDB::obtenerNombreTalla($producto->getTallaId());
        }

        require('remove-page.php');
    } else {
        header("location: ../index.php");
    }
} else {
    header("location: ../index.php");
}

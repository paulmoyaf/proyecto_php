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

if (isset($_POST['guardar'])) {
    
    $nombre          = $_POST['nombre'];
    $descripcion     = $_POST['descripcion'];
    $categoria_id    = $_POST['categoria_id'];
    $talla_id        = $_POST['talla_id'];
    $tipo_producto_id   = $_POST['tipo_producto_id'];
    $descuento       = $_POST['descuento'];
    $precio          = $_POST['precio'];
    $imagen_url      = $_POST['imagen_url'];

    if ($descuento == ""){
        $descuento = 0;
    }
 
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

        if (ProductosDB::insertProduct($producto) > 0) {
            echo "<div class=\"alert alert-success\" role=\"alert\">
            El Producto se ha guardado exitosamente... </div> \n";
        } else {
            echo "<div class=\"alert alert-warning\" role=\"alert\">
            El producto no se ha guardado ... </div> \n";
        }
    } else {
        echo "<div class=\"alert alert-warning\" role=\"alert\">
        Upps parece que ha ocurrido algo, parece que no tiene informacion... </div> \n";
    }
} else {
    $tallas = ProductosDB::selectTallas();
    $categorias = ProductosDB::selectCategorias();
    $tipos_producto = ProductosDB::selectTipoProducto();
}
?>


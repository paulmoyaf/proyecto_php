<?php
session_start();
$admin = false;

if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin"){
    $admin = true;
}

if ($admin == false){
    header("location: index.php");
}

require('../../db/db_connection.php');
require('../../src/objects/productos.php');


$id = $_GET['id'];

$filteredId = filter_var($id, FILTER_VALIDATE_INT);
if ($filteredId === false) {
    header("HTTP/1.0 400 Bad Request");
    include '../../src/views/400.php';
    exit;
}


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
$tallas = ProductosDB::selectTallas();
$categorias = ProductosDB::selectCategorias();
$tipos_producto = ProductosDB::selectTipoProducto();


// $directorioDestino = "../src/img/cds/"; // Reemplaza con la ruta de tu carpeta destino
// $resultado = subirArchivo($_FILES['imagen_url'], $directorioDestino);
// echo $resultado;

if (isset($_POST['editar'])) {


    $nombre          = $_POST['nombre'];
    $descripcion     = $_POST['descripcion'];
    $categoria_id    = $_POST['categoria_id'];
    $talla_id        = $_POST['talla_id'];
    $tipo_producto_id   = $_POST['tipo_producto_id'];
    $descuento       = $_POST['descuento'];
    $precio          = $_POST['precio'];
    $imagen_url      = $_POST['imagen_url'];

    $nombre_categoria_nuevo = ProductosDB::obtenerNombreTipoCategoria($categoria_id); 
    $nombre_talla_nuevo = ProductosDB::obtenerNombreTalla($talla_id); 
    $nombre_tipo_nuevo = ProductosDB::obtenerNombreTipoProducto($tipo_producto_id); 
 
    if (strlen($nombre) > 0 && strlen($descripcion) > 0 && strlen($categoria_id) > 0 &&
    strlen($talla_id) > 0 && strlen($tipo_producto_id) > 0 && strlen($descuento) > 0  
    && strlen($precio) > 0 && strlen($imagen_url) > 0  
    ) {

        
        $producto = new Producto();
        $producto->setId($id);
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
            require ('edit-page.php');
        } else{
            if (ProductosDB::editProduct($producto) > 0) {
                $message = "La acción se ha completado correctamente!!!";
                require('edit-page-results.php');
            } else {
                $messageError = "Error: No se ha podido completar la acción deseada";
                require('edit-page-results.php');
            }
        }
    } else {
        $messageWarning = "Upps parece que ha ocurrido algo, parece que no tiene toda la informacion...";
        require('edit-page.php');
    }
} else {
    require('edit-page.php');
}


function subirArchivo($archivo, $directorioDestino) {
    try {
        if (!empty($archivo['name'])) {
            $nombreArchivo = $archivo['name'];
            $rutaArchivo = $directorioDestino . $nombreArchivo;

            if (move_uploaded_file($archivo['tmp_name'], $rutaArchivo)) {
                // El archivo se ha guardado correctamente
                $ubicacionImagen = "La ubicación de la imagen es: " . $rutaArchivo;
                return $ubicacionImagen;
            } else {
                // Hubo un error al guardar el archivo
                throw new Exception("Hubo un error al guardar el archivo.");
            }
        } else {
            // No se seleccionó ningún archivo
            throw new Exception("No se seleccionó ningún archivo.");
        }
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}

?>



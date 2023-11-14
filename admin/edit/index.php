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


$producto = ProductosDB::selectProducto($id);

if ($producto == null) {
    header("HTTP/1.0 404 Not Found");
    echo "Error 404: Página no encontrada";
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


    // $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    // $descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
    // $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
    // $tiene_descuento = filter_input(INPUT_POST, 'tiene_descuento', FILTER_VALIDATE_INT);
    // $precio = filter_input(INPUT_POST, 'precio', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    // $imagen_url = filter_input(INPUT_POST, 'imagen_url', FILTER_SANITIZE_URL);

    $nombre          = $_POST['nombre'];
    $descripcion     = $_POST['descripcion'];
    $categoria_id    = $_POST['categoria_id'];
    $talla_id        = $_POST['talla_id'];
    $tipo_producto_id   = $_POST['tipo_producto_id'];
    $descuento       = $_POST['descuento'];
    $precio          = $_POST['precio'];
    $imagen_url      = $_POST['imagen_url'];

    $nombre_categoria_nuevo = ProductosDB::obtenerNombreTalla($categoria_id); 
    $nombre_talla_nuevo = ProductosDB::obtenerNombreTalla($talla_id); 
    $nombre_tipo_nuevo = ProductosDB::obtenerNombreTalla($tipo_producto_id); 
 
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
        // $producto->set($imagen_url);


        if (ProductosDB::editProduct($producto) > 0) {



            echo "<div class=\"alert alert-success\" role=\"alert\">
            El Producto se ha editado exitosamente... </div> \n";
            require('edit-page-results.php');
        } else {
            echo "<div class=\"alert alert-warning\" role=\"alert\">
            El Producto no se ha guardado... </div> \n";
            require('edit-page.php');
        }
    } else {
            echo "<div class=\"alert alert-warning\" role=\"alert\">
            Upps parece que ha ocurrido algo, parece que no tiene informacion... </div> \n";
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



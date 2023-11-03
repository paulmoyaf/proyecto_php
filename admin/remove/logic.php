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

    $id = $_GET['id'];

    if (isset($_POST['eliminar'])) {

            $producto = new Producto();
            $producto->setId($id);
            // $albistea->setizenburua($izenburua);
            // $albistea->setlaburpena($laburpena);
            // $albistea->setxehetasunak($xehetasunak);

            if (ProductosDB::removeProduct($producto) > 0) {
                echo "<div class=\"alert alert-success\" role=\"alert\">
                El Producto se ha borrado exitosamente... </div> \n";
            } else {
                echo "<div class=\"alert alert-warning\" role=\"alert\">
                El Producto no se ha borrado, ha ocurrido algun error... </div> \n";
            }
        
    }else{
        $producto = ProductosDB::selectProducto($id);
    }
    
    
    ?>

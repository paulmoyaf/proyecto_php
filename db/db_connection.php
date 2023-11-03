<?php

define('DB_PATH', 'sqlite:C:\\xampp\\htdocs\\proyecto_php\\db\\catalogo.db');
// define('DB_PATH', 'sqlite:C:/xampp/htdocs/cap3/bbdd/catalogo.db');
// $db = new PDO ("sqlite:C:\\xampp\\htdocs\\cap3\\bbdd\\catalogo.db");

class ProductosDB{

    public static function selectProductos(){
        try{
            $db = new PDO (DB_PATH);
            $registros = $db->query("select * from productos");
            $productos = array();

            while ($registro = $registros->fetch()){
                $producto = new Producto();
                $producto->setId($registro['id']);
                $producto->setNombre($registro['nombre']);
                $producto->setDescripcion($registro['descripcion']);
                $producto->setCategoria($registro['categoria']);
                $producto->setTieneDescuento($registro['tiene_descuento']);
                $producto->setPrecio($registro['precio']);
                $producto->setImagenURL($registro['imagen_url']);
                $productos[] = $producto;                
            }

            return $productos;

        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function selectProducto($id){
        try{
            $db = new PDO (DB_PATH);
            $registros = $db->query("select * from productos where id=" .$id);
            $producto = null;

            if ($registro = $registros->fetch()){
                $producto = new Producto();
                $producto->setId($registro['id']);
                $producto->setNombre($registro['nombre']);
                $producto->setDescripcion($registro['descripcion']);
                $producto->setCategoria($registro['categoria']);
                $producto->setTieneDescuento($registro['tiene_descuento']);
                $producto->setPrecio($registro['precio']);
                $producto->setImagenURL($registro['imagen_url']);
            }
            return  $producto;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return null;
        }
    }


    public static function insertProduct($producto){

        try{
            $db = new PDO (DB_PATH);
            $sql = "insert into productos (nombre, descripcion, categoria, tiene_descuento, precio, imagen_url) values";
            $sql = $sql . "('" .$producto->getNombre() . "'";
            $sql = $sql . ",'" .$producto->getDescripcion() . "'";
            $sql = $sql . ",'" .$producto->getCategoria() . "'";
            $sql = $sql . ",'" .$producto->getTieneDescuento() . "'";
            $sql = $sql . ",'" .$producto->getPrecio() . "'";
            $sql = $sql . ",'" .$producto->getImagenUrl() . "')";

            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function editProduct($producto){

        try{
            $db = new PDO (DB_PATH);

            $sql = "UPDATE productos SET ";
            $sql = $sql . "nombre = '" .$producto->getNombre() . "',";
            $sql = $sql . "descripcion = '" .$producto->getDescripcion() . "',";
            $sql = $sql . "categoria = '" .$producto->getCategoria() . "',";
            $sql = $sql . "tiene_descuento = '" .$producto->getTieneDescuento() . "',";
            $sql = $sql . "precio = '" .$producto->getPrecio() . "',";
            $sql = $sql . "imagen_url = '" .$producto->getImagenUrl() . "'";

            $sql = $sql . " WHERE id = " .$producto->getId() . "";

            $resultado = $db->exec($sql);
            $_SESSION['mensaje'] = "Producto se ha editado correctamente.";
            return $resultado;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return 0;
        }
    }


    public static function removeProduct($producto){

        try{
            $db = new PDO (DB_PATH);
            $sql = "DELETE FROM productos ";
            $sql = $sql . " WHERE id = " .$producto->getId() . "";
            $resultado = $db->exec($sql);
            $_SESSION['mensaje'] = "Producto se ha borrrado exitosamente.";
            return $resultado;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return 0;
        }
    }


}
?>
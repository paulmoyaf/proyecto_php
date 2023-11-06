<?php

require_once('conexion.php');


class ProductosDB{

    public static function selectProductos(){
        try{
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);
            $registros = $db->query("select * from productos");
            $productos = array();

            while ($registro = $registros->fetch()){
                $producto = new Producto();
                $producto->setId($registro['id']);
                $producto->setNombre($registro['nombre']);
                $producto->setDescripcion($registro['descripcion']);
                $producto->setCategoriaId($registro['categoria_id']);
                $producto->setTallaId($registro['talla_id']);
                $producto->setTieneDescuentoId($registro['tiene_descuento_id']);
                $producto->setDescuento($registro['descuento']);
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
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);
            $registros = $db->query("select * from productos where id=" .$id);
            $producto = null;

            if ($registro = $registros->fetch()){
                $producto = new Producto();
                $producto->setId($registro['id']);
                $producto->setNombre($registro['nombre']);
                $producto->setDescripcion($registro['descripcion']);
                $producto->setCategoriaId($registro['categoria_id']);
                $producto->setTallaId($registro['talla_id']);
                $producto->setTieneDescuentoId($registro['tiene_descuento_id']);
                $producto->setDescuento($registro['descuento']);
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
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);
            $sql = "insert into productos (nombre, descripcion, categoria_id, talla_id, tiene_descuento_id, descuento, precio, imagen_url) values";
            $sql = $sql . "('" .$producto->getNombre() . "'";
            $sql = $sql . ",'" .$producto->getDescripcion() . "'";
            $sql = $sql . ",'" .$producto->getCategoriaId() . "'";
            $sql = $sql . ",'" .$producto->getTallaId() . "'";
            $sql = $sql . ",'" .$producto->getTieneDescuentoId() . "'";
            $sql = $sql . ",'" .$producto->getDescuento() . "'";
            $sql = $sql . ",'" .$producto->getPrecio() . "'";
            $sql = $sql . ",'" .$producto->getImagenUrl() . "')";

            $res = $db->exec($sql);
            return $res;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function editProduct($producto){

        try{
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);

            $sql = "UPDATE productos SET ";
            $sql = $sql . "nombre = '" .$producto->getNombre() . "',";
            $sql = $sql . "descripcion = '" .$producto->getDescripcion() . "',";
            $sql = $sql . "categoria_id = '" .$producto->getCategoriaId() . "',";
            $sql = $sql . "talla_id = '" .$producto->getTallaId() . "',";
            $sql = $sql . "tiene_descuento_id = '" .$producto->getTieneDescuentoId() . "',";
            $sql = $sql . "descuento = '" .$producto->getDescuento() . "',";
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
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);
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


    public static function obtenerNombreTieneDescuento($tiene_descuento_id) {
        try {
            $db = conexionMySql(); 
            // Realiza una consulta SQL utilizando JOIN para obtener el nombre de la tabla "tiene_descuento"
            $consulta = "SELECT nombre FROM tiene_descuento WHERE id = $tiene_descuento_id";
            $resultado = $db->query($consulta);
            $nombre_tiene_descuento = $resultado->fetchColumn();
            return $nombre_tiene_descuento;
        } catch (Exception $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }


}
?>
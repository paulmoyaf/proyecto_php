<?php

require_once('conexion.php');


class ProductosDB{

    public static function selectProductos(){
        try{
            // $db = conexionMySql(); 
            $db = new PDO (DB_PATH);
            $registros = $db->query("select * from productos");
            $productos = array();

            while ($registro = $registros->fetch()){
                $producto = new Producto();
                $producto->setId($registro['id']);
                $producto->setNombre($registro['nombre']);
                $producto->setDescripcion($registro['descripcion']);
                $producto->setCategoriaId($registro['categoria_id']);
                $producto->setTallaId($registro['talla_id']);
                $producto->setTipoProductoId($registro['tipo_producto_id']);
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

    public static function selectProductosJSON()
    {
        try {
            // $db = conexionMySql();
            
            $db = new PDO (DB_PATH);
            $registros = $db->query("select * from productos");
            if ($registro = $registros->fetch()) {
                $productos = array();
                $i = 0;
                do {
                    $producto = array(
                        'id' => (int)$registro['id'],
                        'nombre' => $registro['nombre'],
                        'descripcion' => $registro['descripcion'],
                        'categoria_id' => (int)$registro['categoria_id'],
                        'talla_id' => (int)$registro['talla_id'],
                        'tipo_producto_id' => (int)$registro['tipo_producto_id'],
                        'descuento' => (float)$registro['descuento'],
                        'precio' => (float)$registro['precio'],
                        'precio_final' => (float)$registro['precio_final'],
                        'imagen_url' => $registro['imagen_url']
                    );
                    $productos[] = $producto;
                    $i++;
                } while ($registro = $registros->fetch());
                return json_encode($productos, JSON_UNESCAPED_UNICODE);
            }
        } catch (Exception $e) {
            echo "<p>Error:" . $e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function selectProducto($id){
        try{
            // $db = conexionMySql(); 
            $db = new PDO (DB_PATH);
            $registros = $db->query("select * from productos where id=" .$id);
            $producto = null;

            if ($registro = $registros->fetch()){
                $producto = new Producto();
                $producto->setId($registro['id']);
                $producto->setNombre($registro['nombre']);
                $producto->setDescripcion($registro['descripcion']);
                $producto->setCategoriaId($registro['categoria_id']);
                $producto->setTallaId($registro['talla_id']);
                $producto->setTipoProductoId($registro['tipo_producto_id']);
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
            // $db = conexionMySql(); 
            $db = new PDO (DB_PATH);
            $sql = "insert into productos (nombre, descripcion, categoria_id, talla_id, tipo_producto_id, descuento, precio, precio_final, imagen_url) values";
            $sql = $sql . "('" .$producto->getNombre() . "'";
            $sql = $sql . ",'" .$producto->getDescripcion() . "'";
            $sql = $sql . ",'" .$producto->getCategoriaId() . "'";
            $sql = $sql . ",'" .$producto->getTallaId() . "'";
            $sql = $sql . ",'" .$producto->getTipoProductoId() . "'";
            $sql = $sql . ",'" .$producto->getDescuento() . "'";
            $sql = $sql . ",'" .$producto->getPrecio() . "'";
            $sql = $sql . ",'" .$producto->getPrecioFinal() . "'";
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
            // $db = conexionMySql(); 
            $db = new PDO (DB_PATH);

            $sql = "UPDATE productos SET ";
            $sql = $sql . "nombre = '" .$producto->getNombre() . "',";
            $sql = $sql . "descripcion = '" .$producto->getDescripcion() . "',";
            $sql = $sql . "categoria_id = '" .$producto->getCategoriaId() . "',";
            $sql = $sql . "talla_id = '" .$producto->getTallaId() . "',";
            $sql = $sql . "tipo_producto_id = '" .$producto->getTipoProductoId() . "',";
            $sql = $sql . "descuento = '" .$producto->getDescuento() . "',";
            $sql = $sql . "precio = '" .$producto->getPrecio() . "',";
            $sql = $sql . "precio_final = '" .$producto->getPrecioFinal() . "',";
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
            // $db = conexionMySql(); 
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


    public static function obtenerNombreTipoProducto($tipo_producto_id) {
        try {
            // $db = conexionMySql(); 
            $db = new PDO (DB_PATH);
            $consulta = "SELECT nombre FROM tipo_producto WHERE id = $tipo_producto_id";
            $resultado = $db->query($consulta);
            $nombre_tipo_producto = $resultado->fetchColumn();
            return $nombre_tipo_producto;
        } catch (Exception $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }
    public static function obtenerNombreTalla($talla_id) {
        try {
            // $db = conexionMySql(); 
            $db = new PDO (DB_PATH);
            $consulta = "SELECT nombre FROM talla WHERE id = $talla_id";
            $resultado = $db->query($consulta);
            $nombre_talla = $resultado->fetchColumn();
            return $nombre_talla;
        } catch (Exception $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }
    public static function obtenerNombreTipoCategoria($categoria_id) {
        try {
            // $db = conexionMySql(); 
            $db = new PDO (DB_PATH);
            $consulta = "SELECT nombre FROM categoria WHERE id = $categoria_id";
            $resultado = $db->query($consulta);
            $nombre_tipo_categoria = $resultado->fetchColumn();
            return $nombre_tipo_categoria;
        } catch (Exception $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }
    public static function selectTallas(){ 
        try { 
            // $db = conexionMySql();  
            $db = new PDO (DB_PATH);
            $consulta = "SELECT id, nombre FROM talla"; 
            $registros = $db->query($consulta); 
            // Obtener los registros de la tabla "talla" como un array asociativo
            $tallas = $registros->fetchAll(PDO::FETCH_ASSOC);            
            // Retornar el array de tallas
            return $tallas; 
        } catch (Exception $e) { 
            echo "<p>Error:" .$e->getMessage() . "</p>\n"; 
            return null; 
        } 
    }

    public static function selectCategorias(){ 
        try { 
            // $db = conexionMySql();  
            $db = new PDO (DB_PATH);
            $consulta = "SELECT id, nombre FROM categoria"; 
            $registros = $db->query($consulta); 
            // Obtener los registros de la tabla "talla" como un array asociativo
            $categorias = $registros->fetchAll(PDO::FETCH_ASSOC);            
            // Retornar el array de tallas
            return $categorias; 
        } catch (Exception $e) { 
            echo "<p>Error:" .$e->getMessage() . "</p>\n"; 
            return null; 
        } 
    }
    public static function selectTipoProducto(){ 
        try { 
            // $db = conexionMySql(); 
            $db = new PDO (DB_PATH); 
            $consulta = "SELECT id, nombre FROM tipo_producto"; 
            $registros = $db->query($consulta); 
            $tiposProducto = $registros->fetchAll(PDO::FETCH_ASSOC);            
            return $tiposProducto; 
        } catch (Exception $e) { 
            echo "<p>Error:" .$e->getMessage() . "</p>\n"; 
            return null; 
        } 
    }


}

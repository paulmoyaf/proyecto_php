<?php

require_once('conexion.php');


class MensajesDB{

    public static function selectMensajes(){
        try{
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);
            $registros = $db->query("select * from mensajes");
            $mensajes = array();

            while ($registro = $registros->fetch()){
                $mensaje = new Mensaje();
                $mensaje->setId($registro['id']);
                $mensaje->setNombre($registro['name']);
                $mensaje->setTelefono($registro['phone']);
                $mensaje->setEmail($registro['email']);
                $mensaje->setMensaje($registro['message']);
                $mensaje->setFecha($registro['create_time']);
                $mensaje->setStatus($registro['status']);
                $mensajes[] = $mensaje;                
            }

            return $mensajes;

        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function selectMensajesJSON()
    {
        try {
            $db = conexionMySql();
            // $db = new PDO (DB_PATH);
            $registros = $db->query("select * from mensajes");
            if ($registro = $registros->fetch()) {
                $mensajes = array();
                $i = 0;
                do {
                    $mensaje = array(
                        'id' => (int)$registro['id'],
                        'nombre' => $registro['name'],
                        'telefono' => $registro['phone'],
                        'email' => $registro['email'],
                        'mensaje' => $registro['message'],
                        'fecha' => $registro['create_time'],
                        'status' => $registro['status'] == 1 ? 'Activo' : 'Inactivo'

                    );
                    $mensajes[] = $mensaje;
                    $i++;
                } while ($registro = $registros->fetch());
                return json_encode($mensajes, JSON_UNESCAPED_UNICODE);
            }
        } catch (Exception $e) {
            echo "<p>Error:" . $e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function selectMensaje($id){
        try{
            $db = conexionMySql(); 

            $registros = $db->query("select * from mensajes where id=" .$id);
            $mensaje = null;

            if ($registro = $registros->fetch()){
                $mensaje = new Mensaje();
                $mensaje->setId($registro['id']);
                $mensaje->setNombre($registro['name']);
                $mensaje->setTelefono($registro['phone']);
                $mensaje->setEmail($registro['email']);
                $mensaje->setMensaje($registro['message']);
                $mensaje->setFecha($registro['create_time']);
                $mensaje->setStatus($registro['status']);

            }
            return  $mensaje;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function insertMensaje($mensaje){

        

        try{
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);

            $stmt = $db->prepare("INSERT INTO mensajes (name, phone, email, message, create_time) VALUES (?, ?, ?, ?, ?)");

            // Obtener la fecha actual
            $currentTime = date("Y-m-d H:i:s");
            
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $phone);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $msn);
            $stmt->bindParam(5, $currentTime);
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $msn = $_POST['message'];
            $stmt->execute();
            
            echo json_encode(["message" => "Mensaje enviado con éxito"]);
            
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return 0;
        }
    }


    // public static function insertProduct($producto){

    //     try{
    //         $db = conexionMySql(); 
    //         // $db = new PDO (DB_PATH);
    //         $sql = "insert into productos (nombre, descripcion, categoria_id, talla_id, tipo_producto_id, descuento, precio, precio_final, imagen_url) values";
    //         $sql = $sql . "('" .$producto->getNombre() . "'";
    //         $sql = $sql . ",'" .$producto->getDescripcion() . "'";
    //         $sql = $sql . ",'" .$producto->getCategoriaId() . "'";
    //         $sql = $sql . ",'" .$producto->getTallaId() . "'";
    //         $sql = $sql . ",'" .$producto->getTipoProductoId() . "'";
    //         $sql = $sql . ",'" .$producto->getDescuento() . "'";
    //         $sql = $sql . ",'" .$producto->getPrecio() . "'";
    //         $sql = $sql . ",'" .$producto->getPrecioFinal() . "'";
    //         $sql = $sql . ",'" .$producto->getImagenUrl() . "')";

    //         $res = $db->exec($sql);
    //         return $res;
    //     } catch (Exception $e){
    //         echo "<p>Error:" .$e->getMessage() . "</p>\n";
    //         return 0;
    //     }
    // }

    public static function updateMensaje($mensaje){

        try{
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);

            $sql = "UPDATE mensajes SET ";
            $sql = $sql . "status = '" .$mensaje->getStatus() . "'";

            $sql = $sql . " WHERE id = " .$mensaje->getId() . "";

            $resultado = $db->exec($sql);
            $_SESSION['mensaje'] = "Mensaje se ha editado correctamente.";
            return $resultado;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return 0;
        }
    }

    // public static function editProduct($producto){

    //     try{
    //         $db = conexionMySql(); 
    //         // $db = new PDO (DB_PATH);

    //         $sql = "UPDATE productos SET ";
    //         $sql = $sql . "nombre = '" .$producto->getNombre() . "',";
    //         $sql = $sql . "descripcion = '" .$producto->getDescripcion() . "',";
    //         $sql = $sql . "categoria_id = '" .$producto->getCategoriaId() . "',";
    //         $sql = $sql . "talla_id = '" .$producto->getTallaId() . "',";
    //         $sql = $sql . "tipo_producto_id = '" .$producto->getTipoProductoId() . "',";
    //         $sql = $sql . "descuento = '" .$producto->getDescuento() . "',";
    //         $sql = $sql . "precio = '" .$producto->getPrecio() . "',";
    //         $sql = $sql . "precio_final = '" .$producto->getPrecioFinal() . "',";
    //         $sql = $sql . "imagen_url = '" .$producto->getImagenUrl() . "'";

    //         $sql = $sql . " WHERE id = " .$producto->getId() . "";

    //         $resultado = $db->exec($sql);
    //         $_SESSION['mensaje'] = "Producto se ha editado correctamente.";
    //         return $resultado;
    //     } catch (Exception $e){
    //         echo "<p>Error:" .$e->getMessage() . "</p>\n";
    //         return 0;
    //     }
    // }


    public static function removeMensaje($mensaje){

        try{
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);
            $sql = "DELETE FROM mensajes ";
            $sql = $sql . " WHERE id = " .$mensaje->getId() . "";
            $resultado = $db->exec($sql);
            $_SESSION['mensaje'] = "Mensaje se ha borrrado exitosamente.";
            return $resultado;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return 0;
        }
    }


}
?>
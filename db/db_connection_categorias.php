<?php

require_once('conexion.php');


class CategoriasDB{

    public static function selectCategorias(){
        try{
             
            $db = getDBConnection();

            $registros = $db->query("select * from categoria");
            $categorias = array();

            while ($registro = $registros->fetch()){
                $categoria = new Categoria();
                $categoria->setId($registro['id']);
                $categoria->setNombre($registro['nombre']);

                $categorias[] = $categoria;                
            }

            return $categorias;

        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function selectCategoriasJSON()
    {
        try {
            
            $db = getDBConnection();
            $registros = $db->query("select * from categoria");
            $categorias = array(); // Inicializa el array $categorias
            if ($registro = $registros->fetch()) {
                do {
                    $categoria = array(
                        'id' => (int)$registro['id'],
                        'nombre' => $registro['nombre']
                    );
                    $categorias[] = $categoria; // Agrega $categoria a $categorias
                } while ($registro = $registros->fetch());
                return json_encode($categorias, JSON_UNESCAPED_UNICODE);
            }
        } catch (Exception $e) {
            echo "<p>Error:" . $e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function selectCategoria($id){
        try{
             
            $db = getDBConnection();
            $registros = $db->query("select * from categoria where id=" .$id);
            $categoria = null;

            if ($registro = $registros->fetch()){
                $categoria = new Categoria();
                $categoria->setId($registro['id']);
                $categoria->setNombre($registro['nombre']);

            }
            return  $categoria;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function insertCategoria($nombre){
        try{
             
            $db = getDBConnection();
            $stmt = $db->prepare("INSERT INTO categoria (nombre) VALUES (?)");
            $stmt->bindParam(1, $nombre);
            $stmt->execute();
    
            return true;
        } catch (Exception $e) {
            echo "<p>Error:" . $e->getMessage() . "</p>\n";
            return false;
        }
    }

    // public static function insertCategoria($categoria){

    //     try{
    //         $db = conexionMySql(); 
    //         // $db = getDBConnection();
    //         $sql = "insert into categoria (nombre) values";
    //         $sql = $sql . "('" .$categoria->getNombre() . "')";
    //         $res = $db->exec($sql);
    //         return $res;
    //     } catch (Exception $e){
    //         echo "<p>Error:" .$e->getMessage() . "</p>\n";
    //         return 0;
    //     }
    // }

        public static function editarCategoria($id, $nombre){
        try{
             
            $db = getDBConnection();
            $stmt = $db->prepare("UPDATE categoria SET nombre = ? WHERE id = ?");
            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $id);
            $stmt->execute();
    
            return true;
        } catch (Exception $e) {
            echo "<p>Error:" . $e->getMessage() . "</p>\n";
            return false;
        }
    }

    public static function removeCategoria($id){

        try{
             
            $db = getDBConnection();
            $sql = "DELETE FROM categoria ";
            $sql = $sql . " WHERE id = " .$id . "";
            $resultado = $db->exec($sql);
            $_SESSION['mensaje'] = "Categoria se ha borrrado exitosamente.";
            return $resultado;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return 0;
        }
    }


}

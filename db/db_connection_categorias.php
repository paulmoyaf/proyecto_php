<?php

require_once('conexion.php');


class CategoriasDB{

    public static function selectCategorias(){
        try{
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);
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
        $db = conexionMySql();
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
            $db = conexionMySql(); 

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


    public static function insertCategoria($categoria){

        try{
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);
            $sql = "insert into categoria (nombre) values";
            $sql = $sql . "('" .$categoria->getNombre() . "')";
            $res = $db->exec($sql);
            return $res;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function editCategoria($categoria){

        try{
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);

            $sql = "UPDATE categoria SET ";
            $sql = $sql . "nombre = '" .$categoria->getNombre() . "'";
            $sql = $sql . " WHERE id = " .$categoria->getId() . "";

            $resultado = $db->exec($sql);
            $_SESSION['mensaje'] = "Categoria se ha editado correctamente.";
            return $resultado;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return 0;
        }
    }


    public static function removeCategoria($categoria){

        try{
            $db = conexionMySql(); 
            // $db = new PDO (DB_PATH);
            $sql = "DELETE FROM categoria ";
            $sql = $sql . " WHERE id = " .$categoria->getId() . "";
            $resultado = $db->exec($sql);
            $_SESSION['mensaje'] = "Categoria se ha borrrado exitosamente.";
            return $resultado;
        } catch (Exception $e){
            echo "<p>Error:" .$e->getMessage() . "</p>\n";
            return 0;
        }
    }


}
?>
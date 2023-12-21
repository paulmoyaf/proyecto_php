<?php
session_start();
require('../../db/db_connection_categorias.php');
require('../../src/objects/categorias.php');
$admin = false;


if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin"){
    $admin = true;
}

if ($admin == true) {

    // $categorias = CategoriasDB::selectCategorias();
    $categoriasJSON = CategoriasDB::selectCategoriasJSON();
    // var_dump($categoriasJSON);
    require('categorias.php');
    
    
    }else {
    header("location: ../index.php");
}





?>
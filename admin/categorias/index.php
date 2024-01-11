<?php
session_start();
require('../../db/db_connection_categorias.php');
require('../../src/objects/categorias.php');

$admin = isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin";

if (!$admin) {
    header("location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handlePostRequest();
} else {
    handleGetRequest();
}

function handlePostRequest() {
    // $json = file_get_contents('php://input');
    // $data = json_decode($json, true);
    // $nombre = $data['nombre'];
    // $nuevaCategoria =  CategoriasDB::insertCategoria($nombre);
    // echo json_encode($nuevaCategoria);

    $nombre = $_POST['nombre'];
    $nuevaCategoria = CategoriasDB::insertCategoria($nombre);
    echo json_encode($nuevaCategoria);
}

function handleGetRequest() {
    $categoriasJSON = CategoriasDB::selectCategoriasJSON();
    require('categorias.php');
}
?>
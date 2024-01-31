<?php
session_start();
require('../../db/db_connection_categorias.php');
require('../../src/objects/categorias.php');


function validateAdmin() {
    $admin = isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin";

    if (!$admin) {
        header('Location: index.php');
        exit();
    }
}

function handleMessages() {
    echo '<script>';
    if (isset($_SESSION['message'])) {
        echo 'var message = "' . $_SESSION['message'] . '";';
        unset($_SESSION['message']);
    }
    if (isset($_SESSION['messageDelete'])) {
        echo 'var messageDelete = "' . $_SESSION['messageDelete'] . '";';
        unset($_SESSION['messageDelete']);
    }
    if (isset($_SESSION['messageError'])) {
        echo 'var messageError = "' . $_SESSION['messageError'] . '";';
        unset($_SESSION['messageError']);
    }
    echo '</script>';
}

function handlePostRequest() {
    if (isset($_POST['eliminar'], $_POST['id'])) {
        $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

        if ($id === false) {
            header("HTTP/1.0 400 Bad Request");
            include '../../src/views/400.php';
            exit;
        }

        if (CategoriasDB::removeCategoria($id) > 0){
            $_SESSION['messageDelete'] = 'Categoria eliminada con éxito';
            header('Location: index.php'); 
            exit;
        } else {
            $_SESSION['messageError'] = 'Error: No se ha podido completar la acción deseada';
        };
    }

    if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        if (CategoriasDB::insertCategoria($nombre)) {
            $_SESSION['message'] = 'Categoría agregada con éxito';
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['messageErrorCategoria'] = 'Error al agregar la categoría';
            header('Location: index.php');
            exit();
        }
    } else {
        $_SESSION['messageErrorCategoria'] = 'Nombre de categoría no proporcionado';
        header('Location: index.php');
        exit();
    }
}


function handlePutRequest() {
    // if (isset($_POST['editar'], $_POST['id'])) {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = filter_var($data['id'], FILTER_VALIDATE_INT);
    $nombre = $data['nombre'];

    
    if ($id === false) {
        header("HTTP/1.0 400 Bad Request");
        include '../../src/views/400.php';
        exit;
    }

    if (CategoriasDB::editarCategoria($id, $nombre)) {
        $_SESSION['message'] = 'Categoría actualizada con éxito';
        echo json_encode(['status' => 'success', 'message' => 'Categoría actualizada con éxito']);
        exit();
    } else {
        $_SESSION['messageErrorCategoria'] = 'Error al actualizar la categoría';
        echo json_encode(['status' => 'error', 'message' => 'Categoría actualizada con éxito']);
        exit();
    }
// }
}

function handleGetRequest() {
    $categorias = CategoriasDB::selectCategorias();
    require('categorias.php');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handlePostRequest();
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    handlePutRequest();
}


validateAdmin();
handleMessages();
handleGetRequest();
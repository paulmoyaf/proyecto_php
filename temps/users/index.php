<?php
session_start();

$admin = isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin";

// require('../../db/db_connection_mensajes.php');
// require('../../src/objects/mensajes.php');

if (!$admin) {
    header("location: ../index.php");
    exit;
}


$q = isset($_GET['q']) ? $_GET['q'] : '';

if (!empty($q)) {
    $users = json_decode(file_get_contents('../../db/users.json'), true)['users'];

    $results = array_filter($users, function($user) use ($q) {
        return strpos(strtolower($user['firstName']), strtolower($q)) !== false;
    });

    header('Content-Type: application/json');
    echo json_encode(array_values($results));
} else {
    require('users-page-view.php');
}

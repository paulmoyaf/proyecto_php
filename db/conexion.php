<?php

define('DB_PATH', 'sqlite:C:\\xampp\\htdocs\\proyecto_php\\db\\catalogo.db');
function conexionMySql() {
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "catalogo";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
        return null;
    }
}
?>


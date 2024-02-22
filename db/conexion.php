<?php
define('DB_PATH', 'sqlite:' . __DIR__ . '/db_tienda.db');

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

function getDBConnection(){
    try {
        $db = new PDO (DB_PATH);
        $db->exec("PRAGMA foreign_keys = ON;");
        return $db;
    } catch (PDOException $e) {
        // Si la conexión a SQLite falla, intenta conectar a MySQL
        return conexionMySql();
    }
}
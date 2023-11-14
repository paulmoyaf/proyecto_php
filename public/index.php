<?php
require('../db/db_connection.php');
require('../src/objects/productos.php');


$productos = ProductosDB::selectProductos();

include 'catalogo.php';
?>
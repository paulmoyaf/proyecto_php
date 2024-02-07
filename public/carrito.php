<?php
// Redireccionar al archivo home_view.php
// header("Location: ../src/views/home_view.php");
// include '../src/views/home_view.php';

$title = "Carrito";
$favicon = "../assets/img/logo/favicon.ico";
$css = "../assets/css/style.css";
$description = "Diseño de camisetas personalizadas en Quito, Ecuador";

require '../src/views/carrito.php';
exit;

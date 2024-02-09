<?php
// Redireccionar al archivo home_view.php
// header("Location: ../src/views/home_view.php");
// include '../src/views/home_view.php';

$title = "Carrito";
$favicon = "../assets/img/logo/favicon.ico";
$css = "../assets/css/style.css";
$description = "Diseño de camisetas personalizadas en Quito, Ecuador";


session_start();

if (isset($_GET['idioma'])) {
    $_SESSION['idioma'] = $_GET['idioma'];
} elseif (!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = 'es'; // Idioma por defecto
}

require '../assets/idioma/i18n.php';

$textos = $idiomas[$_SESSION['idioma']];

require '../src/views/carrito.php';
exit;

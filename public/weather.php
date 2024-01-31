<?php
// Redireccionar al archivo home_view.php
// header("Location: ../src/views/home_view.php");
// include '../src/views/home_view.php';
$title = "Clima";
$favicon = "../assets/img/logo/favicon.ico";
$css = "../assets/css/style.css";
require '../src/views/weather-view.php';
exit;

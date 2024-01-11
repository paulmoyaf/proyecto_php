

<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "catalogo";


$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepara y vincula los parámetros
$stmt = $conn->prepare("INSERT INTO mensajes (name, phone, email, message, create_time) VALUES (?, ?, ?, ?, ?)");

// Obtener la fecha actual
$currentTime = date("Y-m-d H:i:s");

$stmt->bind_param("sssss", $name, $phone, $email, $msn, $currentTime);
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$msn = $_POST['message'];
$stmt->execute();


echo json_encode(["message" => "Mensaje enviado con éxito"]);

$stmt->close();
$conn->close();
?>


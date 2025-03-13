<?php
$host = "localhost:3315";
$user = "root";
$pass = "";
$db = "catalogo_peliculas";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

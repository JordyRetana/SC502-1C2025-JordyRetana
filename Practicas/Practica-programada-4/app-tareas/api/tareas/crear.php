<?php
require_once('C:/xampp/htdocs/APP-TAREAS/config/database.php');
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$tarea = $data['titulo'] ?? '';
$descripcion = $data['descripcion'] ?? '';
$usuario_id = $_SESSION['usuario_id'] ?? 0;

$conn = getDBConnection();
$stmt = $conn->prepare("INSERT INTO tareas (usuario_id, tarea, descripcion) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $usuario_id, $tarea, $descripcion);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $stmt->error]);
}
$conn->close();
?>

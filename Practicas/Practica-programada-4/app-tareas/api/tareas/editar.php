<?php
session_start();
require_once('C:/xampp/htdocs/APP-TAREAS/config/database.php');

$data = json_decode(file_get_contents("php://input"), true);
$conn = getDBConnection();

$stmt = $conn->prepare("UPDATE tareas SET tarea = ?, descripcion = ? WHERE id = ? AND usuario_id = ?");
$stmt->bind_param("ssii", $data['titulo'], $data['descripcion'], $data['id'], $_SESSION['usuario_id']);
$success = $stmt->execute();

echo json_encode(['success' => $success]);
$conn->close();
?>

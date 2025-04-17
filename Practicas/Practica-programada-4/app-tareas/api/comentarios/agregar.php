<?php
session_start();
require_once('C:/xampp/htdocs/APP-TAREAS/config/database.php');

$data = json_decode(file_get_contents("php://input"), true);
$conn = getDBConnection();

$stmt = $conn->prepare("INSERT INTO comentarios (tarea_id, usuario_id, comentario) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $data['tarea_id'], $_SESSION['usuario_id'], $data['comentario']);
$success = $stmt->execute();

echo json_encode(['success' => $success]);
$conn->close();
?>

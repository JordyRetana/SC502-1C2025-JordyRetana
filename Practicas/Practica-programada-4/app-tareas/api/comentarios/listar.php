<?php
session_start();
require_once('C:/xampp/htdocs/APP-TAREAS/config/database.php');

$tarea_id = $_GET['tarea_id'] ?? 0;
$conn = getDBConnection();

$stmt = $conn->prepare("SELECT id, comentario, fecha_creacion FROM comentarios WHERE tarea_id = ?");
$stmt->bind_param("i", $tarea_id);
$stmt->execute();
$result = $stmt->get_result();

$comentarios = [];
while ($row = $result->fetch_assoc()) {
    $comentarios[] = $row;
}

echo json_encode(['success' => true, 'comentarios' => $comentarios]);
$conn->close();
?>

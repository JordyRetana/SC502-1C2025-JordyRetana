<?php
require_once('C:/xampp/htdocs/APP-TAREAS/config/database.php');
session_start();
header('Content-Type: application/json');

$usuario_id = $_SESSION['usuario_id'] ?? 0;

$conn = getDBConnection();
$stmt = $conn->prepare("SELECT id, tarea, descripcion FROM tareas WHERE usuario_id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

$tareas = [];
while ($row = $result->fetch_assoc()) {
    $tareas[] = $row;
}
echo json_encode(['status' => 'success', 'tareas' => $tareas]);

$conn->close();
?>

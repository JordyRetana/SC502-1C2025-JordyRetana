<?php
require_once('C:/xampp/htdocs/APP-TAREAS/config/database.php');

$data = json_decode(file_get_contents('php://input'), true);
$nombre = $data['nombre'] ?? '';
$correo = $data['correo'] ?? '';
$contrasena = $data['contrasena'] ?? '';

$conn = getDBConnection();

$stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(['status' => 'error', 'message' => 'El correo ya está registrado']);
    exit;
}
$stmt->close();


$hash = password_hash($contrasena, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $correo, $hash);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Usuario registrado']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error al registrar']);
}

$conn->close();
?>

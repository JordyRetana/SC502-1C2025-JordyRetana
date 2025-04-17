<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('C:/xampp/htdocs/APP-TAREAS/config/database.php');

$data = json_decode(file_get_contents('php://input'), true);
$correo = $data['correo'] ?? '';
$contrasena = $data['contrasena'] ?? '';

$conn = getDBConnection();

if (!$conn) {
    echo json_encode(['status' => 'error', 'message' => 'Error de conexión a la base de datos']);
    exit;
}

$stmt = $conn->prepare("SELECT id, nombre, contrasena FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($contrasena, $row['contrasena'])) {
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario_nombre'] = $row['nombre'];

        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Contraseña incorrecta']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Usuario no encontrado']);
}

$conn->close();
?>

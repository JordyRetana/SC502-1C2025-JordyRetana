<?php
session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require_once '../config/db.php';

$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case 'GET':
        $taskId = $_GET['taskId'] ?? null;

        if ($taskId) {
            $stmt = $conn->prepare("SELECT id, taskId, description, create_at FROM comments WHERE taskId = ?");
            $stmt->bind_param("i", $taskId);
            $stmt->execute();
            $result = $stmt->get_result();
            $comments = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($comments);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'ID de tarea no proporcionado']);
        }
        break;

    case 'POST':
        $taskId = $data['taskId'] ?? null;
        $content = $data['content'] ?? '';

        if ($taskId && $content) {
            $stmt = $conn->prepare("INSERT INTO comments (taskId, description, create_at) VALUES (?, ?, NOW())");
            $stmt->bind_param("is", $taskId, $content);
            $stmt->execute();
            echo json_encode(['success' => true, 'comment_id' => $stmt->insert_id]);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Datos incompletos']);
        }
        break;

    case 'DELETE':
        $commentId = $data['id'] ?? null;

        if ($commentId) {
            $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
            $stmt->bind_param("i", $commentId);
            $stmt->execute();
            echo json_encode(['success' => true]);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'ID de comentario no proporcionado']);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Método no permitido']);
        break;
}

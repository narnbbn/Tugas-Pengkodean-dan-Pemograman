<?php
header('Content-Type: application/json');
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['id'] ?? 0;

    if ($id <= 0) {
        echo json_encode(['error' => 'ID tidak valid']);
        http_response_code(400);
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Produk berhasil dihapus']);
    } else {
        echo json_encode(['error' => 'Gagal menghapus produk']);
        http_response_code(500);
    }

    $stmt->close();
}

$conn->close();
?>
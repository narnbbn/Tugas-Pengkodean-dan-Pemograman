<?php
header('Content-Type: application/json');
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $quantity = $_POST['quantity'] ?? 0;
    $price = $_POST['price'] ?? 0;

    if (empty($name) || $quantity <= 0 || $price <= 0) {
        echo json_encode(['error' => 'Semua field harus diisi dengan benar']);
        http_response_code(400);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO products (name, quantity, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $name, $quantity, $price);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Produk berhasil ditambahkan']);
    } else {
        echo json_encode(['error' => 'Gagal menambahkan produk']);
        http_response_code(500);
    }

    $stmt->close();
}

$conn->close();
?>
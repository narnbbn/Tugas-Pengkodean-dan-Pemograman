<?php
header('Content-Type: application/json');
include 'koneksi.php';

$result = $conn->query("SELECT * FROM products");

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode($products);

$conn->close();
?>
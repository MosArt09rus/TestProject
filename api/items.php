<?php
require '../db/db.php';

header('Content-Type: application/json');

$name = isset($_GET['name']) ? $_GET['name'] : '';

$query = "SELECT * FROM products WHERE name LIKE :name";
$stmt = $pdo->prepare($query);
$stmt->execute(['name' => "%$name%"]);
$items = $stmt->fetchAll();

echo json_encode(['items' => $items]);
?>

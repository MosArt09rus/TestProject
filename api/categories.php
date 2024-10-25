<?php
require '../db/db.php';

header('Content-Type: application/json');

$name = isset($_GET['name']) ? $_GET['name'] : '';

$query = "SELECT * FROM categories WHERE name LIKE :name";
$stmt = $pdo->prepare($query);
$stmt->execute(['name' => "%$name%"]);
$categories = $stmt->fetchAll();

echo json_encode(['categories' => $categories]);
?>

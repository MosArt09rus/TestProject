<?php
session_start();
require '../db/db.php';
include 'menu.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../public/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $login = $_POST['login'];
    $role = $_POST['role'];
    $password = $_POST['password']; 

    // Проверяем, заполнено ли поле пароля
    if (!empty($password)) {
        $password = md5($password); // Хешируем пароль только если оно не пустое
        $stmt = $pdo->prepare("UPDATE users SET login = ?, userrole = ?, password = ? WHERE id = ?");
        $stmt->execute([$login, $role, $password, $id]);
    } else {
        // Если поле пароля пустое, обновляем только login и userrole
        $stmt = $pdo->prepare("UPDATE users SET login = ?, userrole = ? WHERE id = ?");
        $stmt->execute([$login, $role, $id]);
    }

    header('Location: users.php');
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();
include '../../frontend/admin/edit_user_form.php';
?>
<?php
include_once dirname(__FILE__) . '/../DB/database.php';
session_start();

if (isset($_SESSION['current_user'])) {
    header('Location: http://localhost:8000/untitled/index.php');
    exit;
}
$servername = "localhost";
$username = "user";
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['conferma_password'];
$dbname = "ecommerce";
try {
    $database = new \DB\Database("localhost", "3307", "user", "123");
    $pdo = $database->connect("ecommerce");
    if ($password != $confirm_password) {
        header('Location: http://localhost:8000/views/register.php?error=password_mismatch');
        exit;
    }

    $hashed_password = hash('sha256', $password);

    $stmt = $pdo->prepare("INSERT INTO ecommerce.users (email, password, role_id) VALUES (:email, :password, :role_id)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':role_id', $role_id);
    $stmt->execute();

    header('Location: http://localhost:8000/views/login.php');
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;





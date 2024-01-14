<?php
session_start();

if (isset($_SESSION['current_user'])) {
    header('Location: http://localhost:63342/untitled/index.php');
    exit;
}
$servername = "localhost";
$username = "user";
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$role_id = $_POST['role_id'];
$dbname = "ecommerce";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($password != $confirm_password) {
        header('Location: http://localhost:63342/views/register.php?error=password_mismatch');
        exit;
    }

    $hashed_password = hash('sha256', $password);

    $stmt = $conn->prepare("INSERT INTO ecommerce.user (email, password, role_id) VALUES (:email, :password, :role_id)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':role_id', $role_id);
    $stmt->execute();

    header('Location: http://localhost:63342/views/login.php');
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;





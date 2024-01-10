<?php
$servername = "localhost";
$username = "user";
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$dbname = "ecommerce";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($password != $confirm_password) {
    header('Location: http://localhost:63342/views/register.php?error=password_mismatch');
    exit;
}

$hashed_password = hash('sha256', $password);

$stmt = $conn->prepare("INSERT INTO ecommerce.user (email, password) VALUES (:email, :password)");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $hashed_password);
$stmt->execute();

header('Location: http://localhost:63342/views/login.php');
exit;




<?php
use models\session;
require_once "../models/user.php";
$current_user = $_SESSION;
if ($current_user->getRole_id() == 2){
    header('Location: http://localhost:8000/views/admin/admin.php');
}


$servername = "localhost";
$username = "user";
$email = $_POST['email'];
$password = $_POST['password'];
$dbname = "ecommerce";


    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    session_start();

    if (!isset($_SESSION['current_user'])) {
        header('Location: http://localhost:8000/views/login.php');
        exit;
    }
    $user = $_SESSION['current_user'];
    $stmt = $conn->prepare("SELECT * FROM cart WHERE id = :user_id");
    $stmt->bindParam(':user_id', $user->user_id);
    $stmt->execute();
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cart) {
        $stmt = $conn->prepare("INSERT INTO cart (id) VALUES (:user_id)");
        $stmt->bindParam(':user_id', $user->user_id);
        $stmt->execute();
    }

    $params = array("ip" => $_SERVER["REMOTE_ADDR"], "user_id" => $user->user_id);
    session::Create($params);
    $_SESSION['current_user'] = $user;
    header('Location: http://localhost:8000/views/products/index.php');
    exit;










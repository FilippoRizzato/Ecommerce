<?php

$servername = "localhost";
$username = "user";
$email = $_POST['email'];
$password = $_POST['password'];
$dbname = "ecommerce";


    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = $_POST['email'];
    $password = hash('sha256', $_POST["password"]);

    $stmt = $conn->prepare("SELECT email, role_id FROM ecommerce.user WHERE email = :email AND password_utente = :password_utente");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
$current_user = $stmt->fetchObject("\models\user");
    $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');

if ($current_user) {

    session_start();
    $params=array("ip" => $_SERVER["REMOTE_ADDR"], "user_id" => $current_user->getId());
    \models\session::Create($params);
    $_SESSION['current_user'] = $current_user;
    header('Location: http://localhost:63342/views/products/index.php');
    exit;
} else {
    header('Location: http://localhost:63342/views/login.php');
    exit;
}





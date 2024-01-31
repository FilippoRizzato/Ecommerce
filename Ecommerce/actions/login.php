<?php

use models\session;
use models\user;

include_once dirname(__FILE__) . '/../DB/database.php';
include_once dirname(__FILE__) . '/../models/user.php';
include_once dirname(__FILE__) . '/../models/session.php';
//session_start();

/*if (isset($_SESSION['current_user'])) {
    header('Location: http://localhost:8000/views/index.php');
    exit;
}*/

$servername = "localhost";
$username = "user";
$email = $_POST['email'];
$password = $_POST['password'];
$dbname = "ecommerce";
try {

    $username = $_POST['email'];
    $password = hash('sha256', $_POST["password"]);
    $current_user = user::Find($email, $password);
    //$users = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');

    if ($current_user) {

        session_start();
        $params = array("ip" => $_SERVER["REMOTE_ADDR"], "user_id" => $current_user->getId());
        session::Create($params);
        $_SESSION['current_user'] = $current_user;
        header('Location: http://localhost:8000/views/index.php');
        exit;
    } else {
        header('Location: http://localhost:8000/views/login.php');
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;





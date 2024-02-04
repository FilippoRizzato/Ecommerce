<?php

use models\session;
use models\user;

include_once dirname(__FILE__) . '/../DB/database.php';
include_once dirname(__FILE__) . '/../models/user.php';
include_once dirname(__FILE__) . '/../models/session.php';


$email = $_POST['email'];
$password = $_POST['password'];
try {

    $password = hash('sha256', $_POST["password"]);
    $current_user = user::find($email, $password);
    if ($current_user && $current_user->getRole_id() == 1) {
        session_start();
        $ip = $_SERVER["REMOTE_ADDR"];
        $user_id = $current_user->getId();
        session::create($ip, $user_id);
        $_SESSION['current_user'] = $current_user;
        header('Location: http://localhost:8000/views/index.php');
        exit;
    } else if ($current_user && $current_user->getRole_id() == 2) {
        session_start();
        $ip = $_SERVER["REMOTE_ADDR"];
        $user_id = $current_user->getId();
        session::create($ip, $user_id);
        $_SESSION['current_user'] = $current_user;
        header('Location: http://localhost:8000/views/admin/admin.php');
        exit;
    } else {
        header('Location: http://localhost:8000/views/login.php');
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;





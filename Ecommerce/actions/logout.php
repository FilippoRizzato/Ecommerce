<?php
session_start();
session_destroy();
header("Location: http://localhost:8000/views/login.php");
exit();
?>

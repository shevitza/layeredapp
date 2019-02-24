<?php
session_start();
require_once 'config/constant.php';
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];


    if ($user == 'EDITOR' && (password_verify($pass, '$2y$09$0OB89TPHZJHK5HLTVLMY8Ob.VE.H/QksDdGSRYZpJ97N1flxV7w9K'))) {
        $_SESSION['editor'] = 1;
        header('Location:' . URL . '/all.php');
    } else {
        header('Location:' . URL . '/login.php');
    }
}

	
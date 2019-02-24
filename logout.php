<?php
session_start();
$_SESSION['editor']='';
session_destroy();
require_once 'config/constant.php';
header('Location:'.URL.'/login.php');

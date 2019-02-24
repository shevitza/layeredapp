<?php
session_start();
require_once 'config/constant.php';
if (!isset($_SESSION['editor']) || ($_SESSION['editor'] != 1)) {
		header('Location:'.URL.'/login.php');
}
require_once 'app.php';
$s = new \service\PostService($db);
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=1;
}
$c=$s->readPost($id);
$data['c']=$c;
$app->load_view('edit_post_view', $data);
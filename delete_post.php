<?php
session_start();
if (!isset($_SESSION['editor']) || ($_SESSION['editor'] != 1)) {
	header('Location:'.URL.'/login.php');
}
require_once 'app.php';
$s = new \service\PostService($db);
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	header('Location:'.URL.'/all.php');
}
$result=$s->deletepost($id);
foreach ($result as $key => $value) {
		if ($result[$key]['success'] == '1') {			
			$_SESSION['msg_post'] = "The new post was successfully deleted!";
		} else {
			$_SESSION['msg_post'] = "There is some error with deleting of this  post!";
		}
	}
header('Location:'.URL.'/all.php');

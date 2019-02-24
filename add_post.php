<?php
session_start();
if (!isset($_SESSION['editor']) || ($_SESSION['editor'] != 1)) {
	header('Location:'.URL.'/login.php');
}

if(isset($_POST['title'])){
	$title= addslashes($_POST['title']);	
}
if(isset($_POST['author'])){
	$author=addslashes($_POST['author']);	
}
if(isset($_POST['content'])){
	$content=addslashes($_POST['content']);	
}

require_once 'app.php';
$s = new \service\PostService($db);
$result=$s->createPost($title, $author, $content);

foreach ($result as $key => $value) {
		if ($result[$key]['success'] == '1') {			
			$_SESSION['msg_post'] = "The new post was successfully added!";
		} else {
			$_SESSION['msg_post'] = "There is some error with adding this  post!";
		}
	}
	header('Location:'.URL.'/all.php');
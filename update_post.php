<?php
session_start();
if (!isset($_SESSION['editor']) || ($_SESSION['editor'] != 1)) {
		header('Location:'.URL.'/login.php');
}
require_once 'app.php';
$s = new \service\PostService($db);
echo $_GET['id'];
if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	echo 'No id';
		header('Location:'.URL.'/all.php');
}

$possubleUpdate = true;
if (isset($_FILES['img'])) {

	$file = $_FILES['img'];

	$fileName = $_FILES['img']['name'];
	$fileSize = $_FILES['img']['size'];
	$fileTmpName = $_FILES['img']['tmp_name'];
	$fileError = $_FILES['img']['error'];
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg', 'jpeg', 'png');
	if (in_array($fileActualExt, $allowed)) {
		echo 'The file extension is a picture';
		if ($fileError === 0) {
			if ($fileSize < 2000000) {
				$fileNameNew = uniqid('', true) . '.' . $fileActualExt;				
				$fileDestination = 'img/' . $fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
			} else {
				echo 'The file size must be lower than 2MB';
				$possubleUpdate = false;
			}
		} else {
			echo 'There was an error uploadind your file';
			$possubleUpdate = false;
		}
	} else {
		echo 'You cannot upload file of this type!';
		$possubleUpdate = false;
	}
}
if ($possubleUpdate) {
	$result = $s->updatePost($id, $fileDestination);
} else {
	$result = $s->updatePost($id);
}
foreach ($result as $key => $value) {
		if ($result[$key]['success'] == '1') {			
			$_SESSION['msg_post'] = "The post was successfully updated!";
		} else {
			$_SESSION['msg_post'] = "There is some error with updating of this  post!";
		}
	}
	header('Location:'.URL.'/all.php');


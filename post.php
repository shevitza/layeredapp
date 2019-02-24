<?php
require_once 'app.php';
$s = new \service\PostService($db);
$list = new \service\ListService($db);

$arr = $list->getID();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	if(!in_array($id, $arr)){
		header('Location:'.URL.'/index.php');
	}
} elseif(count($arr)!=0) {
	$id = $arr[0];
}else{
	header('Location:'.URL.'/index.php');
}
$c = $s->readPost($id);
$data['c'] = $c;

$len = count($arr);
if ($len < 3) {
	$data['prev'] = -1;
	$data['next'] = -1;
	//don't show navigation buttons!
} elseif ($id == $arr[0]) {
	$data['prev'] = $arr[$len - 1];
	$data['next']  = $arr[1];
} elseif ($id == $arr[$len - 1]) {
	$data['prev'] = $arr[$len - 2];
	$data['next'] = $arr[0];
} else {
	for ($i = 1; $i < $len - 1; $i++) {
		if ($arr[$i] == $id) {
			$data['prev'] = $arr[$i - 1];
			$data['next'] = $arr[$i + 1];
			break;
		}
	}
}
$app->load_view('post_view', $data);

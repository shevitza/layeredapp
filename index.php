<?php
require_once 'app.php';$list = new \service\ListService($db);
$data['list'] = $list->getTitles();
$arr = $list->getID();
$len = count($arr);

if ($len < 3) {
	$data['prev'] = -1;
	$data['next'] = -1;
	//don't show navigation buttons!
} else {
	$data['prev'] = $arr[$len - 2];
	$data['next'] = $arr[1];
}
$s = new \service\PostService($db);
$c = $s->readLastPost();
$data['c']=$c;
$app->load_view('post_view', $data);


//require_once 'app.php';
//$list = new \service\ListService($db);
//$s = new \service\PostService($db);
//$c = $s->readLastPost();
//$data['list']=$list;
//$data['c']=$c;
//$app->load_view('index_view', $data);	
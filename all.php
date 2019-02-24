<?php
session_start();
require_once 'app.php';
require_once 'config/constant.php';

if (!isset($_SESSION['editor']) || ($_SESSION['editor'] != 1)) {
    header('Location:' . URL . '/login.php');
} else {
    $list = new \service\ListService($db);
    $data['list'] = $list->getTitles();
    $app->load_view('all_view', $data);
}



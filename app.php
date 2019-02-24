<?php

require_once 'config/constant.php';
        spl_autoload_register(function ($class_name){
            include $class_name.'.php';
        });

$db = new \config\Database();
$app = new \core\Application();
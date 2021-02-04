<?php
include_once 'config/routing.php';
include_once 'controler/controler.php';
include_once 'controler/mainControler.php';
include_once 'view/view.php';

$request = $_SERVER['REQUEST_URI'];
$page = new mainControler($request);

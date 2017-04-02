<?php

require_once __DIR__ . '/protected/autoload.php';


$url = $_SERVER['REQUEST_URI'];
$url = substr($url, 1, strlen($url));
$url = explode('/', $url);

$controller = new \App\Controllers\Front();

$controller->action($url);
<?php

require_once __DIR__ . '/protected/autoload.php';


$url = $_SERVER['REQUEST_URI'];
$url = substr($url, 1, strlen($url));
$url = explode('/', $url);

$controller = new \App\Controllers\Front();
try {
    $controller->action($url);
} catch (Throwable $e){
    $logger = \App\Logger::instance();
    $logger->log('Unknown error', 'Uncatched error: ' . $e->getMessage(), ['place' => $e->getFile() . ' line ' . $e->getLine()]);
} finally {
    $controller = new \App\Controllers\Error();
    $controller ->action404();
}
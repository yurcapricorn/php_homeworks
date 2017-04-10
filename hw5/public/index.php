<?php

require_once __DIR__ . '/../protected/autoload.php';


$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);
if (!empty($parts[1])) {
    $controllerName = $parts[1];
} else {
    $controllerName = 'Index';
}
$controllerClassName = '\\App\\Controllers\\' . $controllerName;
$controller = new $controllerClassName;

try {
    if (!empty($parts[2])) {
        $controller->action($parts[2]);
    } else {
        $controller->action('Default');
    }
} catch (\App\DbException $e) {
    $logger = \App\Logger::instance();
    $logger->log('Db error', 'PDO Exception: ' . $e->getMessage(), ['place' => $e->getFile() . ' line ' . $e->getLine()]);
    $controller = new \App\Controllers\Error();
    $controller->action('Db');
} catch (\App\NoPageException $e) {
    $this->logger->log('404', $e->getMessage(), ['place' => $e->getFile() . ' line ' . $e->getLine()]);
    $controller = new \App\Controllers\Error();
    $controller->action404();
} catch (Throwable $e) {
    $logger = \App\Logger::instance();
    $logger->log('Unknown error', 'Uncatched error: ' . $e->getMessage(), ['place' => $e->getFile() . ' line ' . $e->getLine()]);
    $controller = new \App\Controllers\Error();
    $controller->action404();
} finally {
    die();
}
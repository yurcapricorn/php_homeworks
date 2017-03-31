<?php

require_once __DIR__ . '/protected/autoload.php';

$controller = new \App\Controllers\News();
$controller->actionIndex();
<?php

require_once __DIR__ . '/../protected/autoload.php';

$view = new App\View();
$view->articles = \App\Models\Article::findAll();
$view->display(__DIR__ . '/templates/index.php');
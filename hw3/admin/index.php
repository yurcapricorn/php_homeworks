<?php

require_once __DIR__ . '/../protected/autoload.php';

$view = new App\View();
$template = __DIR__ . '/templates/admin.html';
$view->articles = \App\Models\Article::findAll();
$view->display($template);
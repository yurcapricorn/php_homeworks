<?php

require_once __DIR__ . '/protected/autoload.php';

$view = new App\View();
$view->articles = \App\Models\Article::findLastEntries();
$view->display(__DIR__ . '/news/templates/index.php');
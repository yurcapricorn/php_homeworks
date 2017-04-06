<?php

require_once __DIR__ . '/protected/autoload.php';

$view = new App\View();

$view->articles = \App\Models\Article::findLastEntries();

$template = __DIR__ . '/news/index.html';

$view->display($template);
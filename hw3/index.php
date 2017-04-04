<?php

require_once __DIR__ . '/protected/autoload.php';

$data = \App\Models\Article::findLastEntries();

$view = new App\View($data);

$template = __DIR__ . '/news/index.html';

$view->display($template);

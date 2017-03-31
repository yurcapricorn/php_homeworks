<?php

require_once __DIR__ . '/protected/autoload.php';

$data = \App\Models\Article::findLastEntries();

$view = new App\View($data);

$template = __DIR__ . '/article/templates/index.html';

$view->display($template);

$template = __DIR__ . '/admin/templates/admin.html';

$view->display($template);
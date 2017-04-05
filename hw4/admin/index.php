<?php

require_once __DIR__ . '/../protected/autoload.php';

$view = new App\View();

$template = __DIR__ . '/templates/index.html';

$view->display($template);
<?php

require_once __DIR__ . '/protected/autoload.php';

$data = \App\Models\Article::findLastEntries();

if(empty($data) || $data === false){
//    $error = 'no articles';
} else {
    $view = new App\View($data);

    $template = __DIR__ . '/news/index.html';

    $view->display($template);
}



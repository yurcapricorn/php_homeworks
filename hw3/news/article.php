<?php

require_once __DIR__ . '/../protected/App/Models/Article.php';

$view = new \App\View();
$view->article = App\Models\Article::findById($_GET['id']);
$template = __DIR__ . '/article.html';
$view->display($template);
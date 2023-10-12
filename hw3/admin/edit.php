<?php

require_once __DIR__ . '/../protected/App/Models/Article.php';

$view = new \App\View();
$view->article = \App\Models\Article::findById((int)$_GET['id']);
$view->display(__DIR__ . '/templates/edit.php');
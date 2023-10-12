<?php

require_once __DIR__ . '/../protected/autoload.php';

$view = new \App\View();
$view->article = App\Models\Article::findById($_GET['id']);
$view->display(__DIR__ . '/templates/one.php');
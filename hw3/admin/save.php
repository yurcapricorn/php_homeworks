<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';

if(empty($_GET)) {
    $article = new \App\Models\Article();
} else {
    $article = \App\Models\Article::findById((int)$_GET['id']);
}
$article->fill($_POST)->save();
header('Location: /admin/index.php');
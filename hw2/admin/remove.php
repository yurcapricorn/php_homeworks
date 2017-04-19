<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';

if (!empty($_POST['id'])) {
    $article = \App\Models\Article::findById($_POST['id']);
    if (!empty($article)) {
        $article->delete();
    }
}
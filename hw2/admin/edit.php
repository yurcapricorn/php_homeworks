<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';

if (!empty($_POST['id'])) {
    $article = \App\Models\Article::findById($_POST['id']);
    if (($article !== false)) {
        if (!empty($_POST['title']) || !empty($_POST['lead'])) {
            if (!empty($_POST['title'])) {
                $article->title = $_POST['title'];
            }
            if (!empty($_POST['lead'])) {
                $article->lead = $_POST['lead'];
            }
            $article->save();
        }
    }
}
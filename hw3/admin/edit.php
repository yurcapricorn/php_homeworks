<?php

require_once __DIR__ . '/../protected/autoload.php';

if (!empty($_POST['id'])) {
    $article = \App\Models\Article::findById($_POST['id']);
    if (!empty($article)) {
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
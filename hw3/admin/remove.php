<?php

require_once __DIR__ . '/../protected/autoload.php';

if (!empty($_POST['id'])) {
    $article = \App\Models\Article::findById($_POST['id']);
    if (!empty($article)) {
        $article->delete();
    }
}
<?php

require_once __DIR__ . '/../protected/App/Models/Article.php';

if (empty($_GET['id'])) {
//    $error = 'incorrect request';
} else {
    $article = App\Models\Article::findById($_GET['id']);
    if (false === $article) {
//        $error = 'Article not found';
    } else {
        include __DIR__ . '/article.html';
    }
}
<?php

require_once __DIR__ . '/Models/Article.php';

if (empty($_GET['id'])) {
//    $error = 'incorrect request';
} else {
    $id = $_GET['id'];
    $article = \Models\Article::findById($id);
    if (false === $article) {
//        $error = 'Article not found';
    } else {
        include __DIR__ . '/templates/article.html';
    }
}



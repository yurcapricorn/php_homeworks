<?php

require_once __DIR__ . '/../protected/App/Models/Article.php';

if (!empty($_GET['id'])) {
    $article = App\Models\Article::findById($_GET['id']);
    if (false !== $article) {
        include __DIR__ . '/article.html';
    }
}
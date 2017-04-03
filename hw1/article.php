<?php

include_once __DIR__ . '/Models/Article.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $error = 'incorrect request';
    file_put_contents(__DIR__ . '/../errors.php', $error);
}
$article = \Models\Article::findById($id);
if (false === $article || empty($article)) {
    $error = 'Article ' . $id . ' not found';
    file_put_contents(__DIR__ . '/errors.php', $error);
}

include __DIR__ . '/templates/article.html';
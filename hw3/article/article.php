<?php

require_once __DIR__ . '/../protected/autoload.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $error = 'incorrect request' . '<br><br>';
    file_put_contents(__DIR__ . '/../errors.php', $error);
}
$article = App\Models\Article::findById($id);
if (false === $article || empty($article)) {
    $error = 'Article ' . $id . ' not found' . '<br><br>';
    file_put_contents(__DIR__ . '/../errors.php', $error);
}

include __DIR__ . '/templates/article.html';
<?php

require_once __DIR__ . '/../../autoload.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo 'incorrect request' . '<br><br>';
    include_once __DIR__ . '/../../../index.php';
    die();
}
$article = App\Models\Article::findById($id);
if (false === $article | empty($article)) {
    echo 'Article ' . $id . ' not found' . '<br><br>';
    include_once __DIR__ . '/../../../index.php';
    die();
}

include __DIR__ . '/templates/article.html';
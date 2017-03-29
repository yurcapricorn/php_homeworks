<?php

require_once __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo 'incorrect request' . '<br><br>';
    include_once __DIR__ . '/../index.php';
    die();
}
$data = App\Models\Article::findById($id);
if (false === $data | empty($data)) {
    echo 'Article ' . $id . ' not found' . '<br><br>';
    include_once __DIR__ . '/../index.php';
    die();
}

include __DIR__ . '/templates/article.html';
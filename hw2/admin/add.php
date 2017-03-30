<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';


$error = [];

$article = new App\Models\Article;

if (isset($_POST['title'])) {
    $article->title = $_POST['title'];
}
if (isset($_POST['lead'])) {
    $article->lead = $_POST['lead'];
}
if (!isset($article->title) && !isset($article->lead)) {
    $error[] = 'empty data';
} else {
    $res = $article->save();
    if ($res !== true) {
        $error[] = 'something went wrong';
    }
}

file_put_contents(__DIR__ . '/../errors.php', $error);

header("Location: /index.php");
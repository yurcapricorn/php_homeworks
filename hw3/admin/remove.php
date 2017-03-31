<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';


$error = '';

if (!isset($_POST['id'])) {
    $error = 'no id specified';
} else {
    $id = $_POST['id'];
    $article = App\Models\Article::findById($id);
    if (empty($article) || $article === false) {
        $error = 'Article ' . $id . ' not found';
    } else {
        $res = $article->delete();
        if ($res !== true) {
            $error = 'something went wrong';
        }
    }
}

file_put_contents(__DIR__ . '/../errors.php', $error);

header('Location:' . __DIR__ . '/../../index.php');

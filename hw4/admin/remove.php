<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';

if (empty($_POST['id'])) {
//    $error = 'no id specified';
} else {
    $article = \App\Models\Article::findById($_POST['id']);
    if (($article === false) || empty($article)) {
//        $error = 'no such article';
    } else {
        $res = $article->delete();
        if ($res === false) {
//            $error = 'remove from db error';
        }
    }
}
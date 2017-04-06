<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';

if (empty($_POST['id'])) {
//    $error = 'no id specified';
} else {
    $article = new \App\Models\Article($_POST);
    $res = $article->save();
    if ($res === false) {
//    error = 'save to db error';
    }
}
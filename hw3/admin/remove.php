<?php

require_once __DIR__ . '/../protected/App/Models/Article.php';

if (empty($_POST['id'])) {
//    $error = 'no id specified';
} else {
    $article = new \App\Models\Article($_POST);
    $res = $article->delete();
    if ($res === false) {
//    $error = 'remove from db error';
    }
}
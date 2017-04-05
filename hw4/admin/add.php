<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';

$title = $_POST['title'];
$lead = $_POST['lead'];
if (empty($title) && empty($lead)) {
//    $error = 'no data to update';
} else {
    $article = new \App\Models\Article();
    if (!empty($title)) {
        $article->title = $title;
    }
    if (!empty($lead)) {
        $article->lead = $lead;
    }
    $res = $article->save();
    if ($res === false) {
//        $error = 'save to db error';
    }
}
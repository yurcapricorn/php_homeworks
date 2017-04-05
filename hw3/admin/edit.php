<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';

if (empty($_POST['id'])) {
    $error = 'no id specified';
} else {
    $article = \App\Models\Article::findById($_POST['id']);
    if (($article === false) || empty($article)) {
//        $error = 'no such article';
    } else {
        $title = $_POST['title'];
        $lead = $_POST['lead'];
        if (empty($title) && empty($lead)) {
//            $error = 'no data to update';
        } else {
            if (!empty($title)) {
                $article->title = $title;
            }
            if (!empty($lead)) {
                $article->lead = $lead;
            }
            $res = $article->save();
            if ($res === false) {
//                $error = 'save to db error';
            }
        }
    }
}
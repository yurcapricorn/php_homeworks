<?php

require_once __DIR__ . '/../protected/autoload.php';

if (!empty($_POST['lead']) || !empty($_POST['title'])) {
    $article = new \App\Models\Article();
    if (!empty($_POST['title'])) {
        $article->title = $_POST['title'];
    }
    if (!empty($_POST['lead'])) {
        $article->lead = $_POST['lead'];
    }
    $article->save();
}
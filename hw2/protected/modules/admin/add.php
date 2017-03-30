<?php

include_once __DIR__ . '/../../App/Models/Article.php';

use App\Models\Article;

if (isset($_GET['title'])) {
    $title = $_GET['title'];
}
if (isset($_GET['lead'])) {
    $lead = $_GET['lead'];
}
$article = new Article;
$article->title = $title;
$article->lead = $lead;
$res = $article->save();
if ($res === true) {
    echo 'Article ' . $article->id . ' added successfully';
} else {
    echo 'something went wrong';
}

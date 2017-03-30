<?php

include_once __DIR__ . '/../../App/Models/Article.php';

use App\Models\Article;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo 'no id specified';
}
if (isset($_GET['title'])) {
    $title = $_GET['title'];
}
if (isset($_GET['lead'])) {
    $lead = $_GET['lead'];
}
$article = new Article;
$article->id = $id;
$article->title = $title;
$article->lead = $lead;
$res = $article->save();
if ($res === true) {
    echo 'Article ' . $id . ' edited successfully';
} else {
    echo 'something went wrong';
}

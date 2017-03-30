<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';

use App\Models\Article;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo 'no id specified';
}
$res = App\Models\Article::findById($id);
if (empty($res)) {
    echo 'Article ' . $id . ' not found';
    die();
}
$article = new Article;
$article->id = $id;
$res = $article->delete();
if ($res === true) {
    echo 'Article ' . $id . ' removed successfully';
} else {
    echo 'something went wrong';
}

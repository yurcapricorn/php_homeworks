<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';

$article = new \App\Models\Article();
$article->title = $_POST['title'];
$article->lead = $_POST['lead'];
$article->save();

header('Location: /admin/index.php');
<?php

require_once __DIR__ . '/../protected/App/Models/Article.php';

$article = \App\Models\Article::findById((int)$_POST['id']);
$article->title = $_POST['title'];
$article->lead = $_POST['lead'];
$article->save();

header('Location: /admin/index.php');
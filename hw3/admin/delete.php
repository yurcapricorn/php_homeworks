<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';

$article = \App\Models\Article::findById((int)$_GET['id']);
$article->delete();
header('Location: /admin/index.php');
<?php

include_once __DIR__ . '/../protected/App/Models/Article.php';

$article = new \App\Models\Article();
$article->fill($_POST)->save();
header('Location: /admin/index.php');
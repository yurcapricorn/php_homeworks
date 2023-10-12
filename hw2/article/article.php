<?php

require_once __DIR__ . '/../protected/App/Models/Article.php';

$article = App\Models\Article::findById((int)$_GET['id']);
include __DIR__ . '/article.html';
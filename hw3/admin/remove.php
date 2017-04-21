<?php

require_once __DIR__ . '/../protected/autoload.php';

if (!empty($_GET['id'])) {
    $article = \App\Models\Article::findById($_GET['id']);
    if (!empty($article)) {
        $article->delete();
    }
}
header('Location: /admin/index.php');
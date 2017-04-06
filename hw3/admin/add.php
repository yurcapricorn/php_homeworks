<?php

require_once __DIR__ . '/../protected/App/Models/Article.php';

$article = new \App\Models\Article($_POST);
$res = $article->save();
if ($res === false) {
//  $error = 'save to db error';
}
<?php
//include __DIR__ . '\App\Models\News.php';
include __DIR__ . '/autoload.php';

$id = htmlspecialchars($_GET["id"]);

\App\Models\News::displayOne($id);
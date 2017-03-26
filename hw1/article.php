<?php

include_once __DIR__ . '/Models/Article.php';

$id=1;
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
else{echo 'incorrect request';}
$data = \Models\Article::findById($id);
if(false===$data){echo 'Article ' . $id . ' not found'; die;}

include __DIR__ . '/templates/article.html';
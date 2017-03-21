<?php

include_once __DIR__ . '/../Article.php';

$id=1;
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
else{echo 'incorrect request';}
echo 'You are reading article ' . $id . '<br>' . '<br>';
$data = Article::findById($id);
if($data==false){echo 'Article' . $id . ' not found';}
foreach($data as $name=>$val) {
    if ($name == 'id') { continue; }
    echo $name . ' ';
    echo $val . '<br>' . '<br>';
}
?> <a href="/index.php">Main Page</a>


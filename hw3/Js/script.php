<?php

include __DIR__ . '/../autoload.php';

$size = \App\Models\News::dbElementCount();
$size=$size[0]['count'];
$size=intval($size);
$mas=[];

if (isset($_POST['btn'])&&isset($_POST['pg'])) {
    $btn = $_POST['btn'];
    $pg = $_POST['pg'];
    $pg=intval($pg);
    $n=0;
    switch ($btn) {
        case 'next':
            if ($pg>($size-20)){$n=0;}
            else{$n=$pg+20;}
            break;
        case 'prev':
            if ($pg==0||$pg<20){$n=$size-$pg;}
            else{$n=$pg-20;}
            break;
        default: {$n=(intval($btn))*20-19; break;}
    }
    $news=getnews($n);
    $news[20]=$size;
    echo json_encode($news);
}

else if(isset($_POST['id'])){
    $id=$_POST['id'];

    $m=\App\Models\News::findById($id);
    if(isset($m[0])) {
        $mas[] = $m[0];
    }
    echo json_encode($mas);
}
else if(isset($_POST['article'])&&isset($_POST['action'])){
    $mas=$_POST['article'];
    $action=($_POST['action']);
    $article=new \App\Models\Article($mas);
    if($action=='remove'){$article->delete();}
    else if($action=='edit'||$action=='add'){$article->save();}
    $res='article ' . $article->id .' '. $action .'ed';
    echo json_encode($res);
}

function getnews($n){
    for($i=$n;$i<=($n+20);$i++) {
        $m = \App\Models\News::findById($i);
        if(isset($m[0])) {
            $mas[] = $m[0];
            }
        }
    return $mas;
}

<?php

namespace App\Templates;

foreach($data as $article){
    foreach($article as $key=>$value) {
        if ($key=='id'){
            $id=$value;
        }
        if ($key=='author'||$key=='header') {
            echo '<pre>';
            echo $value;
            echo '</pre>';
        }
       //header('Location: article.php?id=' . $id);
    }
    echo '<a href=' . 'article.php?id=' . $id . '>Read the article</a>';
}
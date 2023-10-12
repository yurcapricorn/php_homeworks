<?php

use yii\helpers\Html;
?>

<style>
    pre {width:99%;border:#a0a0c0 1px solid;background:#e8faff;color:black;margin:10px 0 10px 10px;padding:10px;
        font-size: 18px;
        white-space: pre-wrap;
        white-space: -moz-pre-wrap;
        white-space: -o-pre-wrap;
        word-wrap: break-word;
    }
</style>

<h3 class="entry-title"> <?= Html::a( $article->author->name, ['get-articles-by-author?name=' . $article->author->name] )?>
    \
<?= Html::a( $article->category->title, ['get-articles-by-category?title=' . $article->category->title] )?>
</h3>
<div align="center">

    <a href="<?= $article->getImage(); ?>"> <img src="<?= $article->getImage(); ?>" width="100%"> </a>
</div>
<div>
    <pre>
        <?= $article->content ?>
    </pre>
</div>


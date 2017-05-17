<?php

use yii\helpers\Html;
?>
<h3 class="entry-title"> <?= Html::a( $article->author->name, ['get-articles-by-author?name=' . $article->author->name] )?>
    \
<?= Html::a( $article->category->title, ['get-articles-by-category?title=' . $article->category->title] )?>
</h3>
<div align="center">

    <a href="<?= $article->getImage(); ?>"> <img src="<?= $article->getImage(); ?>" width="100%"> </a>
</div>
<div>
    <?= $article->content ?>
</div>


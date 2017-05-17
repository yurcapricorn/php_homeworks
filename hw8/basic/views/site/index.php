<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
?>

<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="body-content">

        <div align="center">
        <?= Html::a('ALL', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('GOF', ['get-articles-by-author?name=GOF'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('GRASP', ['get-articles-by-author?name=GRASP'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('SOLID', ['get-articles-by-author?name=SOLID'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Creational', ['get-articles-by-category?title=Creational'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Structural', ['get-articles-by-category?title=Structural'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Behavioral', ['get-articles-by-category?title=Behavioral'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Architectural', ['get-articles-by-category?title=Architectural'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="container">
            <?php
            $count = 1;
            foreach ($articles as $article):
            $count++;
            if ($count % 2 === 0) : ?>
                <div class="row">
            <?php ; endif ?>
            <div class="col-md-6" align="center">
                <header class="entry-header text-center text-uppercase">
                    <h4 class="entry-title"><a
                        href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"> <?= $article->title ?> </a>
                    </h4>
                </header>
                <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>">
                    <img src="<?= $article->getImage(); ?>" alt="" width="400"></a>
                <br>
                <a href="<?= Url::toRoute(['site/get-author', 'id' => $article->author->id]); ?>">
                    <?= 'By ' . $article->author->name; ?>
                </a>
            </div>
            <?php if ($count % 2 !== 0) : ?>
                </div>
            <?php endif ?>
    <?php endforeach; ?>
        </div>

        <?php
            echo LinkPager::widget([
                'pagination' => $pagination,
            ]);
        ?>
    </div>
</>

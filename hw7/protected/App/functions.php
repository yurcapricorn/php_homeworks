<?php

use App\Models\Article;

return [
    function (Article $article) {
        return $article->id;
    },
    function (Article $article) {
        return $article->title;
    },
    function (Article $article) {
        return $article->lead;
    },
    function (Article $article) {
        if ($article->author_id !== NULL) {
            return ($article->author->name . ' ' . $article->author->surname);
        }
    },
    function (Article $model) {
        return $model->updBtn();
    },
];
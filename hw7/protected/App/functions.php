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
        return '<a href="/Admin/Update/?id=' . $model->id . '"><button> UPDATE </button></a>';
    },
    function (Article $model) {
        return '<a href="/Admin/Delete/?id=' . $model->id . '"><button> DELETE </button></a>';
    },
];
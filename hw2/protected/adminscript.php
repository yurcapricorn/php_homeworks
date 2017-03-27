<?php

include_once __DIR__ . '/App/Models/Article.php';

use App\Models\Article;

if (isset($_GET['button'])) {
    $button = $_GET['button'];
    switch ($button) {
        case 'add': {
            if (isset($_GET['title'])) {
                $title = $_GET['title'];
            }
            if (isset($_GET['lead'])) {
                $lead = $_GET['lead'];
            }
            $article = new Article;
            $article->title = $title;
            $article->lead = $lead;
            $res = $article->save();
            if ($res===true) {
                echo 'Article ' . $article->id . ' added succesfully';
            } else {
                echo 'something went wrong';
            }
            break;
        }
        case 'edit': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            } else {
                echo 'no id specified';
            }
            if (isset($_GET['title'])) {
                $title = $_GET['title'];
            }
            if (isset($_GET['lead'])) {
                $lead = $_GET['lead'];
            }
            $article = new Article;
            $article->id = $id;
            $article->title = $title;
            $article->lead = $lead;
            $res = $article->save();
            if ($res===true) {
                echo 'Article ' . $id . ' edited succesfully';
            } else {
                echo 'something went wrong';
            }
            break;
        }
        case 'remove': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            } else {
                echo 'no id specified';
            }
            $article = new Article;
            $article->id = $id;
            $res = $article->delete();
            if ($res===true) {
                echo 'Article ' . $id . ' removed succesfully';
            } else {
                echo 'something went wrong';
            }
            break;
        }
    }
}

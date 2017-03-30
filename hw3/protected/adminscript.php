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
            if ($res === true) {
                echo 'Article ' . $article->id . ' added successfully';
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
            if ($res === true) {
                echo 'Article ' . $id . ' edited successfully';
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
            $res = App\Models\Article::findById($id);
            if (empty($res)) {
                echo 'Article ' . $id . ' not found';
                die();
            }
            $article = new Article;
            $article->id = $id;
            $res = $article->delete();
            if ($res === true) {
                echo 'Article ' . $id . ' removed successfully';
            } else {
                echo 'something went wrong';
            }
            break;
        }
    }
}

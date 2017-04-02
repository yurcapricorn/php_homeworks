<?php

namespace App\Controllers;

use App\Models\Article;

class Admin
{
    use Base;

    public function actionAdd()
    {
        $article = new Article();
        if (isset($_POST['title'])) {
            $article->title = $_POST['title'];
        }
        if (isset($_POST['lead'])) {
            $article->lead = $_POST['lead'];
        }
        if (!isset($article->title) && !isset($article->lead)) {
            $this->view->error = 'empty data';
        } else {
            $res = $article->save();
            if ($res !== true) {
                $this->view->error = 'something went wrong';
            }
        }
        header('Location:' . '/');
    }

    public function actionEdit()
    {
        if (!isset($_POST['id'])) {
            $this->view->error = 'no id specified';
        } else {
            $id = $_POST['id'];
            $article = Article::findById($id);
            if (empty($article) || $article === false) {
                $this->view->error = 'Article ' . $id . ' not found';
            } else {
                if (isset($_POST['title'])) {
                    $article->title = $_POST['title'];
                }
                if (isset($_POST['lead'])) {
                    $article->lead = $_POST['lead'];
                }
                $res = $article->save();
                if ($res !== true) {
                    $this->view->error = 'something went wrong';
                }
            }
        }
        header('Location:' . '/');
    }

    public function actionRemove()
    {
        if (!isset($_POST['id'])) {
            $this->view->error = 'no id specified';
        } else {
            $id = $_POST['id'];
            $article = Article::findById($id);
            if (empty($article) || $article === false) {
                $this->view->error = 'Article ' . $id . ' not found';
            } else {
                $res = $article->delete();
                if ($res !== true) {
                    $this->view->error = 'something went wrong';
                }
            }
        }
        header('Location:' . '/');
    }
}
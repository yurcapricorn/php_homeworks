<?php

namespace App\Controllers;

use App\Models\Article;

/**
 * Controller Admin
 * @method __construct()
 * @method action(array $url = [])
 * @method access($action)
 * @package App\Controllers
 */
class Admin
{
    use Base;

    /**
     * Adds article to Db
     */
    public function actionAdd()
    {
        $article = new Article();
        $res = $article->save($_POST);
        if ($res === false) {
            $this->view->error = 'something went wrong';
        }
        header('Location:' . '/');
    }

    /**
     * Edits article in Db
     */
    public function actionEdit()
    {
        $article = Article::findById($_POST['id']);
        if ($article === false) {
            $this->view->error = 'something went wrong';
        }
        $res = $article->save($_POST);
        if ($res === false) {
            $this->view->error = 'something went wrong';
        }
        header('Location:' . '/');
    }

    /**
     * Removes article from Db
     */
    public function actionRemove()
    {
        $article = Article::findById($_POST['id']);
        if (empty($article) || $article === false) {
            $this->view->error = 'Article ' . $_POST['id'] . ' not found';
        } else {
            $res = $article->delete();
            if ($res !== true) {
                $this->view->error = 'something went wrong';
            }
        }
        header('Location:' . '/');
    }
}
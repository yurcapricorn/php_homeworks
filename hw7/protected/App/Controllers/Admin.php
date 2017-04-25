<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;
use App\NoPageException;

/**
 * Controller Admin
 * @package App\Controllers
 */
class Admin extends Controller
{
    /**
     * default action
     */
    public function actionDefault()
    {
        $articles = Article::findAll();
        if (empty($articles)) {
            throw new NoPageException('no articles in database');
        }
        $this->view->articles = $articles;
        $this->view->display(__DIR__ . '/../../../templates/admin/default.html');
    }

    /**
     * saves object into Db
     */
    public function actionSave()
    {
        if (!empty($_GET['id'])) {
            $article = Article::findById((int)$_GET['id']);
            if (empty($article)) {
                throw new NoPageException('updating article not found');
            }
        } else {
            $article = new Article();
        }
        try {
            $article->fill($_POST);
            $article->save();
        } catch (\Exception $e) {
            throw new \Exception('something wrong with data save');
        }
        header('Location: /Admin/');
    }

    /**
     * update action
     */
    public function actionUpdate()
    {
        if (!empty($_GET['id'])) {
            $this->view->article = Article::findById((int)$_GET['id']);
            if (empty($this->view->article)) {
                throw new NoPageException('updating article not found');
            } else {
                $this->view->display($template = __DIR__ . '/../../../templates/admin/update.html');
            }
        }
    }

    /**
     * delete
     */
    public function actionDelete()
    {
        if (!empty($_GET['id'])) {
            $article = Article::findById($_GET['id']);
            if (empty($article)) {
                throw new NoPageException('removing article not found');
            }
            $article->delete();
        }
        header('Location: /Admin/');
    }

    /**
     * insert action
     */
    public function actionInsert()
    {
        $this->view->display(__DIR__ . '/../../../templates/admin/insert.html');
    }
}
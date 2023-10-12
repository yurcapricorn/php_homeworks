<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

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
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../../templates/admin/default.html');
    }

    /**
     * edit action
     */
    public function actionEdit()
    {
        $this->view->article = Article::findById((int)$_GET['id']);
        $this->view->display(__DIR__ . '/../../../templates/admin/edit.html');
    }

    /**
     * save action
     */
    public function actionSave()
    {
        if (!empty($_GET['id'])) {
            $article = Article::findById((int)$_GET['id']);
        } else {
            $article = new Article();
        }
        $article->fill($_POST)->save();
        header('Location: /Admin/');
    }
}
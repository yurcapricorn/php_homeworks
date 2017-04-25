<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;
use Yurcapricorn\Multiexception\App\MultiException;

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
     * saves object into Db
     */
    public function actionSave()
    {
        if (!empty($_GET['id'])) {
            $article = Article::findById((int)$_GET['id']);
        } else {
            $article = new Article();
        }
        try {
            $article->fill($_POST);
        } catch (MultiException $e) {
        }
        $article->save();
        header('Location: /Admin/');
    }

    /**
     * update action
     */
    public function actionUpdate()
    {
        if (!empty($_GET['id'])) {
            $this->view->article = Article::findById((int)$_GET['id']);
            $this->view->display($template = __DIR__ . '/../../../templates/admin/update.html');
        }
    }
}
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
     * displays main panel
     */
    public function actionDefault()
    {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../../templates/admin/index.php');
    }

    /**
     * Displays edit form with data
     */
    public function actionEdit()
    {
        $this->view->article = Article::findById((int)$_GET['id']);
        $this->view->display(__DIR__ . '/../../../templates/admin/edit.php');
    }

    /**
     * saves article into Database
     */
    public function actionSave()
    {
        if (empty($_GET)) {
            $article = new Article();
        } else {
            $article = Article::findById((int)$_GET['id']);
        }
        $article->fill($_POST)->save();
        header('Location: /Admin/');
    }
}
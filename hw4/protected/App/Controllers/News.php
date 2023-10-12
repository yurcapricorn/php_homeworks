<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

/**
 * Controller News
 * @package App\Controllers
 */
class News extends Controller
{
    /**
     * Default action all news
     */
    public function actionDefault()
    {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../../templates/news/index.php');
    }

    /**
     * one article
     */
    public function actionOne()
    {
        $this->view->article = Article::findById((int)$_GET['id']);
        $this->view->display(__DIR__ . '/../../../templates/news/one.php');
    }
}
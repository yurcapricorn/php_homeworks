<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;
use App\NoPageException;

/**
 * Controller News
 * @package App\Controllers
 */
class News extends Controller
{
    /**
     * all news
     * @throws NoPageException
     */
    public function actionDefault()
    {
        $this->view->articles = Article::findAll();
        $this->view->displayTwig(__DIR__ . '/../../../templates/news/default.html');
    }

    /**
     * one article
     * @throws NoPageException
     */
    public function actionOne()
    {
        $article = Article::findById((int)$_GET['id']);
        if (empty($article)) {
            throw new NoPageException('page ' . $_GET['id'] . ' not found');
        }
        $this->view->article = $article;
        $this->view->displayTwig(__DIR__ . '/../../../templates/news/one.html');
    }
}
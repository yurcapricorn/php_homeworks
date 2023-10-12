<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;
use App\NoPageException;

require_once __DIR__ . '/../../autoload.php';

/**
 * Controller News
 * @package App\Controllers
 */
class News extends Controller
{
    /**
     * @throws NoPageException
     */
    public function actionAll()
    {
        $this->view->articles = Article::findLastEntries();
        if (empty($this->view->articles)) {
            throw new NoPageException('no articles in database');
        }
        $template = __DIR__ . '/../../../templates/news/all.html';
        $this->view->display($template);
    }

    /**
     * @throws NoPageException
     */
    public function actionOne()
    {
        if (empty($_GET['id'])) {
            throw new NoPageException('No id specified');
        }
        $this->view->article = Article::findById($_GET['id']);
        if (empty($this->view->article)) {
            throw new NoPageException('page ' . $_GET['id'] . ' not found');
        }
        $template = __DIR__ . '/../../../templates/news/one.html';
        $this->view->display($template);
    }
}
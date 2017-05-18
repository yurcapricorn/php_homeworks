<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

/**
 * Controller Index
 * @package App\Controllers
 */
class Index extends Controller
{
    /**
     * Default
     */
    protected function actionDefault()
    {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../../templates/news/index.php');
    }

    /**
     * News Controller
     * @param $action
     */
    public function actionNews($action)
    {
        $news = new News();
        $news->action($action);
    }

    /**
     * Admin Controller
     * @param $action
     */
    public function actionAdmin($action)
    {
        $admin = new Admin();
        $admin->action($action);
    }
}
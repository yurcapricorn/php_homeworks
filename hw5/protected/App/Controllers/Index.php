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
        $this->view->display(__DIR__ . '/../../../templates/news/default.php');
    }

    /**
     * @param $action
     */
    public function actionNews($action)
    {
        $news = new News();
        $news->action($action);
    }

    /**
     * @param $action
     */
    public function actionAdmin($action)
    {
        $admin = new Admin();
        $admin->action($action);
    }

    /**
     * @param $action
     */
    public function actionError($action)
    {
        $error = new Error();
        $error->action($action);
    }
}
<?php

namespace App\Controllers;

use App\Controller;

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
       $news = new News();
       $news->actionAll();
    }

    /**
     * news controller
     * @param $action
     */
    public function actionNews($action)
    {
        $news = new News();
        $news->action($action);
    }

    /**
     * admin controller
     * @param $action
     */
    public function actionAdmin($action)
    {
        $admin = new Admin();
        $admin->action($action);
    }

    /**
     * error controller
     * @param $action
     */
    public function actionError($action)
    {
        $error = new Error();
        $error->action($action);
    }
}
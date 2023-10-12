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
     * Default action
     */
    protected function actionDefault()
    {
        $this->actionNews('Default');
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
<?php

namespace App\Controllers;


/**
 * Controller Front
 * @package App\Controllers
 */
class Front
{
    /**
     * @param array $url
     */
    public function action(array $url = [])
    {
        if (!empty($url[0])) {
            $action = array_shift($url);
        } else {
            $action = 'Default';
        }
        $method = 'action' . $action;
            $this->$method($url);
    }

    /**
     * @param $url
     */
    public function actionNews($url)
    {
        $news = new News();
        $news->action($url);
    }

    /**
     * @param $url
     */
    public function actionAdmin($url)
    {
        $admin = new Admin();
        $admin->action($url);
    }

    /**
     * Default Front controller method
     */
    public function actionDefault()
    {
        $news = new News();
        $news->actionAll();
    }
}
<?php

namespace App\Controllers;


use App\Controller;

/**
 * Class Error
 * @package App\Controllers
 */
class Error extends Controller
{
    /**
     * @param $error
     */
    public function actionDb($error)
    {
        $this->view->error = $error;
        $template = __DIR__ . '/../../../templates/errors/error.html';
        $this->view->display($template);
    }

    /**
     * @param $error
     */
    public function action404($error)
    {
        $this->view->error = $error;
        $template = __DIR__ . '/../../../templates/errors/404.html';
        $this->view->display($template);
    }
}
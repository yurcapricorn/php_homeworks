<?php

namespace App\Controllers;


use App\Controller;

class Error extends Controller
{
    public function actionDb($action = '')
    {
        $template = __DIR__ . '/../../../errors/error.html';
        $this->view->display($template);
    }

    public function action404($action = '')
    {
        $template = __DIR__ . '/../../../errors/404.html';
        $this->view->display($template);
    }
}
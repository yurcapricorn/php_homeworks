<?php

namespace App\Controllers;


use App\Controller;

class Error extends Controller
{
    public function actionDb($error)
    {
        $this->view->error = $error;
        $template = __DIR__ . '/../../../templates/errors/error.html';
        $this->view->display($template);
    }

    public function action404($error)
    {
        $this->view->error = $error;
        $template = __DIR__ . '/../../../templates/errors/404.html';
        $this->view->display($template);
    }
}
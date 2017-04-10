<?php

namespace App\Controllers;


use App\Controller;

class Error extends Controller
{
    public function actionDb()
    {
        $template = __DIR__ . '/../../../errors/error.html';
        $this->view->display($template);
    }

    public function action404()
    {
        $template = __DIR__ . '/../../../errors/404.html';
        $this->view->display($template);
    }
}
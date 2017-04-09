<?php

namespace App\Controllers;


class Error
{
    use Base;

    public function actionDb()
    {
//        $view = new View(['error' => $error, 'title' => 'error occured']);
        $template = __DIR__ . '/../../../errors/error.html';
        $this->view->display($template);
    }

    public function action404()
    {
//        $view = new View(['error' => $error, 'title' => '404 page not found']);
        $template = __DIR__ . '/../../../errors/404.html';
        $this->view->display($template);
    }
}
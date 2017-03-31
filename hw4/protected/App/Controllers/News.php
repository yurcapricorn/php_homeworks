<?php

namespace App\Controllers;

use App\View;

require_once __DIR__ . '/../../autoload.php';


class News
{
    protected $view;

    public function __construct()
    {
        $this->view= new View();
    }

    public function actionIndex(){

        $this->view->title = 'Hello';

        $this->view->news = \App\Models\Article::findLastEntries();

        $template = __DIR__ . '/../../../article/templates/index.html';

        $this->view->display($template);

        $template = __DIR__ . '/../../../admin/templates/admin.html';

        $this->view->display($template);

    }
}
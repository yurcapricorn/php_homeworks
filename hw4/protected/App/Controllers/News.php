<?php

namespace App\Controllers;

require_once __DIR__ . '/../../autoload.php';

/**
 * Controller News
 * @package App\Controllers
 */
class News
{
    use Base;

    /**
     * news main page
     */
    public function actionAll()
    {
        $this->view->articles = \App\Models\Article::findLastEntries();
        $template = __DIR__ . '/../../../news/all.html';
        $this->view->display($template);
    }

    /**
     * one article page
     * @param array $url = []
     */
    public function actionOne()
    {
        $this->view->article =\App\Models\Article::findById($_GET['id']);
        $template = __DIR__ . '/../../../news/one.html';
        $this->view->display($template);
    }
}

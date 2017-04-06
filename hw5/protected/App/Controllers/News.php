<?php

namespace App\Controllers;


require_once __DIR__ . '/../../autoload.php';

/**
 * Controller News
 * @method __construct()
 * @method action(array $url = [])
 * @method access($action)
 * @package App\Controllers
 */
class News
{
    use \App\Controllers\Base;

    /**
     * news main page
     */
    public function actionIndex()
    {
        $this->view->news = \App\Models\Article::findLastEntries();
        if (false === $this->view->news || empty($this->view->news)) {
            $this->view->error = 'News ' . ' not found';
        }
        $template = __DIR__ . '/../../../article/templates/index.html';
        $this->view->display($template);
        $template = __DIR__ . '/../../../admin/templates/admin.html';
        $this->view->display($template);
        return;
    }

    /**
     * one article page
     * @param array $url = []
     */
    public function actionArticle(array $url = [])
    {
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
        } else if (!empty($url)) {
            $id = (int)array_shift($url);
        } else {
            $this->view->error = 'incorrect request';
            $this->actionIndex();
            return;
        }
        $this->view->article = \App\Models\Article::findById($id);
        if (false === $this->view->article || empty($this->view->article)) {
            $this->view->error = 'Article ' . $id . ' not found';
            $this->actionIndex();
            return;
        } else {
            $template = __DIR__ . '/../../../article/templates/article.html';
            $this->view->display($template);
            return;
        }
    }
}

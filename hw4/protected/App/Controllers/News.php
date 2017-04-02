<?php

namespace App\Controllers;


require_once __DIR__ . '/../../autoload.php';


class News
{
    use \App\Controllers\Base;

    public function actionIndex()
    {
        $this->view->news = \App\Models\Article::findLastEntries();
        if (false === $this->view->news || empty($this->view->news)) {
            $this->view->error = 'News ' . ' not found';
            $this->actionNoNews();
            die;
        }
        $template = __DIR__ . '/../../../article/templates/index.html';
        $this->view->display($template);
        $template = __DIR__ . '/../../../admin/templates/admin.html';
        $this->view->display($template);
    }

    public function actionArticle(array $url = [])
    {
        $id=0;
        if (!empty($url)) {
            $id = (int)array_shift($url);
        } else if (!empty($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $this->view->error = 'incorrect request';
            $this->actionIndex();
            die;
        }
        $this->view->article = \App\Models\Article::findById($id);
        if (false === $this->view->article || empty($this->view->article)) {
            $this->view->error = 'Article ' . $id . ' not found';
            $this->actionIndex();
            die;
        } else {
            $this->view->title = 'Hello!';
            $template = __DIR__ . '/../../../article/templates/article.html';
            $this->view->display($template);
        }
    }


    public function actionNoNews()
    {
        $template = __DIR__ . '/../../../article/templates/nonews.html';
        $this->view->display($template);
    }
}

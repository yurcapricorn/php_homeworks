<?php

namespace App\Controllers;


require_once __DIR__ . '/../../autoload.php';

/**
 * Controller News
 * Создайте контроллеры для клиентских страниц новостей (действия "все новости", "одна новость")
 * @method __construct()
 * @method action(array $url = [])
 * @method access($action)
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
        $this->view->news = \App\Models\Article::findLastEntries();
        if (false === $this->view->news || empty($this->view->news)) {
            $this->view->error = 'No news found';
        } else {
            $template = __DIR__ . '/../../../news/index.html';
            $this->view->display($template);
            return;
        }
    }

    /**
     * one article page
     * @param array $url = []
     */
    public function actionOne()
    {
        if (!empty($_GET['id'])) {
            $id = (int)$_GET['id'];
        } else {
            $this->view->error = 'incorrect request';
            return;
        }
        $this->view->article = \App\Models\Article::findById($id);
        if (false === $this->view->article) {
            $this->view->error = 'Article not found';
            return;
        } else {
            $template = __DIR__ . '/../../../news/article.html';
            $this->view->display($template);
            return;
        }
    }
}

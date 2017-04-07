<?php

namespace App\Controllers;

/**
 * Controller Admin
 * @package App\Controllers
 */
class Admin
{
    use Base;

    /**
     * displays last news
     */
    public function actionAllNews()
    {
        $news = new News();
        $news->actionAll();
    }

    /**
     * Edits article in Db
     */
    public function actionEdit()
    {
        $template = __DIR__ . '/../../../admin/edit.html';
        $this->view->display($template);
    }

    /**
     * saves object into Db
     */
    public function actionSave()
    {

        $article = new \App\Models\Article($_POST);
        $article->save();
    }
}
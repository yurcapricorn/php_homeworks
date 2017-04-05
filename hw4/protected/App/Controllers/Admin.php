<?php

namespace App\Controllers;

/**
 * Controller Admin
 * для админ-панели (действия "все новости", "редактирование", "сохранение")
 * @method __construct()
 * @method action(array $url = [])
 * @method access($action)
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
        $template = __DIR__ . '/../../../admin/templates/edit.html';
        $this->view->display($template);
    }

    /**
     * saves object into Db
     */
    public function actionSave()
    {
        $article = new \App\Models\Article($_POST);
        $res = $article->save();
        if ($res === false) {
            $this->view->error = 'save to db error';
        }
    }
}
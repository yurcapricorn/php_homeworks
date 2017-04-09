<?php

namespace App\Controllers;

use App\Models\Article;
use App\MultiException;
use App\NoPageException;


/**
 * Controller Admin
 * @package App\Controllers
 */
class Admin
{
    use Base;

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
        $this->view->articles = Article::findLastEntries();
        if (empty($this->view->articles)) {
            throw new NoPageException('no articles in database');
        }
        $template = __DIR__ . '/../../../admin/edit.html';
        $this->view->display($template);
    }

    /**
     * saves object into Db
     */
    public function actionSave()
    {
        if (!empty($_POST['id'])) {
            $article = Article::findById($_POST['id']);
            if (empty($article)) {
                throw new NoPageException('updating page not found');
            }
        } else {
            $article = new Article();
        }
        try {
            $article->fill($_POST);
        } catch (MultiException $e) {
//            foreach($e->getErrors() as $error){
//                echo $error->getMessage();
//            }
        }
        $article->save();
    }
}
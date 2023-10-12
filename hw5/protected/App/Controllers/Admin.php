<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;
use App\MultiException;
use App\NoPageException;


/**
 * Controller Admin
 * @package App\Controllers
 */
class Admin extends Controller
{
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
        $template = __DIR__ . '/../../../templates/admin/edit.html';
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
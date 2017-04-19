<?php

namespace App\Controllers;

use App\AdminDataTable;
use App\Controller;
use App\Models\Article;
use App\NoPageException;


/**
 * Controller Admin
 * @package App\Controllers
 */
class Admin extends Controller
{
    /**
     * admin data table
     */
    public function actionAdminDataTable(){
        $table = new AdminDataTable(['var_dump', 'print_r'], Article::findAll());
        $table->render();
    }
    /**
     * All news
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
        $this->view->articles = Article::findAll();
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
        } catch (\Yurcapricorn\Multiexception\App\MultiException $e) {
//            foreach($e->getErrors() as $error){
//                echo $error->getMessage();
//            }
        }
        $article->save();
    }
}
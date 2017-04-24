<?php

namespace App\Controllers;

use App\Controller;
use App\Logger;
use App\Models\Article;
use App\NoPageException;

/**
 * Controller Admin
 * @package App\Controllers
 */
class Admin extends Controller
{
    /**
     * All news
     */
    public function actionAllNews()
    {
        $news = new News();
        $news->actionAll();
    }

    /**
     * Main admin panel
     */
    public function actionEdit()
    {
        $this->view->articles = Article::findAll();
        if (empty($this->view->articles)) {
            throw new NoPageException('no articles in database');
        }
        $template = __DIR__ . '/../../../templates/admin/edit.html';
        $this->view->display($template);
    }

    /**
     * delete
     */
    public function actionDelete()
    {
        if (!empty($_GET['id'])) {
            $article = Article::findById($_GET['id']);
            if (empty($article)) {
                throw new NoPageException('removing article not found');
            }
            $article->delete();
        }
        header('Location: /Admin/Edit/');
    }

    /**
     * saves object into Db
     */
    public function actionSave()
    {
        if (!empty($_GET['id'])) {
            $article = Article::findById($_GET['id']);
            if (empty($article)) {
                throw new NoPageException('updating article not found');
            }
        } else {
            $article = new Article();
        }
        try {
            $article->fill($_POST);
        } catch (\Yurcapricorn\Multiexception\App\MultiException $e) {
            foreach($e->getErrors() as $error){
                $logger = Logger::instance();
                $logger->log($error->getMessage());
            }
        }
        $article->save();
        header('Location: /Admin/Edit/');
    }

    /**
     * update action
     */
    public function actionUpdate()
    {
        if (!empty($_GET['id'])) {

            $this->view->article = Article::findById((int)$_GET['id']);
            if (empty($this->view->article)) {
                throw new NoPageException('updating article not found');
            } else {
                $this->view->display($template = __DIR__ . '/../../../templates/admin/update.html');
            }
        }
    }

    /**
     * insert action
     */
        public function actionInsert()
        {
            $this->view->display(__DIR__ . '/../../../templates/admin/insert.html');
        }
    }
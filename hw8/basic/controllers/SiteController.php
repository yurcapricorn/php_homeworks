<?php

namespace app\controllers;

use app\models\Article;
use app\models\Author;
use app\models\Category;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\LoginForm;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $data = Article::getAll(4);
        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
        ]);
    }

    /**
     * Displays one article
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $article = Article::findOne($id);
        return $this->render('view',[
            'article' => $article,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * displays articles by category
     * @return string
     */
    public function actionGetArticlesByCategory(){
        $category = Category::findOne(['title' => Yii::$app->request->get('title')]);
        $data = Category::getArticles($category->id);
        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
        ]);
    }

    /**
     * displays articles by author
     * @return string
     */
    public function actionGetArticlesByAuthor(){
        $author = Author::findOne(['name' => Yii::$app->request->get('name')]);
        $data = Author::getArticles($author->id);
        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
        ]);
    }

    /**
     * displays author
     * @return string
     */
    public function actionGetAuthor(){
        $author = Author::findOne(['id' => Yii::$app->request->get('id')]);
        return $this->render('author',[
            'author' => $author,
        ]);
    }
}

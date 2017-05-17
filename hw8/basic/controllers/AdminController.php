<?php

namespace app\controllers;

use app\models\Article;
use app\models\Image;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * Class AdminController
 * @package app\controllers
 */
class AdminController extends \yii\web\Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','update','delete','view','setimage'],
                'rules' => [
                    [
                        'actions' => ['index','create','update','delete','view','setimage'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Article::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Article::findOne($id);
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Article::findOne($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => Article::findOne($id),
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionSetImage($id){
        $model = new Image();
        if (\Yii::$app->request->isPost){
            $article = Article::findOne($id);
            $file = UploadedFile::getInstance($model, 'image');
            if ($article->saveImage($model->uploadFile($file, $article->image)) === true){
                return $this->redirect(['view', 'id' => $article->id ] );
            }
        }
        return $this->render('image', ['model' => $model]);
    }
}

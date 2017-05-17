<?php

namespace app\models;

use yii\data\Pagination;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property integer $author_id
 * @property integer $category_id
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'content'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['author_id'], 'integer'],
            [['category_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'image' => 'Image',
            'author_id' => 'Author ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * get all
     * @param int $pageSize
     * @return mixed
     */
    public static function getAll($pageSize = 4)
    {
        // build a DB query to get all articles
        $query = Article::find();

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);

        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }

    /**
     * get author
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id'=>'author_id']);
    }

    /**
     * save image
     * @param $filename
     * @return bool
     */
    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    /**
     * get image
     * @return string
     */
    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';
    }

    /**
     * before delete
     * @return bool
     */
    public function beforeDelete()
    {
        Image::deleteCurrentImage($this->image);
        return parent::beforeDelete();
    }

    /**
     * get category
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * isset
     * @param string $key
     * @return bool
     */
    public function __isset($key){
        switch($key){
            case('category'):{
                return isset($this->category_id);
            }
            case('author'):{
                return isset($this->author_id);
            }
        }
    }
}
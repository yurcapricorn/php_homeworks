<?php

namespace Models;

require_once __DIR__ . '/Model.php';


/**
 * Model Article
 * depends on Model
 * contains 3 fields
 * serves to make structurised requests to database
 */
class Article extends Model
{
    protected const TABLE = 'news';

    public $title;
    public $lead;

    public static function displayAll(){
        $data=static::findAll();
        include __DIR__ . '/../Templates/news_index.html';
    }

    public static function displayOne($id){
        $data=static::findById($id);
        include __DIR__ . '/../Templates/article.php';
    }
}
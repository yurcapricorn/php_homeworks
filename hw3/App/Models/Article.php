<?php

namespace App\Models;

use App\Model;

class Article extends Model
{
    const TABLE = 'news';
    const INDEX = '\App\Templates\news_index.php';
    const ONE = '\App\Templates\article.php';
    public $id;
    public $author;
    public $header;
    public $body;
    public $date;

    public function __construct($mas)
    {
        for ($i = 0; $i < 5; $i++) {
            switch ($mas[$i]['name']) {
                case'id': {
                    $this->id = $mas[$i]['value'];
                    break;
                }
                case'author': {
                    $this->author = $mas[$i]['value'];
                    break;
                }
                case'header': {
                    $this->header = $mas[$i]['value'];
                    break;
                }
                case'body': {
                    $this->body = $mas[$i]['value'];
                    break;
                }
                case'date': {
                    $this->date = $mas[$i]['value'];
                    break;
                }
            }
        }
    }
}
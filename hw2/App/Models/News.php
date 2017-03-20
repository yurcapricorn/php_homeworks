<?php

namespace App\Models;

use App\Model;

class News extends Model
{
    const TABLE = 'news';
    const INDEX = '\Templates\news_index.php';
    const ONE = '\Templates\article.php';

    public $author;
    public $header;
    public $body;
    public $data;
}
<?php

namespace App\Models;

require_once __DIR__ . '/Model.php';

/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{
    protected const TABLE = 'news';
    public $title;
    public $lead;
    public $author_id;
}
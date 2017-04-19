<?php

namespace App\Models;

require_once __DIR__ . '/Model.php';

/**
 * Class Article
 * @package App\Models
 * @property string table
 * @property string title
 * @property string lead
 * @property int author_id
 * @property int id
 */
class Article extends Model
{
    protected const TABLE = 'news';
    public $title;
    public $lead;
    public $author_id;
}
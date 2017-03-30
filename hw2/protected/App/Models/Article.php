<?php

namespace App\Models;

require_once __DIR__ . '/Model.php';

/**
 * Class Article
 * depends on Model
 * serves to make structurised requests to database
 * @package App\Models
 */
class Article extends Model
{
    protected const TABLE = 'news';

    public $title;
    public $lead;
    public $author_id;
}
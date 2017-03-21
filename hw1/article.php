<?php

require_once __DIR__ . '/Db.php';
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
}
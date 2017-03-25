<?php

namespace Models;

require_once __DIR__ . '/Model.php';

/**
 * Model Article
 * depends on Model
 * serves to make structurised requests to database
 */
class Article extends Model
{
    protected const TABLE = 'news';

    public $title;
    public $lead;
}
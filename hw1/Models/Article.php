<?php

namespace Models;

require_once __DIR__ . '/../Autoload.php';


/**
 * Model Article
 * depends on Model
 * contains 3 fields
 * serves to make structurised requests to database
 */
class Article extends \Model
{
    protected const TABLE = 'news';

    public $title;
    public $lead;
}
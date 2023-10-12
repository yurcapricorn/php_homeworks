<?php

namespace Models;

require_once __DIR__ . '/../Autoload.php';


/**
 * Model Article
 */
class Article extends \Model
{
    protected const TABLE = 'news';
    public $title;
    public $lead;
}
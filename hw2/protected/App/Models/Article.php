<?php

namespace App\Models;

require_once __DIR__ . '/Model.php';

/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{
    /**
     * table
     */
    protected const TABLE = 'news';
    /**
     * @var string $title
     */
    public $title;
    /**
     * @var string $lead
     */
    public $lead;
}
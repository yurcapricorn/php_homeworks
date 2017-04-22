<?php

namespace App\Models;

require_once __DIR__ . '/../../autoload.php';

/**
 * Class Article
 * @package App\Models
 * @property int id
 */
class Article extends Model
{
    /**
     * @var string table
     * @var int author_id
     * @var string title
     * @var string lead
     */
    protected const TABLE = 'news';
    public $author_id;
    public $title;
    public $lead;

    /**
     * @override __get()
     * @param $key
     * @return Author|bool
     */
    public function __get($key)
    {
        if ($key === 'author') {
            if (!empty($this->author_id)) {
                return Author::findById($this->author_id);
            }
        }
    }

    /**
     * @override __isset()
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        if ($key === 'author') {
            return isset($this->author_id);
        }
    }
}
<?php

namespace App\Models;

require_once __DIR__ . '/../../autoload.php';

/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{
    protected const TABLE = 'news';
    public $author_id;
    public $title;
    public $lead;

    /**
     * @param $key
     * @return Author|bool
     */
    public function __get($key)
    {
        switch ($key) {
            case('author'): {
                if (!empty($this->author_id)) {
                    return Author::findById($this->author_id);
                }
                break;
            }
            default: {
                break;
            }
        }
    }
}
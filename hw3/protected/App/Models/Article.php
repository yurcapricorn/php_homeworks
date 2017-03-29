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
    use SomeMagic;

    protected const TABLE = 'news';

    public $author_id;
    public $title;
    public $lead;

    public function __get($key)
    {
        switch ($key) {
            case('author'): {
                if ($this->author_id !== false && $this->author_id !== NULL) {
                    return Author::findById($this->author_id);
                }
                break;
            }
            default: {
                if (!isset($this->key)) {
                    return false;
                }
                return $this->data[$key];
                break;
            }
        }
    }
}
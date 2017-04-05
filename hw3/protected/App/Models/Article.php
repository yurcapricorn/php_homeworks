<?php

namespace App\Models;

require_once __DIR__ . '/../../autoload.php';

/**
 * Class Article
 * serves to make structurised requests to database
 * fields id, author_id, title, lead, TABLE
 * @method save() @return bool
 * @method delete() @return bool
 * @method insert() @return bool
 * @method update() @return bool
 * @method isNew() @return bool
 * @method static findById(int $id) @return App\Models\Article
 * @method static findAll() @return array
 * @method static findLastEntries() @return Article array
 * @package App\Models
 */
class Article extends Model
{
    protected const TABLE = 'news';

    public $author_id;
    public $title;
    public $lead;

    /**
     * __get() method
     * returns Class Author record from DB
     * @param $key
     * @return Author|bool
     */
    public function __get($key)
    {
        switch ($key) {
            case('author'): {
                if (!empty($this->author_id)) {
                    return Author::findById($this->author_id);
                } else {
                    return false;
                }
                break;
            }
            default: {
                return false;
                break;
            }
        }
    }
}
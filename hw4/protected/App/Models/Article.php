<?php

namespace App\Models;

use App\SomeMagic;

require_once __DIR__ . '/Model.php';
require_once __DIR__ . '/../SomeMagic.php';

/**
 * Class Article
 * extends Model uses SomeMagic trait
 * serves to make structurised requests to database
 * fields id, author_id, title, lead
 * @method save(array $arr = []) @return bool
 * @method delete() @return bool
 * @method isNew() @return bool
 * @method static findById(int $id) @return App\Models\Article
 * @method static findAll() @return array
 * @method static findLastEntries() @return Article array
 * @method __set(mixed $key, mixed $value) @return bool
 * @method __isset(mixed $key) @return bool
 * @package App\Models
 */
class Article extends Model
{
    use SomeMagic;

    protected const TABLE = 'news';

    public $author_id;
    public $title;
    public $lead;

    /**
     * redefines SomeMagic __get() method
     * returns Class Author record from DB
     * @param $key
     * @return Author|bool
     */
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
                if (isset($this->data[$key])) {
                    return $this->data[$key];
                }
                return false;
                break;
            }
        }
        return false;
    }

    public function insert(array $arr = [])
    {
        if (!empty($arr['title'])) {
            $this->title = $arr['title'];
        }
        if (!empty($arr['lead'])) {
            $this->lead = $arr['lead'];
        }
        if (empty($this->title) && empty($this->lead)) {
            return false;
        } else {
            $res = parent::insert();
            if ($res !== true) {
                return false;
            }
        }
        return true;
    }

    public function update(array $arr = [])
    {
        if (!empty($arr['title'])) {
            $this->title = $arr['title'];
        }
        if (!empty($arr['lead'])) {
            $this->lead = $arr['lead'];
        }
        $res = parent::update();
        if ($res !== true) {
            return false;
        }
        return true;
    }
}
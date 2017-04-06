<?php

namespace App\Models;

require_once __DIR__ . '/../../autoload.php';

/**
 * Class Article
 * serves to make structurised requests to database
 * @package App\Models
 */
class Article extends Model
{
    protected const TABLE = 'news';
    public $author_id;
    public $title;
    public $lead;

    /**
     * Article constructor.
     * fills instance with data available
     * @param array $arr
     */
    public function __construct(array $arr = [])
    {
        if (empty($arr)) {
            return;
        }
        $article = new Article();
        if (!empty($arr['id'])) {
            $this->id = $arr['id'];
            $article = Article::findById($arr['id']);
        }
        $this->title = $arr['title'] ?? $article->title;
        $this->lead = $arr['lead'] ?? $article->lead;
        $this->authr_id = $arr['author_id'] ?? $article->author_id;
    }

    /**
     * redefines SomeMagic __get() method
     * returns Class Author record from DB
     * @param $key
     * @return Author|bool
     */
    public
    function __get($key)
    {
        switch ($key) {
            case('author'): {
                if ($this->author_id !== false && $this->author_id !== NULL) {
                    return Author::findById($this->author_id);
                }
                return false;
                break;
            }
            default: {
                return false;
                break;
            }
        }
    }

    public
    function insert()
    {
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

    public
    function update()
    {
        if ((empty($this->title) && empty($this->lead))) {
            return false;
        }
        $res = parent::update();
        if ($res !== true) {
            return false;
        }
        return true;
    }
}
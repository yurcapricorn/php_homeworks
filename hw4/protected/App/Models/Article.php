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
        $this->author_id = $arr['author_id'] ?? $article->author_id;
//        $this->title = !empty($arr['title']) ? $arr['title'] : $article->title;
//        $this->lead = !empty($arr['lead']) ? $arr['lead'] : $article->lead;
//        $this->author_id = !empty($arr['author_id']) ? $arr['author_id'] : $article->author_id;
    }

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
            default:{
                break;
            }
        }
    }

    public function insert()
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

    public function update()
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
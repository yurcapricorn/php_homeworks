<?php

namespace App\Models;

require_once __DIR__ . '/../../autoload.php';

/**
 * Class Article
 * extends Model uses SomeMagic trait
 * serves to make structurised requests to database
 * fields id, author_id, title, lead
 * @method delete() @return bool
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

    public function __construct(array $arr = [])
    {
        if (empty($arr)) {
            return;
        } else {
            $article = new Article();
            if (!empty($arr['id'])) {
                $this->id = $arr['id'];
                $article = Article::findById($arr['id']);
            }
            if (!empty($arr['title'])) {
                $this->title = $arr['title'];
            } else {
                $this->title = $article->title;
            }
            if (!empty($arr['lead'])) {
                $this->lead = $arr['lead'];
            } else {
                $this->lead = $article->lead;
            }
            if (!empty($arr['author_id'])) {
                $this->author_id = $arr['author_id'];
            } else {
                $this->author_id = $article->article_id;
            }
        }
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
                return false;
                break;
            }
            default: {
                return false;
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
        echo 'update';
        if (empty($this->title) && empty($this->lead)) {
            return false;
        }
        $res = parent::update();
        if ($res !== true) {
            return false;
        }
        return true;
    }
}
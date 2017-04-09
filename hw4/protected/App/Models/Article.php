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
     * returns Class Author record from DB
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
}
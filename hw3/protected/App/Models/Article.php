<?php

namespace App\Models;

require_once __DIR__ . '/../../autoload.php';

/**
 * Class Article
 * article model
 * @package App\Models
 */
class Article extends Model
{
    protected const TABLE = 'news';
    /**
     * @var string $author_id
     */
    public $author_id;
    /**
     * @var string $title
     */
    public $title;
    /**
     * @var string $lead
     */
    public $lead;

    /**
     * fins author by author_id
     * @param $key
     * @return Article|bool
     */
    public function __get($key)
    {
        if ($key === 'author' && isset($this->author)) {
            return Author::findById((int)$this->author_id);
        }
    }

    /**
     * checks if article has author
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        if ($key === 'author') {
            return isset($this->author_id);
        }
    }

    /**
     * fills article with data
     * @param $data
     * @return $this
     */
    public function fill($data)
    {
        $this->title = $data['title'] ?? $this->title;
        $this->lead = $data['lead'] ?? $this->lead;
        $this->author_id = (int)$data['author_id'] ?? $this->author_id;
        return $this;
    }
}
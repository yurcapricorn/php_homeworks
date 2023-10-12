<?php

namespace App\Models;

/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{
    protected const TABLE = 'news';
    /**
     * @var $author_id
     */
    public $author_id;
    /**
     * @var $title
     */
    public $title;
    /**
     * @var $lead
     */
    public $lead;

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

    /**
     * get magic method
     * @param $key
     * @return Author|bool
     */
    public function __get($key)
    {
        if ('author' === $key) {
            return Author::findById($this->author_id);
        }
    }

    /**
     * isset magic method
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        if ('author' === $key) {
            return isset($this->author_id);
        }
    }
}
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
     * @param $value
     * @return $this
     */
    public function setAuthor_id($value)
    {
        $value = (int)$value;
        if ($value < 0) {
            throw new \UnexpectedValueException('author_id must be positive!');
        }
        $this->data['author_id'] = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setTitle($value)
    {
        if (empty($value)) {
            throw new \UnexpectedValueException('title must be filled!');
        }
        $this->data['title'] = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setLead($value)
    {
        if (empty($value)) {
            throw new \UnexpectedValueException('lead must be filled!');
        }
        $this->data['lead'] = $value;
        return $this;
    }

    /**
     * @param $key
     * @return Article|bool
     */
    public function __get($key)
    {
        if ($key === 'author') {
            return Author::findById($this->author_id);
        } else {
            return $this->data[$key];}
    }

    /**
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        if ( $key === 'author' ) {
            return isset($this->data['author_id']);
        }
        return isset($this->data[$key]);
    }
}
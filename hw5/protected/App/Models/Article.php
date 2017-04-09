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
     * @param string $value
     * @return $this
     * @throws \UnexpectedValueException
     */
    public function setId(string $value)
    {
        $value = (int)$value;
        if ($value <= 0) {
            throw new \UnexpectedValueException('id must be positive!');
        }
        $this->id = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     * @throws \UnexpectedValueException
     */
    public function setAuthor_id(string $value)
    {
        $value = (int)$value;
        if ($value <= 0) {
            throw new \UnexpectedValueException('author_id must be positive!');
        }
        $this->author_id = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     * @throws \UnexpectedValueException
     */
    public function setTitle(string $value)
    {
        if (empty($value)) {
            throw new \UnexpectedValueException('title must be filled!');
        }
        $this->title = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this
     * @throws \UnexpectedValueException
     */
    public function setLead(string $value)
    {
        if (empty($value)) {
            throw new \UnexpectedValueException('lead must be filled!');
        }
        $this->lead = $value;
        return $this;
    }

    /**
     * redefines SomeMagic __get() method
     * returns Class Author record from DB
     * @param $key
     * @return Author|bool
     */
    public function __get($key)
    {
        if ($key === 'author') {
            if ($this->author_id !== false && $this->author_id !== NULL) {
                return Author::findById($this->author_id);
            }
        }
    }
}
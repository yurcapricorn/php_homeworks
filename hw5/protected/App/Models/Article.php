<?php

namespace App\Models;


require_once __DIR__ . '/../../autoload.php';

/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{
    /**
     * @var string db table
     * @var int author_id
     * @var int id
     * @var string title
     * @var string lead
     */
    protected const TABLE = 'news';
    public $author_id;
    public $title;
    public $lead;

    /**
     * @param $value
     * @return $this
     * @throws \UnexpectedValueException
     */
    public function setId($value)
    {
        $value = (int)$value;
        if ($value <= 0) {
            throw new \UnexpectedValueException('id must be positive!');
        }
        $this->id = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     * @throws \UnexpectedValueException
     */
    public function setAuthor_id($value)
    {
        $value = (int)$value;
        if ($value <= 0) {
            throw new \UnexpectedValueException('author_id must be positive!');
        }
        $this->author_id = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     * @throws \UnexpectedValueException
     */
    public function setTitle($value)
    {
        if (empty($value)) {
            throw new \UnexpectedValueException('title must be filled!');
        }
        $this->title = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     * @throws \UnexpectedValueException
     */
    public function setLead($value)
    {
        if (empty($value)) {
            throw new \UnexpectedValueException('lead must be filled!');
        }
        $this->lead = $value;
        return $this;
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
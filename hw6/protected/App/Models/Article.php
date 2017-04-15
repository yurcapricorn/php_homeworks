<?php

namespace App\Models;


use App\MagicTrait;


/**
 * Class Article
 * @property string table
 * @property int id
 * @property int author_id
 * @property string title
 * @property string lead
 * @package App\Models
 */
class Article extends Model
{
    protected const TABLE = 'news';

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
        $this->data['id'] = $value;
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
        $this->data['author_id'] = $value;
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
        $this->data['title'] = $value;
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
        $this->data['lead'] = $value;
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
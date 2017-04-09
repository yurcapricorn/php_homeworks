<?php

namespace App;

/**
 * Class MultiException
 * @package App
 */
class MultiException extends \Exception implements \Iterator
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param \Exception $e
     */
    public function add(\Exception $e) {
        $this->data[] = $e;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->data);
    }

    public function next()
    {
        next($this->data);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return null !== key($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }
}
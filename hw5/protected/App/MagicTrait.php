<?php

namespace App;

/**
 * Trait MagicTrait
 * @package App
 */
trait MagicTrait
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * saves pairs in Class data array
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * returns requested value if exists in Class data array
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * checks if key exists in data array
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->data[$key]);
    }
}
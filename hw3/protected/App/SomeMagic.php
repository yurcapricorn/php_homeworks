<?php

namespace App;

/**
 * Trait SomeMagic
 * @package App
 */
trait SomeMagic
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed | bool
     */
    public function __get($key)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
        return false;
    }

    /**
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->data[$key]);
    }
}
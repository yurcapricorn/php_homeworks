<?php

namespace App\Models;

/**
 * Trait SomeMagic
 * @package App\Models
 */
trait SomeMagic
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * SomeMagic constructor
     * @param array $args
     */
    public function __construct($args = [])
    {
        if (empty($args)) {
            return;
        }
        foreach ($args as $key => $value) {
            $this->__set($key, $value);
        }
    }

    /**
     * @param $key
     * @param $value
     * @return bool
     */
    public function __set($key, $value)
    {
        if ($this->__isset($key) === false) {
            $this->data[$key] = $value;
        }
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
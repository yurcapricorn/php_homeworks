<?php

namespace App\Models;

/**
 * Trait SomeMagic
 * implements magic methods for its users
 * may fill fields in constructor
 * @package App\Models
 */
trait SomeMagic
{
    /**
     * Contains all pairs of information excepts Class public fields
     * @var array
     */
    protected $data = [];

    /**
     * SomeMagic constructor
     * gives pairs of passed array to Class __set() method
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
     * saves pairs in Class data array
     * @param $key
     * @param $value
     * @return bool
     */
    public function __set($key, $value)
    {
        if ($this->__isset($key) === false) {
            $this->data[$key] = $value;
            return true;
        }
        return false;
    }

    /**
     * returns requested value if exists in Class data array
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
     * checks if key exists and set in Class public fields and data array
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        if (isset($this->$key)) {
            return true;
        }
        return isset($this->data[$key]);
    }
}
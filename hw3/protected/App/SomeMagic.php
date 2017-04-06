<?php

namespace App;

/**
 * Trait SomeMagic
 * implements magic methods for its users
 * may fill fields in constructor
 * @package App\Models
 */
trait SomeMagic
{
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
     * checks if key exists in data array
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->data[$key]);
    }
}
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
    protected $data = [];

    public function __construct($args = [])
    {
        if (empty($args)) {
            return;
        }
        foreach ($args as $key => $value) {
            $this->__set($key, $value);
        }
    }

    public function __set($key, $value)
    {
        if (is_null($this->$key)) {
            $this->$key = $value;
            return true;
        } else if ($this->__isset($key) === false) {
            $this->data[$key] = $value;
            return true;
        }
        return false;
    }

    public function __get($key)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
        return false;
    }

    public function __isset($key)
    {
        foreach ($this as $thiskey => $thisvalue) {
            if ($key === $thiskey) {
                return isset($this->$key);
            }
        }
        return isset($this->data[$key]);
    }
}
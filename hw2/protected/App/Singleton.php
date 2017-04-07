<?php

namespace App;

/**
 * Class Singleton
 * @package App
 */
trait Singleton
{
    protected static $instance;

    protected function __construct()
    {
    }

    /**
     * @return mixed (object instance)
     */
    public static function instance()
    {
        if (static::$instance !== null) {
            return static::$instance;
        } else {
            static::$instance = new static;
            return static::$instance;
        }
    }
}
<?php

namespace App;

/**
 * Trait Singleton
 * @package App
 */
trait Singleton
{
    /**
     * keeps instance of class
     */
    protected static $instance;

    /**
     * Singleton constructor.
     */
    protected function __construct()
    {
    }

    /**
     * instance() method
     * @return mixed instance of class
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
<?php

namespace App;

/**
 * Class Config
 * keeps DB connection parameters
 * @package App
 */
class Config
{
    /**
     * Trait Singleton
     */
    use \App\Singleton;
    /**
     * @var array|mixed
     */
    public $data = [];

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->data = include __DIR__ . '\..\..\Config_file.php';
    }
}


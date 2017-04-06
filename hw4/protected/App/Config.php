<?php

namespace App;

require_once __DIR__ . '\Singleton.php';

/**
 * Class Config
 * keeps DB connection parameters
 * @package App
 */
class Config
{
    use \App\Singleton;
    /**
     * @var array
     */
    public $data = [];

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $data = include __DIR__ . '\..\..\config_file.php';
        $this->data = $data;
    }
}


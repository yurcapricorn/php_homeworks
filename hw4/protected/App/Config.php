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
     * Singleton
     */
    use Singleton;
    /**
     * @var array
     */
    public $data = [];

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->data = include __DIR__ . '\..\..\public\config_file.php';
    }
}


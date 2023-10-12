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
    /**
     * singleton
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
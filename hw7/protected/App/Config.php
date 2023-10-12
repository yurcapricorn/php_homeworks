<?php

namespace App;

/**
 * Class Config
 * @package App
 */
class Config
{
    /**
     * singleton
     */
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
        $this->data = require __DIR__ . '\..\..\public\config_file.php';
    }
}


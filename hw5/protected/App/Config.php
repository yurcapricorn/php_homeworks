<?php

namespace App;

require_once __DIR__ . '\Singleton.php';

/**
 * Class Config
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
        $this->data = include __DIR__ . '\..\..\public\config_file.php';
    }
}


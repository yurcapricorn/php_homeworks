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

    public $data = [];

    public function __construct()
    {
        $data = include __DIR__ . '\..\..\Config_file.php';
        $this->data = $data;
    }
}


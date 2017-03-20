<?php

namespace App;
include __DIR__ . '\Models\Singleton.php';

class Config extends Models\Singleton{
//    use Models\Singleton;
    public $data=[];
    public function __construct(){
        include __DIR__ . '\..\Config_file.php';
        $this->data['db']['host']=$host;
        $this->data['db']['name']=$name;
    }
}

$config = Config::instance();
//echo Config::$data['db']['host'];
$config2 = Config::instance();

var_dump($config);
var_dump($config2);
echo $config->data['db']['host'];
echo $config->data['db']['name'];
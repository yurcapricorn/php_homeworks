<?php

namespace App\Models;


class Singleton
{
    protected static $instance;
    protected function __construct(){}
    public function instance(){
        if(static::$instance!=null){return static::$instance;}
        else {static::$instance = new static; return static::$instance;}
    }
}


//$sin1=Singleton::instance();
//
//var_dump($sin1);
//
//$sin2=Singleton::instance();
//
//var_dump($sin2);

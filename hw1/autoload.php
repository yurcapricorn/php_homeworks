<?php

function autoload_1($class){
    $filename = __DIR__ . '/'. str_replace('\\' , '/' ,$class) . '.php';
    if (file_exists($filename)){
        include $filename;
    }
}

function autoload_2($class)
{
    $filename = __DIR__ . '/tests/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
}

function autoload_3($class){
    $filename = __DIR__ . '/templates/'. str_replace('\\' , '/' ,$class) . '.php';
    if (file_exists($filename)){
        include $filename;
    }
}

spl_autoload_register('autoload_1');
spl_autoload_register('autoload_2');
spl_autoload_register('autoload_3');
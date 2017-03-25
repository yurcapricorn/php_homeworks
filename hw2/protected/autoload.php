<?php

function autoload_1($class){
    $filename = __DIR__ . '/' . str_replace('\\' , '/' ,$class) . '.php';
    if (file_exists($filename)){
        include $filename;
    }
    else{echo 'file not found. required: ' . $class . "\n". ' found: ' . $filename . "\n" . 'main dir' . __DIR__;}
}

spl_autoload_register('autoload_1');
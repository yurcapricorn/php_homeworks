<?php

function autoload($class)
{
//    if (0 === strpos($class, 'App\\')) {
//        $path = substr($class, 4);
        require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('autoload');

require_once __DIR__ . '/../vendor/autoload.php';
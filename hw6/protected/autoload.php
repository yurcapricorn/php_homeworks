<?php

function autoload($class)
{
    $filename = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
}

spl_autoload_register('autoload');

require_once __DIR__ . '/../vendor/autoload.php';
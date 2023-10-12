<?php

function autoload_1($class)
{
    $filename = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
}

spl_autoload_register('autoload_1');
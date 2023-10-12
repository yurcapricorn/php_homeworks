<?php

function autoload_1($class)
{
    $filename = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($filename)) {
        include $filename;
    } else {
        throw new Exception('file not found. required: ' . $class . "\n" . ' found: ' . $filename . "\n");
    }
}

spl_autoload_register('autoload_1');

include __DIR__ . '/../vendor/autoload.php';
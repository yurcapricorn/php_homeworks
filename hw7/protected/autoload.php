<?php

function autoload($class)
{
    require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('autoload');

require_once __DIR__ . '/../vendor/autoload.php';
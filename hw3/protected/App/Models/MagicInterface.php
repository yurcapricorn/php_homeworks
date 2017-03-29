<?php

namespace App\Models;

interface MagicInterface
{
    public function __get($key);
    public function __set();
    public function __isset();
}
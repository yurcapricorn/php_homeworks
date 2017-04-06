<?php

namespace App\Models;


/**
 * Class Author
 * @package App\Models
 */
class Author extends Model
{
    const TABLE = 'authors';
    public $email;
    public $name;
    public $surname;
}
<?php

namespace App\Models;

/**
 * Class Author
 * @package App\Models
 */
class Author extends Model
{
    const TABLE = 'authors';
    /**
     * @var $name
     */
    public $name;
    /**
     * @var $surname
     */
    public $surname;
}
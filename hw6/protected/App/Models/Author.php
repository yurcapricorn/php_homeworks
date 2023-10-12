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
     * @var string $email
     */
    public $name;
    /**
     * @var string $surname
     */
    public $surname;
}
<?php

namespace App\Models;

/**
 * Class Author
 * @package App\Models
 */
class Author extends Model
{
    /**
     * table
     */
    const TABLE = 'authors';
    /**
     * @var string $email
     */
    public $email;
    /**
     * @var string $name
     */
    public $name;
    /**
     * @var string $surname
     */
    public $surname;
}
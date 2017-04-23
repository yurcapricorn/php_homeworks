<?php

namespace App\Models;

/**
 * Class Author
 * author model
 * @package App\Models
 */
class Author extends Model
{
    const TABLE = 'authors';
    /**
     * @var string $mail
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
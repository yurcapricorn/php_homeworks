<?php

namespace App\Models;

/**
 * Class Author
 * @package App\Models
 * @property string table
 * @property string email
 * @property string name
 * @property string surname
 */
class Author extends Model
{
    const TABLE = 'authors';
    public $email;
    public $name;
    public $surname;
}
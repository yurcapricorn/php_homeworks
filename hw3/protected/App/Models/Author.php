<?php

namespace App\Models;


/**
 * Class Author
 * fields id, name, surname, email
 * extends trait SomeMagic
 * @package App\Models
 */
class Author extends Model
{
    use SomeMagic;

    const TABLE = 'authors';

    public $email;
    public $name;
    public $surname;

}
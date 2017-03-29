<?php

namespace App\Models;


/**
 * Class User
 * @package App\Models
 *
 */
class Author extends Model
{
    use SomeMagic;
    const TABLE = 'authors';

    public $email;
    public $name;
    public $surname;

    /**
     * @return string email
     */

}
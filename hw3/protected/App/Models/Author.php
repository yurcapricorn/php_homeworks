<?php

namespace App\Models;


/**
 * Class Author
 * fields id, name, surname, email
 * extends trait SomeMagic
 * serves to make structurised requests to database
 * @method save() @return bool
 * @method delete() @return bool
 * @method insert() @return bool
 * @method update() @return bool
 * @method isNew() @return bool
 * @method static findById(int $id) @return App\Models\Article
 * @method static findAll() @return array
 * @method static findLastEntries() @return array
 * @method __set(mixed $key, mixed $value) @return bool
 * @method __isset(mixed $key) @return bool
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
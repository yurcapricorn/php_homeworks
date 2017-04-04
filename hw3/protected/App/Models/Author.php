<?php

namespace App\Models;


/**
 * Class Author
 * fields id, name, surname, email
 * serves to make structurised requests to database
 * @method save() @return bool
 * @method delete() @return bool
 * @method insert() @return bool
 * @method update() @return bool
 * @method isNew() @return bool
 * @method static findById(int $id) @return App\Models\Article
 * @method static findAll() @return array
 * @method static findLastEntries() @return array
 * @package App\Models
 */
class Author extends Model
{

    const TABLE = 'authors';

    public $email;
    public $name;
    public $surname;

}
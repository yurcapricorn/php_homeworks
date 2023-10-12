<?php

namespace App\Models;

require_once __DIR__ . '/Model.php';


/**
 * Class Author
 * @package App\Models
 */
class Author extends Model
{
    /**
     * @var $table
     * @var $email
     * @var $name
     * @var $surname
     */
    const TABLE = 'authors';
    public $email;
    public $name;
    public $surname;
}
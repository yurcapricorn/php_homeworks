<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24-Feb-17
 * Time: 16:56
 */

namespace App\Models;

use App\Model;

class User extends Model
{
    const TABLE = 'user';
    const INDEX = 'user_index';
    const ONE = 'user';
    const CLAS = 'App\Models\User';
    public $email;
    public $name;

}
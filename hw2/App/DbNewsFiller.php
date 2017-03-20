<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04-Mar-17
 * Time: 23:05
 */

namespace App;

include __DIR__ . '\Db.php';


abstract class DbNewsFiller
{
    public static function fill($n)
    {
        for ($i = 1; $i <= $n; $i++) {
            $db = new \App\Db();
            $sql="INSERT INTO `news` (`id`, `author`, `header`, `body`, `date`) VALUES (NULL, 'author2', 'header2', 'body2', '2017-03-01')";
            $data=$db->execute($sql);
            if($data){$db->query($sql);}
        }
    }
}

//INSERT INTO `news` (`id`, `author`, `header`, `body`, `date`) VALUES (NULL, 'author2', 'header2', 'body2', '2017-03-01');
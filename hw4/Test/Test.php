<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24-Feb-17
 * Time: 20:50
 */

namespace Test;

class Test
{
    private static function dbTestExecute(){
        $db = new \App\Db();
        $sql='SELECT * FROM news WHERE id>:id';
        $args=[':id'=>0];
        $res=$db->execute($sql,$args);
        if ($res==false){echo 'dbTestExecute Error';}
    }

    private static function dbTestQuery(){
        $db = new \App\Db();
        $sql="SELECT * FROM news WHERE id>:id";
        $args=[':id'=>0];
        $res=$db->query($sql,$args);
        if (empty($res)){echo 'dbTestQuery Error';}
    }

    private static function modelTestFindById(){
        $id=1;
        $data=\App\Models\Article::findById($id);
        if ($data==false){echo 'modelTestFindById Error';}
        $id=0;
        $data=\App\Models\Article::findById($id);
        if ($data!=false){echo 'modelTestFindById Error';}
    }

    public static function dbTest(){
        static::dbTestExecute();
        static::dbTestQuery();
        static::modelTestFindById();
    }

}
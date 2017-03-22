<?php

namespace tests;


abstract class Test
{
    /**
     * execute method testing
     */
    private static function dbTestExecute(){
        $db = new \Db();
        $sql='INSERT INTO ' . news . " (title,lead)" . ' VALUES (:title, :lead)';
        $args=[':title'=>'testtitle', ':lead'=>'testlead'];
        $res=$db->execute($sql,$args);
        if ($res==false){echo 'dbTestExecute Error';}
    }

    /*
     * query method testing
     */
    private static function dbTestQuery(){
        $db = new \Db();
        $sql="SELECT * FROM news WHERE id=:id";
        $args=[':id'=>1];
        $res=$db->query($sql,$args);
        if (empty($res)){echo 'dbTestQuery Error';}
    }

    /**
     * findById method testing
     */
    private static function modelTestFindById(){
        $id=1;
        $data=\Article::findById($id);
        if ($data==false){echo 'modelTestFindById Error';}
        $id=0;
        $data=\Article::findById($id);
        if ($data!=false){echo 'modelTestFindById Error';}
    }

    /**
     * findLastEntries method testing
     */
    private static function modelTestfindLastEntries()
    {
        $data = \Article::findLastEntries(1);
        if ($data == false) {
            echo 'modelTestFindById Error';
        }
    }

    /**
     * All tests running
     */
    public static function testAll(){
        static::dbTestExecute();
        static::dbTestQuery();
        static::modelTestFindById();
        static::modelTestfindLastEntries();
    }

}
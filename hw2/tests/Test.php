<?php

namespace tests;

use App\Config;
use App\Db;
use App\Models\Article;

require_once __DIR__ . '/../protected/autoload.php';

/**
 * Class Test
 * @package tests
 */
abstract class Test
{
    /**
     * execute method test
     */
    public static function dbTestExecute()
    {
        $db = new Db();
        $sql = 'INSERT INTO ' . news . " (title,lead)" . ' VALUES (:title, :lead)';
        $args = [':title' => 'testtitle', ':lead' => 'testlead'];
        $res = $db->execute($sql, $args);
        if ($res === false) {
            echo 'dbTestExecute Error';
        }
    }

    /*
     * query method test
     */
    public static function dbTestQuery()
    {
        $db = new Db();
        $sql = "SELECT * FROM news WHERE id=:id";
        $args = [':id' => 1];
        $res = $db->query($sql, $args);
        if (empty($res)) {
            echo 'dbTestQuery Error';
        }
    }

    /**
     * findById method test
     */
    public static function modelTestFindById()
    {
        $id = 1;
        $data = Article::findById($id);
        if ($data == false) {
            echo 'modelTestFindById Error';
        }
        $id = 0;
        $data = Article::findById($id);
        if ($data !== false) {
            echo 'modelTestFindById Error';
        }
    }

    /**
     * findLastEntries method test
     */
    public static function modelTestFindLastEntries()
    {
        $data = Article::findLastEntries(1);
        if ($data === false) {
            echo 'modelTestFindById Error';
        }
    }

    /**
     * Config class test
     */
    public static function classConfigTest()
    {
        $config = Config::instance();
        $config2 = Config::instance();
        if ($config !== $config2) {
            echo 'Singleton error';
        }
        if ($config->data['db']['host'] == null) {
            echo 'ConfigTest Error';
        };
    }

    /**
     * Model insert() method test
     */
    public static function modelInsertMethodTest()
    {
        $article = new Article();
        $article->title = 'test';
        $article->save();
        if ($article->id === null) {
            echo 'modelInsertMethodTest error';
        }
    }

    /**
     * Model update() method test
     */
    public static function modelUpdateMethodTest()
    {
        $article = new Article();
        $article->id = '100';
        $res = $article->save();
        if ($res===false) {
            echo 'modelUpdateMethodTest error';
        }
    }

    /**
     * Model delete() method test
     */
    public static function modelDeleteMethodTest()
    {
        $article = new Article();
        $article->id = '100';
        $res = $article->delete();
        if ($res===false) {
            echo 'modelUpdateMethodTest error';
        }
    }

    /**
     * All tests running
     */
    public static function testAll()
    {
        static::dbTestExecute();
        static::dbTestQuery();
        static::modelTestFindById();
        static::modelTestFindLastEntries();
        static::classConfigTest();
        static::modelInsertMethodTest();
        static::modelUpdateMethodTest();
        static::modelDeleteMethodTest();
    }

}

Test::testAll();
echo 'Tests done';
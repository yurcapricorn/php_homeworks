<?php

namespace tests;

use App\Db;
use App\Config;
use App\Models\Article;

require_once __DIR__ . '/../protected/autoload.php';

/**
 * Class Test
 * @package tests
 */
abstract class Test
{
    /**
     * execute method testing
     */
    private static function dbTestExecute()
    {
        $db = new Db();
        $sql = 'INSERT INTO news (title,lead) VALUES (:title, :lead)';
        $args = [':title' => 'testtitle', ':lead' => 'testlead'];
        $res = $db->execute($sql, $args);
        assert($res !== false, 'dbTestExecute Error');
    }

    /*
     * query method testing
     */
    private static function dbTestQuery()
    {
        $db = new Db();
        $sql = 'SELECT * FROM news WHERE id=:id';
        $args = [':id' => 1];
        $res = $db->query($sql, \stdClass::class, $args);
        assert(!empty($res), 'dbTestQuery Error');
    }

    /**
     * findById method testing
     */
    private static function modelTestFindById()
    {
        $id = 1;
        $data = Article::findById($id);
        assert($data !== false)['modelTestFindById Error'];
        $id = 0;
        $data = Article::findById($id);
        assert($data === false, 'modelTestFindById Error');
    }

    /**
     * findLastEntries method testing
     */
    private static function modelTestfindLastEntries()
    {
        $data = Article::findLastEntries(1);
        assert($data !== false, 'modelTestFindById Error');
    }

    /**
     * Config class test
     */
    public static function classConfigTest()
    {
        $config = Config::instance();
        $config2 = Config::instance();
        assert($config === $config2, 'Singleton error');
        assert($config->data['db']['host'] !== null, 'ConfigTest Error');
    }

    /**
     * Model insert() method test
     */
    public static function modelInsertMethodTest()
    {
        $article = new Article();
        $article->title = 'title test';
        $article->lead = 'lead test';
        $article->save();
        assert($article->id !== null, 'modelInsertMethodTest error');
    }

    /**
     * Model update() method test
     */
    public static function modelUpdateMethodTest()
    {

        $article = Article::findLastEntries()[0];
        $article->lead = 'test';
        $res = $article->save();
        assert($res !== false, 'modelUpdateMethodTest error');
    }

    /**
     * Model delete() method test
     */
    public static function modelDeleteMethodTest()
    {
        $article = new Article();
        $article->id = '100';
        $res = $article->delete();
        assert($res !== false, 'modelUpdateMethodTest error');
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
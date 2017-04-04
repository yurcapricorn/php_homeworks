<?php

/**
 * Class Model
 * Maintains complex requests to Db class
 * contain methods findAll(), findById($id), findLastArticles($num)
 * forces childs to have TABLE field for db table name
 */
abstract class Model
{
    protected const TABLE = null;

    public $id;

    /**
     * find all method
     * @return array|bool
     */
    public static function findAll()
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, [], static::class);
    }

    /**
     * find by id method
     * @param int $id
     * @return array|bool
     */
    public static function findById($id)
    {
        if (empty($id)) {
            return false;
        }
        $db = new Db();
        $args = [':id' => $id];
        $data = $db->query('SELECT * FROM ' . static::TABLE . ' WHERE id=:id', $args, static::class);
        if ($data === false) {
            return false;
        }
        return $data[0];
    }

    /**
     * finds $num last articles
     * @param $num
     * @return array|bool
     */
    public static function findLastEntries($num)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY ID DESC LIMIT ' . $num;
        return $db->query($sql, [], static::class);
    }
}
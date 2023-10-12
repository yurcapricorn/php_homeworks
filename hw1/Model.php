<?php

/**
 * Class Model
 */
abstract class Model
{
    protected const TABLE = null;
    public $id;

    /**
     * @return array|bool
     */
    public static function findAll()
    {
        $db = new Db;

        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, static::class, []);
    }

    /**
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
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query($sql, static::class, $args);

        if (empty($data) || $data === false) {
            return false;
        }
        return $data[0];
    }

    /**
     * @param $num
     * @return array|bool
     */
    public static function findLastEntries()
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY ID DESC LIMIT 3';
        return $db->query($sql, static::class, []);
    }
}
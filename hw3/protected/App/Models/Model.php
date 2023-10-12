<?php

namespace App\Models;

use App\Db;

/**
 * base model
 * Class Model
 * @package App\Models
 */
abstract class Model
{
    /**
     * table
     */
    protected const TABLE = null;
    /**
     * @var int id
     */
    public $id;

    /**
     * find all method
     * @return array|bool
     */
    public static function findAll()
    {
        $db = Db::instance();

        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, static::class, []);
    }

    /**
     * finds by id method
     * @param int $id
     * @return \App\Models\Article|bool
     */
    public static function findById(int $id)
    {
        if (empty($id)) {
            return false;
        }
        $db = Db::instance();

        $args = [':id' => $id];
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query($sql, static::class, $args);

        if ($data === false || empty($data)) {
            return false;
        }
        return $data[0];
    }

    /**
     * finds last entries
     * @return array
     */
    public static function findLastEntries()
    {
        $db = Db::instance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY ID DESC LIMIT 3';
        return $db->query($sql, static::class, []);
    }

    /**
     * insert method
     * @return bool
     */
    public function insert()
    {
        $columns = [];
        $values = [];
        foreach ($this as $key => $val) {
            if ($key === 'id') {
                continue;
            }
            $columns[] = $key;
            $values[':' . $key] = $val;
        }
        $sql = 'INSERT INTO ' . static::TABLE . '(' . implode(',', $columns) . ')
            VALUES(' . implode(',', array_keys($values)) . ')';
        $db = Db::instance();
        $res = $db->execute($sql, $values);
        if ($res === false) {
            return false;
        }
        $this->id = $db->lastDbInsertId();
    }

    /**
     * update method
     * @return bool
     */
    public function update()
    {
        $columns = [];
        $values = [];
        foreach ($this as $key => $val) {
            if ($key !== 'id') {
                $columns[] = $key . '=:' . $key;
            }
            $values[':' . $key] = $val;
        }
        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(',', $columns) . ' WHERE id=:id';
        $db = Db::instance();
        return $db->execute($sql, $values);
    }

    /**
     * cheks if model is new
     * @return bool
     */
    public function isNew()
    {
        return empty($this->id);
    }

    /**
     * save method
     * @return bool
     */
    public function save()
    {
        if ($this->isNew()) {
            return $this->insert();
        } else {
            return $this->update();
        }
    }

    /**
     * delete method
     * @return bool
     */
    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $db = Db::instance();
        $args = [':id' => $this->id];
        return $db->execute($sql, $args);
    }
}
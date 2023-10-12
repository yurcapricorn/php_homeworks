<?php

namespace App\Models;

use App\Db;

/**
 * Class Model
 * @package App\Models
 */
abstract class Model
{
    protected const TABLE = null;
    /**
     * @var $id
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
     * find by id method
     * @param int $id
     * @return \App\Models\Article|bool
     */
    public static function findById(int $id)
    {
        $db = Db::instance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query($sql, static::class, [':id' => $id]);
        if ($data === false) {
            return false;
        } else if (empty($data)) {
            return NULL;
        }
        return $data[0];
    }

    /**
     * finds $num last articles
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
     * decides if the object is new
     * @return bool
     */
    public function isNew()
    {
        return empty($this->id);
    }

    /** save method
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
        $db = Db::instance();
        return $db->execute('DELETE FROM ' . static::TABLE . ' WHERE id=:id', [':id' => $this->id]);
    }
}
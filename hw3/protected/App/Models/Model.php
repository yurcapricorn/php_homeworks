<?php

namespace App\Models;

use App\Db;

require_once __DIR__ . '/../Db.php';

/**
 * Class Model
 * @package App\Models
 */
abstract class Model
{
    /**
     * keeps database table name
     */
    protected const TABLE = null;

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
        $data = $db->query('SELECT * FROM ' . static::TABLE . ' WHERE id=:id', static::class, $args);
        if ($data === false || empty($data)) {
            return false;
        }
        return $data[0];
    }

    /**
     * @return array
     */
    public static function findLastEntries()
    {
        $db = Db::instance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY ID DESC LIMIT 3';
        return $db->query($sql, static::class, []);
    }

    /**
     * @return bool
     */
    public function insert()
    {
        $col = [];
        $val = [];
        foreach ($this as $k => $v) {
            if ($k === 'id'||$k === 'data') {
                continue;
            }
            $col[] = $k;
            $val[':' . $k] = $v;
        }
        $sql = '
            INSERT INTO ' . static::TABLE . '(' . implode(',', $col) . ')
            VALUES
            (' . implode(',', array_keys($val)) . ')
            ';
        $db = Db::instance();
        $res = $db->execute($sql, $val);
        if ($res === false) {
            return false;
        }
        $this->id = $db->lastDbInsertId();
        return true;
    }

    /**
     * @return bool
     */
    public function update()
    {
        $col = [];
        $val = [];
        foreach ($this as $k => $v) {
            if ($k == 'id') {
                $val[':' . $k] = $v;
                continue;
            }
            $col[$k . '=:' . $k] = $k;
            $val[':' . $k] = $v;
        }
        $sql = '
            UPDATE ' . static::TABLE . ' SET ' . implode(',', array_keys($col)) . ' WHERE id=:id';
        $db = Db::instance();
        return $db->execute($sql, $val);
    }

    /**
     * @return bool
     */
    public function isNew()
    {
        return empty($this->id);
    }

    /**
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
<?php

namespace App\Models;

use App\Db;

require_once __DIR__ . '/../Db.php';

/**
 * Class Model
 * Maintains complex requests to Db class
 * forces childs to have TABLE field for db table name
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
        $db = Db::instance();
        $args = [':id' => $id];
        $data = $db->query('SELECT * FROM ' . static::TABLE . ' WHERE id=:id', $args, static::class);
        if ($data === false) {
            return false;
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
        //SELECT * FROM `news` WHERE id = (select max(id) from news)
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY ID DESC LIMIT 3';
        return $db->query($sql, [], static::class);
    }

    /**
     * insert method
     * takes public object fields except 'id'
     * @return bool
     */
    public function insert()
    {
        $col = [];
        $val = [];
        foreach ($this as $k => $v) {
            if ($k == 'id'||$k == 'data') {
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
     * update method
     * takes public object fields
     * @return bool
     */
    public function update()
    {
        $col = [];
        $val = [];
        foreach ($this as $k => $v) {
            if ($k == 'data') {
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
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $db = Db::instance();
        $args = [':id' => $this->id];
        return $db->execute($sql, $args);
    }
}
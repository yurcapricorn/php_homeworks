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
     * @param int $num
     * @return array
     */
    public static function findLastEntries($num)
    {
        $db = Db::instance();
        //SELECT * FROM `news` WHERE id = (select max(id) from news)
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY ID DESC LIMIT ' . $num;
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
            if ($k == 'id') {
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
        $db = new Db();
        $res = $db->execute($sql, $val);
        $article = static::findLastEntries(1)[0];
        $this->id = $article->id;
        return $res;
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
            if ($k == 'id') {
                continue;
            }
            $col[$k . '=:' . $k] = $k;
            $val[':' . $k] = $v;
        }
        $sql = '
            UPDATE ' . static::TABLE . ' SET ' . implode(',', array_keys($col)) . ' WHERE id=' . $this->id;
        $db = new Db();
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
        if ($this->IsNew()) {
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
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=' . $this->id;
        $db = new Db();
        return $db->execute($sql);
    }
}
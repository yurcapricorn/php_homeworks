<?php

namespace App;

/**
 * Class Db
 * @package App
 */
class Db
{
    /**
     * Trait Singleton
     */
    use \App\Singleton;

    /**
     * @var \PDO
     */
    protected $dbh;

    /**
     * Db constructor.
     * @throws DbException
     */
    public function __construct()
    {
        $config = Config::instance();
        try {
            $this->dbh = new \PDO('mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['name'],
                $config->data['db']['user'], $config->data['db']['pass']);
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new DbException($e);
        }
    }

    /**
     * @param $query
     * @param $class
     * @param array $params
     * @return array|bool (all database entries as $class objects array)
     * @throws DbException
     */
    public function query($query, $class = \stdClass::class, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        try {
            if (empty($params)) {
                $res = $sth->execute();
            } else {
                $res = $sth->execute($params);
            }
        } catch (\PDOException $e) {
            throw new DbException($e);
        }
        if ($res === false) {
            return false;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * @param $query
     * @param array $params
     * @return bool
     * @throws DbException
     */
    public function execute($query, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        try {
            if (!empty($params)) {
                $res = $sth->execute($params);
            } else {
                $res = $sth->execute();
            }
        } catch (\PDOException $e) {
            throw new DbException($e);
        }
        return $res;
    }

    /**
     * method to use PDO::lastInsertId() with protected Db field $dbh
     * @return string
     */
    public function lastDbInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}

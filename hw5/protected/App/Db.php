<?php

namespace App;

require_once __DIR__ . '/Singleton.php';


/**
 * Class Db
 * @package App
 */
class Db
{
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
        require_once __DIR__ . '/Config.php';
        $config = Config::instance();
        foreach($config->data['db'] as $key => $val){
            $$key = $val;
        }
        try {
            $this->dbh = new \PDO('mysql:host=' . $host . ';dbname=' . $name, $user, $pass);
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

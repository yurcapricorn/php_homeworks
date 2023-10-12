<?php

namespace App;

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
     */
    public function __construct()
    {
        $config = Config::instance();
        $this->dbh = new \PDO('mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['name'],
            $config->data['db']['user'], $config->data['db']['pass']);
    }

    /**
     * Db class method query()
     * @param string $query
     * @param array $params
     * @param $class (path to class)
     * @return bool|array (all database entries as $class objects array)
     */
    public function query($query, $class = \stdClass::class, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        if (empty($params)) {
            $res = $sth->execute();
        } else {
            $res = $sth->execute($params);
        }
        if ($res === false) {
            return false;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * Db Class Method execute()
     * @param $query
     * @param array $params
     * @return bool|\PDOStatement
     */
    public function execute($query, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        if (!empty($params)) {
            $res = $sth->execute($params);
        } else {
            $res = $sth->execute();
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

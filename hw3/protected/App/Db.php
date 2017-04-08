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
     */
    public function __construct()
    {
        require_once __DIR__ . '/Config.php';
        $config = Config::instance();
        $name = $config->data['db']['name'];
        $host = $config->data['db']['host'];
        $user = $config->data['db']['user'];
        $pass = $config->data['db']['pass'];
        $this->dbh = new \PDO('mysql:host=' . $host . ';dbname=' . $name, $user, $pass);
    }

    /**
     * Db class method query()
     * @param string $query
     * @param array $params
     * @param string $class (path to class)
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

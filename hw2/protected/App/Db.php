<?php

namespace App;

require_once __DIR__ . '/../autoload.php';

/**
 * Class Db
 * Maintains database connection
 * @package App
 */
class Db
{
    /**
     * singleton
     */
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
     * @param string $class (path to class)
     * @return bool|array (all database entries as $class objects array)
     */
    public function query($query, $class = \stdClass::class, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        $res = $sth->execute($params);
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
        return $sth->execute($params);
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

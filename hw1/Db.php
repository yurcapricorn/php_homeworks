<?php

/**
 * Class Db
 * keeps PDO in field $dbh
 */
class Db
{
    /**
     * @var PDO
     */
    protected $dbh;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=php2', 'root', '');
    }

    /**
     * @param string $query
     * @param array $params
     * @param string $class (path to class)
     * @return bool|array (all database entries as $class objects array)
     */
    public function query($query, $class = stdClass::class, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        if (empty($params)) {
            $res = $sth->execute();
        } else {
            $res = $sth->execute($params);
        }
        if (false === $res) {
            return false;
        }
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool
     */
    public
    function execute($query, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        if (!empty($params)) {
            $res = $sth->execute($params);
        } else {
            $res = $sth->execute();
        }
        return $res;
    }
}
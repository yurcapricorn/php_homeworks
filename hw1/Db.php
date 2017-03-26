<?php

/**
 * Class Db
 * Maintains database connection
 * has methods query and execute
 * keeps PDO in field $dbh
 */

class Db
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=php2', 'root', '');
    }

    /**
     * Db class method query()
     * @param string $query
     * @param array $params
     * @param string $class (path to class)
     * @return bool|array (all database entries as $class objects array)
     */
    public function query($query, $params = [], $class = '')
    {
        $sth = $this->dbh->prepare($query);
        if (empty($params)) {
            $res = $sth->execute();
        } else {
            $res = $sth->execute($params);
        }
        if (false===$res) {
            return false;
        }
        if (empty($class)) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(PDO::FETCH_CLASS, $class);
        }
    }

    /**
     * Db Class Method execute()
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

<?php

namespace App;

class Db
{
    private $dbh;
    private $config='mysql:host=127.0.0.1;dbname=test';

    public function __construct()
    {
        $this->dbh = new \PDO($this->config, 'root', '');
    }

    public function execute($sql, $args=[])
    {
        $sth = $this->dbh->prepare($sql);
        if (!empty($args)){
            $res = $sth->execute($args);
        }
        else if (empty($args)){
            $res = $sth->execute();
        }

        if ($res==false){return $res;}
        else {return $sth;}
    }

    public function query($sql, $args=[], $class = '')
    {
        $sth = static::execute($sql, $args);
        if (false !== $sth) {
            if ($class == '') {
                return $sth->fetchAll();
            } else {
                return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
            }
        }
        return [];
    }
}

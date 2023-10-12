<?php

namespace App;


class DbException extends \RuntimeException
{
    public function __construct(\PDOException $e)
    {
        $this->message = $e->getMessage();
        $this->file = $e->getFile();
        $this->line = $e->getLine();
    }
}
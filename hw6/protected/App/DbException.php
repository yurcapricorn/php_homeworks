<?php

namespace App;

/**
 * Class DbException
 * @package App
 */
class DbException extends \RuntimeException
{
    /**
     * DbException constructor.
     * @param \PDOException $e
     */
    public function __construct(\PDOException $e)
    {
        $this->message = $e->getMessage();
        $this->file = $e->getFile();
        $this->line = $e->getLine();
    }
}
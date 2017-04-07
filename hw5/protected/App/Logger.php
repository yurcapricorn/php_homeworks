<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07-Apr-17
 * Time: 23:28
 */

namespace App;


use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Logger extends AbstractLogger implements LoggerInterface
{
    public function log($level, $message, array $context = array()){
        $path = __DIR__ . '/../../log_file.php';
        $errors = $level ."\n". $message ."\n". $context;
        file_put_contents($path, $errors);
    }
}
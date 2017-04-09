<?php

namespace App;


use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Logger extends AbstractLogger implements LoggerInterface
{
    use Singleton;

    public function log($level, $message, array $context = []){
        $path = __DIR__ . '/../../log_file.php';
        $errors = "\n" . 'time: '. date('h-i-s : d-m-Y') . "\n" . $context['place'] ."\n" . $message . "\n";
        file_put_contents($path, $errors, FILE_APPEND);
    }
}
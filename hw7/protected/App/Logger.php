<?php

namespace App;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

/**
 * Class Logger
 * @package App
 */
class Logger extends AbstractLogger implements LoggerInterface
{
    /**
     * Singleton
     */
    use Singleton;

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     */
    public function log($level, $message, array $context = []){
        $config = Config::instance();
        $errors = "\n" . 'time: '. date('h-i-s : d-m-Y') . "\n" . $context['place'] ."\n" . $message . "\n";
        file_put_contents($config->data['log'], $errors, FILE_APPEND);
    }
}
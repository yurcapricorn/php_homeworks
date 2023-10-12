<?php

namespace App;

/**
 * Class Logger
 * @package App
 */
class Logger
{
    /**
     * Trait Singleton
     */
    use Singleton;

    /**
     * @param $level
     * @param $message
     * @param array $context
     */
    public function log($level, $message, array $context = []){
        $config = Config::instance();
        $errors = "\n" . 'time: '. date('h-i-s : d-m-Y') . "\n" . $context['place'] ."\n" . $message . "\n";
        file_put_contents($config->data['log'], $errors, FILE_APPEND);
    }
}
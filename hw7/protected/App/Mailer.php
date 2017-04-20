<?php

namespace App;

/**
 * Class Mailer
 * @package App
 */
class Mailer extends \Swift
{
    /**
     * singleton
     */
    use Singleton;
    /**
     * @var array
     */
    protected $data = [];

    /**
     * Mailer constructor.
     */
    public function __construct()
    {
        $config = \App\Config::instance();
        $this->data = $config->data['mail'];
    }

    /**
     * sendmail()
     * @param $message
     * @return int
     */
    public function sendMail($message)
    {
        foreach ($this->data as $key => $val) {
            $$key = $val;
        }
        $transport = \Swift_SmtpTransport::newInstance($smtp, $port, $encryption)
            ->setUsername($user)
            ->setPassword($pass);
        $swift = \Swift_Mailer::newInstance($transport);
        $content = $message;
        $message = \Swift_Message::newInstance('Db error')
            ->setFrom($from)
            ->setTo($to)
            ->setBody($content, 'text/html')
            ->addPart(strip_tags($content), 'text/plain');
        try {
            $swift->send($message);
        } catch (\Exception $e) {
            $logger = Logger::instance();
            $logger->log('mailer error', $e->getMessage(), ['place' => $e->getFile() . ' line ' . $e->getLine()]);
        }
    }
}
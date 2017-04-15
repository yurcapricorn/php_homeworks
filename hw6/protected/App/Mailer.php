<?php

namespace App;

/**
 * Class Mailer
 * @package App
 */
class Mailer
{
    use Singleton;

    protected $data = [];

    /**
     * Mailer constructor.
     */
    public function __construct()
    {
        $config = \App\Config::instance();
        $this->data = $config['mail'];
    }

    /**
     * mailing!
     */
    public function sendMail($message){

        foreach($this->data['mail'] as $key => $val){
            $$key = $val;
        }
        $transport = \Swift_SmtpTransport::newInstance($smtp, $port)
            ->setUsername($user)
            ->setPassword($pass);
        $swift = \Swift_Mailer::newInstance($transport);
        $content = $message;
        $message = \Swift_Message::newInstance('Db error')
            ->setFrom($from)
            ->setTo($to)
            ->setBody($content, 'text/html')
            ->addPart(strip_tags($content), 'text/plain');
        $swift -> send($message);
    }
}
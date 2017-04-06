<?php

namespace App\Controllers;


use App\View;

/**
 * Trait Base Controller
 * @package App\Controllers
 */
Trait Base
{
    protected $view;

    /**
     * Base constructor
     * instantiates $view field
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @param array $url
     * @return mixed
     */
    public function action(array $url = [])
    {
        $action = '';
        if (!empty($url)){
            $action = array_shift($url);
        }
        if ( $this->access($action) === false ) {
            echo 'access denied';
            die();
        }
        $method = 'action' . $action;
        return $this->$method($url);
    }

    /**
     * access method
     * @param string $action
     * @return bool|string
     */
    protected function access(string $action)
    {
        $methods = get_class_methods($this);
        foreach($methods as $method) {
            if ('action' . $action == $method) {
                return true;
            }
        }
        return false;
    }
}
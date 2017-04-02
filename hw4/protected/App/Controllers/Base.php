<?php

namespace App\Controllers;


use App\View;

Trait Base
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action(array $url = [])
    {
        $action = '';
        if (!empty($url)){
            $action = array_shift($url);
        }
        else if (!empty($_GET['act'])){
            $action = $_GET['act'];
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
    protected function access($action)
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
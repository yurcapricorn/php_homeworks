<?php

namespace App\Controllers;

use App\View;

/**
 * Trait Base Controller
 * @package App\Controllers
 */
Trait Base
{
    /**
     * @var View
     */
    protected $view;

    /**
     * Base constructor.
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
     * @return bool
     */
    protected function access(string $action)
    {
        return true;
    }
}
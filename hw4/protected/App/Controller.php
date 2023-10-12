<?php

namespace App;

/**
 * Base Controller
 * @package App
 */
Class Controller
{
    /**
     * @var $view
     */
    protected $view;

    /**
     * instantiates $view
     * Base constructor
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * action method
     * @param $action
     */
    public function action($action)
    {
        if (false === $this->access($action)) {
            die('Access denied!');
        }
        $action = 'action' . $action;
        $this->$action();
    }

    /**
     * access method
     * @param string $action
     * @return bool
     */
    protected function access($action)
    {
        return true;
    }
}
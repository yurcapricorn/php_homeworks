<?php

namespace App;

use App\View;

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
        if (true === $this->access($action)) {
            $action = 'action' . $action;
            $this->$action();
        } else {
            die('Access denied!');
        }
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
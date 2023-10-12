<?php

namespace App;


/**
 * Class Controller
 * @package App
 */
abstract class Controller
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
     * @param $action
     */
    public function action($action)
    {
        if ($this->access($action)) {
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
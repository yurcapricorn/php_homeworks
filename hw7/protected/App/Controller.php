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
     * action()
     * @param $name
     */
    public function action($name)
    {
        if ($this->access($name)) {
            $name = 'action' . $name;
            $this->$name();
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
<?php

namespace App;

/**
 * Class View
 * @package App
 */
class View implements \Countable, \Iterator
{
    use MagicTrait;

    /**
     * returns data with templates
     * @param $template
     * @return string
     */
    public function render($template)
    {
        ob_start();
        foreach ($this as $key => $value){
            $$key = $value;
        }
        include $template;
        $data = ob_get_contents();
        ob_end_clean();
        return $data;
    }

    /**
     * function display
     * displays data with templates
     * @param $template
     */
    public function display($template)
    {
        echo $this->render($template);
    }

    /**
     * function rewind Iterator Interface
     */
    public function rewind()
    {
        reset($this->data);
    }

    /**
     * function current Iterator Interface
     * @return mixed
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * function key Iterator Interface
     * @return mixed
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * function next Iterator Interface
     * @return mixed
     */
    public function next()
    {
        return next($this->data);
    }

    /**
     * function valid Iterator Interface
     * @return bool
     */
    public function valid()
    {
        return !empty(key($this->data));
    }

    /**
     * function count Countable Interface
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }
}
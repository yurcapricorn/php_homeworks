<?php

namespace App;

/**
 * Class View
 * displaying information with templates
 * @package App
 * @method __set($key,$value) @return bool
 * @method __isset() @return bool
 * @method __get(mixed $key) @return mixed|bool
 */
class View implements \Countable, \Iterator
{
    use \App\SomeMagic;

    /**
     * function render
     * returns data with templates
     * @param $template
     * @return string
     */
    public function render($template)
    {
        ob_start();
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
        $data = current($this->data);
        return $data;
    }

    /**
     * function key Iterator Interface
     * @return mixed
     */
    public function key()
    {
        $data = key($this->data);
        return $data;
    }

    /**
     * function next Iterator Interface
     * @return mixed
     */
    public function next()
    {
        $var = next($this->data);
        return $var;
    }

    /**
     * function valid Iterator Interface
     * @return bool
     */
    public function valid()
    {
        $key = key($this->data);
        $data = ($key !== NULL && $key !== FALSE);
        return $data;
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

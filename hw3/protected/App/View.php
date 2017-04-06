<?php

namespace App;


/**
 * Class View
 * @package App
 */
class View implements \Countable, \Iterator
{
    use \App\SomeMagic;

    /**
     * @param $template
     * @return string
     */
    public function render($template)
    {
        ob_start();
        foreach ($this as $key => $val){
            $$key = $val;
        }
        include $template;
        $data = ob_get_contents();
        ob_end_clean();
        return $data;
    }

    /**
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
        $data = ($key !== NULL && $key !== false);
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

<?php

namespace App;

/**
 * Class View
 * @package App
 */
class View implements \Countable, \Iterator
{
    /**
     * MagicTrait
     */
    use \App\MagicTrait;

    /**
     * render
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
     * display
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
        $key = key($this->data);
        return ($key !== NULL && $key !== false);
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

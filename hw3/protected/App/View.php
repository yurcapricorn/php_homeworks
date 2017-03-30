<?php

namespace App;

/**
 * Class View
 * displaying information with templates
 * @package App
 */
class View implements \Countable, \Iterator
{
    use \App\Models\SomeMagic;

    public function render($template)
    {
        ob_start();
        include $template;
        $data = ob_get_contents();
        ob_end_clean();
        return $data;
    }

    public function rewind()
    {
        reset($this->data);
    }

    public function current()
    {
        $data = current($this->data);
        return $data;
    }

    public function key()
    {
        $data = key($this->data);
        return $data;
    }

    public function next()
    {
        $var = next($this->data);
        return $var;
    }

    public function valid()
    {
        $key = key($this->data);
        $data = ($key !== NULL && $key !== FALSE);
        return $data;
    }

    public function count()
    {
        return count($this->data);
    }
}

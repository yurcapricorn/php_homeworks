<?php

namespace App;


use App\Models\Article;

class View implements \Countable, \Iterator
{
    use \App\Models\SomeMagic;

    private $position = 0;
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct()
    {
        $this->position = 0;
    }

    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function rewind()
    {
        var_dump(__METHOD__);
        $this->position = 0;
    }

    public function current()
    {
        var_dump(__METHOD__);
        return $this->data[$this->position];
    }

    public function key()
    {
        var_dump(__METHOD__);
        return $this->data[$this->position];
    }

    public function next()
    {
        var_dump(__METHOD__);
        ++$this->position;
    }

    public function valid()
    {
        var_dump(__METHOD__);
        return isset($this->data[$this->position]);
    }

    public function count()
    {
        return count($this->data);
    }
}

$news=Article::findAll();

//var_dump($news);

$it = new View($news);

var_dump($it);

foreach($it as $key => $value) {
    var_dump($key, $value);
    echo "<br>";
}
<?php

namespace App;

/**
 * Class View
 * @package App
 */
class View implements \Countable, \Iterator
{
    use MagicTrait;
    use Iterator;

    /**
     * returns data with templates
     * @param $template
     * @return string
     */
    public function renderTwig($template)
    {
        $path = $this->getPath($template);
        $loader = new \Twig_Loader_Filesystem($path['path']);
        $twig = new \Twig_Environment($loader, array(
            //'cache' => __DIR__ . '/../../cache/',
        ));
        return $twig->render( $path['file'], $this->data );
    }

    protected function getPath($template)
    {
        $path = str_replace('\\', '/', $template);
        $mas = explode('/', $path);
        $file = array_pop($mas);
        $path = implode('/', $mas);
        return ['file' => $file, 'path' => $path];
    }

    public function render($template)
    {
        ob_start();
        foreach ($this as $key => $value) {
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

    public function displayTwig($template)
    {
        echo $this->renderTwig($template);
    }
}
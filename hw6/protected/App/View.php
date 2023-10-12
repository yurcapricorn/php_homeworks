<?php

namespace App;

/**
 * Class View
 * @package App
 */
class View implements \Countable, \Iterator
{
    /**
     * Trait MagicTrait
     */
    use MagicTrait;
    /**
     * Trait Iterator
     */
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
        $config = Config::instance();
        $twig = new \Twig_Environment($loader, ['cache' => $config->data['cache']]); //cache
        return $twig->render( $path['file'], $this->data ); //rendering main page and passing to buffer
    }

    /**
     * returns data with templates
     * @param $template
     * @return array
     */
    protected function getPath($template)
    {
        $path = str_replace('\\', '/', $template);
        $mas = explode('/', $path);
        $file = array_pop($mas);
        $path = implode('/', $mas);
        return ['file' => $file, 'path' => $path];
    }

    /**
     * @param $template
     * @return string
     */
    public function render($template)
    {
        ob_start();
        foreach ($this as $key => $value) {
            $$key = $value;
        }
        include $template;
        return ob_get_clean();
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
     * display with twig
     * @param $template
     */
    public function displayTwig($template)
    {
        echo $this->renderTwig($template);
    }
}
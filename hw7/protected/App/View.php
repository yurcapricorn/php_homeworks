<?php

namespace App;

/**
 * Class View
 * @package App
 */
class View implements \Countable, \Iterator
{
    /**
     * @use magictrait
     * @use iterator
     */
    use MagicTrait;
    use Iterator;

    /**
     * twig renderer
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
        \PHP_Timer::start(); //timer starts
        ob_start(); //buffer starts
        echo $twig->render( $path['file'], $this->data ); //rendering main page and passing to buffer
        \PHP_Timer::stop(); //stops timer
        $resource = \PHP_Timer::resourceUsage();
        include __DIR__ . '/../../templates/news/footer.html'; //footer with resource usage display
        $data = ob_get_contents(); //buffer end
        ob_end_clean();
        return $data;
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
        \PHP_Timer::start();
        ob_start();
        foreach ($this as $key => $value) {
            $$key = $value;
        }
        include $template;
        \PHP_Timer::stop();
        $resource = \PHP_Timer::resourceUsage();
        include __DIR__ . '/../../templates/news/footer.html';
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
     * displayTwig method
     * @param $template
     */
    public function displayTwig($template)
    {
        echo $this->renderTwig($template);
    }
}
<?php

namespace App\Controllers;

/**
 * Controller Front
 * @package App\Controllers
 */
class Front
{
    /**
     * chooses controller
     * @param array $url = []
     */
    public function action(array $url = [])
    {
        $controller = '';
        if (!empty($url)){
            $controller = array_shift($url);
        }
        switch ($controller) {
            case('News'): {
                $news = new News();
                $news->action($url);
                break;
            }
            case('Admin'): {
                $admin = new Admin();
                $admin->action($url);
                break;
            }
            default: {
                $news = new News();
                $news->actionAll();
                break;
            }
        }
    }
}
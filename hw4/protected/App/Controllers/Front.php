<?php

namespace App\Controllers;


class Front
{

    public function action(array $url=[])
    {
        $controller = '';
        if (!empty($url)){
            $controller = array_shift($url);
        }
        else if (!empty($_GET['ctrl'])) {
            $controller = $_GET['ctrl'];
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
                $news->actionIndex();
                break;
            }
        }
    }
}
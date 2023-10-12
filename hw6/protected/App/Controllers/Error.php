<?php

namespace App\Controllers;

use App\Controller;

/**
 * Class Error
 * @package App\Controllers
 */
class Error extends Controller
{
    /**
     * actionDb error
     * @param $error
     */
    public function actionDb($error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../../../templates/errors/error.html');
    }

    /**
     * action404 error
     * @param $error
     */
    public function action404($error)
    {
        $this->view->error = $error;
        $this->view->display(__DIR__ . '/../../../templates/errors/404.html');
    }
}
<?php

namespace App\Controllers;

use App\DbException;
use App\Logger;
use App\NoPageException;
use App\ZZZException;

/**
 * Controller Front
 * @package App\Controllers
 */
class Front
{
    private $logger = NULL;

    /**
     * Front constructor.
     */
    public function __construct()
    {
        $this->logger = Logger::instance();
    }

    /**
     * @param array $url
     */
    public function action(array $url = [])
    {
        if (!empty($url[0])) {
            $action = array_shift($url);
        } else {
            $action = 'Default';
        }
        $method = 'action' . $action;
        try {
            $this->$method($url);
        } catch (DbException $e) {
            $this->logger->log('Db error', 'PDO Exception: ' . $e->getMessage(), ['place' => $e->getFile() . ' line ' . $e->getLine()]);
            $this->actionError(['Db']);
        } catch (NoPageException $e) {
            $this->logger->log('404', $e->getMessage(), ['place' => $e->getFile() . ' line ' . $e->getLine()]);
            $this->actionError(['404']);
        } catch (ZZZException $e) {
            $this->logger->log('ZZZ', $e->getMessage(), ['place' => $e->getFile() . ' line ' . $e->getLine()]);
        } finally {
            die();
        }
    }

    /**
     * @param $url
     */
    public function actionNews($url)
    {
        $news = new News();
        $news->action($url);
    }

    /**
     * @param $url
     */
    public function actionAdmin($url)
    {
        $admin = new Admin();
        $admin->action($url);
    }

    /**
     * @param $url
     */
    public function actionError($url)
    {
        $error = new Error();
        $error->action($url);
    }

    /**
     * Default Front controller method
     */
    public function actionDefault()
    {
        $news = new News();
        $news->actionAll();
    }
}
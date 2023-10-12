<?php

namespace App;

/**
 * Class AdminDataTable
 * @package App
 * класс AdminDataTable.
 * Его конструктор принимает на вход массив моделей (это будут строки таблицы) и массив функций (это будут столбцы)
 */
class AdminDataTable
{
    /**
     * @var array
     */
    protected $funcs = [];
    protected $models = [];

    /**
     * AdminDataTable constructor.
     * @param array $models
     * @param array $funcs
     */
    public function __construct(array $models, array $funcs) {
        $this->funcs = $funcs;
        $this->models = $models;
    }

    /**
     * render()
     * Метод render() отображает таблицу следующим образом:
     * Для каждой записи (это строка таблицы) последовательно вызываются функции (каждая - это столбец таблицы),
     * в них передается запись (модель)
     * То, что вернула функция - становится значением ячейки таблицы
     * returns data with template
     * @return string
     */
    public function render() {
        $view = new View();
        $view->functions = $this->funcs;
        $view->models = $this->models;
        return $view->render(__DIR__ . '/../../templates/admin/admindatatable.html');
    }
}
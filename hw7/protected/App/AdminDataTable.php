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
    protected $data = [];

    /**
     * AdminDataTable constructor.
     * @param array $func
     * @param array $models
     */
    public function __construct(array $func, array $models) {
        $this->data['func'] = $func;
        $this->data['models'] = $models;
    }

    /**
     * render()
     * Метод render() отображает таблицу следующим образом:
     * Для каждой записи (это строка таблицы) последовательно вызываются функции (каждая - это столбец таблицы),
     * в них передается запись (модель)
     * То, что вернула функция - становится значением ячейки таблицы
     */

    /**
     * returns data with template
     * @return string
     */
    public function render() {
        $view = new View();
        $view->functions = $this->data['func'];
        $view->models = $this->data['models'];
        return $view->render(__DIR__ . '/../../templates/admin/admindatatable.html');
    }
}
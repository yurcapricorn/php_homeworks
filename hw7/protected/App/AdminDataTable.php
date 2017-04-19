<?php


namespace App;

/**
 * Class AdminDataTable
 * @package App
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
        $this->data['model'] = $models;
    }

    /**
     * @return \Generator
     */
    public function render() {
        ob_start();
        include __DIR__ . '/../../templates/admin/admindatatable.html';
        $data = ob_get_contents();
        ob_clean();
        echo $data;
    }
}
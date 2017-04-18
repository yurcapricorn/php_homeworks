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
        $this->data['mod'] = $models;
    }

    /**
     * @return \Generator
     */
    public function render() {
        foreach($this->data['mod'] as $model){
            foreach($this->data['func'] as $func){
                yield $func($model);
            }
        }
    }
}
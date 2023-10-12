<?php

namespace app\models;

use yii\base\Model;

/**
 * Class Image
 * @package app\models
 */
class Image extends Model
{
    /**
     * @var $image
     */
    public $image;
    /**
     * @var string $folder
     */
    protected static $folder = __DIR__ . '/../web/uploads/';
    /**
     * rules
     * @return array
     */
    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg,png,gif']
        ];
    }

    /**
     * upload file method
     * @param $file
     * @param $currentimage
     * @return string
     */
    public function uploadFile($file, $currentimage)
    {
        $this->image = $file;
        if ($this->validate()) {
            $this->deleteCurrentImage($currentimage);
            return $this->saveImage();
        }
    }

    /**
     * delete current image
     * @param $currentimage
     */
    public static function deleteCurrentImage($currentimage)
    {
        if (!empty($currentimage)) {
            unlink(static::$folder . $currentimage);
        }
    }

    /**
     * saves image
     * @return string
     */
    protected function saveImage()
    {
        $filename = strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
        $this->image->saveAs(static::$folder . $filename);
        return $filename;
    }
}
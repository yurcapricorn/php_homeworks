<?php

namespace app\models;

use yii\base\Model;

/**
 * Class Image
 * @package app\models
 */
class Image extends Model
{
    public $image;

    /**
     * rules
     * @return array
     */
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png,gif']
        ];
    }

    /**
     * upload file method
     * @param \yii\web\UploadedFile $file
     * @param $currentimage
     * @return string
     */
    public function uploadFile(\yii\web\UploadedFile $file, $currentimage)
    {
        $this->image = $file;
        if ($this->validate()) {
            $this->deleteCurrentImage($currentimage);
            return $this->saveImage();
        }
    }

    /**
     * get folder method
     * @return string
     */
    protected static function getFolder()
    {
        return \Yii::getAlias('@web') . 'uploads/';
    }

    /**
     * file name generator
     * @return string
     */
    protected function generateFilename()
    {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

    /**
     * delete current image
     * @param $currentimage
     */
    public static function deleteCurrentImage($currentimage)
    {
        if (static::fileExists($currentimage)) {
            unlink(static::getFolder() . $currentimage);
        }
    }

    /**
     * file exists check
     * @param $currentimage
     * @return bool
     */
    protected static function fileExists($currentimage)
    {
        if (!empty($currentimage)) {
            return file_exists(static::getFolder() . $currentimage);
        }
    }

    /**
     * saves image
     * @return string
     */
    protected function saveImage()
    {
        $filename = $this->generateFilename();
        $this->image->saveAs($this->getFolder() . $filename);
        return $filename;
    }
}
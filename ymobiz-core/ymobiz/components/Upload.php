<?php

namespace ymobiz\components;

use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use Imagine\Image\Point;

/**
 * @inheritdoc
 */
class Upload extends UploadedFile
{

    static $baseUploadPath = '@webroot/upload/';
    static $baseUploadUrl = '/home/web/upload/';
    
    public function init()
    {
    	parent::init();
    }

    /**
     * @inheritdoc
     */
    public static function singleUpload($model,$input,$options=false)
    {
        if($model==true){
            $file = self::getInstance($model, $input);
        }else{
            $file = self::getInstanceByName($input);
        }

        return $file;
    }

    /**
     * @inheritdoc
     */
    public static function multipleUpload($model,$input,$options=false)
    {
        if($model==true){
            $files = UploadedFile::getInstances($model, $input);
        }else{
            $files = UploadedFile::getInstancesByName($input);
        }

        return $files;
    }

    public function saveSingleUpload($file, $options = false)
    {
        if (isset($file) && count($file) > 0) {
            if($file->size > 0){
                $folder = (ArrayHelper::getValue($options,'basePath')) ? \Yii::getAlias(ArrayHelper::getValue($options, 'basePath')) : \Yii::getAlias(static::$baseUploadPath);
                $fileName = (ArrayHelper::getValue($options, 'fileName')) ? ArrayHelper::getValue($options, 'fileName') . '.' . $file->extension : $file->baseName . '.' . $file->extension;
                $file->saveAs($folder . $fileName);
            }
        }
    }

    public function saveMultipleUpload($files, $options = false)
    {
        if (isset($files) && count($files) > 0) {
            foreach ($files as $file) {
                if($file->size > 0){
                    $folder = (ArrayHelper::getValue($options,'basePath')) ? \Yii::getAlias(ArrayHelper::getValue($options, 'basePath')) : \Yii::getAlias(static::$baseUploadPath);
                    $fileName = (ArrayHelper::getValue($options, 'fileName')) ? ArrayHelper::getValue($options, 'fileName') . '.' . $file->extension : $file->baseName . '.' . $file->extension;
                    $file->saveAs($folder . $fileName);
                }
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function imageProcess($image)
    {
        /*$fileType = explode('/',\yii\helpers\FileHelper::getMimeType($pic->name));

        if($fileType[0]=='image')
        {

            if($options['thumbnail']!=false)
            {
                \yii\imagine\Image::thumbnail($folderAlias.$fileName,$options['thumbnail']['width'],$options['thumbnail']['height'])
                    ->save($folderAlias.'thumb-'.$fileName, ['quality' => $options['thumbnail']['quality']]);
            }else if($options['crop']!=false)
            {
                \yii\imagine\Image::crop($folderAlias.'thumb-'.$fileName, $options['crop']['width'], $options['crop']['height'], [$options['crop']['x'], $options['crop']['y']])
                    ->save($folderAlias.'thumb-'.$fileName, ['quality' => $options['crop']['quality']]);
            }else{

                \yii\imagine\Image::getImagine()->open($folderAlias.$fileName)
                    ->save($folderAlias.'thumb-'.$fileName);
            }

            $mediaOptions = [
                'image' => Media::ImageSize($folderAlias.$fileName),
                'thumb' => Media::ImageSize($folderAlias.'thumb-'.$fileName),
            ];

            $media->options = json_encode($mediaOptions);
        }*/
    }

    /**
     * @inheritdoc
     */
    public function encodeImage ($filename=string,$filetype=string) {
        if ($filename) {
            $imgbinary = fread(fopen($filename, "r"), filesize($filename));
            return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
        }
    }
}
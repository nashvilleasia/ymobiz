<?php

/**
 * XeditableFileUpload class file.
 *
 * @author Marcio Camello <marciocamello@outlook.com>
 * @link http://
 * @copyright Copyright &copy; Marcio Camello 2014
 * @version 1.5.1
 */

namespace mcms\xeditable;

use common\models\ymocard\ymoClientsFiles;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class XEditableUploadAction extends Action
{
    public $modelclass;
    public $scenario;
    public $method;
    public $uploadType = 'preview';
    public $options;

    /**
     * @inheritdoc
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
       /* if ($this->modelclass === null) {
            throw new InvalidConfigException("'modelClass' cannot be empty.");
        }*/
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($_POST) {

            $pk=$_POST['pk'];
            $attribute=$_POST['name'];
            $class = $this->modelclass;

            if($_FILES)
            {

                /*Upload to database, folder, etc. Code is here*/
                if($this->uploadType == 'model'){

                    $model = $class::findOne($pk['id']);

                    if($class==null){

                        if(@ArrayHelper::getValue($_FILES[$attribute],'size') > 0)
                        {
                            $_FILES = $this->getFileArray($model->formName(),$_FILES);
                        }

                        $model->$attribute  = UploadedFile::getInstance($model, $attribute);

                        if ($model->validate()) {
                            $folder = \Yii::getAlias($_POST['pk']['options']['basePath']) . '/';
                            $fileName = $model->$attribute->baseName . '.' . $model->$attribute->extension;
                            $model->$attribute->saveAs($folder . $fileName);

                            $fileUrl = \Yii::$app->urlManager->createAbsoluteUrl($_POST['pk']['options']['baseUrl']) . '/' . $fileName;

                            if ($this->save(false)) {
                                print_r(json_encode($fileUrl));
                            }
                        }else{
                            print_r(json_encode(['error' => $model->getErrors()]));
                        }
                    }else{

                        if ($this->method !== null) {
                            $method = $this->method;
                            $model->$method($_POST);
                        }
                    }

                }else if($this->uploadType == 'manual'){

                    $file = UploadedFile::getInstanceByName($attribute);
                    $folder = \Yii::getAlias($_POST['pk']['options']['basePath']) . '/';
                    $fileName = $file->baseName . '.' . $file->extension;
                    $file->saveAs($folder . $fileName);
                    $fileUrl = \Yii::$app->urlManager->createAbsoluteUrl($_POST['pk']['options']['baseUrl']) . '/' . $fileName;
                    print_r(json_encode($fileUrl));

                }else if($this->uploadType == 'preview'){

                    $file = UploadedFile::getInstanceByName($attribute);
                    print_r(json_encode($this->base64_encode_image($file->tempName,$file->type)));
                }

            }else{
                print_r(json_encode($_POST));
            }
        }else{
            print_r(json_encode($_POST));
        }
    }

    /**
     * @inheritdoc
     */
    public function base64_encode_image ($filename=string,$filetype=string) {
        if ($filename) {
            $imgbinary = fread(fopen($filename, "r"), filesize($filename));
            return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
        }
    }

    /**
     * @inheritdoc
     */
    public function getFileArray($formName,$fileArray)
    {
        foreach($fileArray as $inputName => $file)
        {
            foreach($file as $key => $value)
            {
                $files[$formName][$key] = [
                    $inputName => $value
                ];

                /*$_FILES[$inputName] = [
                    'name' => null,
                    'type' => null,
                    'tmp_name' => null,
                    'error' => $file['error'],
                    'size' => 0
                ];*/
            }
        }

        return ArrayHelper::merge($files,$_FILES);
    }

}

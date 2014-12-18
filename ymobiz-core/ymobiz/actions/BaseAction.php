<?php

namespace ymobiz\actions;

use Yii;
use yii\base\Action;
use yii\helpers\ArrayHelper;

class BaseAction extends Action
{
    public $options;

    /**
     * @inheritdoc
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        //Yii::$app->request->enableCsrfValidation = false;
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if($this->options ||
            ArrayHelper::getValue($this->options,'model') ||
            ArrayHelper::getValue($this->options,'scenario') ||
            ArrayHelper::getValue($this->options,'action') ||
            ArrayHelper::getValue($this->options,'params')
        )
        {
            $action = $this->options['action'];
            return $this->$action();
        }else{

            /*Return form to validate form with ajax*/
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return [
                'name' => 'validationError',
                'message' => 'Action Errors.',
                'errors' => Yii::t('app','Action not set'),
                'content' =>  Yii::$app->controller->render('@common/errors/popup',[
                    'header' => Yii::t('app','Well done!'),
                    'body' => 'Action not set',
                    'footer' => Yii::t('app','ok'),
                ]),
                'status' => 400,
            ];
        }
    }

    /**
     * @inheritdoc
     */
    public function uploadResponse($file)
    {
        $upload = [
            'image' => '<img src="'.$this->base64_encode_image($file->tempName,$file->type).'" width="80">',
            'name' => $file->name,
            'tempName' => $file->tempName,
            'type' => $file->type,
            'size' => $file->size,
            'error' => $file->error,
        ];

        return '<pre>'.print_r($upload,true).'</pre>';
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
}
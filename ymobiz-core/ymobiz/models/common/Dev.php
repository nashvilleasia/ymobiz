<?php

namespace ymobiz\models\common;

use common\models\ymoClientsFiles;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\UploadedFile;
use ymobiz\components\Upload;

/**
 * This is the model class for table "dev".
 *
 * @property integer $id
 * @property string $name
 * @property string $options
 * @property integer $status
 * @property string $content
 * @property string $created_at
 */
class Dev extends \yii\db\ActiveRecord
{

    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;
    public $fileMultiple;
    public $fileStep;

    public $repassword;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dev';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('commondb');
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','email','password'], 'string'],

            [['name'], 'required'],
            [['status'], 'integer'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['updated_at'], 'safe'],

            //[['options'], 'safe'],
            ['options', 'filter', 'filter' => function ($value) {
                return implode(',', $value);
            },'on' => ['default','checkList']],

            ['created_at', 'filter', 'filter' => function ($value) {
                return strtotime($value);
            },'on' => ['default','dateFormat']],

            ['updated_at', 'filter', 'filter' => function ($value) {
                return strtotime($value);
            },'on' => ['default','dateFormat']],

            /*Upload rules*/
            [['file'], 'image', 'mimeTypes' => 'image/jpeg, image/jpg, application/pdf','on' => ['editableUpload']],

            [['file'], 'image','on' => ['singleUpload','activeFormOne']],
            [['file'], 'required','on' => ['singleUpload','activeFormOne']],
            [['file'], 'image', 'mimeTypes' => 'image/jpeg, image/jpg','on' => ['singleUpload','activeFormOne']],

            [['fileMultiple'], 'image','on' => ['multipleUpload']],
            [['fileMultiple'], 'required','on' => ['multipleUpload']],
            [['fileMultiple'], 'image', 'mimeTypes' => 'image/jpeg, image/jpg,application/pdf', 'on' => ['multipleUpload']],

            [['email','password','repassword'], 'required','on' => ['editableForm']],
            ['repassword', 'compare', 'compareAttribute' => 'password'],

            [['name','email','file'], 'required','on' => ['activeFormOne']],
            ['status', 'required', 'requiredValue' => 1, 'message' => 'You should accept term to use our service','on' => ['activeFormOne']],

            [['name'], 'required','on' => ['formStep1']],
            [['email'], 'required','on' => ['formStep2']],

            [['fileStep'], 'file','on' => ['formStep3'], 'skipOnEmpty' => true],
            [['fileStep'], 'string','on' => ['formStep3'], 'skipOnEmpty' => true],
            [['fileStep'], 'file', 'mimeTypes' => 'image/jpeg, image/jpg, image/png, image/jpg,application/pdf','on' => ['formStep3'], 'skipOnEmpty' => true],
        ];
    }

    public function validateStatus($attribute, $params)
    {
        if (!$attribute) {
            $this->addError($attribute, 'The country must be either "USA" or "Web".');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'repassword' => Yii::t('app', 'Repassword'),
            'options' => Yii::t('app', 'Options'),
            'status' => Yii::t('app', 'Status'),
            'content' => Yii::t('app', 'Content'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['editableForm'] = ['name','email','password','repassword'];
        $scenarios['singleUpload'] = ['file'];
        $scenarios['multipleUpload'] = ['fileMultiple'];
        $scenarios['activeFormOne'] = ['name','email','file','status'];
        $scenarios['formStep1'] = ['name'];
        $scenarios['formStep2'] = ['email'];
        $scenarios['formStep3'] = ['fileStep'];
        $scenarios['checkList'] = ['options'];
        $scenarios['dateFormat'] = ['created_at','updated_at'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function getFile($options=false)
    {
        return Html::img($this->path.$this->name,[
            'width' => '220'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (@$_FILES) {
            //$this->uploadFile();
        }

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function uploadFile()
    {
        $this->scenario = 'formStep3';
        //$files  = Upload::multipleUpload($this,'fileStep');
        $files = UploadedFile::getInstances($this,'fileStep');

        if (isset($files) && count($files) > 0) {
            foreach ($files as $file) {

                $ymoFiles = new ymoClientsFiles;
                $ymoFiles->clients_id=Yii::$app->user->id;
                $ymoFiles->name=$file->name;
                $ymoFiles->size=$file->size;
                $ymoFiles->filecontent=file_get_contents($file->tempName);
                $ymoFiles->mimetype=$file->type;
                $ymoFiles->extension=$file->extension;
                $ymoFiles->save(false);

                //$file->saveAs(\Yii::getAlias('@ymobiz/upload/') . $file->baseName . '.' . $file->extension);
            }
        }

        //if ($this->validate()) {
            //return $files;
        //}else{
            //return $this->errors;
        //}


    }

    /**
     * @inheritdoc
     */
    public function saveFile($data=false)
    {
        $model = self::findOne($data['pk']['id']);

        if(@ArrayHelper::getValue($_FILES['file'],'size') > 0)
        {
            $_FILES = $this->getFileArray($model->formName(),$_FILES);
        }

        $model->file  = UploadedFile::getInstance($model, 'file');
        $model->scenario = 'editableUpload';

        if ($model->validate()) {

            $folder = \Yii::getAlias($data['pk']['options']['basePath']) . '/';
            $fileName = $model->file->baseName . '.' . $model->file->extension;
            $model->file->saveAs($folder . $fileName);

            $fileUrl = \Yii::$app->urlManager->createAbsoluteUrl($data['pk']['options']['baseUrl']) . '/' . $fileName;

            $model->path = $data['pk']['options']['baseUrl'] . '/';

            $model->name = $model->file->baseName . '.' . $model->file->extension;
            $model->mimetype = $model->file->type;
            $model->extension = $model->file->extension;

            if ($model->save(false)) {
                print_r(json_encode($fileUrl));
            }
        }else{
            print_r(json_encode(['error' => $model->getErrors()]));
        }

        return false;
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

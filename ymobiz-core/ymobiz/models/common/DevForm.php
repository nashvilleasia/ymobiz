<?php

namespace ymobiz\models\common;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\UploadedFile;

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
class DevForm extends \yii\db\ActiveRecord
{

    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;
    public $fileMultiple;

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
            [['name'], 'string'],
            [['name'], 'required'],
            [['status'], 'integer'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['updated_at'], 'safe'],

            //[['options'], 'safe'],
            /*['options', 'filter', 'filter' => function ($value) {
                return implode(',', $value);
            }],

            ['created_at', 'filter', 'filter' => function ($value) {
                return strtotime($value);
            }],

            ['updated_at', 'filter', 'filter' => function ($value) {
                return strtotime($value);
            }],*/

            /*Upload rules*/
            [['file'], 'image', 'mimeTypes' => 'image/jpeg, image/jpg','on' => ['editableUpload']],

            [['file'], 'image','on' => ['singleUpload']],
            [['file'], 'required','on' => ['singleUpload']],
            [['file'], 'image', 'mimeTypes' => 'image/jpeg, image/jpg','on' => ['singleUpload']],

            [['fileMultiple'], 'image','on' => ['multipleUpload']],
            [['fileMultiple'], 'required','on' => ['multipleUpload']],
            [['fileMultiple'], 'image', 'mimeTypes' => 'image/jpeg, image/jpg', 'on' => ['multipleUpload']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
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
        $scenarios['singleUpload'] = ['file'];
        $scenarios['multipleUpload'] = ['fileMultiple'];
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

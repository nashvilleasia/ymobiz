<?php

namespace common\models\common;

use Yii;
use ymobiz\models\common\ymoSystem;
use common\models\ymoClients;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * This is the model class for table "ymo_clients_files".
 *
 * @property integer $id
 * @property integer $clients_id
 * @property integer $system_id
 * @property string $name
 * @property string $path
 * @property string $mimetype
 * @property string $extension
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property System $system
 * @property Clients $clients
 */
class DevUpload extends \yii\db\ActiveRecord
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
        return 'ymo_clients_files';
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
   /* public function attributes()
    {
        return array_merge(parent::attributes(), [
            'file'
        ]);
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['client_id'], 'required'],
            /*[['client_id', 'system_id', 'created_at', 'updated_at'], 'integer'],
            [['path'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['mimetype'], 'string', 'max' => 45],
            [['extension'], 'string', 'max' => 10],*/

            /*Upload rules*/
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
            'file' => '',
            'clients_id' => Yii::t('app', 'Clients ID'),
            'system_id' => Yii::t('app', 'System ID'),
            'name' => Yii::t('app', 'Name'),
            'path' => Yii::t('app', 'Path'),
            'mimetype' => Yii::t('app', 'Mimetype'),
            'extension' => Yii::t('app', 'Extension'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystem()
    {
        return $this->hasOne(ymoSystem::className(), ['id' => 'system_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasOne(ymoClients::className(), ['id' => 'clients_id']);
    }

    /**
     * @inheritdoc
     */
    public function uploadValidate()
    {
        if($_FILES['file']['size'] > 0 || $_FILES['fileMultiple']['size'] > 0 )
        {
            return true;
        }else{
            return false;
        }
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
    public function updateFile($data=false)
    {
        if ($this->validate()) {

            $this->path = $data['fileUrl'];

            $this->name = $data['file']->baseName . '.' . $data['file']->extension;
            $this->mimetype = $data['file']->type;
            $this->extension = $data['file']->extension;

            if ($this->save()) {
                return true;
            }
        }

        return false;
    }
}

<?php

namespace ymobiz\models\common;

use Yii;

/**
 * This is the model class for table "ymo_content_files".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property integer $status
 * @property string $mimetype
 * @property string $extension
 * @property integer $created_at
 * @property integer $updated_at
 */
class ymoContentsFiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_content_files';
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
    public function rules()
    {
        return [
            [['path'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['mimetype'], 'string', 'max' => 45],
            [['extension'], 'string', 'max' => 10]
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
            'path' => Yii::t('app', 'Path'),
            'status' => Yii::t('app', 'Status'),
            'mimetype' => Yii::t('app', 'Mimetype'),
            'extension' => Yii::t('app', 'Extension'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}

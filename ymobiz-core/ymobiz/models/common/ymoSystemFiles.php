<?php

namespace ymobiz\models\common;

use Yii;

/**
 * This is the model class for table "ymo_system_files".
 *
 * @property integer $id
 * @property integer $system_id
 * @property string $name
 * @property string $path
 * @property string $mimetype
 * @property string $extension
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property System $system
 */
class ymoSystemFiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_system_files';
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
            [['system_id', 'created_at', 'updated_at'], 'required'],
            [['system_id', 'created_at', 'updated_at'], 'integer'],
            [['path'], 'string'],
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
}

<?php

namespace ymobiz\models\common;

use Yii;

/**
 * This is the model class for table "ymo_languages".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $image
 * @property boolean $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property System[] $systems
 * @property SystemMessages[] $systemMessages
 */
class ymoLanguages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_languages';
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
            [['image'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['code', 'name'], 'string', 'max' => 100],
            [['code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystems()
    {
        return $this->hasMany(System::className(), ['languages_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystemMessages()
    {
        return $this->hasMany(SystemMessages::className(), ['languages_id' => 'id']);
    }
}

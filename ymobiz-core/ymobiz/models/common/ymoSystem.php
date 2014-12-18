<?php

namespace ymobiz\models\common;

use Yii;

/**
 * This is the model class for table "ymo_system".
 *
 * @property integer $id
 * @property integer $languages_id
 * @property string $code
 * @property string $name
 * @property string $type
 *
 * @property Languages $languages
 * @property SystemFiles[] $systemFiles
 */
class ymoSystem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_system';
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
            [['languages_id'], 'required'],
            [['languages_id'], 'integer'],
            [['name'], 'string'],
            [['code'], 'string', 'max' => 6],
            [['type'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'languages_id' => Yii::t('app', 'Languages ID'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasOne(ymoLanguages::className(), ['id' => 'languages_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystemFiles()
    {
        return $this->hasMany(ymoSystemFiles::className(), ['system_id' => 'id']);
    }
}

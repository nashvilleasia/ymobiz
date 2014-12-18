<?php

namespace ymobiz\models\common;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "ymo_system_messages".
 *
 * @property integer $id
 * @property integer $languages_id
 * @property integer $cluster_id
 * @property string $module
 * @property string $code
 * @property string $name
 * @property string $content
 * @property string $type
 * @property boolean $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Languages $languages
 */
class ymoSystemMessages extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_system_messages';
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
            [['languages_id', 'cluster_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'content', 'type'], 'string'],
            [['status'], 'integer'],
            [['module'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'languages_id' => Yii::t('app', 'Language'),
            'cluster_id' => Yii::t('app', 'Cluster'),
            'module' => Yii::t('app', 'Module'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'content' => Yii::t('app', 'Content'),
            'type' => Yii::t('app', 'Type'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasOne(Languages::className(), ['id' => 'languages_id']);
    }
}

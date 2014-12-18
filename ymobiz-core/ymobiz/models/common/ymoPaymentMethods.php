<?php

namespace ymobiz\models\common;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;

/**
 * This is the model class for table "ymo_payment_methods".
 *
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property string $type
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class ymoPaymentMethods extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_payment_methods';
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
            [['content','message'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'type'], 'string', 'max' => 100]
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
            'content' => Yii::t('app', 'Content'),
            'message' => Yii::t('app', 'Message'),
            'type' => Yii::t('app', 'Type'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypes()
    {
        return $this->hasOne(ymoPaymentTypes::className(), ['id' => 'type'])->where(['status'=>1]);
    }

    /**
     * @inheritdoc
     */
    public static function getMethods()
    {
    	foreach (self::find()->where(['status'=>1])->all() as $key => $value)
    	{
    		$payments = self::findOne($value->type);
    		$methods[Inflector::slug($payments->types->name)] = $payments->types->name;
    	}
    	
    	return $methods;
    }

    /**
     * @inheritdoc
     */
    public static function getMethodsByCondition($condition=[])
    {
    	$payments = ymoPaymentTypes::find()->where($condition)->one();
    	return self::find()->where(['type'=>$payments->id,'status'=>1])->one();
    }
}

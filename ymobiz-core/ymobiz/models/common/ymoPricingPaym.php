<?php

namespace ymobiz\models\common;

use Yii;

/**
 * This is the model class for table "ymo_pricing_paym".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $status
 *
 * @property PricingOrders[] $pricingOrders
 */
class ymoPricingPaym extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_pricing_paym';
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
            [['status'], 'required'],
            [['status'], 'integer'],
            [['code'], 'string', 'max' => 6],
            [['name'], 'string', 'max' => 50]
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
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPricingOrders()
    {
        return $this->hasMany(ymoPricingOrders::className(), ['paym_id' => 'id']);
    }
}

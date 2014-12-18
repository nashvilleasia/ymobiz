<?php

namespace ymobiz\models\common;

use Yii;

/**
 * This is the model class for table "ymo_pricing_orders".
 *
 * @property integer $id
 * @property integer $pricing_id
 * @property string $value
 * @property integer $currencies_id
 * @property integer $paym_id
 * @property integer $dateend
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Pricing $pricing
 * @property PricingPaym $paym
 * @property Currencies $currencies
 */
class ymoPricingOrders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_pricing_orders';
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
            [['pricing_id', 'currencies_id', 'paym_id'], 'required'],
            [['pricing_id', 'currencies_id', 'paym_id', 'dateend', 'created_at', 'updated_at'], 'integer'],
            [['value'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pricing_id' => Yii::t('app', 'Pricing ID'),
            'value' => Yii::t('app', 'Value'),
            'currencies_id' => Yii::t('app', 'Currencies ID'),
            'paym_id' => Yii::t('app', 'Paym ID'),
            'dateend' => Yii::t('app', 'Dateend'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPricing()
    {
        return $this->hasOne(ymoPricing::className(), ['id' => 'pricing_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaym()
    {
        return $this->hasOne(ymoPricingPaym::className(), ['id' => 'paym_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrencies()
    {
        return $this->hasOne(ymoCurrencies::className(), ['id' => 'currencies_id']);
    }
}

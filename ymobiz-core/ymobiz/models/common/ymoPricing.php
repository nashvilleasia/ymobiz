<?php

namespace ymobiz\models\common;

use Yii;

/**
 * This is the model class for table "ymo_pricing".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property string $value
 * @property integer $currencies_id
 *
 * @property PricingCat $cat
 * @property Currencies $currencies
 * @property PricingOrders[] $pricingOrders
 */
class ymoPricing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_pricing';
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
            [['cat_id', 'currencies_id'], 'required'],
            [['cat_id', 'currencies_id'], 'integer'],
            [['value'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cat_id' => Yii::t('app', 'Cat ID'),
            'value' => Yii::t('app', 'Value'),
            'currencies_id' => Yii::t('app', 'Currencies ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(ymoPricingCat::className(), ['id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrencies()
    {
        return $this->hasOne(ymoCurrencies::className(), ['id' => 'currencies_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPricingOrders()
    {
        return $this->hasMany(ymoPricingOrders::className(), ['pricing_id' => 'id']);
    }
}

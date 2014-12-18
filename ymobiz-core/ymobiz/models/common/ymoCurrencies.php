<?php

namespace ymobiz\models\common;

use Yii;

/**
 * This is the model class for table "ymo_currencies".
 *
 * @property integer $id
 * @property string $code
 * @property string $simbol
 * @property string $sbl_position
 * @property string $sbl_decimal
 * @property string $sbl_hundred
 * @property integer $num_decimal
 * @property integer $group_dig
 *
 * @property Countries[] $countries
 * @property Pricing[] $pricings
 * @property PricingOrders[] $pricingOrders
 */
class ymoCurrencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_currencies';
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
            [['sbl_position', 'sbl_decimal', 'sbl_hundred', 'num_decimal', 'group_dig'], 'required'],
            [['num_decimal', 'group_dig'], 'integer'],
            [['code', 'simbol'], 'string', 'max' => 3],
            [['sbl_position', 'sbl_decimal', 'sbl_hundred'], 'string', 'max' => 1]
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
            'simbol' => Yii::t('app', 'Simbol'),
            'sbl_position' => Yii::t('app', 'Sbl Position'),
            'sbl_decimal' => Yii::t('app', 'Sbl Decimal'),
            'sbl_hundred' => Yii::t('app', 'Sbl Hundred'),
            'num_decimal' => Yii::t('app', 'Num Decimal'),
            'group_dig' => Yii::t('app', 'Group Dig'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(ymoCountries::className(), ['currencies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPricings()
    {
        return $this->hasMany(ymoPricing::className(), ['currencies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPricingOrders()
    {
        return $this->hasMany(ymoPricingOrders::className(), ['currencies_id' => 'id']);
    }
}

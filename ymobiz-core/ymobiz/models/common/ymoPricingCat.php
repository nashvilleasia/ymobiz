<?php

namespace ymobiz\models\common;

use Yii;

/**
 * This is the model class for table "ymo_pricing_cat".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 *
 * @property Pricing[] $pricings
 */
class ymoPricingCat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_pricing_cat';
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
            [['code'], 'string', 'max' => 5],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPricings()
    {
        return $this->hasMany(ymoPricing::className(), ['cat_id' => 'id']);
    }
}

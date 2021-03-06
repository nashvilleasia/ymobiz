<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use ymobiz\models\common\ymoCountries;

/**
 * This is the model class for table "ymo_clients_addresses".
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $countries_id
 * @property string $address
 * @property string $city
 * @property string $zipcode
 * @property string $state
 * @property integer $shipping_default
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Clients $client
 * @property Countries $countries
 */
class ymoClientsAddresses extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_clients_addresses';
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
            [['client_id', 'countries_id', 'shipping_default', 'created_at', 'updated_at','status'], 'integer'],
            [['address', 'city', 'state'], 'string', 'max' => 255],
            [['zipcode'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'client_id' => Yii::t('app', 'Client ID'),
            'countries_id' => Yii::t('app', 'Countries ID'),
            'address' => Yii::t('app', 'Address'),
            'city' => Yii::t('app', 'City'),
            'zipcode' => Yii::t('app', 'Zipcode'),
            'state' => Yii::t('app', 'State'),
            'shipping_default' => Yii::t('app', 'Shipping Default'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(ymoClients::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasOne(ymoCountries::className(), ['id' => 'countries_id']);
    }
}

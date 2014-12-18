<?php

namespace common\models;

use Yii;
use common\models\ymoCountries;

/**
 * This is the model class for table "ymo_clients_passport".
 *
 * @property integer $id
 * @property integer $clients_id
 * @property integer $countries_id
 * @property string $code
 * @property integer $dateissue
 * @property integer $dateexpiration
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Countries $countries
 * @property Clients $clients
 */
class ymoClientsPassport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_clients_passport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clients_id', 'countries_id'], 'required'],
            [['clients_id', 'countries_id', 'dateissue', 'dateexpiration', 'created_at', 'updated_at'], 'integer'],
            [['code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'clients_id' => Yii::t('app', 'Clients ID'),
            'countries_id' => Yii::t('app', 'Countries ID'),
            'code' => Yii::t('app', 'Code'),
            'dateissue' => Yii::t('app', 'Dateissue'),
            'dateexpiration' => Yii::t('app', 'Dateexpiration'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasOne(ymoCountries::className(), ['id' => 'countries_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasOne(ymoClients::className(), ['id' => 'clients_id']);
    }
}

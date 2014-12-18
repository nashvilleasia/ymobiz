<?php

namespace common\models;

use Yii;
use common\models\ymoCountries;

/**
 * This is the model class for table "ymo_clients_nationality".
 *
 * @property integer $id
 * @property integer $clients_id
 * @property integer $countries_id
 * @property string $idcard_code
 * @property integer $idcard_dateissue
 * @property integer $idcard_dateexpiration
 * @property string $sscard_code
 * @property integer $sscard_dateissue
 * @property integer $sscard_dateexpiration
 * @property string $txcard_code
 * @property integer $txcard_dateissue
 * @property integer $txcard_dateexpiration
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Countries $countries
 * @property Clients $clients
 */
class ymoClientsNationality extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_clients_nationality';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clients_id', 'countries_id'], 'required'],
            [['clients_id', 'countries_id', 'idcard_dateissue', 'idcard_dateexpiration', 'sscard_dateissue', 'sscard_dateexpiration', 'txcard_dateissue', 'txcard_dateexpiration', 'created_at', 'updated_at'], 'integer'],
            [['idcard_code', 'sscard_code'], 'string', 'max' => 255],
            [['txcard_code'], 'string', 'max' => 45]
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
            'idcard_code' => Yii::t('app', 'Idcard Code'),
            'idcard_dateissue' => Yii::t('app', 'Idcard Dateissue'),
            'idcard_dateexpiration' => Yii::t('app', 'Idcard Dateexpiration'),
            'sscard_code' => Yii::t('app', 'Sscard Code'),
            'sscard_dateissue' => Yii::t('app', 'Sscard Dateissue'),
            'sscard_dateexpiration' => Yii::t('app', 'Sscard Dateexpiration'),
            'txcard_code' => Yii::t('app', 'Txcard Code'),
            'txcard_dateissue' => Yii::t('app', 'Txcard Dateissue'),
            'txcard_dateexpiration' => Yii::t('app', 'Txcard Dateexpiration'),
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

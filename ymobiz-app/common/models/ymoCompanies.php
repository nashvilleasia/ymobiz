<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "ymo_companies".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $altemail
 * @property string $phone
 * @property string $mobphone
 * @property string $fax
 * @property string $address
 * @property string $zipcode
 * @property string $altaddress
 * @property string $altzipcode
 * @property string $website
 * @property string $longitude
 * @property string $latitude
 * @property string $taxcode
 * @property integer $companies_cats_id
 * @property integer $currencies_id
 * @property integer $countries_id
 * @property integer $languages_id
 * @property string $bizpartner
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property CompaniesCats $companiesCats
 * @property Countries $countries
 * @property Currencies $currencies
 * @property Languages $languages
 * @property CompaniesUsers[] $companiesUsers
 */
class ymoCompanies extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_companies';
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
            [['id'], 'required'],
            [['id', 'companies_cats_id', 'currencies_id', 'countries_id', 'languages_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['bizpartner'], 'string'],
            [['name', 'altemail', 'address', 'website'], 'string', 'max' => 255],
            [['email', 'fax', 'zipcode', 'altzipcode'], 'string', 'max' => 45],
            [['phone', 'mobphone'], 'string', 'max' => 30],
            [['altaddress'], 'string', 'max' => 2555],
            [['longitude', 'latitude'], 'string', 'max' => 12],
            [['taxcode'], 'string', 'max' => 20]
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
            'email' => Yii::t('app', 'Email'),
            'altemail' => Yii::t('app', 'Altemail'),
            'phone' => Yii::t('app', 'Phone'),
            'mobphone' => Yii::t('app', 'Mobphone'),
            'fax' => Yii::t('app', 'Fax'),
            'address' => Yii::t('app', 'Address'),
            'zipcode' => Yii::t('app', 'Zipcode'),
            'altaddress' => Yii::t('app', 'Altaddress'),
            'altzipcode' => Yii::t('app', 'Altzipcode'),
            'website' => Yii::t('app', 'Website'),
            'longitude' => Yii::t('app', 'Longitude'),
            'latitude' => Yii::t('app', 'Latitude'),
            'taxcode' => Yii::t('app', 'Taxcode'),
            'companies_cats_id' => Yii::t('app', 'Companies Cats ID'),
            'currencies_id' => Yii::t('app', 'Currencies ID'),
            'countries_id' => Yii::t('app', 'Countries ID'),
            'languages_id' => Yii::t('app', 'Languages ID'),
            'bizpartner' => Yii::t('app', 'Bizpartner'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesCats()
    {
        return $this->hasOne(CompaniesCats::className(), ['id' => 'companies_cats_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasOne(Countries::className(), ['id' => 'countries_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrencies()
    {
        return $this->hasOne(Currencies::className(), ['id' => 'currencies_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasOne(Languages::className(), ['id' => 'languages_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesUsers()
    {
        return $this->hasMany(CompaniesUsers::className(), ['companies_id' => 'id']);
    }
}

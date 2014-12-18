<?php

namespace common\models\forms;

use Yii;
use yii\db\ActiveRecord;
use ymobiz\models\common\ymoCountries;
use ymobiz\models\common\ymoStates;
use common\models\auth\ymoAccountSettings;

/**
 * This is the model class for table "ymo_clients".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $ufirstname
 * @property string $ulastname
 * @property string $email
 * @property string $dob
 * @property integer $gender
 * @property string $phone
 * @property string $mobile
 * @property string $taxcode
 * @property string $zipcode
 * @property string $address
 * @property string $city
 * @property string $state
 * @property integer $countries_id
 * @property integer $countryob_id
 * @property integer $countrynat_id
 * @property integer $countrydoctype_id
 * @property integer $termsconditions
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Clients $client
 * @property Countries $countries
 */
class ymoClientsForm extends ActiveRecord
{
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_clients';
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
     
    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'country',
        ]);
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['countries_id', 'updated_at'], 'integer','on' => ['updateContact']],
        		
            [['phone','mobile', 'address', 'city', 'state', 'zipcode'], 'string','on' => ['updateContact']],
        		
            [['phone', 'address', 'city', 'zipcode'], 'required','on' => ['updateContact']],
        		
        	[['phone','mobile'], 'match', 'pattern' => '/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/',
        			'message'=> Yii::t('app','{attribute} number dont\' valid.'),
        			'on' => ['updateContact']],
        		
        	[['zipcode'], 'match', 'pattern' => '/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){4,45}$/',
        			'message'=> Yii::t('app','{attribute} number dont\' valid.'),
        			'on' => ['updateContact']],
        		
        	/*['company_countries_id'], 'common\validators\CountryPhoneCodeValidator', 'model' => $this, '
        		fieldsReplace' => ['company_phone_prefix'], 'on' => ['updateCompany']],*/
        		
        	['countries_id', 'common\validators\StateCodeValidator', 'model' => $this,
        		'fieldsReplace' => 'state', 'tagDisplay' => 'states_countriesid','scenario'=>'updateContact',
        		'stateWhere' => ['BRA','CAN','USA'],'editable' => true, 'on' => ['updateContact']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'default' => ['phone', 'mobile', 'email', 'address', 'city', 'state', 'zipcode','countries_id','updated_at'],
            'updateContact' => ['phone', 'mobile', 'address', 'city', 'state', 'zipcode','countries_id','updated_at'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country' => Yii::t('app', 'country'),
            'countries_id' => Yii::t('app', 'country'),
            'name' => Yii::t('app', 'name'),
            'phone' => Yii::t('app', 'phone'),
            'mobile' => Yii::t('app', 'mobile'),
            'address' => Yii::t('app', 'address'),
            'city' => Yii::t('app', 'city'),
            'zipcode' => Yii::t('app', 'postal / zip code'),
            'stateCountry' => Yii::t('app', 'state'),
            'state' => Yii::t('app', 'state'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
    	if($this->countries_id){
    		return ymoCountries::find()->where(['id'=>$this->countries_id])->one()->name;
    	}
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStateCountry()
    {
    	if(is_numeric($this->state)){
    		return ymoStates::find()->where(['id'=>$this->state])->one()->name;
    	}else{
    		return $this->state;
    	}
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function updateContact()
    {
    	$account = new ymoAccountSettings;
    	
    	$model = self::find()->where(['id'=>$account->contact->id])->one();
        $model->scenario = 'updateContact';
        
    	$model->attributes = $model->load(Yii::$app->request->post());
    	
    	$validate = [];
    	
    	if($model->validate($validate)){
    		$model->update();
    		return true;
    	}
    	return false;
    }
    
    
}

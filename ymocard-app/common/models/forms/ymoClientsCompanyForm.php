<?php

namespace common\models\forms;

use Yii;
use yii\db\ActiveRecord;
use ymobiz\models\common\ymoCountries;
use ymobiz\models\common\ymoStates;
use common\models\auth\ymoAccountSettings;

/**
 * This is the model class for table "ymo_clients_company".
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $countries_id
 * @property string $name
 * @property string $phone
 * @property string $phone_id
 * @property string $address
 * @property string $city
 * @property string $zipcode
 * @property string $state
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Clients $client
 * @property Countries $countries
 */
class ymoClientsCompanyForm extends ActiveRecord
{
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_clients_company';
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
            [['client_id','countries_id', 'updated_at'], 'integer','on' => ['updateCompany']],
        		
            [['name', 'phone', 'address', 'city', 'state', 'zipcode'], 'string','on' => ['updateCompany']],
        		
        	//[['name', 'phone', 'address', 'city', 'state', 'zipcode'], 'required','on' => ['updateCompany']],
        		
        	[['phone'], 'match', 'pattern' => '/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/',
        			'message'=> Yii::t('app','{attribute} number dont\' valid.'),
        			'on' => ['updateCompany']],
        		
        	[['zipcode'], 'match', 'pattern' => '/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){4,45}$/',
        			'message'=> Yii::t('app','{attribute} number dont\' valid.'),
        			'on' => ['updateCompany']],
        		
        	/*['company_countries_id'], 'common\validators\CountryPhoneCodeValidator', 'model' => $this, '
        		fieldsReplace' => ['company_phone_prefix'], 'on' => ['updateCompany']],*/
        		
        	['countries_id', 'common\validators\StateCodeValidator', 'model' => $this,
        		'fieldsReplace' => 'state', 'tagDisplay' => 'company_state_countriesid','scenario'=>'updateCompany',
        		'stateWhere' => ['BRA','CAN','USA'],'editable' => true, 'on' => ['updateCompany']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'default' => ['client_id', 'name', 'phone', 'address', 'city', 'state', 'zipcode','countries_id','updated_at'],
            'updateCompany' => ['client_id', 'name', 'phone', 'address', 'city', 'state', 'zipcode','countries_id','updated_at'],
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
    	$country = ymoCountries::find()->where(['id'=>$this->countries_id])->one();
    	if($country){
    		return $country->name;
    	}
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStateCountry()
    {
    	if(is_numeric($this->state)){
    		$state = ymoStates::find()->where(['id'=>$this->state])->one();
    		if($state){
    			return $state->name;
    		}
    	}else{
    		return $this->state;
    	}
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function updateCompany()
    {
    	$account = new ymoAccountSettings;
    	
    	$model = self::find()->where(['client_id'=>$account->company->client_id])->one();
        $model->scenario = 'updateCompany';
        
    	$model->attributes = $model->load(Yii::$app->request->post());
    	
    	$validate = [];
    	
    	if($model->validate($validate)){
    		$model->update();
    		return true;
    	}
    	return false;
    }
    
    
}

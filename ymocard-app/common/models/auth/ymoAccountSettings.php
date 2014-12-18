<?php

namespace common\models\auth;

use Yii;
use common\models\ymoClients;
use common\models\ymoClientsFiles;
use ymobiz\helpers\Password;
use common\models\ymoClientsCompany;
use common\models\forms\ymoClientsCompanyForm;
use common\models\forms\ymoClientsForm;
use common\models\forms\ymoClientsShippingForm;
use ymobiz\auth\ymoUser;

class ymoAccountSettings extends ymoUser
{

    public $password;
    public $currentpassword;
    public $repassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currentpassword','password','repassword'], 'string', 'min' => 6, 'on' => ['updateAccount']],
            [['email','currentpassword','password','repassword'], 'required','on' => ['updateAccount']],
            ['repassword', 'compare', 'compareAttribute' => 'password'],
        		
            [['password','repassword'], 'string', 'min' => 6, 'on' => ['updateAccountSupervisor']],
            [['email','username'], 'required','on' => ['updateAccountSupervisor']],

            ['currentpassword', function ($attr) {
                if (!empty($this->$attr) && !Password::validate($this->$attr, $this->password_hash)) {
                    $this->addError($attr, \Yii::t('app', 'Current password is not valid'));
                }
            }, 'on' => ['updateAccount']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'name'),
            'email' => Yii::t('app', 'email'),
            'status' => Yii::t('app', 'status'),
            'password' => Yii::t('app', 'new password'),
            'repassword' => Yii::t('app', 'repeat new password'),
            'currentpassword' => Yii::t('app', 'current password'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'default' => ['username','email'],
            'updateAccount' => ['username','email','password','repassword','currentpassword'],
            'updateAccountSupervisor' => ['username','email','password','repassword','status'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function updateAccountDetail()
    { 
        
        if ($this->validate()) {

            if ($this->update()) {

            	$checkUser = self::findOne(['email'=>$this->email]);
            	$checkUser->scenario = 'updateAccount';
            	
            	$checkClient = ymoClientsForm::findOne(['user_id'=>$checkUser->id]);
	            
            	if($checkClient){
	            	$checkClient->email = $this->email;
	            	$checkClient->update();
            	}
            	
                return true;
            }
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function updateAccountDetailSupervisor()
    { 	
    	$this->scenario = 'updateAccountSupervisor';
        $this->attributes = $this->load(Yii::$app->request->post());
        
        $this->status_code = ($this->status==1) ? 'active' : 'blocked';
        
        if ($this->validate()) {

            if ($this->update()) {
            	
            	$checkUser = self::findOne(['email'=>$this->email]);
            	
            	$checkClient = ymoClientsForm::findOne(['user_id'=>$checkUser->id]);
            	$checkClient->email = $this->email;
            	
            	if($checkClient->validate()){
            		$checkClient->update();
            		return true;
            	}else{
            		return false;
            	}
            	
                return true;
            }
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function getClients($id=false)
    {
        $clients = new ymoClients;
        $clients->scenario = 'updateContact';
        $ymoClients = $clients->find()->where(['user_id' => ($id) ? $id : Yii::$app->user->id]);
        if($ymoClients){
            return $ymoClients;
        }
    }

    /**
     * @inheritdoc
     */
    public function getAccounts($id=false)
    {
        $this->scenario = 'updateAccount';
        return $this->find()->where(['id' => ($id) ? $id : Yii::$app->user->id]);
    }

    /**
     * @inheritdoc
     */
    public function getAccountsSupervisor($id=false)
    {
        $this->scenario = 'updateAccountSupervisor';
        return $this->find()->where(['id' => ($id) ? $id : Yii::$app->user->id]);
    }

    /**
     * @inheritdoc
     */
    public function getShipping()
    {
        $model = new ymoClientsShippingForm;
        $model->scenario = 'updateShipping';
        if($this->clients==true){
        	$ymoShipping = $model->find()->where(['client_id' => ymoClients::findClientId()]);
        	if($ymoShipping->one()!=false){
        		return $ymoShipping;
        	}else{
        		return $model;
        	}
        }else{
        	return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function getCompany()
    {
        $model = new ymoClientsCompanyForm;
        $model->scenario = 'updateCompany';
        if($this->clients==true){
        	$ymoCompany = $model->find()->where(['client_id' => ymoClients::findClientId()]);
        	if($ymoCompany->one()!=false){
        		return $ymoCompany;
        	}else{
        		return $model;
        	}
        }else{
        	return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function getContact()
    {
        $model = new ymoClientsForm;
        $model->scenario = 'updateContact';
        if($this->clients==true){
        	$ymoContact = $model->find()->where(['user_id' => ymoClients::findClientId()]);
        	if($ymoContact->one()!=false){
        		return $ymoContact;
        	}else{
        		return $model;
        	}
        }else{
        	return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function getDocuments()
    {
        $clientFiles = new ymoClientsFiles;
        $clientFiles->scenario = 'singleUpload';
        if($this->clients==true){
            $ymoClientsFiles = $clientFiles->find()->where(['clients_id' => ymoClients::findClientId()]);
            if($ymoClientsFiles->all()!=false){
                return $ymoClientsFiles;
            }else{
            	return $clientFiles;
            }
        }else{
        	return false;
        }
    }
}

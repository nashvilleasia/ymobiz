<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use ymobiz\auth\ymoUser;

/**
 * This is the model class for table "ymo_clients_messages".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $card_id
 * @property string $group
 * @property string $title
 * @property string $message
 * @property integer $created_at
 * @property integer $updated_at
 */
class ymoClientsMessages extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_clients_messages';
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
            [['user_id', 'card_id', 'created_at', 'updated_at'], 'integer'],
            [['title','message'], 'string'], 
        	['group', 'in', 'range' => array_keys(self::messageSendersSupervisor()),'on'=>['SupervisorSendMessages']],
        	['user_id', 'default', 'value' => Yii::$app->user->id],
            [['title','message'], 'required'], 
            
            [['user_id','title','message'], 'required','on' => ['SupervisorSendMessages']], 
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
        	'default' => ['user_id','title','group','message','mode','module'],
        	'SupervisorSendMessages' => ['user_id','title','group','message','mode','module'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'card_id' => Yii::t('app', 'Card ID'),
            'group' => Yii::t('app', 'Group'),
            'title' => Yii::t('app', 'Title'),
            'message' => Yii::t('app', 'Message'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(ymoClients::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(ymoUser::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(ymoCards::className(), ['id' => 'card_id']);
    }

    /**
     * @inheritdoc
     */
    public function getListMessage($data=false)
    {

        $fileList = '<span class="message-list">';
        $fileList .= $this->getMessages($data);
        $fileList .= '</span>';
        
        return $fileList;
    }

    /**
     * @inheritdoc
     */
    public function getMessages($data=false)
    {
        $messages = self::find()
	        ->where(['user_id'=>ymoClients::findClientId(),'card_id'=>ymoCards::findCardId()])
	        ->orderBy('created_at desc')
	        ->limit(@$data['limit'])
	        ->all();
		
        $messagesList = false;
        
        foreach($messages as $message)
        {
            $messagesList .= ' <li>
                                 <span>></span>received at '.Yii::$app->formatter->asDatetime($message->created_at,"dd.MM.yyyy HH:mm").'
                                <p class="ymo-text-a">
                                    "'.Yii::$app->getModule('site')->ymoTranslate->t('site','app','Dear').', '.ymoCards::findOne($message->card_id)->name.'<br/>
                                    '.$message->message.'”
                                </p>
                            </li>';
        }
        
        if($messagesList){
        	return $messagesList;
        }else{
        	return '<li>'.Yii::$app->getModule('site')->ymoTranslate->t('site','app','No messages').'</li>';
        }
    }

    /**
     * @inheritdoc
     */
    public function saveMessagesSupervisor()
    {
        
    	$this->card_id = Yii::$app->request->post('cardid');
    	$this->user_id = ymoCards::findOne(Yii::$app->request->post('cardid'))->client_id;
    	$this->admin_id = Yii::$app->user->id;

    	$groups = $this->clearFalseValues($this->group);
    	
    	if($groups){
    		foreach ($groups as $groupID){
    			$extraMessage = new self;
    			$extraMessage->scenario = 'SupervisorSendMessages';
    			$extraMessage->mode = 'cc';
    			$extraMessage->module = Yii::$app->request->post('module');
    			$extraMessage->title = $this->title;
    			$extraMessage->message = $this->message;
    			$extraMessage->card_id = $this->card_id;
    			$extraMessage->user_id = ($groupID=='user') ? ymoClients::findOne(['user_id'=>$this->user_id])->id : 
    				ymoClients::findOne(['user_id'=>$this->user_id])->partner_id;
    			$extraMessage->group = $groupID;
    			if($extraMessage->validate()){
		    		$extraMessage->save(false);
		    	}else{
		    		return $extraMessage->errors;
		    	}
    		}
    	}

    	$this->module = Yii::$app->request->post('module');
    	$this->mode = null;
    	$this->group = null;
    	
    	if($this->validate()){
    		$this->save(false);
    		return true;
    	}else{
		    return $this->errors;
		}
    	return false;
    }

    /**
     * @inheritdoc
     */
    public static function messageSendersSupervisor()
    {
    	return [
    		'partner' => 'partner',
    		'user' => 'user'
    	];
    }

    /**
     * @inheritdoc
     */
    public function clearFalseValues($array=false)
    {
    	if($array){
	    	foreach ($array as $key=>$value){
	    		if($value==false){
	    			unset($array[$key]);
	    		}
	    	}
	    	 
	    	sort($array);
    	}
    	
    	return $array;
    	
    }
    
}

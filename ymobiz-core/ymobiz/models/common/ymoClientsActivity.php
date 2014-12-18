<?php

namespace ymobiz\models\common;

use Yii;
use yii\db\ActiveRecord;
use ymobiz\auth\ymoUser;
use common\models\ymoClients;
use common\models\ymoCards;

/**
 * This is the model class for table "ymo_clients_activity".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $message
 * @property integer $created_at
 * @property integer $updated_at
 */
class ymoClientsActivity extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_clients_activity';
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
            [['card_id', 'created_at', 'updated_at'], 'integer'],
            [['title','message'], 'string'],
            [['title'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'card_id' => Yii::t('app', 'Card ID'),
            'title' => Yii::t('app', 'Title'),
            'message' => Yii::t('app', 'Message'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function viewActivityByClient()
    {
    	return self::find()->where(['user_id'=>ymoClients::findClientId(),'card_id'=>ymoCards::findCardId()]);
    }

    /**
     * @inheritdoc
     */
    public function listActivityByClient()
    {
    	return new \yii\data\ActiveDataProvider([
    		'query' => self::find()->where(['user_id'=>ymoClients::findClientId(),'card_id'=>ymoCards::findCardId()]),
    		'pagination' => [
    			'pageSize' => 14,
    			'pageSizeParam' => false
    		],
    	]);
    }

    /**
     * @inheritdoc
     */
    public static function saveActivity($id,$message,$user=false)
    {
    	$activity = new self;
    	$activity->user_id = ($user) ? $user : ymoClients::findClientId();
    	$activity->card_id = $id;
    	$activity->title = $message;
    	if($activity->save(false)){
    		return true;
    	}
    	return false;
    }

    /**
     * @inheritdoc
     */
    public function getListActivity($data=false,$user=false)
    {

        $fileList = '<span class="activity-list">';
        $fileList .= $this->getActivities($data,$user);
        $fileList .= '</span>';
        
        return $fileList;
    }

    /**
     * @inheritdoc
     */
    public function getActivities($data=false,$user=false)
    {
    	
    	if($user){
	        $activities = self::find()
		        ->where(['user_id'=>$user])
		        ->orderBy('created_at desc, updated_at desc')
		        ->limit(@$data['limit'])
		        ->all();
    	}else{
	        $activities = self::find()
	        ->where(['user_id'=>ymoClients::findClientId(),'card_id'=>ymoCards::findCardId()])
	        ->orderBy('created_at desc, updated_at desc')
	        ->limit(@$data['limit'])
	        ->all();
    	}
		
        $activitiesList = false;
        
        foreach($activities as $activity)
        {
            $activitiesList .= ' <li>
					        		<span>></span> ' . $activity->title . ' ' .  Yii::$app->formatter->asDatetime($activity->created_at,"dd.MM.yyyy HH:mm") . '
								</li>';
        }
        
        if($activitiesList){
        	return $activitiesList;
        }else{
        	return '<li>'.Yii::$app->getModule('site')->ymoTranslate->t('site','app','No activities').'</li>';
        }
    }
    
    
}

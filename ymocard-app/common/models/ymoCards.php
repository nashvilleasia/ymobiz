<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use ymobiz\helpers\Password;
use ymobiz\auth\ymoUser;
use ymobiz\models\common\ymoClientsActivity;
use yii\base\Model;
use common\models\forms\ymoNewCardHolderForm;

/**
 * This is the model class for table "ymo_cards".
 *
 * @property integer $id
 * @property integer $clients_id
 * @property string $cardnumber
 * @property string $cardpin
 * @property string $title
 * @property string $name
 * @property string $status
 * @property string $plafond
 * @property integer $dateissue
 * @property integer $dateexpiration
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Clients $clients
 */
class ymoCards extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_cards';
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
            [['id', 'client_id', 'created_at', 'updated_at','status'], 'integer', 'on' => ['RegisterCard']],
            [['cardpin'], 'string', 'length' => [10, 10], 'on' => ['RegisterCard']],
            ['cardnumber', 'string', 'length' => [16, 16], 'on' => ['RegisterCard']],
            [['security'], 'string', 'length' => [3, 3], 'on' => ['RegisterCard']],
            [['name'], 'string',  'length' => [10, 20], 'on' => ['RegisterCard']],
            [['title','plafond'], 'string', 'on' => ['RegisterCard','DefinePlafond']],
        		
        	[['cardnumber'], 'unique', 'on' => ['RegisterCard']],

        		
			[['title', 'cardpin', 'cardnumber', 'dateissue',  'dateexpiration'], 'required', 'on' => ['RegisterCard']],
        		
        	[['dateissue', 'dateexpiration'], 'safe', 'on' => ['RegisterCard']],
        		
        	['dateissue', 'filter', 'filter' => function ($value) {
        		return strtotime(str_replace('/', '-',$value));
        	}, 'on' => ['RegisterCard']],
        	
        	['dateexpiration', 'filter', 'filter' => function ($value) {
        		return strtotime(str_replace('/', '-',gmdate('d/m/Y',strtotime('01/' . $value))));
        	}, 'on' => ['RegisterCard']],

            /*Rules for OrderCard*/
            [['title', 'name', 'status'], 'required', 'on' => ['OrderCard']],
            
            /*Rules for DefinePlafon*/
        	[['plafond'], 'string', 'on' => ['DefinePlafond']],
        	[['plafond'], 'required', 'on' => ['DefinePlafond']],
        ];
    }

    /**
     * @inheritdoc
    */
    public function fields()
    {
    	return [
    		'dateexpiration' => function () {
           		return date('d/MM/Y',$this->dateissue);
        	},
    		'dateissue' => function () {
           		return date('d/MM/Y',$this->dateissue);
        	},
    	];
    }
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'client_id' => Yii::t('app', 'Client'),
            'cardnumber' => Yii::t('app', 'Card Number'),
            'cardpin' => Yii::t('app', 'Card Pin'),
            'title' => Yii::t('app', 'Title'),
            'status' => Yii::t('app', 'Status'),
            'plafond' => Yii::t('app', 'Plafond'),
            'dateissue' => Yii::t('app', 'Date Issue'),
            'dateexpiration' => Yii::t('app', 'Date Expiration'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }


    /**
     * @inheritdoc
     */
    public function getOrdersOne()
    {
    	return $this->hasOne(ymoOrders::className(), ['card_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     */
    public function getOrdersMany()
    {
    	return $this->hasMany(ymoOrders::className(), ['card_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     */
    public function getClientsOne()
    {
    	return $this->hasOne(ymoClients::className(), ['user_id' => 'client_id']);
    }
    
    
    /**
     * @inheritdoc
     */
    public function getClientsMany()
    {
    	return $this->hasMany(ymoClients::className(), ['user_id' => 'client_id']);
    }
    
    /**
     * @inheritdoc
     */
    public function getComplianceOne()
    {
    	return $this->hasOne(ymoClientsFiles::className(), ['clients_id' => 'client_id']);
    }
    
    
    /**
     * @inheritdoc
     */
    public function getComplianceMany()
    {
    	return $this->hasMany(ymoClientsFiles::className(), ['clients_id' => 'client_id']);
    }
    
    /**
     * @inheritdoc
     */
    public static function findCardId()
    {
    	$cardID = Yii::$app->request->get('cardid');
    	$match = Yii::$app->request->get('filter');
    	$search = Yii::$app->request->get('search');
    	 
    	if($cardID!=false AND $match==false AND $search==false){
    		return $cardID;
    	}else if($match){
    
    		$query = self::find()->where(['ymo_cards.client_id'=>ymoClients::findClientId()])
    			->joinWith('ordersMany')->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    
    		if($cardID){
    
    			$query->andWhere(['ymo_cards.id' => $cardID]);
    
    		}else{
    			 
    			$query->andWhere(['like', 'ymo_cards.status_code', str_replace('-', ' ', $match)]);
    			$query->orWhere(['like', 'ymo_orders.status_compliance', str_replace('-', ' ', $match)]);
    			$query->orWhere(['like', 'ymo_orders.status_treasury', str_replace('-', ' ', $match)]);
    			$query->orWhere(['like', 'ymo_orders.status_emission', str_replace('-', ' ', $match)]);
    			 
    		}
    
    		foreach ($query->all() as $key=>$card){
    			if($key==0){
    				return $card->id;
    			}
    		}
    	}else if($search){
    
    		$query = self::find()->where(['ymo_cards.client_id'=>ymoClients::findClientId()])
    			->joinWith('ordersMany')->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    
    		if($cardID){
    			 
    			$query->andWhere(['ymo_cards.id' => $cardID]);
    			 
    		}else{
    			 
    			$query->andWhere(['like', 'ymo_cards.name', str_replace('-', ' ', $search)]);
    		  
    		}
    
    		foreach ($query->all() as $key=>$card){
    			if($key==0){
    				return $card->id;
    			}
    		}
    
    	}else{
    		$query = self::find()->where(['ymo_cards.client_id'=>ymoClients::findClientId()])
    			->joinWith('ordersMany')->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    		
    		foreach ($query->all() as $key=>$card){
    			if($key==0){
    				return $card->id;
    			}
    		}
    	}
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasOne(ymoClients::className(), ['id' => 'clients_id']);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
        	'default' => [],
        	'RegisterCard' => ['title','client_id','name','cardpin','cardnumber','status','plafond','status_code','security','dateissue','dateexpiration'],
            'OrderCard' => ['title','client_id','cardpin','cardnumber','status','plafond','dateissue','dateexpiration'],
            'DefinePlafond' => ['plafond'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function getFormateDate($attribute,$format)
    {
    	return date($format,$this->$attribute);
    }

    /**
     * @inheritdoc
     */
    public function viewCardByClient()
    {
    	$cardID = Yii::$app->request->get('cardid');
    	$match = Yii::$app->request->get('filter');
    	$search = Yii::$app->request->get('search');
    	
    	if($cardID==false AND $match==false AND $search==false){
    		return self::find()->where(['ymo_cards.client_id'=>ymoClients::findClientId()])
    			->joinWith('ordersMany')->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    	}else if($match){
    
    		$query = self::find()->where(['ymo_cards.client_id'=>ymoClients::findClientId()])
    			->joinWith('ordersMany')->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    
    		if($cardID){
    
    			$query->andWhere(['ymo_cards.id' => $cardID]);
    
    		}else{
    			 
    			$query->andWhere(['like', 'ymo_cards.status_code', str_replace('-', ' ', $match)]);
    			$query->orWhere(['like', 'ymo_orders.status_compliance', str_replace('-', ' ', $match)]);
    			$query->orWhere(['like', 'ymo_orders.status_treasury', str_replace('-', ' ', $match)]);
    			$query->orWhere(['like', 'ymo_orders.status_emission', str_replace('-', ' ', $match)]);
    			 
    		}
    		
    		return $query;
    		
    	}else if($search){
    
    		$query = self::find()->where(['ymo_cards.client_id'=>ymoClients::findClientId()])
    			->joinWith('ordersMany')->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    
    		if($cardID){
    			 
    			$query->andWhere(['ymo_cards.id' => $cardID]);
    			 
    		}else{
    			 
    			$query->andWhere(['like', 'ymo_cards.name', str_replace('-', ' ', $search)]);
    		  
    		}
    		
    		return $query;
    	}else{
    		return self::find()->where(['ymo_cards.id' => $cardID,'ymo_cards.client_id'=>ymoClients::findClientId()])
    			->joinWith('ordersMany')->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    	}
    }

    /**
     * @inheritdoc
     */
    public function listCardsByClient()
    {
    	return new \yii\data\ActiveDataProvider([
    		'query' => self::find()->where(['client_id'=>ymoClients::findClientId()])->orderBy('created_at desc,updated_at desc'),
    		'pagination' => [
    			'pageSize' => 14,
    			'pageSizeParam' => false
    		],
    	]);
    }
    
    /**
     * @inheritdoc
     */
    public function filterCardsByClient()
    {
    	$match = Yii::$app->request->get('filter');
    	
    	if($match=='all'){
    		Yii::$app->controller->redirect('/'.Yii::$app->controller->module->id);
    	}
    	
    	$query = self::find()->where(['ymo_cards.client_id'=>ymoClients::findClientId()])
    		->joinWith('ordersMany')->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    	
    	$query->andWhere(['like', 'ymo_cards.status_code', $match]);
    	$query->orWhere(['like', 'ymo_orders.status_compliance', str_replace('-', ' ', $match)]);
    	$query->orWhere(['like', 'ymo_orders.status_treasury', str_replace('-', ' ', $match)]);
    	$query->orWhere(['like', 'ymo_orders.status_emission', str_replace('-', ' ', $match)]);
    
    	return new \yii\data\ActiveDataProvider([
    		'query' => $query,
    		'pagination' => [
    			'pageSize' => 14,
    			'pageSizeParam' => false
    		],
    	]);
    }
    
    /**
     * @inheritdoc
     */
    public function searchCardsByClient()
    {
    	if(Yii::$app->request->post('search')){
    		Yii::$app->controller->redirect(['default/index', 'search' => Yii::$app->request->post('search')]);
    	}

    	$query = self::find()->where(['ymo_cards.client_id'=>ymoClients::findClientId()])
    		->joinWith('ordersMany')->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    	
    	$match = Yii::$app->request->get('search');
    
    	$query->andWhere(['like', 'ymo_cards.name', str_replace('-', ' ', $match)]);
    
    	return new \yii\data\ActiveDataProvider([
    		'query' => $query,
    		'pagination' => [
    			'pageSize' => 14,
    			'pageSizeParam' => false
    		],
    	]);
    }

    /**
     * @inheritdoc
     */
    public function listStatus()
    {
        return [
             null => Yii::t('app','select one filter'),
            'all' => 'all',
            'active' => 'active',
        	'pendent' => 'pendent',
        	'pendent-compliance' => 'pendent compliance',
        	'confirmed-compliance' => 'confirmed compliance',
        	'pendent-payment' => 'pendent payment',
        	'confirmed-payment' => 'confirmed payment',
        	'pendent-emission' => 'pendent emission',
        	'confirmed-emission' => 'confirmed emission',
        	'blocked' => 'blocked',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function generateCard($id,$title,$name,$checkSave=false,$scenario=false)
    {
    	
    	$protect = new Password;
    	
    	if($scenario){
    		$this->scenario = $scenario;
    	}
    	
    	$this->client_id = $id;

    	$date_start = strtotime('1 January 2016');
    	$date_end = strtotime('1 December 2022');
    	$rand_date = rand($date_start, $date_end);
    	$this->title = $title;
    	$this->name = $name;
    	$this->cardnumber = $protect->generateInt(16);
    	$this->cardpin = $protect->generateInt(10);
    	$this->security = $protect->generateInt(3);
    	$this->plafond = '0';

    	$this->dateexpiration = date('d', $rand_date) . '/' . date('Y', $rand_date);
    	$this->dateissue = date('m/d/Y', $rand_date);
    	$this->status_code = 'pendent';
    	$this->status = 0;
    	
    	if(!$this->validate()){
    		if($checkSave==false){
    			return $this;
    		}
    	}else{
    		return $this->errors;
    		exit;
    	}
    }

    /**
     * @inheritdoc
     */
    public static function hideCardNumber($string, $start, $end, $char=false, $replacement='...') {
    	$result = '';
    
    	$length = strlen($string) - $start - $end;
    	if ($length <= 0) {
    		$result = $string;
    	}
    	else {
    		if($replacement==false){
    			$replacement = sprintf("%'{$char}" . $length . "s", $char);
    		}
    		$result = substr_replace($string, $replacement, $start, $length);
    	}
    
    	return $result;
    }

    /**
     * @inheritdoc
     */
    public function blockYmocard()
    {
    	$cardID = Yii::$app->request->post('cardid');
    	$cards = self::findOne($cardID);
    	$cards->status_code = 'blocked';
    	$cards->status = 0;
    	if($cards->save()){
    		ymoClientsActivity::saveActivity($cardID,'ymocard block date');
    		return true;
    	}
    	return false;
    }

    /**
     * @inheritdoc
     */
    public function unblockYmocard()
    {	
    	
    	$cardID = Yii::$app->request->post('cardid');
    	$cards = self::findOne($cardID);
    	$cards->status_code = 'active';
    	$cards->status = 1;
    	if($cards->save()){
    		ymoClientsActivity::saveActivity($cardID,'ymocard unblock date');
    		return true;
    	}
    	return false;
    }

    /**
     * @inheritdoc
     */
    public function getDefinePlafond()
    {
        $cards = new self;
        $cards->scenario = 'DefinePlafond';
        $cardID = Yii::$app->request->get('cardid');
        $ymoCards = $cards->find()->where(['id' => $cardID]);
        if($ymoCards !== null){
            return $ymoCards;
        }
    }

    /**
     * @inheritdoc
     */
    public function savePlafond()
    {
    	 
    	$model = self::find()->where(['client_id'=>ymoClients::findClientId(),'id'=>ymoCards::findCardId()])->one();
    	$model->scenario = 'DefinePlafond';
    	
    	$model->attributes = $model->load(Yii::$app->request->post());
    	 
    	$validate = [];
    	 
    	if($model->validate($validate)){
    		ymoClientsActivity::saveActivity($model->id,'ymocard plafond change by value ' . Yii::$app->formatter->asCurrency($model->plafond));
    		$model->update();
    		return true;
    	}
    	return false;
    }
    
}

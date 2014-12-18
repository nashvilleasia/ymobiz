<?php

namespace common\models\grid;

use Yii;
use common\models\ymoCards;
use common\models\ymoClients;
use common\models\ymoOrders;
use common\models\ymoClientsCompany;
use common\models\ymoClientsFiles;
use common\models\ymoClientsAddresses;
use common\models\forms\ymoClientsShippingForm;
use common\models\ymoClientsMessages;
use yii\helpers\Inflector;

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
class ymoCardsSupervisor extends ymoCards
{

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
	public function getClientsById($id=false,$attribute=false)
	{
		$result = ymoClients::find()->where([
			'user_id' => $id
		]);

		if($result->one()){
			if($attribute){
				return $result->one()->$attribute;
			}else{
				return $result->one();
			}
		}else{
			return false;
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getPartnersById($id=false,$attribute=false)
	{
		if(ymoClients::findOne(['user_id'=>$id])){
			$result = ymoClientsCompany::find()->where([
				'client_id' => ymoClients::findOne(['user_id'=>$id])->user_id
			]);
	
			if($result->one()){
				if($attribute){
					return $result->one()->$attribute;
				}else{
					return $result->one();
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getAddressById($id=false,$attribute=false)
	{
		$result = ymoClientsAddresses::find()->where([
			'client_id' => $id
		]);
		
		if($result->one()){
			if($attribute){
				return $result->one()->$attribute;
			}else{
				return $result->one();
			}
		}else{
			return false;
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getShippingById($id=false,$attribute=false)
	{
		$result = ymoClientsShippingForm::find()->where([
			'client_id' => $id,
			'shipping_default' => 0
		]);
		
		if($result->one()){
			if($attribute){
				return $result->one()->$attribute;
			}else{
				return $result->one();
			}
		}else{
			return false;
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getMessagesById($id=false,$card=false,$attribute=false)
	{
		$result = ymoClientsMessages::find()->where([
			'user_id' => $id,
			'card_id' => $card,
		]);
		
		if($result->one()){
			if($attribute){
				return $result->one()->$attribute;
			}else{
				return $result->one();
			}
		}else{
			return false;
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getFilesOne()
	{
		return $this->hasOne(ymoClientsFiles::className(), ['clients_id' => 'client_id']);
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
    		
    		$query = self::find()->joinWith('ordersMany')->orderBy('created_at desc,updated_at desc');	
    		
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
    		
    		$query = self::find()->joinWith('ordersMany')->orderBy('created_at desc,updated_at desc');
    		
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
    	
    		foreach (self::find()->orderBy('created_at desc,updated_at desc')->all() as $key=>$card){
    			if($key==0){
    				return $card->id;
    			}
    		}
    	}
    }
	
    /**
     * @inheritdoc
     */
    public function viewCard()
    {
    	$cardID = Yii::$app->request->get('cardid');
    	$match = Yii::$app->request->get('filter');
    	$search = Yii::$app->request->get('search');
    	
    	if($cardID==false AND $match==false AND $search==false){
    		return self::find()->joinWith('ordersMany')->orderBy('created_at desc,updated_at desc');
    	}else if($match){
    		
    		$query = self::find()->joinWith('ordersMany')->orderBy('created_at desc,updated_at desc');
    			
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
    		
    		$query = self::find()->joinWith('ordersMany')->orderBy('created_at desc,updated_at desc');
    		
    		if($cardID){
    			
    			$query->andWhere(['ymo_cards.id' => $cardID]);
    			
    		}else{
    		
		    	$query->andWhere(['like', 'ymo_cards.name', str_replace('-', ' ', $search)]);
    		}
    		
    		return $query;
    	}else{
    		return self::find()->where(['id'=>$cardID]);
    	}
    }

    /**
     * @inheritdoc
     */
	public function listCards($params=false,$condition=false)
    {
    	return new \yii\data\ActiveDataProvider([
    		'query' => self::find()->orderBy('created_at desc,updated_at desc'),
    		'pagination' => [
    			'pageSize' => 14,
    			'pageSizeParam' => false
    		],
    	]);
    }
    
    /**
     * @inheritdoc
     */
    public function filterCards($view=false)
    {
    	$match = Yii::$app->request->get('filter');
    	
    	if($match=='all'){
    		Yii::$app->controller->redirect('/'.($view) ? $view : Yii::$app->controller->module->id);
    	}
    
    	$query = self::find()->joinWith('ordersMany')->orderBy('created_at desc,updated_at desc');
    	
    	$query->andWhere(['like', 'ymo_cards.status_code', str_replace('-', ' ', $match)]);
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
    public function searchCards($view='default/index')
    {
    	if(Yii::$app->request->post('search')){
    		Yii::$app->controller->redirect([$view, 'search' => str_replace(' ', '-', Yii::$app->request->post('search'))]);
    	}
    
    	$query = self::find()->joinWith('ordersMany')->orderBy('created_at desc,updated_at desc');
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
    public function getDocuments($id=false)
    {
        $clientFiles = new ymoClientsFiles;
        $clientFiles->scenario = 'singleUpload';
   	 	$ymoClientsFiles = $clientFiles->find()->where(['clients_id' => $id]);
        if($ymoClientsFiles->all()!=false){
            return $ymoClientsFiles->one()->getListUploadDocs(['limit'=>5],$id);
        }else{
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public static function checkCompliance($id=false)
    {
    	$cardOrders = ymoOrders::find()->where(['card_id'=>$id])->one();
    	
    	if($cardOrders->status_compliance=='pendent compliance'){
    		return 'style="color: #f00000;"';
    	}else if($cardOrders->status_compliance=='confirmed compliance'){
    		return false;
    	}
    }

    /**
     * @inheritdoc
     */
    public static function checkEmission($id=false)
    {
    	$cardOrders = ymoOrders::find()->where(['card_id'=>$id])->one();
    	
    	if($cardOrders->status_emission=='pendent emission'){
    		return 'style="color: #f00000;"';
    	}else if($cardOrders->status_treasury=='confirmed payment'  && $cardOrders->status_compliance=='confirmed compliance'  && $cardOrders->status_emission=='confirmed emission'){
    		return false;
    	}
    }

    /**
     * @inheritdoc
     */
    public static function checkTreasury($id=false)
    {
    	$cardOrders = ymoOrders::find()->where(['card_id'=>$id])->one();
    	
    	if($cardOrders->status_treasury=='pendent payment'){
    		return 'style="color: #f00000;"';
    	}else if($cardOrders->status_treasury=='confirmed payment' && $cardOrders->status_compliance=='confirmed compliance'){
    		return false;
    	}
    }

    /**
     * @inheritdoc
     */
    public static function checkBlocked($id=false)
    {
    	$cards = self::find()->where(['id'=>$id])->one();
    	
    	if($cards->status_code=='blocked'){
    		return 'style="color: #000000;"';
    	}else{
    		return false;
    	}
    }

    /**
     * @inheritdoc
     */
    public static function checkStatusCard($id=false)
    {	
    	$cards = self::find()->where(['id'=>$id])->one();
    	if($cards->status_code=='blocked'){
    		return 'style="color: #000000;"';
    	}else if($cards->status_code=='pendent'){
    		return 'style="color: #f00000;"';
    	}else if($cards->status_code=='active' && $cards->ordersOne->status_treasury=='confirmed payment'
    			 && $cards->ordersOne->status_compliance='confirmed compliance' && $cards->ordersOne->status_emission=='confirmed emission'){
    		return false;
    	}
    }
}

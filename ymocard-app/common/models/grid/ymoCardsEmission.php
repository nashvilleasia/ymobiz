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
class ymoCardsEmission extends ymoCardsSupervisor
{
    

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
    		
    		$query = self::find()->joinWith('ordersMany')
    			->where(['ymo_orders.status_emission'=>'pendent emission',
	    				'ymo_orders.status_compliance'=>'confirmed compliance',
	    				'ymo_orders.status_treasury'=>'confirmed payment'])
			    ->orWhere(['ymo_orders.status_emission'=>'confirmed emission'])
			    ->onCondition('ymo_cards.status_code != :cards_status_code',['cards_status_code'=>'blocked'])
			    ->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');	
    		
    		if($cardID){
    		
    			$query->andWhere(['ymo_cards.id' => $cardID]);
    		
    		}else{
    			
	    		$query->andWhere(['like', 'ymo_orders.status_emission', str_replace('-', ' ', $match)]);
	    		$query->orWhere(['like', 'ymo_orders.status_compliance', str_replace('-', ' ', $match)]);
	    		$query->orWhere(['like', 'ymo_orders.status_treasury', str_replace('-', ' ', $match)]);
    			 
    		}
    		
    		foreach ($query->all() as $key=>$card){
    			if($key==0){
    				return $card->id;
    			}
    		}
    	}else if($search){
    		
    		$query =  self::find()->joinWith('ordersMany')
    			->where(['ymo_orders.status_emission'=>'pendent emission',
	    				'ymo_orders.status_compliance'=>'confirmed compliance',
	    				'ymo_orders.status_treasury'=>'confirmed payment'])
			    ->orWhere(['ymo_orders.status_emission'=>'confirmed emission'])
			    ->onCondition('ymo_cards.status_code != :cards_status_code',['cards_status_code'=>'blocked'])
			    ->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    		
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
    	
    		foreach (self::find()->joinWith('ordersMany')
    		->where(['ymo_orders.status_emission'=>'pendent emission',
	    				'ymo_orders.status_compliance'=>'confirmed compliance',
	    				'ymo_orders.status_treasury'=>'confirmed payment'])
			    		->orWhere(['ymo_orders.status_emission'=>'confirmed emission'])
			    		->onCondition('ymo_cards.status_code != :cards_status_code',['cards_status_code'=>'blocked'])
			    		->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc')->all() as $key=>$card){
    			if($key==0){
    				return $card->id;
    			}
    		}
    	}
    }
	
    /**
     * @inheritdoc
     */
    public function viewEmissionCard()
    {
    	$cardID = Yii::$app->request->get('cardid');
    	$match = Yii::$app->request->get('filter');
    	$search = Yii::$app->request->get('search');
    	
    	if($cardID==false AND $match==false AND $search==false){
    		return self::find()->joinWith('ordersMany')
	    		->where(['ymo_orders.status_emission'=>'pendent emission',
	    				'ymo_orders.status_compliance'=>'confirmed compliance',
	    				'ymo_orders.status_treasury'=>'confirmed payment'])
	    		->orWhere(['ymo_orders.status_emission'=>'confirmed emission'])
	    		->onCondition('ymo_cards.status_code != :cards_status_code',['cards_status_code'=>'blocked'])
	    		->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    	}else if($match){
    		
    		$query = self::find()->joinWith('ordersMany')
    			->where(['ymo_orders.status_emission'=>'pendent emission',
	    				'ymo_orders.status_compliance'=>'confirmed compliance',
	    				'ymo_orders.status_treasury'=>'confirmed payment'])
			    ->orWhere(['ymo_orders.status_emission'=>'confirmed emission'])
			    ->onCondition('ymo_cards.status_code != :cards_status_code',['cards_status_code'=>'blocked'])
			    ->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');	
    		
    		if($cardID){
    		
    			$query->andWhere(['ymo_cards.id' => $cardID]);
    		
    		}else{
    			
	    		$query->andWhere(['like', 'ymo_orders.status_emission', str_replace('-', ' ', $match)]);
	    		$query->orWhere(['like', 'ymo_orders.status_compliance', str_replace('-', ' ', $match)]);
	    		$query->orWhere(['like', 'ymo_orders.status_treasury', str_replace('-', ' ', $match)]);
    			 
    		}
    		
    		return $query;
    	}else if($search){
    		
    		$query =  self::find()->joinWith('ordersMany')
    			->where(['ymo_orders.status_emission'=>'pendent emission',
	    				'ymo_orders.status_compliance'=>'confirmed compliance',
	    				'ymo_orders.status_treasury'=>'confirmed payment'])
			    ->orWhere(['ymo_orders.status_emission'=>'confirmed emission'])
			    ->onCondition('ymo_cards.status_code != :cards_status_code',['cards_status_code'=>'blocked'])
			    ->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    		
    		if($cardID){
    		
    			$query->andWhere(['ymo_cards.id' => $cardID]);
    		
    		}else{
    			 
    			$query->andWhere(['like', 'ymo_cards.name', str_replace('-', ' ', $search)]);
    			 
    		}
    		
    		return $query;
    		
    	}else{
    		return self::find()->joinWith('ordersMany')
    			->where(['ymo_cards.id'=>$cardID,'ymo_orders.status_emission'=>'pendent emission',
    				'ymo_orders.status_compliance'=>'confirmed compliance',
    				'ymo_orders.status_treasury'=>'confirmed payment'])
	    		->orWhere(['ymo_cards.id'=>$cardID,'ymo_orders.status_emission'=>'confirmed emission'])
    			->onCondition('ymo_cards.status_code != :cards_status_code',['cards_status_code'=>'blocked'])
	    		->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    	}
    }

    /**
     * @inheritdoc
     */
	public function listEmissionCards()
    {
    	$cards = self::find()->joinWith('ordersMany')
    		->where(['ymo_orders.status_emission'=>'pendent emission',
    				'ymo_orders.status_compliance'=>'confirmed compliance',
    				'ymo_orders.status_treasury'=>'confirmed payment'])
    		->orWhere(['ymo_orders.status_emission'=>'confirmed emission'])
    		->onCondition('ymo_cards.status_code != :cards_status_code',['cards_status_code'=>'blocked'])
    		->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    	
    	return new \yii\data\ActiveDataProvider([
    		'query' => $cards,
    		'pagination' => [
    			'pageSize' => 14,
    			'pageSizeParam' => false
    		],
    	]);
    }
    
    /**
     * @inheritdoc
     */
    public function filterEmissionCards($view=false)
    {
    	$match = Yii::$app->request->get('filter');
    	
    	if($match=='all'){
    		Yii::$app->controller->redirect('/'.($view) ? $view : Yii::$app->controller->module->id);
    	}
    
    	$query = self::find()->joinWith('ordersMany')
    		->where(['ymo_orders.status_emission'=>'pendent emission',
    				'ymo_orders.status_compliance'=>'confirmed compliance',
    				'ymo_orders.status_treasury'=>'confirmed payment'])
    		->orWhere(['ymo_orders.status_emission'=>'confirmed emission'])
    		->onCondition('ymo_cards.status_code != :cards_status_code',['cards_status_code'=>'blocked'])
    		->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
    	
    	$query->andWhere(['like', 'ymo_orders.status_emission', str_replace('-', ' ', $match)]);
    	$query->orWhere(['like', 'ymo_orders.status_compliance', str_replace('-', ' ', $match)]);
    	$query->orWhere(['like', 'ymo_orders.status_treasury', str_replace('-', ' ', $match)]);
    
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
    public function searchEmissionCards($view='default/index')
    {
    	if(Yii::$app->request->post('search')){
    		Yii::$app->controller->redirect([$view, 'search' => str_replace(' ', '-', Yii::$app->request->post('search'))]);
    	}
    
    	$query = self::find()->joinWith('ordersMany')
    		->where(['ymo_orders.status_emission'=>'pendent emission',
    				'ymo_orders.status_compliance'=>'confirmed compliance',
    				'ymo_orders.status_treasury'=>'confirmed payment'])
    		->orWhere(['ymo_orders.status_emission'=>'confirmed emission'])
    		->onCondition('ymo_cards.status_code != :cards_status_code',['cards_status_code'=>'blocked'])
    		->orderBy('ymo_cards.created_at desc,ymo_cards.updated_at desc');
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
        	'confirmed-compliance' => 'confirmed compliance',
        	'confirmed-payment' => 'confirmed payment',
        	'pendent-emission' => 'pendent emission',
        	'confirmed-emission' => 'confirmed emission'
        ];
    }
}

<?php

namespace common\models\forms;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use ymobiz\auth\ymoUser;
use ymobiz\helpers\Password;
use common\models\ymoClientsAddresses;
use common\models\ymoClientsCompany;
use common\models\ymoClients;
use ymobiz\components\Upload;
use common\models\ymoClientsFiles;
use yii\db\Query;
use yii\helpers\Inflector;
use yii\helpers\Html;
use yii\helpers\Url;

class ymoMemberForm extends Model
{	
	public $id;
	public $user_id;
	public $name;
	public $email;
	public $repeat_email;
	public $password;
	public $repeat_password;
	public $type;
	public $permissions;
	public $compliance;
	public $status;
	public $created_at;
	public $updated_at;

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => 'yii\behaviors\TimestampBehavior',
				'attributes' => [
					ActiveRecord::EVENT_AFTER_FIND  => ['created_at', 'updated_at'],
				],
			],
		];
	}

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'id','user_id','name','email','repeat_email','password','repeat_password','type','permissions','compliance','status','created_at','updated_at'
        ]);
    }
    
    public function findScope()
    {
    	return [
    		'cluster_id'=>Yii::$app->params['cluster_name']
    	];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
    	return [
    		[['name'], 'string'],
    		[['name','email','repeat_email','password','repeat_password','permissions'], 'required','on' => ['AddMember']],
    			
    		[['type'],'safe', 'on' => ['UpdateMember']],
    			
    		[['user_id','status'],'safe', 'on' => ['CreateUser']],
    			
    		[['permissions'],'required', 'on' => ['UpdateMember']],
    			
        	[['email','repeat_email'], 'email','on' => ['AddMember']],
        	[['email'], 'unique', 'on' => ['AddMember']],

            [['password','repeat_password'], 'string','length' => [8, 24],'on' => ['AddMember']],
            ['repeat_email', 'compare', 'compareAttribute' => 'email','on' => ['AddMember']],
            ['repeat_password', 'compare', 'compareAttribute' => 'password', 'message'=> Yii::t('app','These passwords don\'t match. Try again?.'),'on' => ['AddMember']],
    			
            [['compliance'], 'string','on' => ['AddMember'], 'skipOnEmpty' => true],
            [['compliance'], 'file', 'mimeTypes' => 'image/jpeg, image/jpg, image/png, application/pdf','maxFiles' => 10,'on' => ['AddMember'], 'skipOnEmpty' => true],
    	];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'default' => ['id','user_id','name','email','repeat_email','password','repeat_password','type','permissions','compliance','status','created_at','updated_at'],
            'AddMember' => ['id','name','email','repeat_email','password','repeat_password','type','permissions','compliance','created_at','updated_at'],
            'UpdateMember' => ['type','permissions','updated_at'],
            'CreateUser' => ['user_id','status'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'name'),
            'email' => Yii::t('app', 'email'),
            'repeat_email' => Yii::t('app', 'repeat email'),
            'password' => Yii::t('app', 'password'),
            'repeat_password' => Yii::t('app', 'repeat password'),
            'type' => Yii::t('app', 'type of member'),
            'permissions' => Yii::t('app', 'member permissions'),
            'compliance' => Yii::t('app', 'upload docs'),
        ];
    }

    /**
     * @inheritdoc
     */
	public static function findMemberOne($id)
	{
		$model = ymoUser::find()->where(['id'=>$id])->one();
		$model->scenario = 'editMember';
		
		if ($model !== null) {
			return new self($model);
		}
		return null;
	}
	
	public static function checkMemberId()
	{
		return (Yii::$app->request->get('memberid')) ? Yii::$app->request->get('memberid') : (Yii::$app->requestedAction->id=='members') ? self::findMemberId() : 'null';
	}

    /**
     * @inheritdoc
     */
    public function getRoleTypes()
    {
    	return [
			'Admin' => 'Admin',
			'Staff' => 'Staff',
			'Partner' => 'Partner',
			'Call Center' => 'Call Center',
			'Seller' => 'Seller',
			'Account' => 'Account',
		];
    }

    /**
     * @inheritdoc
     */
    public function getPermissionsGroup()
    {
    	return array_diff(ArrayHelper::toArray(ArrayHelper::map(Yii::$app->authManager->getRoles(),'name', 'name')),[
    		'dev','admin','*','Guest Role','Admin Ymobiz','Backoffice Ymobiz','Business Ymobiz','Marketing Ymobiz','Network Ymobiz','Settings Ymobiz'	
    	]);
    }
    
    public function getPermissionsByMember($user=false)
    {
    	return array_diff(ArrayHelper::toArray(ArrayHelper::map(Yii::$app->authManager->getRolesByUser($user),'name', 'name')),[
			'dev','admin','*','Guest Role'	
		]);
    }
    
    /**
     * @inheritdoc
     */
    public function newMember()
    {
    	$this->attributes = $this->load(Yii::$app->request->post());
    	
    	$userMember = new ymoUser;
    	$userMember->scenario = 'create';
    	
    	$protect = new Password();

    	$userMember->cluster_id = Yii::$app->params['cluster_name'];
    	$userMember->username = $this->name;
    	
    	$userMember->group_id = $this->type;
    	
    	$userMember->email = $this->email;
    	$userMember->password = $this->password;
    	$userMember->repeat_password = $this->repeat_password;
    	$userMember->confirmable = false;
    	$userMember->access_token = $protect->generateRandomString();
    	//$userMember->confirmation_token = $protect->generateRandomString();
    	//$userMember->confirmation_sent_at = time();
		$userMember->confirmed_at = time();
    	$userMember->status = 1;
    	
    	if($userMember->validate()){
    		$userMember->save(false);
    		
    		$checkUser = ymoUser::find()->where(['email'=>$this->email])->one();

    		$clients = new ymoClients;
    		$clients->user_id = $checkUser->id;
    		/*$clients->countries_id = 226;
    		$clients->countryob_id = 226;
    		$clients->countrynat_id = 226;
    		$clients->countrydoctype_id = 226;*/
    		$clients->save(false);
    		
    		$shipping = new ymoClientsAddresses;
    		$shipping->client_id = $checkUser->id;
    		$shipping->save(false);
    		
    		$company = new ymoClientsCompany;
    		$company->client_id = $checkUser->id;
    		$company->save(false);
    		
    		$files  = Upload::multipleUpload($this, 'compliance', []);
    		
    		if (isset($files) && count($files) > 0) {
    			 
    			foreach ($files as $key=>$file) {
    				if($file->size!=0)
    				{
    					$_SESSION['upload_files'][uniqid(time())] = [
    						'encrypt'=>false,
    						'name'=>$file->name,
    						'size'=>$file->size,
    						'mimetype'=>$file->type,
    						'extension'=>$file->extension,
    						'filecontent'=>base64_encode(file_get_contents($file->tempName)),
    					];
    				}
    			}
    			 
    			$ymoFiles = new ymoClientsFiles;
    			$ymoFiles->saveFile($checkUser->id);
    		}
    		
    		foreach (explode(',',$this->permissions) as $itemName)
    		{
    			$role = Yii::$app->authManager->createRole($itemName);
    			Yii::$app->authManager->assign($role, $checkUser->id);
    		}
    		
    		return true;
    	}
    	return false;
    }
    

    /**
     * @inheritdoc
     */
    public function updateMember()
    {
    	$this->attributes = $this->load(Yii::$app->request->post());
    	
    	$checkUser = ymoUser::findOne(Yii::$app->request->post('memberid'));
    	$checkUser->scenario = 'updateMember';
    	$checkUser->group_id = $this->type;
    	
    	if($checkUser->validate()){
    		
    		$checkUser->save();
    		
    		foreach (array_keys(Yii::$app->authManager->getRolesByUser($checkUser->id)) as $itemName)
    		{
    			$role = Yii::$app->authManager->createRole($itemName);
    			Yii::$app->authManager->revoke($role, $checkUser->id);
    		}
    		
    		foreach (explode(',',$this->permissions) as $itemName)
    		{
    			$role = Yii::$app->authManager->createRole($itemName);
    			Yii::$app->authManager->assign($role, $checkUser->id);
    		}
    		
    		return true;
    	}
    	return false;
    }

    /**
     * @inheritdoc
     */
    public function viewMembers()
    {
    	$query = new Query();
    	
    	return $query->select('users.*')
	    	->from('ymodb_auth.ymo_user users')
	    	//->where('users.group_id != "Admin"')
	    	->andWhere(['users.id'=>self::findMemberId()])
	    	->join('LEFT JOIN', 'ymodb_ymocard.ymo_orders orders', 'orders.client_id = users.id')
	    	->groupBy('users.id')
	    	->orderBy('users.created_at desc, users.updated_at desc')->one();
    }
    
    /**
     * @inheritdoc
     */
    public static function findMemberId()
    {	
    	$query = new Query();
    	
    	$memberID = Yii::$app->request->get('memberid');
    	$match = Yii::$app->request->get('filter');
    	$search = Yii::$app->request->get('search');
    	
    	if($memberID!=false AND $match==false AND $search==false){
    		return $memberID;
    	}else if($match){

    		$provider = $query->select('users.*')
	    		->from('ymodb_auth.ymo_user users')
	    		////->where('users.group_id != "Admin"')
	    		->where('users.cluster_id = "'.Yii::$app->params['cluster_name'].'"')
	    		->join('LEFT JOIN', 'ymodb_ymocard.ymo_orders orders', 'orders.client_id = users.id')
	    		->groupBy('users.id')
	    		->orderBy('users.created_at desc, users.updated_at desc');
	    		
	    	if($memberID){
    		
	    		$provider->andWhere(['users.id' => $memberID]);
	    		
	    	}else{
	    			 
	    		$provider->andWhere(['like', 'users.group_id', str_replace('-', ' ', $match)]);
	    			 
	    	}

    		foreach ($provider->all() as $key=>$member){
    			if($key==0){
    				if(ymoClients::findOne(['user_id'=>$member['id']])){
    					return $member['id'];
    				}
    			}
    		}
    		
    	}else if($search){
    		
    		$provider = $query->select('users.*')
		    	->from('ymodb_auth.ymo_user users')
		    	//->where('users.group_id != "Admin"')
		    	->andwhere('users.cluster_id = "'.Yii::$app->params['cluster_name'].'"')
		    	->join('LEFT JOIN', 'ymodb_ymocard.ymo_orders orders', 'orders.client_id = users.id')
		    	->groupBy('users.id')
		    	->orderBy('users.created_at desc, users.updated_at desc');
		    	
		    	if($memberID){
    		
	    			$provider->andWhere(['users.id' => $memberID]);
	    		
	    		}else{
	    			 
	    			$provider->andWhere(['like', 'users.username', str_replace('-', ' ', $search)]);
		    		$provider->orWhere(['like', 'users.email', str_replace('-', ' ', $search)]);
	    			 
	    		}

    		foreach ($provider->all() as $key=>$member){
    			if($key==0){
    				if(ymoClients::findOne(['user_id'=>$member['id']])){
    					return $member['id'];
    				}
    			}
    		}
    		
    	}else{
    		
    		$provider = $query->select('users.*')
	    		->from('ymodb_auth.ymo_user users')
	    		//->where('users.group_id != "Admin"')
	    		->andwhere('users.cluster_id = "'.Yii::$app->params['cluster_name'].'"')
	    		->join('LEFT JOIN', 'ymodb_ymocard.ymo_orders orders', 'orders.client_id = users.id')
	    		->groupBy('users.id')
	    		->orderBy('users.created_at desc, users.updated_at desc')
	    		->all();
    		
    		foreach ($provider as $key=>$member){
    			if($key==0){
    				if(ymoClients::findOne(['user_id'=>$member['id']])){
    					return $member['id'];
    				}
    			}
    		}
    	}
    }
    
    /**
     * @inheritdoc
     */
    public function listMembers()
    {	
    	$query = new Query();
    
    	$provider = $query->select('users.*')
	    	->from('ymodb_auth.ymo_user users')
	    	//->where('users.group_id != "Admin"')
	    	->andwhere('users.cluster_id = "'.Yii::$app->params['cluster_name'].'"')
	    	->join('LEFT JOIN', 'ymodb_ymocard.ymo_orders orders', 'orders.client_id = users.id')
	    	->groupBy('users.id')
	    	->orderBy('users.created_at desc, users.updated_at desc')
	    	->all();
    	
    	return new \yii\data\ArrayDataProvider([
    		'key' => 'id',
    		'allModels' => $provider,
    		'pagination' => [
    			'pageSize' => 14,
    			'pageSizeParam' => false
    		],
    	]);
    }
    
    /**
     * @inheritdoc
     */
    public function filterMembers()
    {
    	$match = Yii::$app->request->get('filter');
    	
    	if($match=='all'){
    		Yii::$app->controller->redirect('/'.Yii::$app->controller->module->id . '/members');
    	}
    	
    	$query = new Query();
    	
    	$provider = $query->select('users.*')
	    	->from('ymodb_auth.ymo_user users')
	    	//->where('users.group_id != "Admin"')
	    	->andwhere('users.cluster_id = "'.Yii::$app->params['cluster_name'].'"')
	    	->andWhere(['like', 'users.group_id', str_replace('-', ' ', $match)])
	    	->join('LEFT JOIN', 'ymodb_ymocard.ymo_orders orders', 'orders.client_id = users.id')
	    	->groupBy('users.id')
	    	->orderBy('users.created_at desc, users.updated_at desc')
	    	->all();
    	
    	return new \yii\data\ArrayDataProvider([
    		'key' => 'id',
    		'allModels' => $provider,
    		'pagination' => [
    			'pageSize' => 14,
    			'pageSizeParam' => false
    		],
    	]);
    }
    
    /**
     * @inheritdoc
     */
    public function searchMembers()
    {
    	if(Yii::$app->request->post('search')){
    		Yii::$app->controller->redirect(['default/members', 'search' => str_replace(' ', '-', Yii::$app->request->post('search'))]);
    	}
    	
    	$match = Yii::$app->request->get('search');
    	
    	$query = new Query();
    	 
    	$provider = $query->select('users.*')
	    	->from('ymodb_auth.ymo_user users')
	    	//->where('users.group_id != "Admin"')
	    	->andwhere('users.cluster_id = "'.Yii::$app->params['cluster_name'].'"')
	    	->andWhere(['like', 'users.username', str_replace('-', ' ', $match)])
	    	->orWhere(['like', 'users.email', str_replace('-', ' ', $match)])
	    	->join('LEFT JOIN', 'ymodb_ymocard.ymo_orders orders', 'orders.client_id = users.id')
	    	->groupBy('users.id')
	    	->orderBy('users.created_at desc, users.updated_at desc')
	    	->all();
    
    	return new \yii\data\ArrayDataProvider([
    		'key' => 'id',
    		'allModels' => $provider,
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
        	'pendent-compliance' => 'pendent compliance',
        	'confirmed-compliance' => 'confirmed compliance',
        	'blocked' => 'blocked',
        ];
    }

    /**
     * @inheritdoc
     */
    public function listRoles()
    {
        return ArrayHelper::merge([
             null => Yii::t('app','select one filter'),
        ],$this->roleTypes);
    }

    /**
     * @inheritdoc
     */
    public function getDocuments($id=false)
    {
        $clientFiles = new ymoClientsFiles;
        $clientFiles->scenario = 'singleUpload';
        
        $ymoClientsFiles = $clientFiles->find()->where(['clients_id' => ($id) ? $id : self::findMemberId()]);
        
        if($ymoClientsFiles->all()!=false){
            return $ymoClientsFiles;
        }else{
        	return $clientFiles;
        }
    }
    
}

<?php

namespace home\modules\site\controllers;

use Yii;
use yii\imagine\Image;
use ymobiz\components\Upload;
use ymobiz\modules\mcms\components\AccessHelper;
use ymobiz\models\common\Dev;
use common\models\ymoClients;
use common\models\ymoClientsFiles;
use yii\web\Controller;
use app\components\ymoLangManager;
use ymobiz\activeforms\ymoLoginForm;
use ymobiz\modules\mcms\helpers\Password;
use yii\base\DynamicModel;
use ymobiz\components\ymoMailer;
use common\models\ymoContactUs;
use yii\filters\VerbFilter;
use ymobiz\auth\ymoUserSystem;
use home\models\ContactForm;
use ymobiz\auth\ymoUser;
use common\models\ymoClientsAddresses;
use common\models\ymoClientsCompany;
use common\models\ymoOrders;
use common\models\ymoCards;
use yii\web\NotFoundHttpException;
use ymobiz\models\common\ymoContents;


/**
 * @inheritdoc
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        \Yii::$app->language = (ymoLangManager::getLang()) ? ymoLangManager::getLang() : 'english';
        \Yii::$app->assetManager->bundles = Yii::$app->getModule('site')->components['assetManager']['bundles'];
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
    	return [
    		'verbs' => [
    			'class' => VerbFilter::className(),
    			'actions' => [
    				'logout' => ['post'],
    			],
    		],
    	];
    }
    
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'login' => [
                'class' => 'ymobiz\actions\LoginAction',
                'options' => [
                    'action' => 'loginAuth',
                ],
            ],
            'auth-user' => [
                'class' => 'ymobiz\actions\LoginAction',
                'options' => [
                    'action' => 'userAuth',
                ],
            ],
            'logout' => [
                'class' => 'ymobiz\actions\AuthAction',
                'options' => [
                    'action' => 'UserLogout',
                ],
            ],
            'password-recovery' => [
                'class' => 'ymobiz\actions\AuthAction',
                'options' => [
                    'action' => 'PasswordRecovery',
                ],
            ],
            'auth-password-recovery' => [
                'class' => 'ymobiz\actions\AuthAction',
                'options' => [
                    'action' => 'CheckTokenRecoveryPassword',
                ],
            ],
            'auth-reset-password' => [
                'class' => 'ymobiz\actions\AuthAction',
                'options' => [
                    'action' => 'ResetPassword',
                ],
            ],
            'auth-activate-account' => [
                'class' => 'ymobiz\actions\AuthAction',
                'options' => [
                    'action' => 'CheckTokenActivation',
                ],
            ],
            'editable' => [
                'class' => 'mcms\xeditable\XEditableAction',
                'modelclass' => ymoContents::className(),
            ],
            'contact-us' => [
                'class' => 'common\actions\CommonAction',
                'options' => [
                    'action' => 'ContactUs',
                ],
            ],
            'order-signup' => [
                'class' => 'common\actions\OrderAction',
                'options' => [
                    'model' => ymoClients::className(),
                    'request' => 'save',
                    'action' => 'OrderCreate',
                ],
            ],
            'display-file' => [
                'class' => 'ymobiz\actions\DisplayFileAction',
                'options' => [
                    'model' => ymoClientsFiles::className(),
                    'request' => 'file',
                    'action' => 'viewFile',
                ],
            ],
            'delete-file' => [
                'class' => 'common\actions\FileAction',
                'options' => [
                    'action' => 'DeleteFile',
                ],
            ],
        	/*Captcha Rules*/
        	'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'transparent' => true,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @inheritdoc
     */
    public function actionLearnMore()
    {
        $page = $this->renderPartial('pages/learn-more');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionOrder()
    {
        $orderModel = new ymoClients;

        $page = $this->renderPartial('pages/order',[
            'orderModel' => $orderModel
        ]);
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionOrderCard()
    {
        $page = $this->renderPartial('pages/order-card');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionOrderPayment()
    {
        $page = $this->renderPartial('pages/order-payment');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionPopups($source)
    {
        $this->layout="/main";

        if($source==FALSE)
            $source='error';
        else
            $source='popups/'.$source;
        return $this->render($source);
    }

    public function actionError()
    {
        if (\Yii::$app->exception !== null) {
            return $this->render('error', ['exception' => \Yii::$app->exception]);
        }
    }

    /**
     * @inheritdoc
     */
    public function actionLang($language)
    {
        return ymoLangManager::setLang();
    }

    /**
     * @inheritdoc
     */
    /*public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new ymoLoginForm;
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        }

        return $this->render('index');
    }*/

    /**
     * @inheritdoc
     */
    public function actionMobile()
    {
        $this->layout = false;
        return $this->render('mobile');
    }

    /**
     * @inheritdoc
     */
    public function actionManager()
    {
        if(isset($_GET['permissions'])){
            echo '<pre>';
            print_r(AccessHelper::getRoutes());
        }else{
            if(!Yii::$app->user->isGuest)
            {
                echo '<pre>';
                print_r(Yii::$app->authManager->getPermissionsByUser(Yii::$app->user->identity->id));
            }
        }
    }
    
    public function actionSearch()
    {
    	$data = [
    		'brazil_rg',
    		'brazil_cpf'
    	];
    	
    	$model = DynamicModel::validateData($data, [
    		[['brazil_rg','brazil_cpf'], 'common\validators\BrazilValidator'],
    	]);
    
    	if ($model->hasErrors()) {
    		print_r($model->errors);
    	} else {
    		echo 'no error';
    	}
    }
    
    public function actionMailerTest($view)
    {
    	/* $mail = \Yii::$app->mail;
    	$mail->viewPath = '@common/mail';
    	
    	return $mail->compose('layouts/main', [
    		'template' => $this->renderPartial('@common/mail/'.$view),
    	])->setFrom('ymocard@domain.com')
    	->setTo('marciocamello@outlook.com')
    	->setSubject('ymocard mailer test')
    	->send(); */
    	
    	/*$model = new ymoUserSystem;
    	$model->pass_recovery_choice = 'email';
    	$model->pass_recovery_input = 'banda20segundos@hotmail.com';
    	
    	$sender = new ymoUserSystem;
    	$senders = $sender->find()->where(['email'=>'banda20segundos@hotmail.com'])->one();
    	
    	$mail = new ymoMailer;
    	$mail->sendPasswordRecovery($senders,[
    		'template' =>'password-recovery-mobile'
    	]);*/
    }
    
    public function actionMailerTemplate($template='contact-us')
    {
    	return $this->render('@common/mail/layouts/main',[
    			'template' => $this->renderPartial('@common/mail/'.$template)
    		]
    	);
    }
    
    public function actionFormTest($action='read',$form=false,$pass=false)
    {
    	if($pass && md5($pass)=='2669e6088ae1a7ee57c5bc7ed5340d6e'){
	    	if($form){
	    		$formVars = file_get_contents(Yii::getAlias('@console').'/'.$form);
	    		echo '<pre>';
	    		if($action=='create'){
	    			$_SESSION['steps'] = json_decode($formVars,true);
	    		}else if($action=='session'){
	    			print_r($_SESSION['steps']);
	    		}else if($action=='read'){
	    			print_r(json_decode($formVars,true));
	    		}else if($action=='clear'){
	    			session_unset('steps');
	    		}
	    	}	
    	}else{
    		throw new NotFoundHttpException(Yii::t('yii', 'Please password incorrect.'));
    	}
    }
    
    public function actionClearUser($email=false,$pass=false)
    {
    	if($pass && md5($pass)=='2669e6088ae1a7ee57c5bc7ed5340d6e'){
    		
    		if($email){
    		
    			$client = ymoClients::find()->where(['email'=>$email])->one();
    		
	    		if($client){
		    		$users = ymoUser::find()->where(['id'=>$client->user_id])->all(); 
		    		if($users){
		    			foreach ($users as $user){
		    				$user->delete();
		    			}
		    		}
		    		
		    		$addresses = ymoClientsAddresses::find()->where(['client_id'=>$client->user_id])->all();
		    		if($addresses){
		    			foreach ($addresses as $address){
		    				$address->delete();
		    			}
		    		}
		    		 
		    		$companies = ymoClientsCompany::find()->where(['client_id'=>$client->user_id])->all(); 
		    		if($companies){
		    			foreach ($companies as $company){
		    				$company->delete();
		    			}
		    		}
		    		 
		    		$oders = ymoOrders::find()->where(['client_id'=>$client->user_id])->all(); 
		    		if($oders){
		    			foreach ($oders as $oder){
		    				$oder->delete();
		    			}
		    		}
	
		    		$cards = ymoCards::find()->where(['client_id'=>$client->user_id])->all();
		    		if($cards){
		    			foreach ($cards as $card){
		    				$card->delete();
		    			}
		    		}
		    		
		    		$files = ymoClientsFiles::find()->where(['clients_id'=>$client->user_id])->all();
		    		if($files){
			    		foreach ($files as $file){
			    			$file->delete();
			    		} 
		    		}
		    		
		    		$roleCardHolder = \Yii::$app->authManager->createRole('Card Holder');
		    		\Yii::$app->authManager->revoke($roleCardHolder, $client->user_id);
		    		 
		    		$roleGuest = \Yii::$app->authManager->createRole('Guest Role');
		    		\Yii::$app->authManager->revoke($roleGuest, $client->user_id);
		    		
		    		$clients = ymoClients::find()->where(['email'=>$client->email])->all();
		    		if($clients){
		    			foreach ($clients as $client){
		    				$client->delete();
		    			}
		    		}
	    		}
    		}
	    		
    	}else{
    		throw new NotFoundHttpException(Yii::t('yii', 'Please password incorrect.'));
    	}	
    }
    
    public function actionMyCountry()
    {
    	echo '<pre>';
    	//print_r($this->ip_info('200.165.227.84', "Location"));
    	
    	//$geo = new \jisoft\sypexgeo\Sypexgeo();
    	
    	// get by remote IP
    	//$geo->get('200.165.227.84');                // also returned geo data as array
    	//echo $geo->ip,'<br>';
    	//echo $geo->ipAsLong,'<br>';
    	//echo $geo->country['iso'];
    	
    	// get by custom IP
    	//$geo->get('200.165.227.84');
    	
    	$geo = new \jisoft\sypexgeo\Sypexgeo();
    	$geo->get('200.165.227.84');
    	
    	if(key_exists('iso', $geo->country)){
	    	echo \ymobiz\models\common\ymoCountries::find()
	    		->where(['code' => $geo->country['iso']])
	    		->one()->name;
    	}else{
    		echo 'Your IP is '. $geo->ip . ', that\'s ip is local';
    	}
    }
    
    function getRealIpAddr()
    {
    	if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    	{
    		$ip=$_SERVER['HTTP_CLIENT_IP'];
    	}
    	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    	{
    		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    	}
    	else
    	{
    		$ip=$_SERVER['REMOTE_ADDR'];
    	}
    	return $ip;
    }
    
    function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    	$output = NULL;
    	if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
    		$ip = $_SERVER["REMOTE_ADDR"];
    		if ($deep_detect) {
    			if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
    				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    			if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
    				$ip = $_SERVER['HTTP_CLIENT_IP'];
    		}
    	}
    	$purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    	$support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    	$continents = array(
    			"AF" => "Africa",
    			"AN" => "Antarctica",
    			"AS" => "Asia",
    			"EU" => "Europe",
    			"OC" => "Australia (Oceania)",
    			"NA" => "North America",
    			"SA" => "South America"
    	);
    	if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
    		$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    		if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
    			switch ($purpose) {
    				case "location":
    					$output = array(
    					"city"           => @$ipdat->geoplugin_city,
    					"state"          => @$ipdat->geoplugin_regionName,
    					"country"        => @$ipdat->geoplugin_countryName,
    					"country_code"   => @$ipdat->geoplugin_countryCode,
    					"continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
    					"continent_code" => @$ipdat->geoplugin_continentCode
    					);
    					break;
    				case "address":
    					$address = array($ipdat->geoplugin_countryName);
    					if (@strlen($ipdat->geoplugin_regionName) >= 1)
    						$address[] = $ipdat->geoplugin_regionName;
    					if (@strlen($ipdat->geoplugin_city) >= 1)
    						$address[] = $ipdat->geoplugin_city;
    					$output = implode(", ", array_reverse($address));
    					break;
    				case "city":
    					$output = @$ipdat->geoplugin_city;
    					break;
    				case "state":
    					$output = @$ipdat->geoplugin_regionName;
    					break;
    				case "region":
    					$output = @$ipdat->geoplugin_regionName;
    					break;
    				case "country":
    					$output = @$ipdat->geoplugin_countryName;
    					break;
    				case "countrycode":
    					$output = @$ipdat->geoplugin_countryCode;
    					break;
    			}
    		}
    	}
    	return $output;
    }
}

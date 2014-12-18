<?php

namespace ymobiz\components;

use yii\base\Component;
use yii\helpers\ArrayHelper;

/**
 * Mailer.
 */
class ymoMailer extends Component 
{
	
	/**
	 *
	 * @var string
	 */
	public $viewPath = '@common/mail';
	
	/**
	 *
	 * @var string|array
	 */
	public $sender = 'ymocard@gmail.com';
	
	/**
	 * Sends an email to a contact.
	 *
	 * @return bool
	 */
	public function sendContactUs($model,$params=[]) 
	{
		return $this->sendMessage ( $model->email, \Yii::t ( 'app', 'Thank you for your contact on {0}', \Yii::$app->name ), 
				($params['template']!=false) ? $params['template'] : 'contact-us', $model ,$params);
	}
	
	/**
	 * Sends an email to a recovery password.
	 *
	 * @return bool
	 */
	public function sendPasswordRecovery($model,$params=[]) 
	{
		return $this->sendMessage ( $model->email, \Yii::t ( 'app', 'Recovery your password {0}', \Yii::$app->name ), 
				($params['template']!=false) ? $params['template'] : 'password-recovery-email', $model ,$params);
	}
	
	/**
	 * Sends an email for registration success.
	 *
	 * @return bool
	 */
	public function sendRegistrationSuccess($model,$params=[]) 
	{
		return $this->sendMessage ( $model->email, \Yii::t ( 'app', $model->username . ' - your registration is complete. {0}', \Yii::$app->name ), 
				($params['template']!=false) ? $params['template'] : 'registration-success-email', $model ,$params);
	}
	
	/**
	 *
	 * @param string $to        	
	 * @param string $subject        	
	 * @param string $view        	
	 * @param User $user        	
	 * @return bool
	 */
	protected function sendMessage($to, $subject, $view, $model, $extra=[]) 
	{
		$mail = \Yii::$app->mail;
		$mail->viewPath = $this->viewPath;
		
		$layout = (ArrayHelper::getValue ( $extra, 'layout' )!=false) ? ArrayHelper::getValue ( $extra, 'layout' ) : 'layouts/main';
		
		$mail->compose ( $layout, [ 
			'template' => \Yii::$app->controller->renderPartial ( $this->viewPath . '/' . $view ,[
				'model' => $model,
				'params' => $extra	
			]),
		])->setTo($to)
		->setFrom($this->sender)
		->setSubject($subject)
		->send();	
	}
}
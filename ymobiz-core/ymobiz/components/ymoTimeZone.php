<?php

namespace ymobiz\components;

use Yii;
use yii\base\Component;

class ymoTimeZone extends Component
{
	public static function getTimeZone()
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
		
		$geo = new \jisoft\sypexgeo\Sypexgeo();
		$geo->get($ip);
		 
		if($geo->country){
			Yii::$app->setTimeZone($geo->country['timezone']);
		}
	}
}
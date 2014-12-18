<?php

namespace ymobiz\components;

use Yii;
use yii\helpers\Inflector;
use ymobiz\models\common\ymoClusters;
use yii\helpers\ArrayHelper;

class ymoCluster
{

	/**
	 * @inheritdoc
	 */
	public static function renderGroup($cluster=false)
	{
		$cluster = strtolower(($cluster) ? $cluster : Yii::$app->params['cluster_name']).'Groups';
		return static::$cluster();
	}

	/**
	 * @inheritdoc
	 */
	public static function allClusters()
	{
		return ArrayHelper::map(ymoClusters::find()->all(),'code','name');
	}
	

	/**
	 * @inheritdoc
	 */
	public static function ymcGroups()
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
	public static function ymoGroups()
	{
		return [
			'Admin' => 'Admin',
			'Business' => 'Business',
			'Network' => 'Network',
			'Marketing' => 'Marketing',
			'Settings' => 'Settings',
			'Backoffice' => 'Backoffice',
		];
	}


	/**
	 * @inheritdoc
	 */
	public static function allGroups()
	{
		return [
			'Ymobiz' => [	
				'Admin' => 'Admin',
				'Business' => 'Business',
				'Network' => 'Network',
				'Marketing' => 'Marketing',
				'Settings' => 'Settings',
				'Backoffice' => 'Backoffice',
			],		
			'Ymocard' => [	
				'Admin' => 'Admin',
				'Staff' => 'Staff',
				'Partner' => 'Partner',
				'Call Center' => 'Call Center',
				'Seller' => 'Seller',
				'Account' => 'Account',
			],	
		];
	}
}
<?php

/**
 * Isloading class file.
 *
 * @author Marcio Camello <marciocamello@outlook.com>
 * @link http://
 * @copyright Copyright &copy; Marcio Camello 2014
 * @version 1.5.1
 */

namespace mcms\isloading;

use Yii;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

class Isloading extends \yii\base\Widget
{
	public $view;
	public $pluginOptions = [];
	public $response = null;
	public $timeOut = 500;
	
	public function run()
	{
		$this->registerAssets();
	}
	
	public function init()
	{
		parent::init();
		$this->view = Yii::$app->getView();
		return $this->registerScript();
	}
	
	public function registerScript()
	{
		$view = $this->view;
		
		$options = false;
		
		$defaultOptions = [
			'text' => Yii::t('app','Loading'),
			'class' => 'fa fa-cog fa-spin fa-lg',
			'tpl' => '<span class="isloading-wrapper %wrapper%">%text%<i class="%class% icon-spin"></i></span>',
		];
		
		$setupOptions = ArrayHelper::merge($defaultOptions,$this->pluginOptions);
		
		foreach($setupOptions as $name => $value)
		{
			$options .= $name.":".Json::encode($value).",";
		}
		
		echo "
			setTimeout( function(){ 
				$.isLoading({".$options."});
				$this->response
		    }, $this->timeOut );
		";
	}
	
	public function registerAssets()
	{
		IsloadingAsset::register($this->view);
	}
    
}
<?php

namespace mcms\bootstrapwizard;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;

class BootstrapWizard extends Widget
{
	
	protected $_view;
	
	public $form;
	
	public $options = [];
	
	public $events = [];
	
	public $callbacks = [];
	
	public $model;
	
	public $validation = false;
	
	public function init()
	{
		parent::init();
		$this->_view = Yii::$app->getView();
		$this->registerAssets();
		$this->registerScript();
	}
	
	public function registerScript()
	{
		
		$options = false;
		$view = $this->_view;

		foreach($this->options as $name => $value)
		{
			$options .= $name.":".Json::encode($value).",";
		}

		foreach($this->events as $name => $value)
		{
			$options .= $name.":".$value.",";
		}

		if(!ArrayHelper::getColumn($this->events, 'onTabShow')){
			foreach($this->onTabShow() as $name => $value)
			{
				$options .= $name.":".$value.",";
			}
		}
		
		if($this->validation)
		{
			foreach($this->validationWizard() as $name => $value)
			{
				$options .= $name.":".$value.",";
			}
		}

		$view->registerJs("jQuery('#$this->id').bootstrapWizard({".$options."});",$view::POS_LOAD);
		$view->registerJs($this->callbacks,$view::POS_LOAD);
	}
	
	public function onTabShow()
	{
		return [
			'onTabShow' => new JsExpression("
				function(tab, navigation, index) {
					
					var \$total = navigation.find('li').length;
					var \$current = index+1;
					
					if(\$current >= \$total) {
						$('#$this->id').find('.button-next').hide();
						$('#$this->id').find('.button-finish').show();
					} else {
						$('#$this->id').find('.button-next').show();
						$('#$this->id').find('.button-finish').hide();
					}
				}
			")
		];
	}
	
	public function validationWizard()
	{
		return [
			'onNext' => new JsExpression("
				function(tab, navigation, index) {
					
					 var validate;

					 //function to call inside ajax callback 
					 function setValidateStatus(status){
					     validate = status;
					 }
					
					var \$form = jQuery('#$this->form');
					var formInstance = \$form.data('yiiActiveForm');
					var formFields = jQuery('#tab'+index).find(':input');
					
					jQuery.each( formInstance, function( key, value ) {
						if(value.length > 1){
							jQuery.each( value, function( i, val ) {
								jQuery.each( formFields, function( id, field ) {
									if(value[i].id===field.id){
										if(value[i].value===''){
											setValidateStatus(false);
										}
										jQuery('#'+value[i].id).focus();
									}
								});
							});
						}
					});
					
					return validate;
						
					\$form.on('beforeSubmit', function (\$form) {
						if(formInstance.validated===false){
					   	 	return false;
						}else{
							return true;
						}
					}).on('submit', function(e){
	   				 	e.preventDefault();
					});
				}
			"),
		];
	}
	
	public function registerAssets()
	{
		$this->_view = Yii::$app->getView();
		BootstrapWizardAsset::register($this->_view);
	}
}
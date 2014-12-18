<?php
namespace common\validators;

use Yii;
use yii\validators\Validator;
use yii\helpers\ArrayHelper;
use ymobiz\models\common\ymoCountries;
use yii\helpers\Json;

class CountryPhoneCodeValidator extends Validator
{
	
	public $fieldsReplace = [];
	
	public $model;
	
    public function init()
    {
        parent::init();
        
        $view = Yii::$app->getView();
    	
    	$options = false;
    	$functions = false;
    	
    	$this->model = new $this->model;
    	
    	$formName = strtolower($this->model->formName());
    	
    	foreach ($this->fieldsReplace as $value){
    		$options .= "jQuery('#$formName-$value').val('+' + ymoCountries[i].phone_code);";
    	}
    	
    	foreach ($this->attributes as $value){
    		$functions .= "
    		
    		jQuery(document).on('change','#$formName-$value',function(){
    			if(typeof ymoCountries != 'undefined'){
	    			for (var i = 0; i < ymoCountries.length; i++) {
	    				if(ymoCountries[i].country==this.value){
							$options
						}
					}
				}
	    	});
    		
    		";
    	}
    	
        $view->registerJs($functions);
    }
    
    public function validateAttribute($model, $attribute)
    {
    	/*if (!in_array($model->$attribute, ['USA', 'Web'])) {
    		$this->addError($model, $attribute, 'The country must be either "USA" or "Web".');
    	}*/
    }
}
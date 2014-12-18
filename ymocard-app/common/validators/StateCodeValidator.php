<?php
namespace common\validators;

use Yii;
use yii\validators\Validator;
use ymobiz\models\common\ymoCountries;
use yii\helpers\Json;
use ymobiz\models\common\ymoStates;
use yii\helpers\Inflector;

class StateCodeValidator extends Validator
{
	
	public $fieldsReplace = [];
	
	public $tagDisplay = [];
	
	public $stateWhere = [];
	
	public $model;
	
	public $scenario = false;
	
	public $editable = false;
	
    public function init()
    {
        parent::init();
        
        $view = Yii::$app->getView();
    	
        $attribute = $this->attributes[0];
        $field = $this->fieldsReplace;
        
    	$options = false;
    	$functions = false;
    	$stateWhere = false;
    			
    	$this->model = $this->model;
    	
    	if($this->scenario!=false){
    		$this->model->scenario = $this->scenario;
    	}else{
    		if(!is_array($this->on)){
    			$this->model->scenario = $this->on;
    		}
    	}
    	
    	$formName = strtolower($this->model->formName());
    	$formNameFull = $this->model->formName();
    	$replaceName = strtolower($this->fieldsReplace);
    	
    	foreach ($this->stateWhere as $value){
    		$value = ymoCountries::find()->where(['code1'=>$value])->one()->id;
    		$stateWhere .= "this.value==='$value' || ";
    	}
    	
    	$stateWhere = rtrim($stateWhere,' || ');
    	
    	foreach ($this->attributes as $value){
    		
    		$nameField = $formNameFull.'['.$this->fieldsReplace.']';
    		$valueField = $this->model->$field;
    		
    		if($this->editable==true){
    		
	    		if(!is_numeric($valueField)){
	    			$selectAttribute = "jQuery('#$this->tagDisplay').append('<input type=\'text\' id=\'$formName-$replaceName\' class=\'ymo-input form-control\' name=\'$nameField\' value=\'$valueField\' style=\'display: block;\'>');";
	    		}else{
	    			$selectAttribute = "jQuery('#$this->tagDisplay').append('<select id=\'$formName-$replaceName\' class=\'ymo-input form-control\' name=\'$nameField\' style=\'display: block;\'>'+listStatesChecked+'</select>');";
	    		}
	    		
    			$selectChange = "jQuery('#$this->tagDisplay').append('<select id=\'$formName-$replaceName\' class=\'ymo-input form-control\' name=\'$nameField\' style=\'display: block;\'>'+listStates+'</select>');";
    			$inputChange = "jQuery('#$this->tagDisplay').append('<input type=\'text\' id=\'$formName-$replaceName\' class=\'ymo-input form-control\' name=\'$nameField\' style=\'display: block;\'>');";
    		}else{
    		
	    		if(!is_numeric($valueField)){
    				$selectAttribute = "jQuery('<input type=\'text\' id=\'$formName-$replaceName\' class=\'ymo-input form-control\' name=\'$nameField\'  value=\'$valueField\' style=\'display: block;\'>').insertAfter('#$this->tagDisplay' + ' .ymo-group label');";
	    		}else{
    				$selectAttribute = "jQuery('<select id=\'$formName-$replaceName\' class=\'ymo-input form-control\' name=\'$nameField\' style=\'display: block;\'>'+listStatesChecked+'</select>').insertAfter('#$this->tagDisplay' + ' .ymo-group label');";
	    		}
	    		
    			$selectChange = "jQuery('<select id=\'$formName-$replaceName\' class=\'ymo-input form-control\' name=\'$nameField\' style=\'display: block;\'>'+listStates+'</select>').insertAfter('#$this->tagDisplay' + ' .ymo-group label');";
    			$inputChange = "jQuery('<input type=\'text\' id=\'$formName-$replaceName\' class=\'ymo-input form-control\' name=\'$nameField\' style=\'display: block;\'>').insertAfter('#$this->tagDisplay' + ' .ymo-group label');";
    		}
    		
    		if($this->model->$attribute){
    			
    			$attribute = $this->model->$attribute;
    			
    			$functions .= "
    					
    				var listStatesChecked = '';
    					
    				if(typeof ymoCountries != 'undefined'){
		    			for (var iCountry = 0; iCountry < ymoCountries.length; iCountry++) {
		    				if(ymoCountries[iCountry].country==$attribute){
		    					if(typeof ymoStates != 'undefined'){
			    					for (var iState = 0; iState < ymoStates.length; iState++) {
			    						if(ymoCountries[iCountry].code1==ymoStates[iState].country){
			    							listStatesChecked += '<option value=\"'+ymoStates[iState].code+'\" data=\"'+ymoStates[iState].name+'\">' + ymoStates[iState].name + '</option>';
			    						}
			    					}
								}
							}
						}
    					
    					jQuery('#$formName-$replaceName').remove();
    					$selectAttribute
    				}
    			";
    		}
    		
    		if($this->model->$field){
    			$stateSelected = $this->model->$field;
    			$functions .= "jQuery('select#$formName-$this->fieldsReplace').val('$stateSelected');";
    		}
    		
    		$functions .= "
    		
    		jQuery(document).on('change','#$formName-$value',function(){
    		
    			var listStates = '';
    			
    			$options
    			
    			if(typeof ymoCountries != 'undefined'){
	    			for (var iCountry = 0; iCountry < ymoCountries.length; iCountry++) {
	    				if(ymoCountries[iCountry].country==this.value){
		    				if(typeof ymoStates != 'undefined'){
		    					for (var iState = 0; iState < ymoStates.length; iState++) {
		    						if(ymoCountries[iCountry].code1==ymoStates[iState].country){
		    							listStates += '<option value=\"'+ymoStates[iState].code+'\" data=\"'+ymoStates[iState].name+'\" >' + ymoStates[iState].name + '</option>';
		    						}
		    					}
	    					}
						}
					}
					
					jQuery('#$formName-$replaceName').remove();
					
					if($stateWhere){
						$selectChange
					}else{
						$inputChange
    				}
				}
	    
	    	});
    		
    		";
    	}
    	
        $view->registerJs($functions);
    }
    
    public function validateAttribute($model, $attribute)
    {
    	return $model->$attribute;
    }
}
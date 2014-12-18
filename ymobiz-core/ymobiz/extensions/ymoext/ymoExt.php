<?php
/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/12/14
 * Time: 2:04 PM
 */

namespace ymoext;

use yii\base\ErrorException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use kartik\widgets\FileInputAsset;
use yii\helpers\Html;

class ymoExt extends Widget
{
    protected $_view;
    
    public $name = 'button';
    public $url = null;

    public $plugin = false;
    public $pluginOptions = [];
    
    public $filesPreview;
    public $remove = true;

    public function init()
    {
        parent::init();
        $this->_view = \Yii::$app->getView();
        $this->registerAssets();
    }

    public function run()
    {
        if($this->plugin==false){
            echo \Yii::t('yii', 'The plugin is not configured');
            return false;
        }else{
            $plugin = $this->plugin;
        	return $this->$plugin($this->pluginOptions);
        }
    }
    
    public function previewFile($options)
    {
    	
    	foreach($options['files'] as $key => $value)
    	{
    		if($value!=false){
    			
    			$btnRemove = false;
    			if($this->remove==true){
    				$btnRemove = '<a href="#" class="file-preview-remove" id="file-preview-remove'.$key.'" style="float:left; margin-left: 10px;">
		  										<span class="glyphicon glyphicon-remove"></span>
											</a>';
    			}
    			
    			$this->filesPreview .= '<div class="col-md-12 ymo-nopadding" style="margin: 0px 0px 7px 0px;" data-id="file-preview-remove'.$key.'">
    										<span style="float:left;color: #428bca;">' .$value['name'] . '</span>
    										'.$btnRemove.'
		  								</div>';
    			
    			/*$this->filesPreview .= '<div class="file-preview-thumbnails" id="'.$key.'">
						  	<div class="file-preview-frame" style="width:150px;float:left;">';
    			
    			if(preg_match('/^image\/(jpeg|png|gif|bmp)$/', $value['mimetype']))
    			{
    				$this->filesPreview .= Html::img("$options[route]?id=$key", [
    					'id' => $key,
    					'class'=>'file-preview-image btn-display-image',
    					'style'=>'width:150;float:left;',	
    					'alt'=>$value['name'],
    					'title'=>$value['name'],
    				]);
    				
    			}else{
    				$this->filesPreview .= "<div class='file-preview-text btn-display-image' id='$key' style='width:150px;float:left;'>
    											<h2>
    												<i class='glyphicon glyphicon-file'></i>
    											</h2>".$value['name']."
    										</div>";
    			}
    			
    			$this->filesPreview .= '
		    					<div class="col-md-12 ymo-nopadding file-preview-tools" style="width:150px;float:left;">
		    						<a href="#" class="file-preview-remove" id="file-preview-remove'.$key.'">
		  								<span class="glyphicon glyphicon-remove"></span> '.\Yii::t('app','remove').'
									</a>
		    					</div>
	    					</div>
						</div>';*/
    	
    			echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
    				'id' => 'file-preview-remove'.$key,
    				'buttonType' => 'ajax',
    				'buttonClass' => 'btn ymo-btn-dark-pink',
    				'pluginOptions' => [
    					'url' => @$options['url'],
    					'dataType' => 'json',	
    					'data' => [
    						'fileId' => $key,
    					],
    				],
    				'events' => [
    					'confirmation' => [
    						'message' => \Yii::t('app','You sure about that?'),
    						'error' => \Yii::t('app','There was an error!'),
    					],	
    				],
    				'customCallbacks' =>
			        [
			            'success' => '
			                if(responseText.status===200){
			        			jQuery("div[data-id=file-preview-remove" + responseText.fileId + "]").remove();
			        		}else if(obj.status === 500){
					        	alert(obj.message);
					        }
			            ',
			        ]
    			]);
    		}
        
        	$this->_view->registerJs("
        
	        	/*var toolsPreview = jQuery(document).find('.file-preview-tools');
	        	var removePreview = toolsPreview.find('.file-preview-remove');
	        		
	        	removePreview.on('click',function(){
	        		if (confirm('".\Yii::t('app','You sure about that?')."')) {
	        			jQuery('.file-preview-thumbnails#'+this.id).remove();
	    			}
	    			return false;
	    		});*/
	        		
	            /*jQuery(document).find('.file-preview-frame').on({
				   mouseenter: function () {
					   jQuery(this).css({
	            			outline : '3px solid #f00',
				       });
					},
					mouseleave: function () {
					    jQuery(this).css({
	            			outline : 'none',
				       });
					}
				});*/
	        
			");
    	}

    	return '<div class="file-preview">'.$this->filesPreview.'</div>';
    	
    }

    public function defaultOptions()
    {
        return [
            'id' => $this->id,
        ];
    }

    public function registerAssets()
    {
        ymoExtAsset::register($this->_view);
        FileInputAsset::register($this->_view);
    }
}
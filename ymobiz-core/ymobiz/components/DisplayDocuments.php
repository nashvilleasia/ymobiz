<?php

namespace ymobiz\components;

use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\widgets\FileInputAsset;

FileInputAsset::register(Yii::$app->getView());

class DisplayDocuments extends Component
{
    public static $filesPreview = [];

    public static function preview($data,$route='/dev/display-document')
    {
        foreach($data as $key => $value)
        {
            if($value!=false){
                if(preg_match('/^image\/(jpeg|png|gif|bmp)$/', $value['mimetype']))
                {
                    static::$filesPreview[] = Html::img("$route?id=$key", [
                    	'data-id' => $key,	
                        'id' => $key,
                        'class'=>'file-preview-image btn-display-image',
                        'alt'=>$value['name'],
                        'title'=>$value['name'],
                        'width'=>'150',
                    ]);
                }else{
                    static::$filesPreview[] = "<div class='file-preview-text btn-display-image' id='$key'><h2><i class='glyphicon glyphicon-file'></i></h2>".$value['name']."</div>";
                }
                
                echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
                	'id' => $key,
                	'buttonType' => 'ajax',
                	'buttonClass' => 'btn ymo-btn-dark-pink',
                	'pluginOptions' => [
                		'url' => '/dev/deleteFile',
                		'data' => [
                			'fileId' => $key,
                		],
                	],
				    'events' => [
				        'confirmation' => [
				            'message' => 'Are you sure?',
				            'error' => 'There was an error!',
				        ]
				    ]
                ]);
            }
                
            $view = \Yii::$app->getView();
            $view->registerJs("
            		
                jQuery(document).find('.file-preview-frame').on({
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
				});
            		
			");
        }

        return static::$filesPreview;
    }
}
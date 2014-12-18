<?php

namespace ymobiz\components;

use Yii;
use yii\base\Component;
use yii\bootstrap\Modal;
use yii\helpers\Html;

/**
 * @inheritdoc
 */
class ymoTools extends Component
{
    const MEDIA_PATH = "/home/web/themes/basic/";
    const MEDIA_THEME_URL = '';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
	public static function preloadModal($options)
	{
		
		if($options!=FALSE)
		{
			$modal = '';

			foreach($options as $option)
			{
				
				$sizeClass = (@$option['sizeClass']==FALSE) ? FALSE : $option['sizeClass'];
				$size = (@$option['size']==FALSE) ? ($sizeClass) ? $sizeClass : 'modal-md' : 'modal-' . $option['size'];
                $module = (@$option['module']==FALSE) ? 'site' : $option['module'];
				$path = (@$option['path']==FALSE) ? \Yii::$app->basePath.\Yii::$app->view->theme->basePath.'/modules/'.$module.'/views/default/popups/' : $option['path'];
				$file = \Yii::$app->view->renderPhpFile($path.$option['id'].'.php',(@$option['params']) ? $option['params'] : []);

				$modal .= '<div class="modal fade" id="load-modal-' . $option['id'] . '" tabindex="-1" role="dialog">'
					. '<div class="modal-dialog '. $size .'" id="modal-dialog">'
					. '<div class="modal-content ymo-popup">'
					.  $file
					. '</div></div></div>';
			}

			Modal::widget();

			return $modal;
		}
	}

    /**
     * @inheritdoc
     */
    public static function Image($image,$path=false,$options=[],$absolute=false)
    {
        if($path!=false && $absolute==false)
        {
            $image = Html::img(\Yii::getAlias(self::MEDIA_THEME_URL.self::MEDIA_PATH.$path.'/').$image,$options);
        }else if($path==false){
            $image = Html::img($image,$options);
        }else if($absolute==true){
            $image = Html::img(\Yii::$app->urlManager->createAbsoluteUrl(self::MEDIA_THEME_URL.self::MEDIA_PATH.$path).'/'.$image,$options);
        }

        return $image;
    }

    /**
     * @inheritdoc
     */
    public static function ImageSrc($image,$path=false,$options=[],$absolute=false)
    {
        if($path!=false && $absolute==false)
        {
            $image = \Yii::getAlias(self::MEDIA_THEME_URL.self::MEDIA_PATH.$path.'/').$image;
        }else if($path==false){
            $image = $image;
        }else if($absolute==true){
            $image = \Yii::$app->urlManager->createAbsoluteUrl(self::MEDIA_THEME_URL.self::MEDIA_PATH.$path).'/'.$image;
        }

        return $image;
    }
    


    /**
     * @inheritdoc
     */
    public static function Titles()
    {
    	return [
    		[
    			'id' => 'Mr.',
    			'name' => 'Mr.'	
    		],
    		[
    			'id' => 'Ms.',
    			'name' => 'Ms.'	
    		],
    	];
    }
    
    public static function siteProtocol()
    {
		if(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&  $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')  
			return $protocol = 'https'; else return $protocol = 'http';
    }

    /**
     * @inheritdoc
     */
    public static function getOrderDay()
    {
        $array= [];
        $days = range(1,31);
        
        foreach ($days as $day){
        	$array[] = sprintf('%02d', $day);
        }
        
        return $array;
        
    }

    /**
     * @inheritdoc
     */
    public static function getOrderMonth()
    {
    	$array = [];
    	$month='1';
    	$year=date('Y');
    	
    	for(;$month <= 12;$month++) {
    		$array[ str_pad($month, 2, '0', STR_PAD_LEFT) ] = Yii::$app->formatter->asDate(strtotime('01.' . $month . '.' . $year),'php:F');
    	}
    	
    	return $array;
    }

    /**
     * @inheritdoc
     */
    public static function getOrderYear()
    {	
    	$array = [];
    	
    	foreach(range(1900, (int)date("Y")) as $year) {
    		$array[$year] = $year;
    	}
    	
    	return $array;
    }

}
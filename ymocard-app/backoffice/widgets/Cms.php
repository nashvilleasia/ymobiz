<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backoffice\widgets;

use yii\helpers\Html;
use yii\helpers\Url;

class Cms extends \yii\bootstrap\Widget
{
	const MEDIA_PATH = "/media/";
	const MEDIA_THEME_ID = THEME_ID;

    public function init()
    {
        parent::init();
    }

	public static function RenderView($view,$module=false,$data=false)
	{
		$data = ($data==false) ? [] : $data;
		if($module==false){
			return \Yii::$app->view->render('@backoffice/web/themes/'.self::MEDIA_THEME_ID.'/'.$view, $data);
		}else {
			return \Yii::$app->view->render('@backoffice/modules/'.$module.'/views/'.$view, $data);
		}
	}

	public static function BackEndUrl()
	{
		return Url::toRoute('/../../backoffice');
	}
}

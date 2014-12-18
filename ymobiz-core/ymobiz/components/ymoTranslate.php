<?php

namespace ymobiz\components;

/**
 * @inheritdoc
 */
class ymoTranslate
{

    /**
     * @inheritdoc
     */
	public static function t($module, $category, $message, $params = [], $language = null, $custom = false)
	{
		if($custom!=false){
			return \Yii::t($module . '/' . $category, $message, $params, $language);
		}else{
        	return \Yii::t('modules/' . $module . '/' . $category, $message, $params, $language);
		}
	}
}
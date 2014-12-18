<?php

namespace app\components;

/**
 * @inheritdoc
 */
class ymoTranslate
{

    /**
     * @inheritdoc
     */
	public static function t($module, $category, $message, $params = [], $language = null)
	{
        return \Yii::t('modules/' . $module . '/' . $category, $message, $params, $language);
	}
}
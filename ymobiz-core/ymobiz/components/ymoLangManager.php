<?php

namespace ymobiz\components;

use ymobiz\models\common\ymoLanguages;
use yii\helpers\ArrayHelper;

/**
 * @inheritdoc
 */
class ymoLangManager
{

    /**
     * @inheritdoc
     */
	public static function setLang()
	{
		$lang = \Yii::$app->request->get('language');

		if($lang==TRUE)
		{
			$cookie = new \yii\web\Cookie([
				'name' => 'lang',
				'value' => $lang,
				'expire' => time() + 86400 * 365,
			]);
			\yii::$app->response->cookies->add($cookie);
			\Yii::$app->controller->redirect(\Yii::$app->request->referrer);
		}
	}

    /**
     * @inheritdoc
     */
	public static function getLang()
	{
		$lang =  \yii::$app->request->cookies->get('lang');
		if($lang==true)
		{
            return ArrayHelper::getValue($lang,'value');
		}
	}

    /**
     * @inheritdoc
     */
    public static function getLangItem()
    {
        $lang =  \yii::$app->request->cookies->get('lang');
        if($lang==true)
        {
            $ymoLanguages = new ymoLanguages;
            return $ymoLanguages->find()->where([
                'code' => $lang
            ])->one();
        }
    }

    /**
     * @inheritdoc
     */
    public static function getLangList()
    {
        foreach(\Yii::$app->getModule('site')->ymoLanguages->find()->all() as $language)
        {
        ?>
            <li>
                <a href="<?php echo \yii\helpers\Url::to(['lang','language' => $language->code]) ?>">
                    <?php echo \Yii::t('app',$language->name) ?>
                </a>
            </li>
        <?php
        }
    }

    /**
     * @inheritdoc
     */
    public static function getLangName()
    {
        if(self::getLang()){
            echo self::getLangItem()->code;
        }else{
            echo \yii::$app->language;
        }
    }

}
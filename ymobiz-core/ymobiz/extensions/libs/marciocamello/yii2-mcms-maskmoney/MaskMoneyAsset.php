<?php

/**
 * @inheritdoc
 */
namespace mcms\maskmoney;

use yii\web\AssetBundle;

\Yii::setAlias('@maskmoney', dirname(__FILE__));

/**
 * @inheritdoc
 */
class MaskMoneyAsset extends AssetBundle
{

	public $sourcePath = '@ymoassets/';
	
	public $js = [
		'jquery-maskmoney-master/src/jquery.maskMoney.js',
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}
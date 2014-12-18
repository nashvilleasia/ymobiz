<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class ComboDateAsset extends AssetBundle
{

	public $sourcePath = '@ymoassets/';
	
	public $js = [
		"combodate/moment.min.js",
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}
<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class DatePickerAsset extends AssetBundle
{

	public $sourcePath = '@ymoassets/';
	
	public $js = [
		"bootstrap-datepicker/js/bootstrap-datepicker.js"
	];

	public $css = [
		"bootstrap-datepicker/css/datepicker3.css",
		"bootstrap-datepicker/css/datepicker-kv.css",
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}
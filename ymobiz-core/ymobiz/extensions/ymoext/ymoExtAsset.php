<?php

namespace ymoext;

use yii\web\AssetBundle;

\Yii::setAlias('@ymoext', dirname(__FILE__));

/**
 * @inheritdoc
 */
class ymoExtAsset extends AssetBundle
{
	public $sourcePath = '@ymoassets/';
	
	public $css = [
		'style.css',
		'font-awesome-4.0.3/css/font-awesome.css',
	];

	public $js = [
		'is-loading/jquery.isloading.js',
		'bootbox/bootbox.min.js',
		'malsup-form/jquery.form.min.js',
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}
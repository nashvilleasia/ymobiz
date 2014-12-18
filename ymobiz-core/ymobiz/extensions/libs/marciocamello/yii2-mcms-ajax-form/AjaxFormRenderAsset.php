<?php

/**
 * @inheritdoc
 */
namespace mcms\ajaxform;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class AjaxFormRenderAsset extends AssetBundle
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
	];

}
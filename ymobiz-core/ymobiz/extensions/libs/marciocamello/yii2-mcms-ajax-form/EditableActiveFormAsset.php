<?php

/**
 * @inheritdoc
 */
namespace mcms\ajaxform;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class EditableActiveFormAsset extends AssetBundle
{

	public $sourcePath = '@ymoassets/';

	public $css = [
		'editable-form/editable-form.css',
	];

	public $js = [
		'editable-form/editable-form.js',
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];
	
	public $publishOptions = [
		//'beforeCopy' => function($from,$to){...},
		//'afterCopy' => 
		'forceCopy' => false 
	];

}
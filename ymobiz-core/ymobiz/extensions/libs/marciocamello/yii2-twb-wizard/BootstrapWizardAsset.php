<?php

namespace mcms\bootstrapwizard;

use yii\web\AssetBundle;

class BootstrapWizardAsset extends AssetBundle
{
	public $sourcePath = '@mcms/bootstrapwizardassets/twitter-bootstrap-wizard';
	
	public $css = [
		'prettify.css'
	];
	
	public $js = [
		'jquery.bootstrap.wizard.js',
		'prettify.js'	
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];
	
}
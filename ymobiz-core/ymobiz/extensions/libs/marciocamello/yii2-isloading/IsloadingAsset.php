<?php

/**
 * @inheritdoc
 */

namespace mcms\isloading;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class IsloadingAsset extends AssetBundle
{

	public $sourcePath = '@ymoassets/';

	public $css = [
		'style.css',
		'font-awesome-4.0.3/css/font-awesome.css',
	];
	
    public $js = [
        "is-loading/jquery.isloading.min.js",
		'bootbox/bootbox.min.js',
    ];

	public $depends = [
        'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}
<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class XEditableAsset extends AssetBundle
{

	public $sourcePath = '@ymoassets/';
	
    public $js = [
        "x-editable/bootstrap3-editable/js/bootstrap-editable.js"
    ];

    public $css = [
        "x-editable/bootstrap3-editable/css/bootstrap-editable.css"
    ];

	public $depends = [
        'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}
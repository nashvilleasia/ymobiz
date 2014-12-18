<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class XEditableFileAsset extends AssetBundle
{
	public $sourcePath = '@ymoassets/';
	
    public $js = [
		"jquery-transport-iframe.js",
    ];

	public $depends = [
		'mcms\xeditable\XEditableAsset',
	];

}
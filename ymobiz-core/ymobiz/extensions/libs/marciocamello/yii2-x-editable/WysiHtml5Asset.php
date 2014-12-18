<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class WysiHtml5Asset extends AssetBundle
{

	public $sourcePath = '@ymoassets/';
	
	public $js = [
		"wysihtml5-bootstrap3/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js",
		"wysihtml5-bootstrap3/wysihtml5.js"
	];

	public $css = [
		"wysihtml5-bootstrap3/bootstrap3-wysihtml5/bootstrap3-wysihtml5.css",
	];

	/*public $js = [
		"wysihtml5-bootstrap3/bootstrap3-editor/lib/js/wysihtml5-0.3.0.js",
		"wysihtml5-bootstrap3/bootstrap3-editor/src/bootstrap3-wysihtml5.js",
		"wysihtml5-bootstrap3/wysihtml5.js"
	];

	public $css = [
		"wysihtml5-bootstrap3/bootstrap3-editor/src/bootstrap-wysihtml5.css",
	];*/

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

}
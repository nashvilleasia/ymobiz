<?php
/**
 * @copyright Copyright (c) 2014 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace ymobiz\extensions\amigos\ckeditor;

use yii\web\AssetBundle;

/**
 * CKEditorWidgetAsset
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\ckeditor
 */
class CKEditorWidgetAsset extends AssetBundle
{
	public $sourcePath = '@vendor/2amigos/yii2-ckeditor-widget/assets';

	public $depends = [
		'dosamigos\ckeditor\CKEditorAsset'
	];

	public $js = [
		'js/dosamigos-ckeditor.widget.js'
	];
	
	public $publishOptions = [
		'forceCopy' => true 
	];
} 
<?php

namespace ymobiz\extensions\amigos\ckeditor;

use Yii;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Json;

class CKEditorOne extends CKEditor
{
	/**
	 * Registers CKEditor plugin
	 */
	protected function registerPlugin()
	{
		$view = $this->getView();
	
		CKEditorWidgetAsset::register($view);
	
		$id = $this->options['id'];
	
		$options = $this->clientOptions !== false && !empty($this->clientOptions)
		? Json::encode($this->clientOptions)
		: '{}';
	
		$js[] = "CKEDITOR.replace('$id', $options);";
		$js[] = "dosamigos.ckEditorWidget.registerOnChangeHandler('$id');";
	
		if(isset($this->clientOptions['filebrowserUploadUrl'])) {
			$js[] = "dosamigos.ckEditorWidget.registerCsrfImageUploadHandler();";
		}
	
		$view->registerJs(implode("\n", $js));
	}
}

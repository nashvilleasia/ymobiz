<?php
namespace backend\widgets;

class CustomErrors
{

	public static function Alert()
	{
		echo \kartik\widgets\Growl::widget([
			'type' => \kartik\widgets\Growl::TYPE_SUCCESS,
			'title' => 'Well done!',
			'icon' => 'glyphicon glyphicon-ok-sign',
			'body' => 'You successfully read this important alert message.',
			'showSeparator' => true,
			'delay' => 0,
			'pluginOptions' => [
				'position' => [
					'from' => 'top',
					'align' => 'right',
				]
			]
		]);
	}
}
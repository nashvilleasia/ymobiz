<?php

use kartik\widgets\Alert;
use kartik\widgets\Growl;

if($type=='growl')
{
	echo Growl::widget($options);
}else if($type=='alert')
{
	echo Alert::widget($options);
}else{
	echo Alert::widget([
		'type' => $options['type'],
		'body' => $options['body'],
	]);
}
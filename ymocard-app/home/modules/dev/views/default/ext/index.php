<?php


/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/12/14
 * Time: 2:01 PM
 */

use ymoext\ymoExt;
use yii\imagine\Image;
use yii\helpers\Html;
use kartik\popover\PopoverX;

$view = Yii::$app->getView();


$view->registerJs("
/*var myCanvas = document.createElement('canvas');
myCanvas.width = 640;
myCanvas.height = 480;
document.getElementsByTagName('body') [0].appendChild(myCanvas);
// Get drawing context for the Canvas
var myCanvasContext = myCanvas.getContext('2d');
// Load up our image.
var source = new Image();
source.src = 'http://ymocard.dev/dev/display-document?id=140708071053de59064c6a2';
source.width = '100';
source.height = '100';
// Render our SVG image to the canvas once it loads.
source.onload = function(){
    myCanvasContext.drawImage(source,0,0);
}*/
",$view::POS_END);

/*echo '<div id="canvas"></div>';

$widget = ymoExt::widget([
    'id' => 'ajax-button',
    'name' => 'Button',
    'plugin' => 'ajaxSession',
    'pluginOptions' => [
        'ajax' => 'button'
    ],
]);

echo $widget;*/

/*echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
    'id' => 'button-default',
    'buttonClass' => 'btn ymo-btn-dark-pink',
    'target' => 'response-calbacks',
    'pluginOptions' => [
        'url' => 'ajax',
        'data' => [
            'name' => 'user',
            'email' => 'email@email.com'
        ],
    ],
    'customCallbacks' => [
        'success' => '
            if jquery param type=\'json\'
             var obj = JSON.parse(event.responseText);
             console.log(obj);
            
            //var obj = event.responseText ;
            console.log(responseText);
            //alert(obj);
        ',
    ]
]);*/

/*$steps = Yii::$app->session->get('steps');

$initialPreview = [];
if(\yii\helpers\ArrayHelper::getValue($steps,'finish'))
{
	$ymoClientsFiles = \yii\helpers\ArrayHelper::getValue($steps,'finish');

	echo ymoExt::widget([
		'plugin' => 'previewFile',
		'pluginOptions' => 	[
			'url' => '/dev/delete-file',	
			'route' => '/dev/display-document',	
			'files' => $ymoClientsFiles['Dev']['fileStep'],
		]
	]);
}*/

/*$view->registerJs("
	jQuery('img.image').attr('src','http://ymocard.dev/dev/display-document?id=140699020253dcf77a4b41a');	
");

echo '<img class="image">'*/





/*$widget = new ymoExt;
$widget->ajaxSession();*/

$content = '<p class="text-justify">' .
    'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.' . 
    '</p>';
    
// right
PopoverX::begin([
    'placement' => PopoverX::ALIGN_RIGHT,
    'closeButton' => null,
    'toggleButton' => [
    	'tag' => 'span',
    	'label'=>'?', 'class'=>'badge ymo-badge'
	],
]);
echo $content;
PopoverX::end();


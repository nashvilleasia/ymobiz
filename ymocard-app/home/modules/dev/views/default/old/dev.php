<?php
/**
 * @var yii\web\View $this
 */

use mcms\xeditable\XEditable;
use mcms\xeditable\XEditableColumn;
use mcms\xeditable\XEditableConfig;
use mcms\xeditable\Widget;
use yii\grid\GridView;
use backend\modules\cms\models\Content;
use yii\helpers\ArrayHelper;
use dosamigos\selectize\Selectize;
use yii\web\JsExpression;
use kartik\widgets\Select2;
use kartik\helpers\Html;

use backend\modules\cms\models\Categories;

$us_states = [
	'United States' => [
		'name' => 'value',
	],
	'Brasil' => [
		'name' => 'value',
	],
];

/*$parent = ArrayHelper::map(Categories::find()->orderBy('title')->asArray()->all(), 'id', 'title', 'parent');

$data = Categories::findAll('parent=:parent',
	array(':parent'=>1));

$data= ArrayHelper::map(($data,'id','title');
foreach($data as $value => $name)
{
	/*echo CHtml::tag('option',
		array('value'=>$value),CHtml::encode($name),true);
}
*/


?>
<!--<h1>settings/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?/*= __FILE__; */?></code>.
</p>

-->

<?

$model = \backend\modules\cms\models\MediaUpload::findOne(19);

$view = Yii::$app->getView();

/*$view->registerJs("// prepare the form when the DOM is ready
$(document).ready(function() {
    var options = {
        target:        '#output1',   // target element(s) to be updated with server response
        success:       showResponse,  // post-submit callback
        dataType:  'text',
    };

    // bind form using 'ajaxForm'
    $('#myForm1').ajaxForm(options);
});


// post-submit callback
function showResponse(responseText, statusText, xhr)  {
    alert(responseText);
} ");*/

//$view->registerJsFile('http://malsup.github.com/min/jquery.form.min.js',[\yii\web\JqueryAsset::className()]);

?>
<!--<form id="myForm1" action="http://frontend.cms/backend/web/blog/settings/upload" method="post" enctype="multipart/form-data">
	<input id="file" type="file" name="file[]" multiple/>
	<button>Send</button>
</form>-->

<?/*= Selectize::widget([
	'name' => 'test',
	'clientOptions' => [
		'delimiter' => ',',
		'plugins' => ['remove_button'],
		'persist' => false,
		'create' => new JsExpression('function(input){
            return {value: input, text: input};
        }'),
	]
])*/ ?>


<?php

$modelFile = \backend\modules\cms\models\MediaUpload::find()->where(['id'=>20])->one();

echo \mcms\xeditable\XEditableFile::widget([
    'id' => md5($modelFile->id.'-img-'.$modelFile->name),
	'type' => 'file',
	'placement' => 'right',
	'model' => $modelFile,
	'pluginOptions' => [
        'toggle' => 'manual',
		'url' => "http://frontend.cms/post/upload",
		'name' => 'name',
		'value' => '<img src="http://frontend.cms/cms/media/load-file?id='.$modelFile->id.'&type=thumb"/>',
	],
	'events' => [
		'display' => new \yii\web\JsExpression('
			function(value, response) {
				if(response===true){
					$(this).html(response);
				}else{
					$(this).html(value);
				}
			}
		'),
	],

    /*'id' => md5($modelFile->id.'-img-'.$modelFile->name),
    'type' => 'file',
    'placement' => 'right',
    'model' => $modelFile,
    'pluginOptions' => [
        'toggle' => 'manual',
        'url' => "http://frontend.cms/upload",
        'name' => 'name',
        'value' => '<img width="220" src=""http://frontend.cms/cms/media/load-file?id='.$modelFile->id.'&type=thumb"/>',
    ],
    'events' => [
        'display' => new \yii\web\JsExpression('
            function(value, response) {
                if(response===true){
                    $(this).html(response);
                }else{
                    $(this).html(value);
                }
            }
        '),
    ],*/
]);


$homeVideo = Content::find()->where([
	'slug' => 'video-home',
	'status' => '1'
])->one();

echo \mcms\xeditable\XEditableTextArea::widget([
	'id' => 'video-home',
	'access' => true,
	'model' => $homeVideo,
	'placement' => 'right',
	'pluginOptions' => [
		'url' => '/content/editable',
		'toggle' => 'manual',
		'name' => 'content',
	],
	'events' => [
		'display' => new \yii\web\JsExpression('
							function(value) {
							  $(this).html(value);
							}
						')
	],
]);

?>

<br><br><br><br>

<h2>Text whitout model</h2>
<?php

echo XEditable::widget([
	'value' => 'With Xeditable'
]);

echo '<br>';

echo \mcms\xeditable\XEditableText::widget([
	'value' => 'With XEditableText'
]);

?>

<h2>Editable Without Render Content</h2>
<?php

echo \mcms\xeditable\XEditableText::widget([
	'id' => 'myId',
	'model' => $model,
	'placement' => 'right',
	'html' => false,
	'pluginOptions' => [
		'toggle' => 'manual',
		'name' => 'title',
	],
]);

?>
<div id="myId" class="editable" style="display: inline;">
	<?=$model->title?>
</div>

<h2>Text</h2>
<?php

echo \mcms\xeditable\XEditableText::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'name' => 'title',
	],
	'callbacks' => [
		'validate' => new \yii\web\JsExpression('
			function(value) {
				if($.trim(value) == "") {
					return "This field is required";
				}
			}
		')
	]
]);

?>

<h2>Text Toggle Manual</h2>
<?php

echo \mcms\xeditable\XEditableText::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'toggle' => 'manual',
		'name' => 'title',
	],
	'callbacks' => [
		'validate' => new \yii\web\JsExpression('
			function(value) {
				if($.trim(value) == "") {
					return "This field is required";
				}
			}
		')
	]
]);

?>

<h2>TextArea</h2>
<?php

echo \mcms\xeditable\XEditableTextArea::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'name' => 'content',
	],
]);

?>

<h2>Select</h2>
<?php

echo \mcms\xeditable\XEditableSelect::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'name' => 'status',
		'source'=>[
			['value'=>1,
				'text'=>Yii::t('app','On')],
			['value'=>0,
				'text'=>Yii::t('app','Off')]
		],
	],
]); ?>

<h2>Date</h2>
<?php

echo \mcms\xeditable\XEditableDate::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'name' => 'created_at',
		'value' => date('Y-m-d',$model->created_at),
		'format' => 'yyyy-mm-dd',
		'viewformat' => 'dd/mm/yyyy',
		'datepicker' => [
			[
				'weekStart' => 1
			]
		],
	]
]);

?>

<h2>DateTime</h2>
<?php

echo \mcms\xeditable\XEditableDateTime::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'name' => 'created_at',
		'value' => date('Y-m-d h:i',$model->created_at),
		'format' => 'yyyy-mm-dd hh:ii',
		'viewformat' => 'dd/mm/yyyy hh:ii',
		'datepicker' => [
			[
				'weekStart' => 1
			]
		],
	]
]); ?>

<h2>ComboDate</h2>
<?php

echo \mcms\xeditable\XEditableComboDate::widget([
	'model' => $model,
	'placement' => 'right',
	'type' => 'combodate',
	'pluginOptions' => [
		'name' => 'created_at',
		'value' => date('Y-m-d h:i',$model->created_at),
		'format'      => 'YYYY-MM-DD HH:mm',
		'viewformat'  => 'MMM DD, YYYY HH:mm',
		'template'    => 'DD / MMM / YYYY HH:mm',
		'combodate' => [
			[
				'minYear' => '2000',
				'maxYear' => '2015',
				'minuteStep' => '1'
			]
		],
	]
]);

?>

<h2>Checklist</h2>
<?php

echo \mcms\xeditable\XEditableCheckList::widget([
	'model' => $model,
	'placement' => 'right',
	'pluginOptions' => [
		'name' => 'image',
		'source'=>[
			['value'=>'option1',
				'text'=>Yii::t('app','option1')],
			['value'=>'option2',
				'text'=>Yii::t('app','option2')],
			['value'=>'option3',
				'text'=>Yii::t('app','option3')]
		],
	],
]);

?>

<h2>HTML Editor - WysiHtml5</h2>
<?php

echo \mcms\xeditable\XEditableWysiHtml5::widget([
	'type' => 'wysihtml5',
	'model' => $model,
	'pluginOptions' => [
		'toggle' => 'manual',
		'name' => 'content',
		'title' => 'Enter comments',
	],
]);

?>

<h2>Data Grid</h2>
<?php
$provider = new \yii\data\ActiveDataProvider([
	'query' => \backend\modules\cms\models\Categories::find(),
	'pagination' => [
		'pageSize' => 4,
	],
]);

echo GridView::widget([
	'id' => Yii::$app->controller->id,
	'dataProvider' => $provider,
	'columns' => [
		[
			'value'=>function($model) {
				return $model->active;
			},
			'class' => XEditableColumn::className(),
			'url' => 'editable',
			'dataType'=>'select',
			'editable'=>[
				'source'=>[
					['value'=>1,
						'text'=>Yii::t('app','On')],
					['value'=>0,
						'text'=>Yii::t('app','Off')]
				],
				'placement' => 'right',
			],
			'attribute' => 'status',
			'format' => 'raw',
		],
		'title',
	]
]);
?>

<h2>Select2</h2>
<?php

$items = [
	['value'=>'gb',
		'text'=>Yii::t('app','Great Britain')],
	['value'=>'us',
		'text'=>Yii::t('app','United States')],
	['value'=>'ru',
		'text'=>Yii::t('app','Russia')]
];

echo XEditable::widget([
	'placement' => 'right',
	'type' => 'select2',
	'pluginOptions' => [
		'value' => 'ru',
		'source'=> $items,
		'select2' => [
			'multiple' => true
		],
	]
]);

?>

<h2>TypeaheadJs</h2>
<?php

$items = [
	['value'=>'gb',
		'text'=>Yii::t('app','Great Britain')],
	['value'=>'us',
		'text'=>Yii::t('app','United States')],
	['value'=>'ru',
		'text'=>Yii::t('app','Russia')]
];

echo XEditable::widget([
	'placement' => 'right',
	'type' => 'typeaheadjs',
	'pluginOptions' => [
		'value' => 'ru',
		'typeahead' => [
			'name' => 'country',
			'local' => $items,
		],
	]
]);

?>
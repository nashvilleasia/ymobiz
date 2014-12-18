<?php
use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;

/*echo \mcms\xeditable\XEditableText::widget([
    'id' => md5($model->id.'-title-'.$model->slug),
    'access' => true,
    'model' => $editableModel,
    'placement' => 'right',
    'pluginOptions' => [
        'url' => '/post/editable',
        'toggle' => 'manual',
        'name' => 'title',
        'inputclass' => 'input-large'
    ],
]);

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
]);
*/

?>

<div class="container">

    <h1>Input type text</h1>

    <?php
    echo \common\extensions\marciocamello\xeditable\XEditableTextOne::widget([
        'id' => 'text',
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'text',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'inputclass' => 'input-editable',
        ],
    ]);
    ?>

    <br/>
    <br/>

    <?php
    echo Markdown::process(
        "
       \\common\\extensions\\marciocamello\\xeditable\\XEditableTextOne::widget([
            'id' => 'text',
            'templateCustom' => true,
            'pluginOptions' => [
                'url' => 'editable',
                'toggle' => 'manual',
                'name' => 'text',
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
        ]);
    ",
        'gfm');
    ?>

    <h1>Input type textarea</h1>

    <?php
    echo \common\extensions\marciocamello\xeditable\XEditableTextAreaOne::widget([
        'id' => 'textarea',
        'placement' => 'top',
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'textarea',
            'value' => ',Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices dignissim magna, quis ullamcorper dui blandit in. Quisque est dolor, molestie nec congue vitae, aliquam eget ligula. Praesent sit amet convallis nulla. Morbi ligula leo, sodales eu justo non, accumsan dignissim eros. In bibendum lobortis risus in aliquet. Quisque volutpat mi lacus. Quisque et dapibus purus.Maecenas eget porttitor urna. Aliquam posuere pharetra enim, vel ultricies ligula faucibus posuere. Nulla at iaculis purus.',
        ],
    ]);
    ?>

    <br/>
    <br/>

    <?php
    echo Markdown::process(
        "
        \\common\\extensions\\marciocamello\\xeditable\\XEditableTextAreaOne::widget([
            'id' => 'textarea',
            'placement' => 'top',
            'pluginOptions' => [
                'url' => 'editable',
                'toggle' => 'manual',
                'name' => 'textarea',
                'value' => ',Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices dignissim magna, quis ullamcorper dui blandit in. Quisque est dolor, molestie nec congue vitae, aliquam eget ligula. Praesent sit amet convallis nulla. Morbi ligula leo, sodales eu justo non, accumsan dignissim eros. In bibendum lobortis risus in aliquet. Quisque volutpat mi lacus. Quisque et dapibus purus.Maecenas eget porttitor urna. Aliquam posuere pharetra enim, vel ultricies ligula faucibus posuere. Nulla at iaculis purus.',
            ],
        ]);
    ",
        'gfm');
    ?>

    <h1>Input type file</h1>

    <?php

    $file = \common\models\ymocard\ymoClientsFiles::find()->one();

    echo \common\extensions\marciocamello\xeditable\XEditableFileOne::widget([
        'id' => 'image',
        'type' => 'file',
        'placement' => 'right',
        'model' => $file,
        'pluginOptions' => [
            'toggle' => 'manual',
            'url' => "upload",
            'name' => 'file',
            'value' => '<img width="220" src="/home/web/themes/basic/img/cards-learn.png"/>',
        ],
        'uploadAction' => true,
        'uploadOptions' => [
            'basePath' => '@webroot/upload',
            'baseUrl' => '/home/web/upload',
        ]
    ]);

    ?>

    <br/>
    <br/>

    <?php
    echo Markdown::process(
        "
        \\common\\extensions\\marciocamello\\xeditable\\XEditableFileOne::widget([
           'id' => 'image',
            'type' => 'file',
            'placement' => 'right',
            'pluginOptions' => [
                'toggle' => 'manual',
                'url' => 'upload',
                'name' => 'name',
                'value' => '<img width=\"220\" src=\"/home/web/themes/basic/img/cards-learn.png\"/>',
            ],
            'uploadAction' => true,
            'uploadOptions' => [
                'basePath' => '@webroot/upload',
                'baseUrl' => '/home/web/upload',
            ]
        ]);
    ",
        'gfm');
    ?>

    <h1>Example X-editable using rules from authorization action</h1>
    <p>Create rule from 'admin' from any user for try this</p>

    <?php
    echo \common\extensions\marciocamello\xeditable\XEditableTextOne::widget([
        'id' => 'text-auth',
        'access' => true,
        'accessRule' => \Yii::$app->user->can('admin'),
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'text-auth',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ],
    ]);
    ?>

    <?php
    echo Markdown::process(
        "
        \\common\\extensions\\marciocamello\\xeditable\\XEditableTextOne::widget([
            'id' => 'text-auth',
            'access' => true,
            'accessRule' => Yii::\$app->user->can('admin'),
            'pluginOptions' => [
                'url' => '/editable',
                'toggle' => 'manual',
                'name' => 'text-auth',
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
        ]);
    ",
        'gfm');
    ?>

</div>
<?php
use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;

$model = \ymobiz\models\common\Dev::findOne(2);

?>
<div class="col-xs-12 ymo-card-form">

<h1>Input type File Inline</h1>

<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableFileOne::widget([
    'id' => 'image-inline',
    'model' => $model,
    'pluginOptions' => [
        'toggle' => 'manual',
        'url' => "upload",
        'name' => 'file',
        'mode' => 'inline',
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

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableFileOne::widget([
        'id' => 'image-inline',
        'model' => \$model,
        'pluginOptions' => [
            'toggle' => 'manual',
            'url' => 'upload',
            'name' => 'file',
            'mode' => 'inline',
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

<h1>Input type File PopUp</h1>

<?php

$model = \ymobiz\models\common\Dev::findOne(2);

echo \ymobiz\extensions\marciocamello\xeditable\XEditableFileOne::widget([
    'id' => 'image-popup',
    'model' => $model,
    'mode' => 'popup',
    'pluginOptions' => [
        'toggle' => 'manual',
        'url' => "upload",
        'name' => 'file',
        'mode' => 'inline',
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

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableFileOne::widget([
        'id' => 'image-popup',
        'model' => \$model,
        'mode' => 'popup',
        'pluginOptions' => [
            'toggle' => 'manual',
            'url' => 'upload',
            'name' => 'file',
            'mode' => 'inline',
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

</div>
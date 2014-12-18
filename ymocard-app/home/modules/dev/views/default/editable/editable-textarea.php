<?php
use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;

$model = \ymobiz\models\common\Dev::findOne(1);

?>
<div class="col-xs-12 ymo-card-form">

<h1>Input type Textarea Inline</h1>

<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableTextAreaOne::widget([
    'id' => 'textarea-inline',
    'model' => $model,
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'content',
    ],
]);
?>

<br/>
<br/>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableTextAreaOne::widget([
        'id' => 'textarea-inline',
        'model' => \$model,
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'content',
        ],
    ]);
",
    'gfm');
?>

<br/>
<br/>

<h1>Input type Textarea PopUp</h1>

<?php


echo \ymobiz\extensions\marciocamello\xeditable\XEditableTextAreaOne::widget([
    'id' => 'textarea-popup',
    'model' => $model,
    'mode' => 'popup',
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'content',
    ],
]);
?>

    <br/>
    <br/>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableTextAreaOne::widget([
        'id' => 'textarea',
        'model' => \$model,
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'content',
        ],
    ]);
",
    'gfm');
?>

<br/>
<br/>

<h1>Input type Textarea Embed Video</h1>

<div class="row">
    <div class="col-xs-12 ymo-nopadding">
        <?php
        $modelVideo = \ymobiz\models\common\Dev::findOne(4);

        echo \ymobiz\extensions\marciocamello\xeditable\XEditableTextAreaOne::widget([
            'id' => 'video-embed',
            'model' => $modelVideo,
            'pluginOptions' => [
                'url' => 'editable',
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
    </div>
</div>

<br/>
<br/>

<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableTextAreaOne::widget([
        'id' => 'video-embed',
        'model' => \$modelVideo,
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'content',
        ],
        'events' => [
            'display' => new \\yii\\web\\JsExpression('
                function(value) {
                  $(this).html(value);
                }
            ')
        ],
    ]);
",
    'gfm');
?>

</div>
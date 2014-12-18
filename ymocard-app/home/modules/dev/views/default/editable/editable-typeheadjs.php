<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;
use yii\helpers\ArrayHelper;

$model = \ymobiz\models\common\Dev::findOne(5);

$array = [
    ['value'=>'Brazil',
        'text'=> 'Brazil'],
    ['value'=>'Albania',
        'text'=> 'Albania'],
    ['value'=>'Russia',
        'text'=> 'Russia'],
    ['value'=>'Portugal',
        'text'=> 'Portugal'],
];

?>
<div class="col-xs-12 ymo-card-form">

<h1>Input type TypeheadJs Inline</h1>

<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableTypeHeadJsOne::widget([
    'id' => 'typeaheadjs-inline',
    'model' => $model,
    'type' => 'typeaheadjs',
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'options',
        'value' => explode(',',$model->options),
        'source'=> $array,
        'inputclass' => 'input-editable',
        'typeahead' => [
            'name' => 'options',
            'local' => $array,
        ],
    ]
]);

?>

<br/>
<br/>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableTypeHeadJsOne::widget([
        'id' => 'typeaheadjs-inline',
        'model' => \$model,
        'type' => 'typeaheadjs',
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'options',
            'value' => explode(',',\$model->options),
            'source'=> \$array,
            'typeahead' => [
                'name' => 'options',
                'local' => \$array,
            ],
        ]
    ]);
",
    'gfm');
?>

    <h1>Input type TypeheadJs PopUp</h1>
<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableTypeHeadJsOne::widget([
    'id' => 'typeaheadjs-popup',
    'model' => $model,
    'type' => 'typeaheadjs',
    'mode' => 'popup',
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'options',
        'value' => explode(',',$model->options),
        'source'=> $array,
        'typeahead' => [
            'name' => 'options',
            'local' => $array,
        ],
    ]
]);

?>

    <br/>
    <br/>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableTypeHeadJsOne::widget([
        'id' => 'typeaheadjs-popup',
        'model' => \$model,
        'type' => 'typeaheadjs',
        'mode' => 'popup',
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'options',
            'value' => explode(',',\$model->options),
            'source'=> \$array,
            'typeahead' => [
                'name' => 'options',
                'local' => \$array,
            ],
        ]
    ]);
",
    'gfm');
?>

</div>
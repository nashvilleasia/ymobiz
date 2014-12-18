<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;
use yii\helpers\ArrayHelper;

$model = \ymobiz\models\common\Dev::findOne(1);
//$array = ArrayHelper::map(\common\models\common\ymoCountries::find()->asArray()->all(),'name','name');
$model->scenario = 'checkList';

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

<h1>Input type Select2 Inline</h1>

<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableSelect2One::widget([
    'id' => 'select2-inline',
    'model' => $model,
    'scenario'=>'checkList',
    'type' => 'select2',
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'options',
        'value' => explode(',',$model->options),
        'source'=> $array,
        'select2' => [
            'multiple' => true
        ],
    ]
]);

?>

<br/>
<br/>

<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableSelect2One::widget([
        'id' => 'select2-inline',
        'model' => \$model,
        'type' => 'select2',
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'options',
            'value' => explode(',',\$model->options),
            'source'=> \$array,
            'select2' => [
                'multiple' => true
            ],
        ]
    ]);
",
    'gfm');
?>

<h1>Input type Select2 PopUp</h1>

<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableSelect2One::widget([
    'id' => 'select2-popup',
    'model' => $model,
    'scenario'=>'checkList',
    'type' => 'select2',
    'mode' => 'popup',
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'options',
        'value' => explode(',',$model->options),
        'source'=> $array,
        'select2' => [
            'multiple' => true
        ],
    ]
]);

?>

<br/>
<br/>

<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableSelect2One::widget([
        'id' => 'select2',
        'model' => \$model,
        'type' => 'select2',
        'mode' => 'popup',
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'options',
            'value' => explode(',',\$model->options),
            'source'=> \$array,
            'select2' => [
                'multiple' => true
            ],
        ]
    ]);
",
    'gfm');
?>

</div>
<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;
use yii\helpers\ArrayHelper;


$model = \ymobiz\models\common\Dev::findOne(1);
$model->scenario = 'checkList';
//$array = ArrayHelper::map(\common\models\common\ymoCountries::find()->asArray()->all(),'name','name');

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

<h1>Input type Checklist Inline</h1>

<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableCheckListOne::widget([
    'id' => 'checklist-inline',
    'model' => $model,
    'scenario'=>'checkList',
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'options',
        'value' => explode(',',$model->options),
        'source'=> $array,
    ],
]);

?>

<br/>
<br/>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableCheckListOne::widget([
        'id' => 'checklist-inline',
        'model' => \$model,
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'options',
            'value' => explode(',',\$model->options),
            'source'=> \$array
        ],
    ]);
",
    'gfm');
?>

<h1>Input type Checklist PopUp</h1>

<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableCheckListOne::widget([
    'id' => 'checklist-popup',
    'model' => $model,
    'scenario'=>'checkList',
    'mode' => 'popup',
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'options',
        'value' => explode(',',$model->options),
        'source'=> $array
    ],
]);

?>

    <br/>
    <br/>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableCheckListOne::widget([
        'id' => 'checklist-popup',
        'model' => \$model,
        'mode' => 'popup',
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'options',
            'value' => explode(',',\$model->options),
            'source'=> \$array
        ],
    ]);
",
    'gfm');
?>

</div>
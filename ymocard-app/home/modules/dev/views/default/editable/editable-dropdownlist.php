<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;
use yii\helpers\ArrayHelper;

$model = \ymobiz\models\common\Dev::findOne(3);
$array = ArrayHelper::map(\ymobiz\models\common\ymoCountries::find()->asArray()->all(),'name','name');

?>
<div class="col-xs-12 ymo-card-form">

<h1>Input type Dropdownlist Inline</h1>

<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableDropdownlistOne::widget([
    'id' => 'dropdownlist-inline',
    'model' => $model,
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'name',
        'source' => $array,
    ],
]);

?>

<br/>
<br/>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \y\mobiz\\extensions\\marciocamello\\xeditable\\XEditableDropdownlistOne::widget([
        'id' => 'dropdownlist-inline',
        'model' => \$model,
        'pluginOptions' => [
            'url' => '/editable',
            'toggle' => 'manual',
            'name' => 'name',
            'source' => \$array,
        ],
    ]);
",
    'gfm');
?>

<h1>Input type Dropdownlist PopUp</h1>

<?php


$model = \ymobiz\models\common\Dev::findOne(3);
$array = ArrayHelper::map(\ymobiz\models\common\ymoCountries::find()->asArray()->all(),'name','name');

echo \ymobiz\extensions\marciocamello\xeditable\XEditableDropdownlistOne::widget([
    'id' => 'dropdownlist-popup',
    'model' => $model,
    'mode' => 'popup',
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'name',
        'source' => $array,
    ],
]);

?>

    <br/>
    <br/>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableDropdownlistOne::widget([
        'id' => 'dropdownlist-popup',
        'model' => \$model,
        'mode' => 'popup',
        'pluginOptions' => [
            'url' => '/editable',
            'toggle' => 'manual',
            'name' => 'name',
            'source' => \$array,
        ],
    ]);
",
    'gfm');
?>

</div>
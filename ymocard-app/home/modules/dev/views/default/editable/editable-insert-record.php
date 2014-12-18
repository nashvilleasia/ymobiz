<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;

$model = new \ymobiz\models\common\ymoContents;

?>
<div class="col-xs-12 ymo-card-form">

<h1>Input type Text Inline</h1>

<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableTextOne::widget([
    'id' => 'text-inline',
    'model' => $model,
    'pluginOptions' => [
        'url' => 'insert-editable',
        'toggle' => 'manual',
        'name' => 'name',
        'inputclass' => 'input-editable',
    ],
]);
?>

<br/>
<br/>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableTextOne::widget([
        'id' => 'text-inline',
        'model' => \$model,
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'name',
            'inputclass' => 'input-editable',
        ],
    ]);
",
    'gfm');
?>

<h1>Input type Text PopUp</h1>

<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableTextOne::widget([
    'id' => 'text-popup',
    'model' => $model,
    'mode' => 'popup',
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'name',
        'inputclass' => 'input-editable',
    ],
]);
?>

    <br/>
    <br/>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableTextOne::widget([
        'id' => 'text-popup',
        'model' => \$model,
        'mode' => 'popup',
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'name',
            'inputclass' => 'input-editable',
        ],
    ]);
",
    'gfm');
?>

</div>
<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;

$model = \ymobiz\models\common\Dev::findOne(1);

?>
<div class="col-xs-12 ymo-card-form">

<h1>Input type WysiHtml5 Inline</h1>

<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableWysiHtml5One::widget([
    'id' => 'wysihtml5-inline',
    'type' => 'wysihtml5',
    'model' => $model,
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'content',
        'title' => 'Edit this content',
    ],
]);

?>

    <br>
    <br>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableWysiHtml5One::widget([
        'id' => 'wysihtml5-inline',
        'type' => 'wysihtml5',
        'model' => \$model,
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'content',
            'title' => 'Edit this content',
        ],
    ]);
",
    'gfm');
?>

<h1>Input type WysiHtml5 PopUp</h1>

<?php

echo \ymobiz\extensions\marciocamello\xeditable\XEditableWysiHtml5One::widget([
    'id' => 'wysihtml5-popup',
    'type' => 'wysihtml5',
    'model' => $model,
    'mode' => 'popup',
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'content',
        'title' => 'Edit this content',
    ],
]);

?>

<br>
<br>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableWysiHtml5One::widget([
        'id' => 'wysihtml5-popup',
        'type' => 'wysihtml5',
        'model' => \$model,
        'mode' => 'popup',
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'content',
            'title' => 'Edit this content',
        ],
    ]);
",
    'gfm');
?>

</div>
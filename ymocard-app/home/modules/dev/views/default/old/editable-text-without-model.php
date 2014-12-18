<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;

?>

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
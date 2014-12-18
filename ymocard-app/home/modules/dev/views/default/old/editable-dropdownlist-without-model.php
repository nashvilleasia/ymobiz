<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;

?>

<h1>Input type Dropdownlist Without Model</h1>

<?php

$array = \yii\helpers\ArrayHelper::map(\common\models\common\ymoCountries::find(40)->all(),'name','name');

echo \common\extensions\marciocamello\xeditable\XEditableDropdownlistOne::widget([
    'id' => 'dropdownlist',
    'placement' => 'top',
    'type' => 'select',
    'pluginOptions' => [
        'url' => '/editable',
        'name' => 'name',
        'value' => 'Angola',
        'source' => $array,
    ],
]);

?>

<br/>
<br/>

<?php
echo Markdown::process(
    "
    echo \\common\\extensions\\marciocamello\\xeditable\\XEditableDropdownlistOne::widget([
        'id' => 'dropdownlist',
        'placement' => 'top',
        'type' => 'select',
        'pluginOptions' => [
            'url' => '/editable',
            'name' => 'name',
            'value' => 'Angola',
            'source' => \$array,
        ],
    ]);
",
    'gfm');
?>
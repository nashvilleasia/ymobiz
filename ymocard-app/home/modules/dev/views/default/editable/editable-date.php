<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;

?>
<div class="col-xs-12 ymo-card-form">

<h1>Input type Date</h1>

<?php

$model = \ymobiz\models\common\Dev::findOne(1);
$model->scenario = 'dateFormat';

echo \ymobiz\extensions\marciocamello\xeditable\XEditableDateOne::widget([
    'id' => 'date-inline',
    'model' => $model,
    'scenario'=>'dateFormat',
    'placement' => 'bottom',
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'created_at',
        'value' => date('Y-m-d',$model->created_at),
        'format' => 'yyyy-mm-dd',
        'viewformat' => 'dd/mm/yyyy',
        'datepicker' => [
            [
                'weekStart' => 1
            ]
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
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableDateOne::widget([
        'id' => 'date-inline',
        'model' => \$model,
        'scenario'=>'dateFormat',
        'placement' => 'bottom',
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'created_at',
            'value' => date('Y-m-d',\$model->created_at),
            'format' => 'yyyy-mm-dd',
            'viewformat' => 'dd/mm/yyyy',
            'datepicker' => [
                [
                    'weekStart' => 1
                ]
            ],
        ]
    ]);
",
    'gfm');
?>

</div>
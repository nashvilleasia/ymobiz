<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;

?>
<div class="col-xs-12 ymo-card-form">

<h1>Input type ComboDate</h1>

<?php

$model = \ymobiz\models\common\Dev::findOne(1);

echo \ymobiz\extensions\marciocamello\xeditable\XEditableComboDateOne::widget([
    'id' => 'combodate-inline',
    'model' => $model,
    'scenario'=>'dateFormat',
    'placement' => 'bottom',
    'formClass' => 'form-inline',
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'created_at',
        'value' => date('Y-m-d H:i',$model->created_at),
        'format'      => 'YYYY-MM-DD HH:mm',
        'viewformat'  => 'MMM DD, YYYY HH:mm',
        'template'    => 'DD / MMM / YYYY HH:mm',
        'combodate' => [
            [
                'minYear' => '2000',
                'maxYear' => '2015',
                'minuteStep' => '1'
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
    echo \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableComboDateOne::widget([
        'id' => 'combodate-inline',
        'model' => \$model,
        'scenario'=>'dateFormat',
        'placement' => 'bottom',
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'created_at',
            'value' => date('Y-m-d h:i',\$model->created_at),
            'format'      => 'YYYY-MM-DD HH:mm',
            'viewformat'  => 'MMM DD, YYYY HH:mm',
            'template'    => 'DD / MMM / YYYY HH:mm',
            'combodate' => [
                [
                    'minYear' => '2000',
                    'maxYear' => '2015',
                    'minuteStep' => '1'
                ]
            ],
        ]
    ]);
",
    'gfm');
?>
</div>
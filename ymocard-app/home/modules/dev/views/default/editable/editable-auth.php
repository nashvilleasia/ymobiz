<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;

?>

<div class="col-xs-12 ymo-card-form">

<h1>Example X-editable using rules from authorization action</h1>
<p>Create rule from 'admin' from any user for try this</p>

<?php

$model = \ymobiz\models\common\Dev::findOne(1);

echo \ymobiz\extensions\marciocamello\xeditable\XEditableTextOne::widget([
    'id' => 'text-auth',
    'model' => $model,
    'access' => true,
    'accessRule' => \ymobiz\components\UserCheckPermission::userCan(['admin']),
    'pluginOptions' => [
        'url' => 'editable',
        'toggle' => 'manual',
        'name' => 'name',
    ],
]);
?>

<h1>Usage</h1>
<?php
echo Markdown::process(
    "
    \\ymobiz\\extensions\\marciocamello\\xeditable\\XEditableTextOne::widget([
        'id' => 'text-auth',
        'model' => \$model,
        'access' => true,
        'accessRule' => \\ymobiz\\components\\UserCheckPermission::userCan(['admin']),
        'pluginOptions' => [
            'url' => '/editable',
            'toggle' => 'manual',
            'name' => 'name',
        ],
    ]);
",
    'gfm');
?>
</div>
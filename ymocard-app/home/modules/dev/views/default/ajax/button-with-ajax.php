<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;

?>
<h1>Button default</h1>
<?php

echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
    'id' => 'button-default',
    'buttonClass' => 'btn ymo-btn-dark-pink',
    'pluginOptions' => [
        'url' => 'ajax-non-json',
        'data' => [
            'name' => 'user',
            'email' => 'email@email.com'
        ],
    ],
]);

?>

<br/>
<br/>

<h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\ajaxform\\AjaxButtonOne::widget([
        'id' => 'button-default',
        'buttonClass' => 'btn ymo-btn-dark-pink',
        'pluginOptions' => [
            'url' => 'ajax-non-json',
            'data' => [
                'name' => 'user',
                'email' => 'email@email.com'
            ],
        ],
    ]);
",
    'gfm');
?>

<h1>Button with confirmation</h1>
<?php

echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
    'id' => 'button-ajax',
    'buttonClass' => 'btn ymo-btn-dark-pink',
    'name' => 'confirmation',
    'target' => 'response-comfirmation',
    'pluginOptions' => [
        'url' => 'ajax-non-json',
        'data' => [
            'name' => 'user',
            'email' => 'email@email.com'
        ],
    ],
    'events' => [
        'confirmation' => [
            'message' => 'Are you sure?',
            'error' => 'There was an error!',
        ]
    ],
]);

?>

<br/>
<br/>

<h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\ajaxform\\AjaxButtonOne::widget([
        'id' => 'button-ajax',
        'buttonClass' => 'btn ymo-btn-dark-pink',
        'name' => 'confirmation',
        'target' => 'response-comfirmation',
        'pluginOptions' => [
            'url' => 'ajax-non-json',
            'data' => [
                'name' => 'user',
                'email' => 'email@email.com'
            ],
        ],
        'events' => [
            'confirmation' => [
                'message' => 'Are you sure?',
                'error' => 'There was an error!',
            ]
        ],
    ]);
",
    'gfm');
?>

<h1>Button with custom callbacks</h1>
<?php

echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
    'id' => 'button-calbacks',
    'buttonClass' => 'btn ymo-btn-dark-pink',
    'name' => 'custom calbacks',
    'target' => 'response-calbacks',
    'pluginOptions' => [
        'url' => 'ajax-non-json',
        'data' => [
            'name' => 'user',
            'email' => 'email@email.com'
        ],
    ],
    'customCallbacks' =>
        [
            'complete' => '
                /*if jquery param type=\'json\'
                 var obj = JSON.parse(event.responseText);
                 console.log(obj);
                */
                var obj = event.responseText ;
                console.log(obj);
                alert(obj);
            ',
        ]
]);

?>

    <br/>
    <br/>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\ajaxform\\AjaxButtonOne::widget([
        'id' => 'button-calbacks',
        'buttonClass' => 'btn ymo-btn-dark-pink',
        'name' => 'custom calbacks',
        'target' => 'response-calbacks',
        'pluginOptions' => [
            'url' => 'ajax-non-json',
            'data' => [
                'name' => 'user',
                'email' => 'email@email.com'
            ],
        ],
        'customCallbacks' =>
            [
                'complete' => '
                    /*if jquery param type='json'
                     var obj = JSON.parse(event.responseText);
                     console.log(obj);
                    */
                    var obj = event.responseText ;
                    console.log(obj);
                    alert(obj);
                ',
            ]
    ]);
",
    'gfm');
?>

<h1>Button with replace target</h1>

<?php

echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
    'id' => 'button-replace',
    'buttonClass' => 'btn ymo-btn-dark-pink',
    'name' => 'replace target self html object',
    'replaceTarget' => true,
    'pluginOptions' => [
        'url' => 'ajax-non-json',
        'data' => [
            'name' => 'user',
            'email' => 'email@email.com'
        ],
    ],
]);

?>


    <br/>
    <br/>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\ajaxform\\AjaxButtonOne::widget([
        'id' => 'button-replace',
        'buttonClass' => 'btn ymo-btn-dark-pink',
        'name' => 'replace target self html object',
        'replaceTarget' => true,
        'pluginOptions' => [
            'url' => 'ajax-non-json',
            'data' => [
                'name' => 'user',
                'email' => 'email@email.com'
            ],
        ],
    ]);
",
    'gfm');
?>

<br>
<br>

<div id="replace-target">
<?php

echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
    'id' => 'button-replace2',
    'buttonClass' => 'btn ymo-btn-dark-pink',
    'name' => 'replace target with parent html object',
    'target' => 'replace-target',
    'pluginOptions' => [
        'url' => 'ajax-non-json',
        'data' => [
            'name' => 'user',
            'email' => 'email@email.com'
        ],
    ],
]);

?>
</div>

    <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\ajaxform\\AjaxButtonOne::widget([
        'id' => 'button-replace2',
        'buttonClass' => 'btn ymo-btn-dark-pink',
        'name' => 'replace target with parent html object',
        'target' => 'replace-target',
        'pluginOptions' => [
            'url' => 'ajax-non-json',
            'data' => [
                'name' => 'user',
                'email' => 'email@email.com'
            ],
        ],
    ]);
",
    'gfm');
?>
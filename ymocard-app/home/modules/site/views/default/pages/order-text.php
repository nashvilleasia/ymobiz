<?php if(@Yii::$app->request->get('step')=='OrderFinish'){?>

<div class="col-md-10 col-md-offset-1 ymo-order ymo-nopadding ymo-Panel">
    <?php
    echo \ymobiz\extensions\marciocamello\xeditable\XEditableTextAreaOne::widget([
        'id' => 'order-text-finish-title',
        'model' => \ymobiz\models\common\ymoContents::find()->where(['slug'=>'order-text-finish','status'=>1])->one(),
        'access' => true,
        'accessRule' => Yii::$app->getModule('site')->ymoCheckUser->can(['admin']),
        'toggleIcon' => '<img src="'.Yii::$app->getModule('site')->ymoTools->imageSrc('pink_edit_on.png','img/icons').'">'.Yii::t('app','edit'),
        'toggleButtons' => [
            '<li><a href="#" class="edit-dropdown" id="edit-pluginId">editName</a></li>',
        ],
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'name',
            'rows' => 2
        ],
        'events' => [
            'display' => new \yii\web\JsExpression('
                function(value) {
                  $(this).html("<h2 class=\'ymo-title-b\'>" + value + "</h2>");
                }
            ')
        ],
    ]);
    ?>
    <?php
    echo \ymobiz\extensions\marciocamello\xeditable\XEditableWysiHtml5One::widget([
        'id' => 'order-text-finish-content',
        'type' => 'wysihtml5',
        'model' =>  \ymobiz\models\common\ymoContents::find()->where(['slug'=>'order-text-finish','status'=>1])->one(),
        'access' => true,
        'accessRule' => Yii::$app->getModule('site')->ymoCheckUser->can(['admin']),
        'toggleIcon' => '<img src="'.Yii::$app->getModule('site')->ymoTools->imageSrc('pink_edit_on.png','img/icons').'">'.Yii::t('app','edit'),
        'toggleButtons' => [
            '<li><a href="#" class="edit-dropdown" id="edit-pluginId">editName</a></li>',
        ],
        'pluginOptions' => [
            'url' => '/site/editable',
            'toggle' => 'manual',
            'name' => 'content',
            'title' => 'Edit this content',
        ],
        'events' => [
            'display' => new \yii\web\JsExpression('
                function(value) {
                  $(this).html("<p class=\'ymo-text-a\'>" + value + "</p>");
                }
            ')
        ],
    ]);
    ?>
</div>
<?php }else{?>

<div class="col-md-10 col-md-offset-1 ymo-order ymo-nopadding ymo-Panel">
    <?php
    echo \ymobiz\extensions\marciocamello\xeditable\XEditableTextAreaOne::widget([
        'id' => 'order-text-title',
        'model' => \ymobiz\models\common\ymoContents::find()->where(['slug'=>'order-text','status'=>1])->one(),
        'access' => true,
        'accessRule' => Yii::$app->getModule('site')->ymoCheckUser->can(['admin']),
        'toggleIcon' => '<img src="'.Yii::$app->getModule('site')->ymoTools->imageSrc('pink_edit_on.png','img/icons').'">'.Yii::t('app','edit'),
        'toggleButtons' => [
            '<li><a href="#" class="edit-dropdown" id="edit-pluginId">editName</a></li>',
        ],
        'pluginOptions' => [
            'url' => 'editable',
            'toggle' => 'manual',
            'name' => 'name',
            'rows' => 2
        ],
        'events' => [
            'display' => new \yii\web\JsExpression('
                function(value) {
                  $(this).html("<h2 class=\'ymo-title-b\'>" + value + "</h2>");
                }
            ')
        ],
    ]);
    ?>
    <?php
    echo \ymobiz\extensions\marciocamello\xeditable\XEditableWysiHtml5One::widget([
        'id' => 'order-text-content',
        'type' => 'wysihtml5',
        'model' =>  \ymobiz\models\common\ymoContents::find()->where(['slug'=>'order-text','status'=>1])->one(),
        'access' => true,
        'accessRule' => Yii::$app->getModule('site')->ymoCheckUser->can(['admin']),
        'toggleIcon' => '<img src="'.Yii::$app->getModule('site')->ymoTools->imageSrc('pink_edit_on.png','img/icons').'">'.Yii::t('app','edit'),
        'toggleButtons' => [
            '<li><a href="#" class="edit-dropdown" id="edit-pluginId">editName</a></li>',
        ],
        'pluginOptions' => [
            'url' => '/site/editable',
            'toggle' => 'manual',
            'name' => 'content',
            'title' => 'Edit this content',
        ],
        'events' => [
            'display' => new \yii\web\JsExpression('
                function(value) {
                  $(this).html("<p class=\'ymo-text-a\'>" + value + "</p>");
                }
            ')
        ],
    ]);
    ?>
</div>

<?php }?>
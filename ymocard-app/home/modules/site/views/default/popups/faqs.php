<!-- Modal -->
<div class="popup-faqs">
    <div class="ymo-popup">
        <div class="popup-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <?php
            echo \ymobiz\extensions\marciocamello\xeditable\XEditableTextAreaOne::widget([
                'id' => 'faqs-title',
                'model' => \ymobiz\models\common\ymoContents::find()->where(['slug'=>'faqs','status'=>1])->one(),
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
                          $(this).html("<h4 class=\'modal-title\' id=\'myModalLabel\'>" + value + "</h4>");
                        }
                    ')
                ],
            ]);
            ?>
        </div>
        <div class="modal-body popup-body">
            <div class="row">
                <?php
                echo \ymobiz\extensions\marciocamello\xeditable\XEditableWysiHtml5One::widget([
                    'id' => 'faqs-content',
                    'type' => 'wysihtml5',
                    'model' => \ymobiz\models\common\ymoContents::find()->where(['slug'=>'faqs','status'=>1])->one(),
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
                              $(this).html("<div class=\'col-md-12 popup-list\'>" + value + "</div>");
                            }
                        ')
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
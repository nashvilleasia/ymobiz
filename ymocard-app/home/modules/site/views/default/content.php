<div class="col-md-12 col-sm-12 ymo-image ymo-Panel">
	<div class="container ymo-banner">
		<div class="ymo-image-video">
            <?php
            echo \ymobiz\extensions\marciocamello\xeditable\XEditableTextAreaOne::widget([
                'id' => 'video-embed',
                'model' => \ymobiz\models\common\ymoContents::find()->where(['slug'=>'video-home','status'=>1])->one(),
                'access' => true,
                'accessRule' => Yii::$app->getModule('site')->ymoCheckUser->can(['admin']),
                'optionsToggle' => [
                    'style="margin-top: -22px;"'
                ],
                'toggleIcon' => '<img src="'.Yii::$app->getModule('site')->ymoTools->imageSrc('pink_edit_on.png','img/icons').'">'.Yii::t('app','edit'),
                'toggleButtons' => [
                    '<li><a href="#" class="edit-dropdown" id="edit-pluginId">editName</a></li>',
                ],
                'mode' => 'popup',
                'placement' => 'bottom',
                'pluginOptions' => [
                    'url' => '/site/editable',
                    'toggle' => 'manual',
                    'name' => 'content',
                ],
                'events' => [
                    'display' => new \yii\web\JsExpression('
                        function(value) {
                          $(this).html(value);
                          $(this).css("display","block");
                        }
                    ')
                ],
            ]);
            ?>
		</div>
	</div>
</div>
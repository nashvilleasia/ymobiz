<div class="row">
	<div class="col-md-12 ymo-body ymo-Panel">
		<div class="col-md-7 ymo-nopadding ymo-Panel">
			<div class="col-md-10 col-md-offset-1 ymo-learn ymo-nopadding ymo-Panel">
                <?php
                echo \ymobiz\extensions\marciocamello\xeditable\XEditableTextAreaOne::widget([
                    'id' => 'learn-more-title',
                    'model' => \ymobiz\models\common\ymoContents::find()->where(['slug'=>'learn-more','status'=>1])->one(),
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
                              $(this).html("<h2>" + value + "</h2>");
                            }
                        ')
                    ],
                ]);
                ?>
				<div class="ymo-text">
                    <?php
                        echo \ymobiz\extensions\marciocamello\xeditable\XEditableWysiHtml5One::widget([
                            'id' => 'learn-more-content',
                            'type' => 'wysihtml5',
                            'model' => \ymobiz\models\common\ymoContents::find()->where(['slug'=>'learn-more','status'=>1])->one(),
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
                                      $(this).html(value);
                                    }
                                ')
                            ],
                        ]);
                    ?>
				</div>
			</div>
		</div>
		<?php echo $this->render('info-card') ?>
		<div class="col-md-12 ymo-info2 ymo-nopadding ymo-Panel">
			<div class="col-md-5 col-sm-5 ymo-text ymo-nopadding ymo-Panel">
				<h3>
                    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Request your ymocard and
                        start enjoying freedom in
                        money transactions, its easy!')
                    ?>
				</h3>
			</div>
			<div class="col-md-6 col-sm-6 ymo-nopadding ymo-Panel">
				<a href="<?php echo \Yii::$app->urlManager->createUrl('/site/order-signup')?>">
                    <p class="col-md-3 ymo-btn-card">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','GET YOUR
                            CARDS NOW!')
                        ?>
                    </p>
				</a>
			</div>
		</div>
	</div>
</div>
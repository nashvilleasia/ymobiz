					<li>
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/staff-call/registered-cards')?>" style="<?=(Yii::$app->controller->action->id=='index' || Yii::$app->controller->action->id=='registered-cards') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','registered cards')?>
                            </a>
                        <p>
                    </li>
                    <li style="border: none;">
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/staff-call/account-settings')?>" style="<?=(Yii::$app->controller->action->id=='account-settings') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','account settings')?>
                            </a>
                        <p>
                    </li>
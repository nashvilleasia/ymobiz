					<li>
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/staff-emission/emission')?>" style="<?=(Yii::$app->controller->action->id=='index' || Yii::$app->controller->action->id=='emission' || Yii::$app->controller->action->id=='order-emission') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','emission')?>
                            </a>
                        <p>
                    </li>
                    <li style="border: none;">
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/staff-emission/account-settings')?>" style="<?=(Yii::$app->controller->action->id=='account-settings') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','account settings')?>
                            </a>
                        <p>
                    </li>
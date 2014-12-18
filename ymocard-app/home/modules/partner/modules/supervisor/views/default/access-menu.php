					<li>
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/partner-supervisor/registered-cards')?>" style="<?=(Yii::$app->controller->action->id=='registered-cards' || Yii::$app->controller->action->id=='order-signup' || Yii::$app->controller->action->id=='order-card' || Yii::$app->controller->action->id=='order-payment') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','registered cards')?>
                            </a>
                        <p>
                    </li>
                    <li>
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/partner-supervisor/members')?>" style="<?=(Yii::$app->controller->action->id=='members' || Yii::$app->controller->action->id=='add-members') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','members')?>
                            </a>
                        <p>
                    </li>
                    <li style="border: none;">
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/partner-supervisor/account-settings')?>" style="<?=(Yii::$app->controller->action->id=='account-settings') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','account settings')?>
                            </a>
                        <p>
                    </li>
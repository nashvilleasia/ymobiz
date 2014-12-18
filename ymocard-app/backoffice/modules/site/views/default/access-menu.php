					<li>
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/supervisor/call-center')?>" style="<?=(Yii::$app->controller->action->id=='call-center') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','call center')?>
                            </a>
                        <p>
                    </li>
                    <li>
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/supervisor/compliance')?>" style="<?=(Yii::$app->controller->action->id=='compliance') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','compliance')?>
                            </a>
                        <p>
                    </li>
                    <li>
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/supervisor/treasury')?>" style="<?=(Yii::$app->controller->action->id=='treasury') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','treasury')?>
                            </a>
                        <p>
                    </li>
                    <li>
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/supervisor/emission')?>" style="<?=(Yii::$app->controller->action->id=='emission' || Yii::$app->controller->action->id=='order-emission') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','emission')?>
                            </a>
                        <p>
                    </li>
                    <li>
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/supervisor/members')?>" style="<?=(Yii::$app->controller->action->id=='members' || Yii::$app->controller->action->id=='add-members') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','members')?>
                            </a>
                        <p>
                    </li>
                    <li style="border: none;">
                        <p>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('/supervisor/account-settings')?>" style="<?=(Yii::$app->controller->action->id=='account-settings') ? 'text-decoration:underline;' : ''?>">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','account settings')?>
                            </a>
                        <p>
                    </li>
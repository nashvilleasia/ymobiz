
            <li style="border: none;">
                <p>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl('/supervisor/account-settings')?>" style="<?=(Yii::$app->controller->action->id=='account-settings') ? 'text-decoration:underline;' : ''?>">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','account settings')?>
                    </a>
                <p>
            </li>
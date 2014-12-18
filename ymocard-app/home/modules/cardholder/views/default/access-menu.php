
            <!--Menu Items Card Holder-->
            <li>
                <p>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl('/card-holder')?>" style="<?=(Yii::$app->controller->action->id=='index' || Yii::$app->controller->action->id=='order') ? 'text-decoration:underline;' : ''?>">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','registered cards')?>
                    </a>
                <p>
            </li>
            <li style="border: none;">
                <p>
                    <a href="<?php echo \Yii::$app->urlManager->createUrl('/card-holder/account-settings')?>" style="<?=(Yii::$app->controller->action->id=='account-settings') ? 'text-decoration:underline;' : ''?>">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','account settings')?>
                    </a>
                <p>
            </li>
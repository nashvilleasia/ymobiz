<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var string $name
 * @var string $message
 * @var Exception $exception
 */

$this->title = $name;

?>
<a href="#content" class="sr-only"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Skip to main content') ?></a>

<div id="wrap">
    <div class="container">

        <?php echo $this->render('header') ?>
        <div class="row">
            <div class="row">
                <div class="col-md-12 ymo-body ymo-Panel">
                    <div class="site-error">

                        <h1><?= Html::encode($this->title) ?></h1>

                        <div class="alert alert-danger">
                            <?= nl2br(Html::encode($message)) ?>
                        </div>

                        <p><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','The above error occurred while the Web server was processing your request.') ?></p>
                        <p><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Please contact us if you think this is a server error. Thank you.') ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="footer">
    <div class="container">
        <?php echo $this->render('footer') ?>
    </div>
</div>
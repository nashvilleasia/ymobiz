<?php

use yii\helpers\Html;
$view = Yii::$app->getView();
$view->registerCss('
.container{
    outline:none;
}
');
?>
<div class="container">

    <?php echo $this->render('@card-holder/views/default/top') ?>

    <h1><?=$this->title?></h1>
    <?=Html::a('<h1>Back</h1>','/dev')?>
    <?=$page?>
</div>
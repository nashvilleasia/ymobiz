<?php

use common\models\grid\ymoCardsSupervisor;

$model = new ymoCardsSupervisor();
$viewCards = $model->viewCard();

?>
<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-super ymo-Panel">

            <?php echo $this->render('pages/card-table') ?>
            
            <?php echo $this->render('pages/card-details') ?>

            <?php if($viewCards->one()!=false){ echo $this->render('pages/comments'); } ?>

        </div>
    </div>
</div>
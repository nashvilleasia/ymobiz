<?php $this->beginPage() ?>
<?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
<?php $this->endPage() ?>
<?php

use yii\helpers\Html;

$view = Yii::$app->getView();
$view->registerCss('
.dev-links b a{
    color: #d02391;
}
.container{
    outline:none;
}
');

?>
<div class="container">

    <?php echo $this->render('@card-holder/views/default/top') ?>

    <h1><?=$this->title?></h1>
    <ul class="list-unstyled">
        <li><b>SDK</b>
            <ul class="dev-links">
                <b><?=Html::a('<li>Introduction</li>','/dev/introduction',[]) ?></b>
                <b><?=Html::a('<li>Ymobiz\Ymocard Dev Project Guide 1.0</li>','/dev/docs',[]) ?></b>
                <b><?=Html::a('<li>About</li>','/dev/about',[]) ?></b>
                <li><b>Forms</b>
                    <ul>
                        <li><b>Default</b>
                            <ul>
                                <b><?=Html::a('<li>Form Explanation</li>','/dev/form-index',[]) ?></b>
                                <?=Html::a('<li>Form Model</li>','/dev/form-model',[]) ?>
                                <?=Html::a('<li>Ajax Form Model</li>','/dev/form-ajax-model',[]) ?>
                            </ul>
                        </li>
                        <li><b>Upload</b>
                            <ul>
                                <b><?=Html::a('<li>Upload Explanation</li>','/dev/upload-index',[]) ?></b>
                                <?=Html::a('<li>Upload With Model</li>','/dev/form-upload-model',[]) ?>
                                <?=Html::a('<li>Upload Without Model</li>','/dev/form-upload-without-model',[]) ?>
                                <?=Html::a('<li>Ajax Upload With Model</li>','/dev/form-ajax-upload-model',[]) ?>
                                <?=Html::a('<li>Upload Multiple With Model</li>','/dev/form-upload-multiple-model',[]) ?>
                                <?=Html::a('<li>Upload Multiple Without Model</li>','/dev/form-upload-multiple-without-model',[]) ?>
                                <?=Html::a('<li>Ajax Multiple Upload With Model</li>','/dev/form-ajax-upload-multiple-model',[]) ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><b>Editable</b>
                    <ul>
                        <li><b>Inputs</b>
                            <ul>
                                <b><?=Html::a('<li>Editable Explanation</li>','/dev/editable-index',[]) ?></b>
                                <?=Html::a('<li>Editable InputText</li>','/dev/editable-text',[]) ?>
                                <?=Html::a('<li>Editable InputTextArea</li>','/dev/editable-textarea',[]) ?>
                                <?=Html::a('<li>Editable InputFile</li>','/dev/editable-upload',[]) ?>
                                <?=Html::a('<li>Editable Dropdownlist</li>','/dev/editable-dropdownlist',[]) ?>
                                <?=Html::a('<li>Editable Checklist</li>','/dev/editable-checklist',[]) ?>
                                <?=Html::a('<li>Editable TypeHeadJs</li>','/dev/editable-typeheadjs',[]) ?>
                                <?=Html::a('<li>Editable Select2</li>','/dev/editable-select2',[]) ?>
                                <?=Html::a('<li>Editable WysiHtml5</li>','/dev/editable-wysihtml5',[]) ?>
                                <?=Html::a('<li>Editable Date</li>','/dev/editable-date',[]) ?>
                                <?=Html::a('<li>Editable DateTime</li>','/dev/editable-datetime',[]) ?>
                                <?=Html::a('<li>Editable ComboDate</li>','/dev/editable-combodate',[]) ?>
                                <?=Html::a('<li>Editable WysiHtml5</li>','/dev/editable-wysihtml5',[]) ?>
                                <?=Html::a('<li>Editable Form</li>','/dev/editable-form',[]) ?>
                                <?=Html::a('<li>Editable Using Auth Rules</li>','/dev/editable-auth',[]) ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><b>Grids</b>
                    <ul>
                        <li><b>Tables</b>
                            <ul>
                                <b><?=Html::a('<li>Grid Explanation</li>','/dev/grid-index',[]) ?></b>
                                <?=Html::a('<li>Grid With Model and Pagination and LinkPager</li>','/dev/grid',[]) ?>
                                <?=Html::a('<li>Grid With Model and Dataprovider</li>','/dev/grid-dataprovider',[]) ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><b>Ajax\Jquery</b>
                    <ul>
                        <li><b>Buttons</b>
                            <ul>
                                <b><?=Html::a('<li>Button Explanation</li>','/dev/button-index',[]) ?></b>
                                <?=Html::a('<li>Button with Ajax</li>','/dev/button-with-ajax',[]) ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><b>Popups\Modal</b>
                    <ul>
                        <li><b>Response\Callbacks\Errors</b>
                            <ul>
                                <b><?=Html::a('<li>Popups\Modal Explanation</li>','/dev/popups-index',[]) ?></b>
                                <?=Html::a('<li>Popups\Modal</li>','/dev/popups',[]) ?>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
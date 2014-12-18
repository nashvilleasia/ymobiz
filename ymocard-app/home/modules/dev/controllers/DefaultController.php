<?php

namespace home\modules\dev\controllers;

use Yii;
use ymobiz\components\Upload;
use common\models\ymoClientsFiles;
use ymobiz\helpers\Password;
use ymobiz\models\common\Dev;
use ymobiz\models\common\ymoCountries;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use app\components\ymoLangManager;
use common\models\ymoClients;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;
use yii\imagine\Image;
use yii\helpers\Html;
use ymobiz\models\common\ymoContents;

/**
 * @inheritdoc
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        \Yii::$app->view->title = 'Docs, Samples and others things for Dev';
        \Yii::$app->language = (ymoLangManager::getLang()) ? ymoLangManager::getLang() : 'english';
        \Yii::$app->assetManager->bundles = Yii::$app->getModule('card-holder')->components['assetManager']['bundles'];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'editable' => [
                'class' => 'mcms\xeditable\XEditableAction',
                //'scenario'=>'editableForm',  //optional
                'modelclass' => Dev::className(),
            ],
            'insert-editable' => [
                'class' => 'mcms\xeditable\XEditableAction',
                //'scenario'=>'editableForm',  //optional
                'modelclass' => ymoContents::className(),
            ],
            'upload' => [
                'class' => 'mcms\xeditable\XEditableUploadAction',
                'uploadType' => 'model',
                'method' => 'saveFile',
                'modelclass' => Dev::className(),
            ],
            'display-file' => [
                'class' => 'ymobiz\actions\DisplayFileAction',
                'options' => [
                    'model' => ymoClientsFiles::className(),
                    'request' => 'file',
                    'action' => 'viewFile',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @inheritdoc
     */
    public function actionIntroduction()
    {
        /*Return default view from form, and send model ymoClients to view*/
        return $this->render('module',[
            'page' => $this->renderPartial('introduction'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionAbout()
    {
        /*Return default view from form, and send model ymoClients to view*/
        return $this->render('module',[
            'page' => $this->renderPartial('about'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionDocs($page='readme.md')
    {
        $this->layout = '//main-docs';
        return $this->render('docs/guide.php',[
            'page' => $page
        ]);
    }

    /**
     * @Forms
     */

    /**
     * @inheritdoc
     */
    public function actionFormIndex()
    {
        /*Return default view from form, and send model ymoClients to view*/
        return $this->render('module',[
            'page' => $this->renderPartial('forms/form-index'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionFormModel()
    {
        /*Model ymoClients*/
        $model = new ymoClients;
        $model->scenario = 'registerClient';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->registerClient()){
                /*Return default view from form, and send model ymoClients to view*/
                echo $this->render('@common/errors/popup',[
                    'header' => Yii::t('app','Well done!'),
                    'body' => 'Record successfully saved',
                    'button' => Html::a(Yii::t('app','ok'),'',['class' => 'btn btn-blue center-block'])
                ]);
            }
        }

        /*Return default view from form, and send model ymoClients to view*/
        return $this->render('module',[
            'page' => $this->renderPartial('forms/form-model',[
                'model' => $model
            ]),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionFormAjaxModel()
    {

        /*Model ymoClients*/
        $model = new ymoClients;
        $model->scenario = 'registerClient';

        /*Check is Ajax Request*/
        if(Yii::$app->request->isAjax){

            /*Check is Post Request*/
            if ($model->load(Yii::$app->request->post())) {

                /*Return save method in model ymoClients, this method default is save()*/
                if($model->registerClient())
                {
                    /*Return message success from register client*/
                    echo $this->render('@common/errors/popup',[
                        'header' => Yii::t('app','Well done!'),
                        'body' => 'Record successfully saved',
                        'footer' => Yii::t('app','ok'),
                    ]);

                }else{

                    /*Return form to validate form with ajax*/
                    $form = new ActiveForm();

                    /*Return message error from register client*/
                    echo $this->render('@common/errors/popup',[
                        'header' => Yii::t('app','Validation errors!'),
                        'body' => $form->errorSummary($model),
                        /*'custom' => '
                            <div class="popup-header">
                                <h4 class="modal-title" id="errorPopupLabel">custom header</h4>
                            </div>
                            <div class="modal-body popup-body">
                                <div class="row">
                                    <div class="col-md-8 popup-text col-md-offset-2">
                                        custom body
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer popup-footer">
                                <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                                    <button type="button" class="col-md-12 col-sm-12 col-xs-12 btn btn-primary center-block" data-dismiss="modal" aria-hidden="true">ok</button>
                                </div>
                            </div>
                        '*/
                    ]);
                }
            }
        }else{

            /*Return default view from form, and send model ymoClients to view*/
            return $this->render('module',[
                'page' => $this->renderPartial('forms/form-ajax-model',[
                    'model' => $model
                ]),
            ]);
        }
    }

    /**
     * @Uploads
     */

    /**
     * @inheritdoc
     */
    public function actionFormUploadModel()
    {
        $model = new ymoClientsFiles;
        $model->scenario = 'singleUpload';

        if (Yii::$app->request->isPost) {
            $model->file  = Upload::singleUpload($model, 'file', [
                /*Options for manipulate image, file, etc*/
                /*'thumbnail' => [
                    'width' => '150',
                    'height' => '150',
                    'quality' => '90',
                ],
                'crop' => [
                    'width' => '150',
                    'height' => '150',
                    'x' => '0',
                    'y' => '0',
                    'quality' => '90',
                ]*/
            ]);

            if ($model->validate()) {
                /*Call saveSingleUpload to default path /home/web/upload/*/
                // $model->file->saveSingleUpload($model->file,[
                /*'fileName' => 'customName',
                'basePath' => '@webroot/upload2/',*/
                // ]);

                echo $this->render('@common/errors/response',[
                    'header' => Yii::t('app','Well done!'),
                    'body' => $this->uploadResponse($model->file),
                    'footer' => Yii::t('app','ok'),
                ]);
            }
        }

        return $this->render('module',[
            'page' => $this->renderPartial('forms/form-upload-model',[
                'model' => $model
            ]),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionFormUploadWithoutModel()
    {
        $model = new Dev;
        $model->scenario = 'singleUpload';

        if (Yii::$app->request->isPost) {

            if(@$_FILES['file']['size'] > 0)
            {
                $_FILES = $this->getFileArray($model->formName(),$_FILES);
            }

            $model->file  = Upload::singleUpload($model, 'file');

            if ($model->validate()) {

                echo $this->render('@common/errors/response',[
                    'header' => Yii::t('app','Well done!'),
                    'body' => $this->uploadResponse($model->file),
                    'footer' => Yii::t('app','ok'),
                ]);

            }else {

                /*Return form to validate form with modal*/
                $form = new ActiveForm();

                echo $this->render('@common/errors/popup',[
                    'header' => Yii::t('app','Validation errors!'),
                    'body' => $form->errorSummary($model),
                ]);
            }
        }

        return $this->render('module',[
            'page' => $this->renderPartial('forms/form-upload-without-model',[
                'model' => $model
            ]),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionFormUploadMultipleModel()
    {
        $model = new Dev;
        $model->scenario = 'multipleUpload';

        if (Yii::$app->request->isPost) {

            //$files  = UploadedFile::getInstances($model, 'fileMultiple');

            $files  = Upload::multipleUpload($model, 'fileMultiple', [
                /*Options for manipulate image, file, etc*/
                /*'thumbnail' => [
                    'width' => '150',
                    'height' => '150',
                    'quality' => '90',
                ],
                'crop' => [
                    'width' => '150',
                    'height' => '150',
                    'x' => '0',
                    'y' => '0',
                    'quality' => '90',
                ]*/
            ]);

            $filesUploaded = false;

            foreach ($files as $file) {

                $_model = new Dev;
                $_model->scenario = 'multipleUpload';

                $_model->fileMultiple = $file;

                if ($_model->validate()) {
                    /*Call saveSingleUpload to default path /home/web/upload/*/
                    // $model->file->saveSingleUpload($model->fileMultiple,[
                    /*'fileName' => 'customName',
                    'basePath' => '@webroot/upload2/',*/
                    // ]);

                    $filesUploaded .= $this->uploadResponse($_model->fileMultiple);

                } else {
                    foreach ($_model->getErrors('fileMultiple') as $error) {
                        $model->addError('fileMultiple', $error);
                    }
                }
            }

            if ($model->hasErrors('fileMultiple')){

                $model->addError(
                    'fileMultiple',
                    count($model->getErrors('fileMultiple')) . ' of ' . count($files) . ' files not uploaded'
                );

            }else{

                echo $this->render('@common/errors/response',[
                    'header' => Yii::t('app','Well done!'),
                    'body' => $filesUploaded,
                    'footer' => Yii::t('app','ok'),
                ]);
            }
        }

        return $this->render('module',[
            'page' => $this->renderPartial('forms/form-upload-multiple-model',[
                'model' => $model
            ]),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionFormAjaxUploadModel()
    {
        $model = new Dev;
        $model->scenario = 'singleUpload';

        if(Yii::$app->request->isAjax){

            /*Check is Post Request*/
            if (Yii::$app->request->isPost) {

                if(@$_FILES['file']['size'] > 0)
                {
                    $_FILES = $this->getFileArray($model->formName(),$_FILES);
                }

                $model->file  = UploadedFile::getInstance($model, 'file');

                /*Return save method in model ymoClients, this method default is save()*/
                if($model->validate())
                {

                    echo $this->render('@common/errors/response',[
                        'header' => Yii::t('app','Well done!'),
                        'body' => $this->uploadResponse($model->file),
                        'footer' => Yii::t('app','ok'),
                    ]);

            }else {

                /*Return form to validate form with ajax*/
                $form = new ActiveForm();

                /*Return message success from register client*/
                echo $this->render('@common/errors/popup',[
                    'header' => Yii::t('app','Validation errors!'),
                    'body' => $form->errorSummary($model),
                    /*'custom' => '
                        <div class="popup-header">
                            <h4 class="modal-title" id="errorPopupLabel">custom header</h4>
                        </div>
                        <div class="modal-body popup-body">
                            <div class="row">
                                <div class="col-md-8 popup-text col-md-offset-2">
                                    custom body
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer popup-footer">
                            <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                                <button type="button" class="col-md-12 col-sm-12 col-xs-12 btn btn-primary center-block" data-dismiss="modal" aria-hidden="true">ok</button>
                            </div>
                        </div>
                    '*/
                ]);
            }
        }
        }else{

            return $this->render('module',[
                'page' => $this->renderPartial('forms/form-ajax-upload-model',[
                    'model' => $model
                ]),
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function actionFormUploadMultipleWithoutModel()
    {
        $model = new Dev;
        $model->scenario = 'multipleUpload';

        if (Yii::$app->request->isPost) {

            if($_FILES){

                foreach($_FILES as $fileKey => $fileValue){
                    if(@$fileValue['size'][0] != 0)
                    {
                        $_FILES = $this->getFileArray($model->formName(),$_FILES);
                    }else{
                        if (!$model->validate()){

                            /*Return form to validate form with ajax*/
                            $form = new ActiveForm();

                            /*Return message success from register client*/
                            echo $this->render('@common/errors/popup',[
                                'header' => Yii::t('app','Validation errors!'),
                                'body' => $form->errorSummary($model),
                            ]);
                        }
                    }
                }

                $files  = Upload::multipleUpload($model, 'fileMultiple', [
                    /*Options for manipulate image, file, etc*/
                    /*'thumbnail' => [
                        'width' => '150',
                        'height' => '150',
                        'quality' => '90',
                    ],
                    'crop' => [
                        'width' => '150',
                        'height' => '150',
                        'x' => '0',
                        'y' => '0',
                        'quality' => '90',
                    ]*/
                ]);

                $filesUploaded = false;

                foreach ($files as $file) {

                    $_model = new Dev;
                    $_model->scenario = 'multipleUpload';

                    $_model->fileMultiple = $file;

                    if ($_model->validate()) {

                        /*Call saveSingleUpload to default path /home/web/upload/*/
                        // $model->file->saveSingleUpload($model->fileMultiple,[
                        /*'fileName' => 'customName',
                        'basePath' => '@webroot/upload2/',*/
                        // ]);

                        $filesUploaded .= $this->uploadResponse($_model->fileMultiple);

                    } else {

                        /*Return form to validate form with ajax*/
                        $form = new ActiveForm();

                        /*Return message success from register client*/
                        echo $this->render('@common/errors/popup',[
                            'header' => Yii::t('app','Validation errors!'),
                            'body' => $form->errorSummary($_model),
                        ]);
                    }
                }

                if (!$model->hasErrors('fileMultiple')){

                    echo $this->render('@common/errors/response',[
                        'header' => Yii::t('app','Well done!'),
                        'body' => $filesUploaded,
                        'footer' => Yii::t('app','ok'),
                    ]);
                }
            }
        }

        return $this->render('module',[
            'page' => $this->renderPartial('forms/form-upload-multiple-without-model',[
                'model' => $model
            ]),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionFormAjaxUploadMultipleModel()
    {
        $model = new Dev;
        $model->scenario = 'multipleUpload';

        if(Yii::$app->request->isAjax){

            /*Check is Post Request*/
            if (Yii::$app->request->isPost) {

                if($_FILES){
                    /*foreach($_FILES as $fileKey => $fileValue){
                        if(@$fileValue['size'] > 0)
                        {
                            $_FILES = $this->getFileArray($model->formName(),$_FILES);
                        }
                    }*/

                    $files  = Upload::multipleUpload($model, 'fileMultiple', [
                        /*Options for manipulate image, file, etc*/
                        /*'thumbnail' => [
                            'width' => '150',
                            'height' => '150',
                            'quality' => '90',
                        ],
                        'crop' => [
                            'width' => '150',
                            'height' => '150',
                            'x' => '0',
                            'y' => '0',
                            'quality' => '90',
                        ]*/
                    ]);

                    $filesUploaded = false;

                    foreach ($files as $file) {

                        $_model = new Dev;
                        $_model->scenario = 'multipleUpload';

                        $_model->fileMultiple = $file;

                        if ($_model->validate()) {

                            /*Call saveSingleUpload to default path /home/web/upload/*/
                            // $model->file->saveSingleUpload($model->fileMultiple,[
                            /*'fileName' => 'customName',
                            'basePath' => '@webroot/upload2/',*/
                            // ]);

                            $filesUploaded .= $this->uploadResponse($_model->fileMultiple);

                        } else {

                            /*Return form to validate form with ajax*/
                            $form = new ActiveForm();

                            /*Return message success from register client*/
                            echo $this->render('@common/errors/popup',[
                                'header' => Yii::t('app','Validation errors!'),
                                'body' => $form->errorSummary($_model),
                            ]);
                        }
                    }

                    if (!$model->hasErrors('fileMultiple')){

                        echo $this->render('@common/errors/response',[
                            'header' => Yii::t('app','Well done!'),
                            'body' => $filesUploaded,
                            'footer' => Yii::t('app','ok'),
                        ]);
                    }

                }else{

                    if (!$model->validate()){

                        /*Return form to validate form with ajax*/
                        $form = new ActiveForm();

                        /*Return message success from register client*/
                        echo $this->render('@common/errors/popup',[
                            'header' => Yii::t('app','Validation errors!'),
                            'body' => $form->errorSummary($model),
                        ]);
                    }
                }
            }
        }else{

            return $this->render('module',[
                'page' => $this->renderPartial('forms/form-ajax-upload-multiple-model',[
                    'model' => $model
                ]),
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function actionFormActive()
    {

        $model = new Dev;
        $model->scenario = 'activeFormOne';

        $response = false;

        if(Yii::$app->request->isAjax){
            if ($model->load(Yii::$app->request->post())) {
                // valid data received in $model
                if($model->validate()){

                    $response = Yii::$app->request->post();

                    echo $this->render('@common/errors/response',[
                        'header' => Yii::t('app','Well done!'),
                        'body' => print_r($response,true),
                        'footer' => Yii::t('app','ok'),
                    ]);
                }
            }

        } else {

            return $this->render('module',[
                'page' => $this->renderPartial('forms/form-activeform',[
                    'model' => $model,
                    'response' => $response
                ]),
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function actionFormSteps()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('forms/form-steps'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionFormWizardJquery()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('forms/wizard/form'),
        ]);
    }
    
    public function checkStep($step,$params=false)
    {
    	$stepRequest = Yii::$app->request->post('step');
    	$stepScenario = Yii::$app->request->post('scenario');
    
    	$stepStatus = [
    		'status' => 404,
    	];
    
    	if($stepRequest==$step)
    	{
    		$stepStatus = [
    			'status' => 200,
    			'scenario' => $stepScenario,
    		];
    	}
    
    	return $stepStatus;
    }

    /**
     * @inheritdoc
     */
    public function actionFormWizard()
    {
        $model = new Dev;

        $result = [];

        $ymoClientFiles = [];

        $data = false;
        
        $step = Yii::$app->request->post('step');
        $stepForm = ($step) ? $step : 'form';

        if(Yii::$app->request->isAjax){

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if(@$_FILES)
            {
                $model->scenario = 'formStep3';
                $files = Upload::multipleUpload($model, 'fileStep', [
                	
                ]);

                if (isset($files) && count($files) > 0) {
                    foreach ($files as $key=>$file) {

                        $protect = new Password;

                        $ymoClientFiles = [
                            'encrypt'=>true,
                            'clients_id'=>Yii::$app->user->id,
                            'name'=>$file->name,
                            'size'=>$file->size,
                            'mimetype'=>$file->type,
                            'extension'=>$file->extension,
                            //'filecontent'=>base64_encode($protect->encryptByKey(file_get_contents($file->tempName),Yii::$app->user->identity->getAuthKey())),
                            'filecontent'=>base64_encode(file_get_contents($file->tempName)),
                        ];

                        $_SESSION['steps'][$step][$model->formName()]['fileStep'][uniqid(time())]=$ymoClientFiles;
                    }
                }
            }

            if($step!='save' && $step!='finish')
            {
                $_SESSION['steps'][$step] = @$_POST;
            }

            if($step=='formStep1'){

                $model->scenario = 'formStep2';
                $stepValidate = 200;

            }else if ($step=='formStep2'){

                $model->scenario = 'formStep3';
                $stepValidate = 200;

            }else if ($step=='finish'){

                $model->scenario = 'formStep3';
                $stepValidate = 200;

            }else if ($step=='save'){

                $stepValidate = 200;

            }

            if($step=='formStep1' && $stepValidate==200){
                return [
                    'status' => $stepValidate,
                    'redirect' => '/dev/form-wizard?step=formStep2',
                ];
            }else if($step=='formStep2' && $stepValidate==200){
                return [
                    'status' => $stepValidate,
                    'redirect' => '/dev/form-wizard?step=formStep3',
                ];
            }else if($step=='step3' || $step=='finish' && $stepValidate==200){
                return [
                    'status' => $stepValidate,
                    'redirect' => '/dev/form-wizard?step=finish',
                ];
            }else if($step=='save' && $stepValidate==200){

                $model->email = 'email@teste.com';
                $model->save(false);

                return [
                    'status' => 'save',
                    'redirect' => '/dev/form-wizard',
                ];
            }else{
                $stepForm = 'form';
            }
        }

        return $this->render('module',[
            'page' => $this->renderPartial('forms/steps/'.$stepForm,[
                'model' => $model,
            ]),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableText()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-text'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableInsertRecord()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-insert-record'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableTextarea()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-textarea'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableDropdownlist()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-dropdownlist'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableChecklist()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-checklist'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableSelect2()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-select2'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableTypeheadjs()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-typeheadjs'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableDate()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-date'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableDatetime()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-datetime'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableCombodate()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-combodate'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableWysihtml5()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-wysihtml5'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableUpload()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-upload'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEditableForm()
    {
        /*Model Dev*/
        $model = Dev::findOne(1);
        $model->scenario = 'editableForm';

        $function = new \ReflectionClass($model);

        /*Check is Ajax Request*/
        if(Yii::$app->request->isAjax){

            /*Check is Post Request*/
            if ($model->load(Yii::$app->request->post())) {

                /*Return save method in model ymoClients, this method default is save()*/
                if($model->update())
                {
                    /*Return message success from register client*/
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

                    return [
                        'name' => 'success',
                        'message' => 'Successfull.',
                        'response' => Yii::$app->request->post($function->getShortName()),
                        'content' => $this->render('@common/errors/popup',[
                            'header' => Yii::t('app','Well done!'),
                            'body' => 'Record successfully saved',
                            'footer' => Yii::t('app','ok'),
                        ]),
                        'status' => 200,
                    ];

                }else{

                    /*Return form to validate form with ajax*/
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

                    return [
                        'name' => 'validationError',
                        'message' => 'Validation fix errors.',
                        'errors' => $model->getErrors(),
                        'content' => $this->render('@common/errors/popup',[
                            'header' => Yii::t('app','Validation errors!'),
                            'body' => Html::errorSummary($model,['class'=>'error-summary']),
                        ]),
                        'status' => 400,
                    ];
                }
            }
        }else{

            return $this->render('module',[
                'page' => $this->renderPartial('editable/editable-form'),
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function actionEditableAuth()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('editable/editable-auth'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionGrid()
    {
        $model = new ymoCountries;

        return $this->render('module',[
            'page' => $this->renderPartial('grids/grid',[
                'model' => $model
            ]),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionGridDataprovider()
    {
        $model = new ymoCountries;

        return $this->render('module',[
            'page' => $this->renderPartial('grids/grid-dataprovider',[
                'model' => $model
            ]),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionButtonWithAjax()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('ajax/button-with-ajax'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionPopups()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('popups/popups'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionExt()
    {
        return $this->render('module',[
            'page' => $this->renderPartial('ext/index'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getFileArray($formName,$fileArray)
    {

        foreach($fileArray as $inputName => $file)
        {
            foreach($file as $key => $value)
            {
                $files[$formName][$key] = [
                    $inputName => $value
                ];

                /*$_FILES[$inputName] = [
                    'name' => null,
                    'type' => null,
                    'tmp_name' => null,
                    'error' => $file['error'],
                    'size' => 0
                ];*/
            }
        }

        return ArrayHelper::merge($files,$_FILES);
    }

    /**
     * @inheritdoc
     */
    public function uploadResponse($file)
    {
        $upload = [
            'image' => '<img src="'.$this->base64_encode_image($file->tempName,$file->type).'" width="80">',
            'name' => $file->name,
            'tempName' => $file->tempName,
            'type' => $file->type,
            'size' => $file->size,
            'error' => $file->error,
        ];

        return '<pre>'.print_r($upload,true).'</pre>';
    }

    /**
     * @inheritdoc
     */
    public function base64_encode_image ($filename=string,$filetype=string) {
        if ($filename) {
            $imgbinary = fread(fopen($filename, "r"), filesize($filename));
            return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
        }
    }

    /**
     * @inheritdoc
     */
    public function actionAjax()
    {
        if(Yii::$app->request->isAjax){
            echo Json::encode([
                'response' => 'Ajax send using extension AjaxButton',
                'data' => $_POST
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function actionAjaxNonJson()
    {
        if(Yii::$app->request->isAjax){
            echo '<pre>';
            print_r([
                'response' => 'Ajax send using extension AjaxButton',
                'data' => $_POST
            ]);
            echo '</pre>';
        }
    }

    public function actionPostForm()
    {
        sleep(1);

        $pk = $_POST['pk'];
        $name = $_POST['name'];
        $value = $_POST['value'];

        /*
         Check submitted value
        */
        if(!empty($value)) {
            /*
              If value is correct you process it (for example, save to db).
              In case of success your script should not return anything, standard HTTP response '200 OK' is enough.

              for example:
              $result = mysql_query('update users set '.mysql_escape_string($name).'="'.mysql_escape_string($value).'" where user_id = "'.mysql_escape_string($pk).'"');
            */

            //here, for debug reason we just return dump of $_POST, you will see result in browser console
            print_r($_POST);

        } else {
            /*
            In case of incorrect value or error you should return HTTP status != 200.
            Response body will be shown as error message in editable form.
            */

            header('HTTP 400 Bad Request', true, 400);
            echo "This field is required!";
        }
    }

    /**
     * @inheritdoc
     */
    /*public function actionDisplayDocument($id,$mode='safe')
    {
    	
        $model= ymoClientsFiles::find()->where([
            'id' => $id,
            'clients_id' => Yii::$app->user->id,
        ])->one();

        if($model==false)
        {
            $session = ArrayHelper::getValue($_SESSION['steps']['finish']['Dev'],'fileStep');
            $model = (object)$session[$id];
        }

        if($mode=='safe'){
            $file = base64_decode($model->filecontent);
        }else{
            $protect = new \ymobiz\helpers\Password();
            $file = $protect->decrypt(base64_decode($model->filecontent),Yii::$app->user->identity->getAuthKey());
        }
        
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
        header('Content-length: '.$model->size);
        header('Content-Type: '.$model->mimetype);
        header('Content-Disposition: inline; filename='.$model->name);

        echo $file;

    }*/
    
    public function actionDisplayImage($id,$mode='safe')
    {

    	/*header('Content-Type: image/jpeg');
    	 
    	//get image from internet and save it into local disk
    	$url = 'http://ymocard.dev/home/web/themes/basic/img/logo.png';
    	$img = 'logo.png';
    	file_put_contents($img, file_get_contents($url));
    	 
    	 
    	//get  current size and set new size
    	list($width, $height) = getimagesize($img);
    	$new_width = 130;
    	$new_height = 130;
    	 
    	// genarate resized image copy
    	$image_p = imagecreatetruecolor($new_width, $new_height);
    	$image = imagecreatefrompng($img);
    	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    	 
    	// flush image to browser
    	imagejpeg($image_p, null, 100);
    	// save resised image to disk
    	//imagejpeg($image_p, "newimage.jpg",100);

    	$image = new Image;
    	echo $image->thumbnail($img, '50', '50');*/
    	
    	header('Content-Type: image/jpeg');
    	
    	$model= ymoClientsFiles::find()->where([
    			'id' => $id,
    			'clients_id' => Yii::$app->user->id,
    			])->one();
    	
    	if($model==false)
    	{
    		$session = ArrayHelper::getValue($_SESSION['steps']['finish']['Dev'],'fileStep');
    		$model = (object)$session[$id];
    	}
    	
    	if($mode=='safe'){
    		$file = base64_decode($model->filecontent);
    	}else{
    		$protect = new \ymobiz\helpers\Password();
    		$file = $protect->decrypt(base64_decode($model->filecontent),Yii::$app->user->identity->getAuthKey());
    	}
    	
    	/*$url = 'http://ymocard.dev/dev/display-document?id=140708071053de59064c6a2';
    	$img = $model->name;
    	file_put_contents($img, file_get_contents($url));*/
    	
    	$remote_file = 'http://ymocard.dev/dev/display-document?id=140708071053de59064c6a&';
    	$new_width = 100;
    	$new_height = 100;
    	
    	$image = new Image;
    	echo $image->thumbnail($remote_file, '50', '50');
    	
    	//echo Html::img('http://ymocard.dev/dev/display-document?id=140708071053de59064c6a2');
    	
    	//$image = new Image;
    	//echo $image->thumbnail('http://ymocard.dev/home/web/themes/basic/img/logo.png', '50', '50');
    }
    
    public function actionDeleteFile()
    {
    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	
    	return [
    		'name' => 'success',
    		'message' => 'Successfull.',
    		'fileId' => $_POST['fileId'],	
    		/*'response' => Yii::$app->request->post($function->getShortName()),
    		content' => $this->render('@common/errors/popup',[
    			'header' => Yii::t('app','Well done!'),
    			'body' => 'Record successfully saved',
    			'footer' => Yii::t('app','ok'),
    		]),*/
    		'status' => 200,
    	];
    }
    
    public function actionIsloading()
    {
    	return $this->render('module',[
    		'page' => $this->renderPartial('tools/isloading'),
    	]);
    }
    
    public function formWizard()
    {
    	$step = Yii::$app->request->get('step');
    	
    	switch ($step)
    	{
    		case 'step1':
    			$step = 'step2';
    			break;
    		case 'step2':
    			$step = 'finish';
    			break;	
    		case 'save':
    			$step = 'save';
    			break;		
    	}
    	
    	return (object)[
    		'step' => ($step) ? $step : 'step1',
    		'params' => (object)Yii::$app->request->post('params')
    	];
    }
    
    public function actionStepForm()
    {
    	return $this->render('module',[
    		'page' => $this->renderPartial('forms/new-wizard/' . $this->formWizard()->step),
    	]);
    }
    
    public function actionAuth()
    {
    	return $this->render('module',[
    		'page' => $this->renderPartial('auth/user'),
    	]);
    }
    
}

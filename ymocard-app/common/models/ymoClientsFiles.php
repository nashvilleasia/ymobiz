<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\web\UploadedFile;
use common\models\common\ymoSystem;
use ymobiz\auth\ymoUser;
use ymobiz\models\common\ymoClusters;
use ymobiz\helpers\Password;
use common\models\forms\ymoMemberForm;

/**
 * This is the model class for table "ymo_clients_files".
 *
 * @property integer $id
 * @property integer $clients_id
 * @property integer $system_id
 * @property string $name
 * @property string $path
 * @property string $size
 * @property resource $filecontent
 * @property string $mimetype
 * @property string $extension
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property System $system
 * @property Clients $clients
 */
class ymoClientsFiles extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;
    public $fileMultiple;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_clients_files';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clients_id', 'system_id', 'created_at', 'updated_at','status'], 'integer'],
            [['path', 'name', 'mimetype', 'extension'], 'string'],
        		
        	[['size', 'filecontent'],'safe'],	

            /*Upload rules*/
            [['file'], 'required','on' => ['singleUpload']],
            [['file'], 'string','on' => ['singleUpload'], 'skipOnEmpty' => true],
            [['file'], 'file', 'mimeTypes' => 'image/jpeg, image/jpg, image/png, application/pdf','maxFiles' => 10,'on' => ['singleUpload'], 'skipOnEmpty' => true],

            [['fileMultiple'], 'image','on' => ['multipleUpload']],
            [['fileMultiple'], 'required','on' => ['multipleUpload']],
            [['fileMultiple'], 'image', 'mimeTypes' => 'image/jpeg, image/jpg', 'on' => ['multipleUpload']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'file' => '',
            'clients_id' => Yii::t('app', 'Clients ID'),
            'system_id' => Yii::t('app', 'System ID'),
            'name' => Yii::t('app', 'Name'),
            'path' => Yii::t('app', 'Path'),
            'mimetype' => Yii::t('app', 'Mimetype'),
            'extension' => Yii::t('app', 'Extension'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystem()
    {
        return $this->hasOne(ymoSystem::className(), ['id' => 'system_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasOne(ymoClients::className(), ['id' => 'clients_id']);
    }

    /**
     * @inheritdoc
     */
    public function uploadValidate()
    {
        if($_FILES['file']['size'] > 0 || $_FILES['fileMultiple']['size'] > 0 )
        {
            return true;
        }else{
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['default'] = ['clients_id','system_id','status', 'size', 'filecontent', 'name', 'mimetype', 'extension'];
        $scenarios['singleUpload'] = ['file'];
        $scenarios['multipleUpload'] = ['fileMultiple'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function getFile($options=false)
    {
        return Html::img($this->path.$this->name,[
            'width' => '220'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function updateFile($data=false)
    {
        if ($this->validate()) {

            $this->path = $data['fileUrl'];

            $this->name = $data['file']->baseName . '.' . $data['file']->extension;
            $this->mimetype = $data['file']->type;
            $this->extension = $data['file']->extension;

            if ($this->save()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function saveFile($id=false)
    {
        $user = ymoUser::find()->where(['id'=>($id) ? $id : Yii::$app->user->id])->one();
        $client = ymoClients::find()->where(['user_id'=>($id) ? $id : Yii::$app->user->id])->one();
    	$formFiles = @$_SESSION['upload_files'];
        	 
	    $protect = new Password;
	    
	    if ($this->validate()) {
	    	
	    	if(@$formFiles!=false){
	    		
	    		sleep(2);
	    		
	        	foreach ($formFiles as $key => $value){
		        	if($value['size']!=0)
		        	{	
		        		
		        		$model = new self;
			        
			        	$model->clients_id = @($id) ? $id : $client->user_id;
			        	$model->system_id = ymoClusters::find()->where(['code'=>Yii::$app->id,'status'=>1])->one()->id;
			        	$model->name = $value['name'];
			        	$model->size = $value['size'];
			        	$model->filecontent = base64_encode($protect->encryptByKey(base64_decode($value['filecontent']),($id) ? ymoUser::findOne($id)->auth_key : Yii::$app->user->identity->auth_key));
			        	$model->mimetype = $value['mimetype'];
			        	$model->extension = $value['extension'];
		    			$model->status_code = 'send';
			        	$model->status = 1;
			        	
		        		$model->save(false);
		        	}
	        		 
	        	}
	        	
	        	unset($_SESSION['upload_files']);
	        	
	        	return true;
	    	}
        		 
        }
        
        return false;
    }

    public function getListUploadDocs($data=false,$id=false,$url=false)
    {

        $fileList = '<span class="documents-list">';
        $fileList .= $this->getListFiles($data,$id,$url);
        $fileList .= '</span>';
        
        return $fileList;
    }

    public function getListFiles($data=false,$id=false,$url=false)
    {
        $files = self::find()
	        ->where(['clients_id'=> ($id) ? $id : ymoMemberForm::findMemberId()])
	        ->orderBy('created_at desc,updated_at desc')
	        ->limit(@$data['limit'])
	        ->all();
		
        $fileList = false;
        
        foreach($files as $file)
        {
        	
            $fileList .= '  <li>
                                <strong>'.date('d.m.Y',$file->created_at).'</strong>
                                <a href="'.\yii\helpers\Url::to([($url) ? $url : '/'.Yii::$app->controller->module->id . '/default/view-file','id' => $file->id,'memberid' => ($id) ? $id : '0', 'mode' => 'encode']).'" target="_blank">'.$file->name.'</a>
                            </li>';
        }
        
        return $fileList;
        
        exit;
    }
}

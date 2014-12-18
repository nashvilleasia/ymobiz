<?php

namespace common\models;

use Yii;
use ymobiz\components\ymoLangManager;

/**
 * This is the model class for table "ymo_contactus".
 *
 * @property integer $id
 * @property integer $cluster_id
 * @property string $fname
 * @property string $lname
 * @property string $email
 * @property string $name
 * @property string $description
 * @property integer $lang_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class ymoContactUs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_contactus';
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
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('commondb');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fname', 'lname', 'email', 'name', 'description'], 'required'],
            [['fname','lname','description','email', 'name','lang_id', 'company'], 'string'],
            [['description'], 'string', 'length' => [15,140]],
            [['cluster_id'], 'integer'],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
    	return [
    		'fname' => Yii::t('app', 'first name*'),
    		'lname' => Yii::t('app', 'last name*'),
    		'email' => Yii::t('app', 'your email*'),
    		'company' => Yii::t('app', 'company'),
    		'name' => Yii::t('app', 'subject*'),
    		'description' => Yii::t('app', 'message* max 140 characters'),
    	];
    }

    /**
     * @inheritdoc
     */
    public function contact()
    {	
    	$this->attributes = $this->load(Yii::$app->request->post());
    
        if ($this->validate()) {
        	$this->lang_id = Yii::$app->language;
        	$this->cluster_id = 5;
        	$this->save();
        	return true;
        }

        return false;
    }
}

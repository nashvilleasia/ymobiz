<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "ymo_clients".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $fname
 * @property string $lname
 * @property string $email
 * @property string $gender
 * @property string $dob
 * @property string $terms
 * @property string $newsletter
 * @property integer $created_at
 * @property integer $updated_at
 */
class ymoBizClients extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_clients';
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
            [['company_id', 'created_at', 'updated_at'], 'integer'],
            [['fname', 'lname', 'created_at', 'updated_at'], 'required'],
            [['terms'], 'string'],
            [['fname'], 'string', 'max' => 30],
            [['lname', 'newsletter'], 'string', 'max' => 20],
            [['email', 'gender', 'dob'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'fname' => Yii::t('app', 'Fname'),
            'lname' => Yii::t('app', 'Lname'),
            'email' => Yii::t('app', 'Email'),
            'gender' => Yii::t('app', 'Gender'),
            'dob' => Yii::t('app', 'Dob'),
            'terms' => Yii::t('app', 'Terms'),
            'newsletter' => Yii::t('app', 'Newsletter'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}

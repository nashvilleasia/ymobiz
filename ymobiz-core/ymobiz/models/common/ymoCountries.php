<?php

namespace ymobiz\models\common;

use Yii;

/**
 * This is the model class for table "ymo_countries".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $code1
 * @property integer $address_id
 * @property string $description
 * @property string $image
 * @property integer $status
 * @property integer $currencies_id
 * @property integer $doctype_id
 *
 * @property Currencies $currencies
 */
class ymoCountries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_countries';
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
            [['address_id', 'status', 'currencies_id', 'doctype_id'], 'integer'],
            [['description', 'image', 'currencies_id', 'doctype_id'], 'required'],
            [['description', 'image'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['code'], 'string', 'max' => 2],
            [['code1'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'code' => Yii::t('app', 'Code'),
            'code1' => Yii::t('app', 'Code1'),
            'address_id' => Yii::t('app', 'Address ID'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
            'currencies_id' => Yii::t('app', 'Currencies ID'),
            'doctype_id' => Yii::t('app', 'Doctype ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrencies()
    {
        return $this->hasOne(ymoCurrencies::className(), ['id' => 'currencies_id']);
    }

    /**
     * @inheritdoc
     */
    public function listCountries()
    {
        $query = self::find();

        $countQuery = clone $query;
        $pages = new \yii\data\Pagination([
            'defaultPageSize' => 14,
            'totalCount' => $countQuery->count()
        ]);

        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return (object) [
            'models' => $models,
            'pages' => $pages
        ];
    }

    /**
     * @inheritdoc
     */
    public function searchCountries()
    {
        if(Yii::$app->request->post('search')){
            Yii::$app->controller->redirect(['default/grid', 'search' => Yii::$app->request->post('search')]);
        }

        $query = self::find();
        $match = Yii::$app->request->get('search');

        $query->andWhere(['like', 'id', $match]);
        $query->orWhere(['like', 'name', $match]);
        $query->orWhere(['like', 'code', $match]);

        $countQuery = clone $query;
        $pages = new \yii\data\Pagination([
            'defaultPageSize' => 14,
            'totalCount' => $countQuery->count()
        ]);

        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return (object) [
            'models' => $models,
            'pages' => $pages
        ];
    }

    /**
     * @inheritdoc
     */
    public function listCountriesByDataProvider()
    {
        return new \yii\data\ActiveDataProvider([
            'query' => self::find(),
            'pagination' => [
                'pageSize' => 14,
                'pageSizeParam' => false
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function searchCountriesByDataProvider()
    {
        if(Yii::$app->request->post('search')){
            Yii::$app->controller->redirect(['default/grid-dataprovider', 'search' => Yii::$app->request->post('search')]);
        }

        $query = self::find();
        $match = Yii::$app->request->get('search');

        $query->andWhere(['like', 'id', $match]);
        $query->orWhere(['like', 'name', $match]);
        $query->orWhere(['like', 'code', $match]);

        return new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 14,
                'pageSizeParam' => false
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function listStatus()
    {
        return [
            'active','pendent','blocked'
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function findUserByCountry()
    {
    	$geo = new \jisoft\sypexgeo\Sypexgeo();
		$geo->get();
		if(key_exists('iso', $geo->country)){
			return self::find()
	    		->where(['code' => $geo->country['iso']])
	    		->one()->id;
		}
    }
    
    /**
     * @inheritdoc
     */
    public static function itemsListCountries()
    {
    	$countries = [];
    	foreach (\ymobiz\models\common\ymoCountries::find()->all() as $country){
    		$countries[$country->id] = $country->name;
    	}
    	
    	return $countries;
    }
    
    /**
     * @inheritdoc
     */
    public static function optionsListCountries()
    {
    	$options = [];
    	foreach (\ymobiz\models\common\ymoCountries::find()->all() as $country){
    		$options[$country->id] = [
    			'data' => $country->name,
    		];
    	}
    	
    	return $options;
    }
    
}

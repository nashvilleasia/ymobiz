<?php

namespace ymobiz\modules\mcms\models;

use Yii;
use yii\rbac\Item;
use ymobiz\modules\mcms\rbac\AdminRule;

/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AuthAssignment $authAssignment
 * @property AuthRule $ruleName
 * @property AuthItemChild $authItemChild
 */
class AuthItem extends \yii\base\Model
{
	public $name;
	public $type;
	public $description;
	public $rule_name;
	public $reallyReally;
	public $data;

	/**
	 *
	 * @var Item
	 */
	private $_item;

	private $_children;

	/**
	 *
	 * @param Item $item
	 * @param array $config
	 */
	public function __construct($item, $config = array())
	{
		$this->_item = $item;
		if ($item !== null) {
			$this->name = $item->name;
			$this->rule_name = $item->ruleName;
			$this->description = $item->description;
		}
		parent::__construct($config);
	}

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'ymo_auth_item';
	}

    /**
     * @inheritdoc
     */
    public static function getDb()
    {
        return \Yii::$app->get('authdb');
    }

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name', 'type'], 'required'],
			[['type', 'created_at', 'updated_at'], 'integer'],
			[['description', 'data'], 'string'],
			[['name', 'rule_name'], 'string', 'max' => 64]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'name' => Yii::t('app', 'Name'),
			'type' => Yii::t('app', 'Type'),
			'description' => Yii::t('app', 'Description'),
			'rule_name' => Yii::t('app', 'Rule Name'),
			'data' => Yii::t('app', 'Data'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery

	public function getAuthAssignment()
	{
		return $this->hasOne(AuthAssignment::className(), ['item_name' => 'name']);
	}*/

	/**
	 * @return \yii\db\ActiveQuery

	public function getRuleName()
	{
		return $this->hasOne(AuthRule::className(), ['name' => 'rule_name']);
	}*/

	/**
	 * @return \yii\db\ActiveQuery

	public function getAuthItemChild()
	{
		return $this->hasOne(AuthItemChild::className(), ['child' => 'name']);
	}*/

	public function getIsNewRecord()
	{
		return $this->_item === null;
	}

	public static function find($id=false)
	{
		$item = Yii::$app->authManager->getRole($id);
		if ($item !== null) {
			return new self($item);
		}
		return null;
	}

	/**
	 * @save Custom Save for AutoItem and Rules
	 */
	public function save()
	{
		if ($this->rule_name) {

			$rule = new AdminRule();
			$rule->name = $this->rule_name;
			$rule->reallyReally = $this->reallyReally;
			Yii::$app->authManager->add($rule);

			$updateRule = Yii::$app->authManager->createPermission($this->name);
			$updateRule->type = Item::TYPE_PERMISSION;
			$updateRule->description = $this->description;
			$updateRule->ruleName = $this->rule_name;
			Yii::$app->authManager->add($updateRule);

		} else {

			$rule = Yii::$app->authManager->createPermission($this->name);
			$rule->description = $this->description;
			$rule->data = $this->data;
			Yii::$app->authManager->add($rule);
		}

		return true;
	}

	/**
	 * @save Custom Save for AutoItem and Rules
	 */
	public function update()
	{
		if ($this->rule_name) {

			$rule = new AdminRule();
			$rule->name = $this->rule_name;
			$rule->reallyReally = $this->reallyReally;
			Yii::$app->authManager->update($this->rule_name, $rule);

			$updateRule = Yii::$app->authManager->createPermission($this->name);
			$updateRule->type = Item::TYPE_PERMISSION;
			$updateRule->description = $this->description;
			$updateRule->ruleName = $this->rule_name;
			Yii::$app->authManager->update($this->name, $updateRule);

		} else {

			$rule = Yii::$app->authManager->createPermission($this->name);
			$rule->description = $this->description;
			$rule->data = $this->data;
			Yii::$app->authManager->update($this->name, $rule);
		}

		return true;
	}

	public function __call($name, $params)
	{
		if($this->_item !== null && $this->_item->hasMethod($name)){
			return call_user_func_array([$this->_item,$name], $params);
		}

		parent::__call($name, $params);
	}


	public static function getTypeName($type = null)
	{
		$result = [
			Item::TYPE_PERMISSION => 'Permission',
			Item::TYPE_ROLE => 'Role'
		];
		if ($type === null)
			return $result;
		return $result[$type];
	}

	public function getChildren()
	{
		return Yii::$app->authManager->getPermissionsByRole($this->name);
	}

	private function prepareChildren(){
		$this->_children = ['roles'=>[],'routes'=>[]];
		foreach ($this->_item->getChildren() as $item) {
			if($item->type == Item::TYPE_PERMISSION){
				$this->_children['roles'][]=$item;
			}else{
				$this->_children['routes'][]=$item;
			}
		}
	}

	public function getRoles(){
		if($this->_children === null){
			$this->prepareChildren();
		}
		return $this->_children['roles'];
	}

	public function getRoutes(){
		if($this->_children === null){
			$this->prepareChildren();
		}
		return $this->_children['routes'];
	}
} 
<?php

namespace ymobiz\modules\mcms\models;

use Yii;
use ymobiz\modules\mcms\rbac\Item;
use yii\helpers\Json;

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
class Role extends \yii\base\Model
{
	public $name;
	public $type;
	public $description;
	public $rule_name;
	public $redirect;
	public $data;
	public $created_at;
	public $updated_at;

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
			$this->redirect = $item->redirect;
			$this->description = $item->description;
			$this->data = $item->data;
			$this->created_at = $item->created_at;
			$this->updated_at = $item->updated_at;
		}
		
		$this->redirect = $this->redirect;

		parent::__construct($config);
	}

	public static function Auth()
	{
		return \Yii::$app->authManager;
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
			[['name'], 'required'],
			[['type', 'created_at', 'updated_at'], 'integer'],
			[['description', 'data' ,'redirect'], 'string'],
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
			//'reallyReally' => Yii::t('app', 'Really Really'),
			'data' => Yii::t('app', 'Data'),
			'redirect' => Yii::t('app', 'Url redirect'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
		];
	}

	public function getIsNewRecord()
	{
		return $this->_item === null;
	}

	public static function find($id)
	{
		$item = ymoAuthItem::find()->where(['name'=>$id])->one();
		
		//$item = self::auth()->getRole($id);
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
		
		if ($this->name) {

			$updateRole = self::auth()->createPermission($this->name);
			$updateRole->type = Item::TYPE_ROLE;
			$updateRole->name = $this->name;
	        $updateRole->description = $this->description;
	        if($this->data){
	        	$updateRole->data = Json::decode($this->data);
	        }
			self::auth()->add($updateRole);
			
			$role = ymoAuthItem::find()->where(['name'=>$this->name])->one();
			$role->redirect = $this->redirect;
			$role->update();
		}

		return true;
	}

	/**
	 * @save Custom Save for AutoItem and Rules
	 */
	public function update()
	{
		
		if ($this->name) {
			
			$role = ymoAuthItem::find()->where(['name'=>Yii::$app->request->get('id')])->one();
			$role->redirect = $this->redirect;
			$role->update();
			
	        $updateRole = self::auth()->getRole(Yii::$app->request->get('id'));
	        $updateRole->name = $this->name;
	        $updateRole->description = $this->description;
	        if($this->data){
	        	$updateRole->data = Json::decode($this->data);
	        }
	        self::auth()->update(Yii::$app->request->get('id'),$updateRole);
		}

		return true;
	}

	public static function getRole($id)
	{
		return self::auth()->getRule($id);
	}

	public function getRoleType()
	{
		return ($this->type==Item::TYPE_PERMISSION) ? 'Permission' : 'Role';
	}

	public static function getRuleByUser($id)
	{
		$rule = self::auth()->getRolesByUser($id);
		foreach($rule as $rules)
		{
			return self::auth()->getRule($rules->name);
		}
	}

    public static function getPermissionsByUser($id)
    {
        $rule = self::auth()->getPermissionsByUser($id);
        foreach($rule as $rules)
        {
            return self::auth()->getPermission($rules->name);
        }
    }

    public static function getNamePermissionsByUser($id)
    {
        $permissions = '';
        $rule = self::auth()->getPermissionsByUser($id);
        foreach($rule as $rules)
        {
            $permissions .= self::auth()->getPermission($rules->name)->name . '</br>';
        }

        $permissions = rtrim($permissions,',');
        return $permissions;
    }

	public function removeRole($id)
	{
		$role = self::auth()->getRole($id);
		self::auth()->remove($role);
	}

	public function addChild($id)
	{
		$rule =self::auth()->createPermission($id);
		$child = self::auth()->createRole($this->name);
		self::auth()->addChild($child, $rule);
	}

	public function removeChild($id)
	{
		$child = self::auth()->getPermission($id);
		$parent = self::auth()->getRole($this->name);
		self::auth()->removeChild($parent, $child);
	}

	public function getReally()
	{
		$rule = self::auth()->getRule($this->rule_name);
		return $rule->reallyReally;
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
		return self::auth()->getPermissionsByRole($this->name);
	}


} 
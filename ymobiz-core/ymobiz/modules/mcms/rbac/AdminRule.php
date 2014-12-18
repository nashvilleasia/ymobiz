<?php

namespace ymobiz\modules\mcms\rbac;

use yii\rbac\Rule;

/**
 * Checks if authorID matches userID passed via params
 */
class AdminRule extends Rule
{

	const RULE_PARAMS = "adminID";

	public $name = 'isAdmin';
	public $reallyReally = false;

	/**
	 * @inheritdoc
	 */
	public function execute($user, $item, $params)
	{
		return $params['adminID'] == $user;
	}
}
<?php

namespace ymobiz\modules\mcms\rbac;

use yii\rbac\Rule;

/**
 * Checks if authorID matches user passed via params
 */
class UserGroupRule extends Rule
{
	public $name = 'userGroup';

	public function execute($user, $item, $params)
	{
		$group = \Yii::$app->user->identity->group;
		return $group == 1 && $item->name === 'admin' || $group == 2 && $item->name === 'author';
	}
}
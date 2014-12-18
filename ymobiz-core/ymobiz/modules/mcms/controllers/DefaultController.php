<?php

namespace ymobiz\modules\mcms\controllers;

use ymobiz\modules\mcms\components\Controller;
use ymobiz\modules\mcms\rbac\UserGroupRule;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

	/*public function actionDev()
	{
		$auth = \Yii::$app->authManager;

		$rule = new UserGroupRule();
		//$auth->add($rule);

		$admin = $auth->createRole('superadmin');
		$admin->ruleName = $rule->name;
		//$auth->add($admin);
		// ... add permissions as children of $admin ...

		$author = $auth->createRole('author');
		$author->ruleName = $rule->name;
		//$auth->add($author);
		// ... add permissions as children of $author ...


	}*/
}

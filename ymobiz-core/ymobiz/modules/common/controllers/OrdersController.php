<?php

namespace ymobiz\modules\common\controllers;

use ymobiz\modules\mcms\components\Controller;

class OrdersController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}

<?php

use ymobiz\auth\ymoUser;

$user = ymoUser::findOne(Yii::$app->user->id);

echo '<pre>';
print_r($user);
echo '</pre>';

?>
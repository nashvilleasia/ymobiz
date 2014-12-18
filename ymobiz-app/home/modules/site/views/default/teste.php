<?php 

$view = Yii::$app->getView();
$view->registerCss("
	.container{
		position: relative;
	}
			
	.box{
		width: 940px;
		height: 400px;
		outline: 1px solid #f00;
	}	
");

?>

<div class="container">
	<div class="box boxmain"></div>
	<div class="box boxsubmain"></div>
	<div class="box boxsubmain"></div>
</div>
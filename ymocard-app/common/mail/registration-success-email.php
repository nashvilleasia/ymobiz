<div>
	<table>
		<tbody>
			<tr>
				<td>
					<h5 style="font-size: 13px; color: #787878;"><?=Yii::$app->getModule('site')->ymoTranslate->t('site','popups',"
							To activate your account using the url activation, follow the instructions: 
							<br><br>
							
							paste url in to browser<br>
							wait activate your account<br>
							login and access your dashboard<br>
						");
					?></h5>
					<p style="font-size: 13px; heigth: 20px; color: #787878; margin-left: 0px; margin-bottom: 0px; margin-right: 0px; margin-top: 0px; padding-left: 0px; padding-bottom: 0px; padding-right: 0px; padding-top: 0px; display: block;">
						<strong style="font-family: 'Trebuchet MS'; margin-right: 6px;"><?=Yii::$app->getModule('site')->ymoTranslate->t('site','popups','activation url')?>:</strong>
						<a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl(['/site/auth-activate-account','token'=>$model->confirmation_token],ymobiz\components\ymoTools::siteProtocol())?>" target="_blank"><?php echo \Yii::$app->urlManager->createAbsoluteUrl(['/site/auth-activate-account','token'=>$model->confirmation_token],ymobiz\components\ymoTools::siteProtocol())?></a>
					</p>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div>
	<table>
		<tbody>
			<tr>
				<td>
					<h5 style="font-size: 13px; color: #787878;"><?=Yii::$app->getModule('site')->ymoTranslate->t('site','popups',"
							To recover your password using the url recovery, follow the instructions: 
							<br><br>
							recovery code <strong style='color: #000000;'>$model->recovery_token</strong> reset password<br>
							recovery password on top<br>
							reset password<br>
							insert code<br>
							confirm<br><br>
							
							paste url in to browser<br>
							change your password<br>
						");
					?></h5>
					<p style="font-size: 13px; heigth: 20px; color: #787878; margin-left: 0px; margin-bottom: 0px; margin-right: 0px; margin-top: 0px; padding-left: 0px; padding-bottom: 0px; padding-right: 0px; padding-top: 0px; display: block;">
						<strong style="font-family: 'Trebuchet MS'; margin-right: 6px;"><?=Yii::$app->getModule('site')->ymoTranslate->t('site','popups','recovery url')?>:</strong>
						<a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl(['/site/auth-password-recovery','token'=>$model->recovery_token],ymobiz\components\ymoTools::siteProtocol())?>" target="_blank"><?php echo \Yii::$app->urlManager->createAbsoluteUrl(['/site/auth-password-recovery','token'=>$model->recovery_token],ymobiz\components\ymoTools::siteProtocol())?></a>
					</p>
				</td>
			</tr>
		</tbody>
	</table>
</div>
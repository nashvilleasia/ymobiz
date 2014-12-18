<?php

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'ymobiz-transfer','module' => 'business','size'=>'md'],
    ['id'=>'external-transfer','module' => 'business','size'=>'md'],
]);
?>

<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-business ymo-nopadding">

		<div class="col-xs-12 ymo-aside-center ymo-nopadding">
		
			<div class="col-xs-12 ymo-menu-center ymo-nopadding">
				<div class="col-xs-4 ymo-center-left ymo-nopadding">
					<select class="form-control">
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','view all') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Ymobiz') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Ymocash') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Ymocard') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','E-store') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Mobile') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Others') ?></option>
		            </select>
				</div>
				
				<div class="col-xs-7 ymo-center-right ymo-nopadding">
					<?php echo \Yii::$app->view->render('pages/operation-menu') ?>
				</div>
				
			</div>
			
			<div class="col-xs-12 ymo-aside-general ymo-nopadding">
			
		        <div class="col-xs-12 ymo-nopadding ymo-table-general ymo-scroll">
		            <div class="col-xs-12 ymo-table ymo-nopadding">
		
		                <table class="ymo-table-account table table-responsive">
		                    <tbody>
		                        <tr>
		                            <td class="ymo-operation-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Store payment') ?></td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Ymocard') ?></td>
		                            <td class="ymo-operation-movement">
		                                <strong class="ymo-movement-pink">-250 USD</strong>
		                            </td>
		                            <td class="ymo-operation-balance">250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ATM withdrawal') ?></td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Ymocard') ?></td>
		                            <td class="ymo-operation-movement">
		                                <strong class="ymo-movement-pink">-250 USD</strong>
		                            </td>
		                            <td class="ymo-operation-balance">250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Product sale') ?></td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','E-store') ?></td>
		                            <td class="ymo-operation-movement">
		                                <strong class="ymo-movement-blue">+250 USD</strong>
		                            </td>
		                            <td class="ymo-operation-balance">250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Clearing house') ?></td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Ymocash') ?></td>
		                            <td class="ymo-operation-movement">
		                                <strong class="ymo-movement-blue">+250 USD</strong>
		                            </td>
		                            <td class="ymo-operation-balance">250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Ymobiz transfer') ?></td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Ymobiz') ?></td>
		                            <td class="ymo-operation-movement">
		                                <strong class="ymo-movement-pink">-250 USD</strong>
		                            </td>
		                            <td class="ymo-operation-balance">250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','External transfer') ?></td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Others') ?></td>
		                            <td class="ymo-operation-movement">
		                                <strong class="ymo-movement-pink">-250 USD</strong>
		                            </td>
		                            <td class="ymo-operation-balance">250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Store payment') ?></td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Ymocard') ?></td>
		                            <td class="ymo-operation-movement">
		                                <strong class="ymo-movement-pink">-250 USD</strong>
		                            </td>
		                            <td class="ymo-operation-balance">250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Store payment') ?></td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Mobile') ?></td>
		                            <td class="ymo-operation-movement">
		                                <strong class="ymo-movement-blue">+250 USD</strong>
		                            </td>
		                            <td class="ymo-operation-balance">250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Mobile transfer') ?></td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Mobile') ?></td>
		                            <td class="ymo-operation-movement">
		                                <strong class="ymo-movement-blue">+250 USD</strong>
		                            </td>
		                            <td class="ymo-operation-balance">250 USD</td>
		                        </tr>
		                    </tbody>
		                </table>
		
		            </div>
		        </div>
		        
		        <div class="col-xs-12 ymo-table-footer ymo-nopadding">
		            <hr/>
		            <div class="col-xs-4 ymo-percent ymo-nopadding">
		                <strong>+ 103 %</strong>
		                <div class="col-xs-6 ymo-select ymo-nopadding">
		                    <select class="form-control">
		                        <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','last week') ?></option>
		                        <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','last month') ?></option>
		                        <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','last 6 months') ?></option>
		                        <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','last year') ?></option>
		                        <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','last 2 years') ?></option>
		                    </select>
		                </div>
		            </div>
		            <div class="col-xs-4 col-xs-offset-4 ymo-total-balance ymo-nopadding">
		                <strong>3507,57 USD</strong>
		            </div>
		        </div>
		     
		    </div>
			
			<div class="col-xs-12 ymo-footer-center ymo-nopadding">
				<div class="col-xs-6 ymo-center-left ymo-nopadding">
					<div class="col-xs-10 ymo-search ymo-nopadding">
						<input type="text" name="search" class="form-control ymo-search-sm" placeholder="search">
						<input type="submit" name="magnifier" class="ymo-magnifier-sm" value="">
					</div>
				</div>
				
				<div class="col-xs-6 ymo-center-right ymo-nopadding">
					<ul class="list-inline ymo-nav-right">
				        <li class="active">
				            <a class="ymo-icon-plus active" href="#">
				            	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','new account') ?>
				            </a>
				        </li>
				        <li>
							<a class="ymo-icon-forward active" data-action="ymobiz-transfer" data-size="lg">
			                	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','new transfer') ?>
			                </a>				        
			            </li>
					</ul>
				</div>
			</div>
			
		</div>

	</div>
</div>
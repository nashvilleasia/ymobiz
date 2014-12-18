<?php

$this->registerCss('
    .ymo-wallpaper{
        background: url('.\Yii::$app->getModule('marketing')->ymoTools->imageSrc('wallpaper-marketing.jpg','img').')no-repeat;
        background-size: cover;
        width: 100%;
        height: 118px;
    }
');

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'delete-contact','module' => 'marketing','size'=>'sm'],
]);
?>

<div class="col-xs-8 ymo-aside-right ymo-nopadding">
		
	<div class="col-xs-12 ymo-menu-right ymo-nopadding">
		<?php echo $this->render('crm-submenu') ?>
	</div>
	
	<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
		<div class="col-xs-12 ymo-aside ymo-nopadding">
		
			<div class="col-xs-12 ymo-wallpaper ymo-nopadding">
            	<div class="ymo-profile-marketing">
                	<img src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('profile-marketing.jpg','img')?>" alt="...">
            	</div>
			</div>
			
			<div class="col-xs-12 ymo-profile-info ymo-nopadding">
             	<h4><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sun infotech') ?></h4>
			
				<ul class="checkbox-group list-inline">
					<h5><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','mark contact as:') ?></h5>
					<li>     	
						<div class="checkbox">
							<label>
						 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
								<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','supplier') ?>
							</label>
						</div>
					</li>
					<li> 
						<div class="checkbox"> 
							<label>
						 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="1">
						 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','client') ?>
							</label>
						</div>
					</li>
				</ul>
				
				<hr />
				
				<ul class="col-xs-6 ymo-list-simple list-unstyled ymo-nopadding">
                	<li>
                		<p>
                           <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','address:') ?>
                             <span>
                                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','quam nunca paum, 23') ?>
                             </span>
                         </p>
                     </li>
                     <li>
                         <p>
                            <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','postal code:') ?>
                             <span>
                                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','1234-123') ?>
                             </span>
                         </p>
                     </li>
                     <li>
                        <p>
                            <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','location:') ?>
                             <span>
                                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','antuerit litterarum') ?>
                             </span>
                         </p>
                     </li>
                     <li>
                         <p>
                            <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','state:') ?>
                             <span>
                                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','humanitatis') ?>
                             </span>
                         </p>
                     </li>
                     <li>
                         <p>
                            <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','country:') ?>
                             <span>
                                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','seacula') ?>
                             </span>
                         </p>
                     </li>
                     <li>
                        <p>
                            <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','tel:') ?>
                             <span>
                                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','(+) 351 123 456 789') ?>
                             </span> 
                         </p>
                     </li>
                     <li>
                         <p>
                            <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','fax:') ?>
                             <span>
                                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','(+) 351 123 456 790') ?>
                             </span>
                         </p>
                     </li>
                     <li>
                         <p>
                            <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email:') ?>
                             <span>
                                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','info@companyofcompanies.com') ?>
                             </span>
                         </p>
                     </li> 
                     <li>
                         <p>
                            <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','web:') ?>
                             <span>
                                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','www.companyofcompanies.com') ?>
                             </span>
                         </p>
                     </li>
                 </ul>
                 
                 <div class="col-xs-6 ymo-nopadding">
					<span class="ymo-icon-notes">
                    	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','notes') ?>
                 	</span>
                    <a class="ymo-icon-plus" href="/marketing/crm-notes">
                    	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app',' add new') ?>
                    </a>
                    
                     <table class="ymo-table-info table table-responsive">
                         <tbody>
                             <tr>
                                 <td>
                                     <p>
                                        <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit') ?>
                                     </p>
                                 </td>
                                 <td>
                                     <p class="ymo-time">
                                        01.02.13
                                     </p>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <p>
                                        <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit') ?>
                                     </p>
                                 </td>
                                 <td>
                                     <p class="ymo-time">
                                        01.02.13
                                     </p>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <p>
                                        <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit') ?>
                                     </p>
                                 </td>
                                 <td>
                                     <p class="ymo-time">
                                        01.02.13
                                     </p>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <p>
                                        <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit') ?>
                                     </p>
                                 </td>
                                 <td>
                                     <p class="ymo-time">
                                        01.02.13
                                     </p>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <p>
                                        <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit') ?>
                                     </p>
                                 </td>
                                 <td>
                                     <p class="ymo-time">
                                        01.02.13
                                     </p>
                                 </td> 
                             </tr>
                             <tr>
                                 <td> 
                                     <p>
                                        <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit') ?>
                                     </p>
                                 </td>
                                 <td>
                                     <p class="ymo-time">
                                        01.02.13
                                     </p>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <p>
                                        <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit') ?>
                                     </p>
                                 </td>
                                 <td>
                                     <p class="ymo-time">
                                        01.02.13
                                     </p>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <p>
                                        <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit') ?>
                                     </p>
                                 </td>
                                 <td>
                                     <p class="ymo-time">
                                        01.02.13
                                     </p>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <p>
                                        <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit') ?>
                                     </p>
                                 </td>
                                 <td>
                                     <p class="ymo-time">
                                        01.02.13
                                     </p>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
				
			</div>
		
		</div>
	</div>
		
	<div class="col-xs-12 ymo-footer-right ymo-nopadding">
		<div class="col-xs-12 ymo-menu-right ymo-nopadding">
			<ul class="list-inline">
		        <li class="active">
		            <a class="ymo-icon-profile active" href="#">
		            	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','view profile') ?>
		            </a>
		        </li>
		        <li>
		            <a class="ymo-icon-delete" data-action="delete-contact" data-size="lg">
		            	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','delete contact') ?>
		            </a>
		        </li>
			</ul>
		</div>
	</div>
				
</div>
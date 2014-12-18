<?php

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'delete-folder','module' => 'backoffice','size'=>'sm'],
    ['id'=>'folder-deleted','module' => 'backoffice','size'=>'sm'],
]);
?>

<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="ymo-user-log">

		<!--ymo-column-left-->
			<?php echo \Yii::$app->view->render('user-sidebar') ?>
		<!--ymo-column-left-->
		
		<!--ymo-column-right-->
		<div class="col-xs-8 ymo-aside-right ymo-nopadding">
			<div class="col-xs-12 ymo-folders ymo-nopadding">
			
				<div class="col-xs-7 ymo-menu-right ymo-nopadding">
					<?php echo $this->render('user-menu') ?>
				</div>
				
				<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
					
					<div class="col-md-12 ymo-table-contact ymo-scroll ymo-nopadding">
						<table class="ymo-table-message table table-responsive">
							<tbody>
		                        <tr style="display: flex;">
		                             <td width="75%">
		                                 <div class="custom-checkbox ymo-right-block list-inline">	
										 	<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
												</label>
											 </div>
										  </div>
		                                 <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
		                             </td>
		                             <td width="25%">
		                                 <span>20 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','messages') ?></span>
		                             </td>
		                        </tr>
		                        <tr style="display: flex;">
		                             <td width="75%">
		                                 <div class="custom-checkbox ymo-right-block list-inline">	
										 	<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
												</label>
											 </div>
										  </div>
		                                 <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
		                             </td>
		                             <td width="25%">
		                                 <span>20 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','messages') ?></span>
		                             </td>
		                        </tr>
		                        <tr style="display: flex;">
		                             <td width="75%">
		                                 <div class="custom-checkbox ymo-right-block list-inline">	
										 	<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
												</label>
											 </div>
										  </div>
		                                 <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
		                             </td>
		                             <td width="25%">
		                                 <span>20 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','messages') ?></span>
		                             </td>
		                        </tr>
		                        <tr style="display: flex;">
		                             <td width="75%">
		                                 <div class="custom-checkbox ymo-right-block list-inline">	
										 	<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
												</label>
											 </div>
										  </div>
		                                 <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
		                             </td>
		                             <td width="25%">
		                                 <span>20 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','messages') ?></span>
		                             </td>
		                        </tr>
		                        <tr style="display: flex;">
		                             <td>
		                                 <div class="custom-checkbox ymo-right-block list-inline">	
										 	<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
												</label>
											 </div>
										  </div>
										  <form action="">
										  	<div class="input-group">
										    	<input type="text" class="form-control ymo-folder-name" placeholder="new folder name">
										      	<span class="input-group-btn">
										        	<button class="btn ymo-btn-pink" type="button">save</button>
										      	</span>
										  	</div>
										  </form>
									 </td>
		                        </tr>
	                    	</tbody> 
						</table>
					</div>
					
					<div class="col-md-12 ymo-table-group ymo-nopadding ymo-panel">
	                	<hr/>
	            
			             <div class="col-xs-7 ymo-pagination ymo-nopadding">
			                 <ul class="pagination">
			                     <li>
			                         <a href="#">previous</a>
			                     </li>
			                     <li>
			                         <a href="#">«</a>
			                     </li>
			                     <li>
			                         <a href="#">1</a>
			                    </li>
			                     <li>
			                         <a href="#">2</a>
			                     </li>
			                     <li>
			                         <a href="#">3</a>
			                     </li>
			                     <li>
			                         <a href="#">4</a>
			                     </li>
			                     <li>
			                         <a href="#">5</a>
			                     </li>
			                     <li>
			                         <a href="#">»</a>
			                     </li> 
			                     <li> 
			                         <a href="#">next</a>
			                     </li> 
			                 </ul> 
			             </div>
	                	
	                	<div class="col-md-4 ymo-search ymo-nopadding">
			             	<input type="text" name="search" class="form-control ymo-search-md" placeholder="search">
							<input type="submit" name="magnifier" class="ymo-magnifier-md" value="">
			             </div>
					</div>
					
				</div>
				
				<div class="col-xs-12 ymo-footer-right ymo-nopadding">
				
					<div class="col-md-12 ymo-menu-left ymo-nopadding">
						<a class="ymo-icon-email" href="/backoffice/user-contact">
							<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','back to inbox') ?>
						</a>
					</div>
					
					<div class="col-xs-12 ymo-menu-right ymo-nopadding">
						<ul class="list-inline">
					        <li class="active">
					            <a class="ymo-icon-plus active" href="#">
					            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','new folder') ?>
					            </a>
					        </li>
					        <li>
					            <a class="ymo-icon-delete"  data-action="delete-folder" data-size="lg">
					            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','delete folder') ?>
					            </a>
					        </li>
						</ul>
					</div>
					
				</div>
				
			</div>
		</div>
		<!--ymo-column-right-->

	</div>
</div>


















































<!-- 
<div class="col-md-12 ymo-user-log  ymo-folders ymo-nopadding">

    

    <div class="col-md-8 ymo-right-marketing ymo-nopadding">

    
        <div class="col-md-12 ymo-nopadding ymo-Panel">

            <ul class="col-md-6 ymo-right-list list-inline ymo-nopadding ymo-Panel">
                <li>
                    <a class="ymo-icon-contact" href="/backoffice/user-contact">
                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','contact') ?>
                    </a>
                </li>
                <li>
                    <a class="ymo-icon-statistics active" href="/backoffice/user-statistics">
                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','statistics') ?>
                    </a>
                </li>
                <li class="active">
                    <a class="ymo-icon-log" href="/backoffice/user-log">
                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','log') ?>
                    </a>
                </li>
            </ul>
        </div>
   


        <div class="col-md-12 ymo-general ymo-nopadding">

           
            <div class="col-md-12 ymo-nopadding ymo-table-contact ymo-scroll">

               
                <table class="ymo-table-message table table-responsive">
                    <tbody>
                        <tr style="display: flex;">
                            <td width="75%">
                                <input class="checkbox" type="checkbox" name="checkbox04" id="checkbox04" checked="checked">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet? ') ?>
                                </p>
                            </td>
                            <td width="25%">
                                <span>20 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','messages') ?></span>
                            </td>
                        </tr>
                        <tr style="display: flex;">
                            <td width="75%">
                                <input class="checkbox" type="checkbox" name="checkbox03" id="checkbox03">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet? ') ?>
                                </p>
                            </td>
                            <td width="25%">
                                <span>20 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','messages') ?></span>
                            </td>
                        </tr>
                        <tr style="display: flex;">
                            <td width="75%">
                                <input class="checkbox" type="checkbox" name="checkbox02" id="checkbox02">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet? ') ?>
                                </p>
                            </td>
                            <td width="25%">
                                <span>20 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','messages') ?></span>
                            </td>
                        </tr>
                        <tr style="display: flex;">
                            <td width="75%">
                                <input class="checkbox" type="checkbox" name="checkbox01" id="checkbox01">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet? ') ?>
                                </p>
                            </td>
                            <td width="25%">
                                <span>20 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','messages') ?></span>
                            </td>
                        </tr>
                        <tr style="display: flex;">
                            <td colspan="2">
                                <input class="checkbox" type="checkbox" name="checkbox05" id="checkbox05">
                                <div class="col-md-6 ymo-nopadding">
                                    <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','new folder name') ?>">
                                </div>
                                <a class="col-md-5 btn ymo-btn-pink"><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','save') ?></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                

            </div>
          

            
            <div class="col-md-12 ymo-table-group ymo-nopadding ymo-panel">
                <hr/>
                
                <div class="col-md-7 ymo-pagination ymo-nopadding">
                    <ul class="pagination">
                        <li>
                            <a href="#"><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','previous') ?></a>
                        </li>
                        <li>
                            <a href="#">«</a>
                        </li>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">5</a>
                        </li>
                        <li>
                            <a href="#">»</a>
                        </li>
                        <li>
                            <a href="#"><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','next') ?></a>
                        </li>
                    </ul>
                </div>
               

               
                <div class="col-md-4 ymo-search ymo-nopadding">
                    <input type="text" name="search" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','search') ?>">
                    <input type="submit" name="magnifier" value="">
                </div>
              

            </div>
            
        </div>
    

     
        <div class="col-md-12 ymo-table-footer ymo-nopadding">

          
            <ul class="col-md-4 ymo-left-list list-inline ymo-nopadding">
                <li>
                    <a href="/backoffice/user-contact" class="ymo-icon-email">
                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','back to inbox') ?>
                    </a>
                </li>
            </ul>
         

          
            <ul class="col-md-7 ymo-right-list list-inline ymo-nopadding">
                <li>
                    <a class="ymo-icon-delete"  data-action="delete-folder" data-size="lg">
                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','delete folder') ?>
                    </a>
                </li>
                <li class="active">
                    <a class="ymo-icon-new active">
                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','new folder') ?>
                    </a>
                </li>
            </ul>
            

        </div>
     

    </div>
   

</div> -->
<!--ymo-column-left-->
<div class="col-xs-4 ymo-aside-left ymo-nopadding">
	<div class="ymo-sidebar-advertising">
	
		<div class="col-xs-12 ymo-menu-left ymo-nopadding">
			<ul class="list-inline ymo-nav-left">
				<li>
                	<a class="ymo-icon-edit active" href="advertising-campaigns">
                    	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','edit') ?>
                 	</a>
             	</li>
             	<li>
                	<a class="ymo-icon-statistics" href="/marketing/campaigns-statistics">
                    	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','statistics') ?>
                	</a>
            	</li>
			</ul>
		</div>
		
		<div class="col-xs-12 ymo-sidebar-general ymo-nopadding">
			
			<form action="">
		
				<div class="col-xs-12 ymo-sidebar-group ymo-scroll ymo-nopadding">
					<div class="col-xs-12 ymo-sidebar ymo-nopadding">
					
						<?php echo \Yii::$app->view->render('campaigns-menu') ?>
					
						<div class="col-xs-12 ymo-nopadding">
							<div class="col-xs-12 ymo-select ymo-nopadding">
		                        <select class="form-control">
		                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','select payment account') ?></option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
		                    </div>
		                    <div class="col-xs-12 ymo-campaign-budget ymo-nopadding">
		                        <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','campaign budget') ?></p>
		                        <span>USD</span>
		                        <input type="text" class="form-control text-right" placeholder="0.00">
		                        <a href="#" class="ymo-view"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','view billing info') ?></a>
		                    </div>
		                </div> 
				
					</div>
				</div>
		
                <div class="col-xs-12 ymo-buttons-sidebar ymo-nopadding">
                    <ul class="list-inline ymo-status">
                    	<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','status') ?>:</p>
                    	<li class="active">
                        	<a class="ymo-icon-play" href="#"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','play') ?></a>
                     	</li>
                    	<li>
                        	<a class="ymo-icon-pause" href="#"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','pause') ?></a>
                    	</li>
                	</ul>
	                <button type="button" class="btn ymo-blue-gradient"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','next') ?></button>
                </div>
	                
			</form>
				
		</div>
		
		<div class="col-xs-12 ymo-footer-left ymo-nopadding">
			<ul class="list-inline">
				<li class="active">
			    	<a class="ymo-icon-plus" href="#">
			        	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','add new') ?>
	         		</a>
	        	</li>
	        	<li>
	            	<a class="ymo-icon-delete" href="#">
	            		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','delete') ?>
		            </a>
		        </li>
			</ul>
		</div>
		
	</div>
</div>
<!--ymo-column-left-->




























<!-- <div class="col-xs-4 ymo-left-marketing ymo-nopadding ymo-Panel"> -->
<!--     <div class="col-xs-12 ymo-nopadding ymo-Panel"> -->

        
<!--         <ul class="ymo-left-list ymo-nopadding ymo-Panel"> -->
<!--             <li> -->
<!--                 <a class="ymo-icon-edit active" href="advertising-campaigns"> -->
<!--                     edit -->
<!--                 </a> -->
<!--             </li> -->
<!--             <li> -->
<!--                 <a class="ymo-icon-statistics" href="/marketing/campaigns-statistics"> -->
<!--                     statistics -->
<!--                 </a> -->
<!--             </li> -->
<!--         </ul> -->

<!--         <div class="col-xs-12 ymo-campaigns-list ymo-nopadding ymo-Panel"> -->

            
          
<!--             <div class="col-xs-12 ymo-budget ymo-nopadding"> -->
<!--                 <form action=""> -->

                    
<!--                     <div class="col-xs-12 ymo-group-list ymo-nopadding"> -->
<!--                         <select class="form-control"> -->
<!--                             <option>select payment account</option> -->
<!--                             <option>1</option> -->
<!--                             <option>2</option> -->
<!--                             <option>3</option> -->
<!--                             <option>4</option> -->
<!--                         </select> -->
<!--                     </div> -->

<!--                     <div class="col-xs-12 ymo-remind ymo-nopadding"> -->
<!--                         <p class="col-xs-4 ymo-nopadding"> -->
<!--                             campaign budget -->
<!--                         </p> -->
<!--                         <div class="col-xs-7 ymo-nopadding"> -->
<!--                             <input type="text" class="form-control input-sm" placeholder="10.00"> -->
<!--                         </div> -->
<!--                         <span class="col-xs-1 ymo-nopadding">USD</span> -->
<!--                     </div> -->


<!--                     <div class="col-xs-12 list-inline ymo-profile-info ymo-nopadding"> -->
<!--                         <a href="#"> -->
<!--                             view billing info -->
<!--                         </a> -->
<!--                     </div> -->

<!--                     <div class="col-xs-12 ymo-status ymo-nopadding"> -->
<!--                         <ul class="col-xs-7 ymo-left-list list-inline ymo-nopadding"> -->
<!--                             <p> -->
<!--                                 status: -->
<!--                             </p> -->
<!--                             <li> -->
<!--                                 <a class="ymo-icon-play active" href="#"> -->
<!--                                     play -->
<!--                                 </a> -->
<!--                             </li> -->
<!--                             <li> -->
<!--                                 <a class="ymo-icon-pause active" href="#"> -->
<!--                                     pause -->
<!--                                 </a> -->
<!--                             </li> -->
<!--                         </ul> -->

<!--                         <button type="button" class="col-xs-5 btn ymo-btn-blue">next</button> -->
<!--                     </div> -->
<!--                 </form> -->
<!--             </div> -->

<!--         </div> -->


       
<!--         <div class="col-xs-12 ymo-table-footer ymo-sidebar-icon ymo-nopadding ymo-Panel"> -->

         
<!--             <ul class="col-xs-6 ymo-right-list list-inline ymo-nopadding ymo-Panel"> -->
<!--                 <li class="active"> -->
<!--                     <a class="ymo-icon-add active"> -->
<!--                          add new -->
<!--                     </a> -->
<!--                 </li> -->
<!--                 <li> -->
<!--                     <a class="ymo-icon-delete"> -->
<!--                         delete -->
<!--                     </a> -->
<!--                 </li> -->
<!--             </ul> -->

<!--         </div> -->

<!--     </div> -->
<!-- </div> -->
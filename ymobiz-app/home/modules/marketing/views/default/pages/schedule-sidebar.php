<!--ymo-column-left-->
<div class="col-xs-4 ymo-aside-left ymo-nopadding">
	<div class="ymo-sidebar-schedule">
	
		<div class="col-xs-12 ymo-menu-left ymo-nopadding">
			<ul class="list-inline ymo-slide-schedule">
	            <li>
	                <a class="arrow-left" href="#"></a>
	            </li>
	            <li>
	            	<a href="#">
		                <img class="ymo-icon-meeting" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('meeting.png','img/icons')?>" alt="...">
		                <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','staff member name') ?></p>
		                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
	                </a>
	            </li>
	            <li>
	                <a class="arrow-right" href="#"></a>
	            </li>
        	</ul>
		</div>
		
		<div class="col-xs-12 ymo-sidebar-general ymo-nopadding">
			
			<form action="">
		
				<div class="col-xs-12 ymo-sidebar-group ymo-scroll ymo-nopadding">
					<div class="col-xs-12 ymo-sidebar ymo-nopadding">
					
						<div class="col-xs-12 ymo-search ymo-group-list ymo-nopadding">
		                    <input type="text" name="search" class="form-control ymo-search-md" placeholder="<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','company name') ?>">
		                    <input type="submit" name="magnifier" class="form-control ymo-magnifier-md" value="">
		                </div>
		                <div class="col-xs-12 ymo-group-list ymo-nopadding">
		                    <select class="form-control">
		                        <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','staff member name') ?></option>
		                        <option>1</option>
		                        <option>2</option>
		                        <option>3</option>
		                        <option>4</option>
		                    </select>
		                </div>
		                <div class="col-xs-12 ymo-group-list ymo-nopadding">
		                    <textarea class="form-control" rows="3" placeholder="meeting subject"></textarea>
		                </div>
		                <div class="col-xs-12 ymo-date ymo-group-list ymo-nopadding">
		                    <div class="col-xs-3 ymo-year ymo-nopadding">
		                        <select class="form-control">
		                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','year') ?></option>
		                            <option>1999</option>
		                            <option>2999</option>
		                            <option>3999</option>
		                            <option>4999</option>
		                        </select>
		                    </div>
		                    <!--ymo-month-->
		                    <div class="col-xs-3 ymo-month ymo-nopadding">
		                        <select class="form-control">
		                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','month') ?></option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
		                    </div>
		                    <!--ymo-day-->
		                    <div class="col-xs-3 ymo-day ymo-nopadding">
		                        <select class="form-control">
		                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','day') ?></option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
		                    </div>
		                </div>
		                <div class="col-xs-12 ymo-time ymo-group-list ymo-nopadding">
		                    <!--ymo-hours-->
		                    <div class="col-xs-3 ymo-hours ymo-nopadding">
		                        <select class="form-control">
		                            <option>1 PM</option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
		                    </div>
		                    <div class="col-xs-3 ymo-hours ymo-nopadding">
		                        <select class="form-control">
		                            <option>9 AM</option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
		                    </div>
		                    <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','from-to') ?></p>
		                </div>
		                <div class="col-xs-12 ymo-remind ymo-group-list ymo-nopadding">
		                    <div class="col-xs-7 ymo-select ymo-nopadding">
		                        <select class="form-control">
		                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','one hour before') ?></option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
		                    </div>
	                    	<p>remind me:</p>
		                </div>
	                    <ul class="checkbox-group list-inline">
							<li>     	
								<div class="checkbox">
									<label>
								 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
								 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','on ymobiz') ?>
									</label>
								</div>
							</li>
							<li> 
								<div class="checkbox"> 
									<label>
								 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="1">
								 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','via email') ?>
									</label>
								</div>
							</li>
							<li> 
								<div class="checkbox"> 
									<label>
								 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="2">
								 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','via sms') ?>
									</label>
								</div>
							</li>
						</ul>
				
					</div>
				</div>
		
                <div class="col-xs-12 ymo-buttons-sidebar ymo-nopadding">
                    <button type="button" class="btn ymo-blue-gradient"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','cancel') ?></button>
                    <button type="button" class="btn ymo-blue-gradient"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','save task') ?></button>
                </div>
	                
			</form>
				
		</div>
		
		<div class="col-xs-12 ymo-footer-left ymo-nopadding">
			<div class="col-xs-6 ymo-search ymo-nopadding">
				<input type="text" name="search" class="form-control ymo-search-sm" placeholder="<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','search tasks') ?>">
				<input type="submit" name="magnifier" class="ymo-magnifier-sm" value="">
			</div>
		</div>
		
	</div>
</div>
<!--ymo-column-left-->
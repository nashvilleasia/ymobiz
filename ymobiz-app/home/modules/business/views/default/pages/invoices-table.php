<div class="col-xs-8 ymo-aside-right ymo-nopadding">
    <div class="ymo-invoice-table">

    	<div class="col-xs-12 ymo-menu-left ymo-nopadding">
			<select class="form-control">
	        	<option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','invoices') ?></option>
	        	<option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','pending') ?></option>
	        	<option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','cleared') ?></option>
	        	<option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','credit') ?></option>
	        	<option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','debit') ?></option>
	    	</select>
		</div>
			
		<div class="col-xs-12 ymo-menu-right ymo-nopadding">
			<ul class="radio-group list-inline">
				<li>
					<label>
						<input type="radio" id="" name="ymoRadio" class="ymo-radio" value="0" checked="checked" />
						<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','draft') ?>
					</label>
				</li>
				<li>
					<label>
						<input type="radio" id="" name="ymoRadio" value="1" class="ymo-radio" />
						<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','final') ?>
					</label>
				</li>
			</ul>
		</div>
		
		<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
			<div class="col-xs-12 ymo-aside ymo-nopadding">
				
				<div class="col-xs-12 ymo-shopping-cart ymo-nopadding">
			    	
		    		<ul class="col-xs-12 list-inline ymo-nopadding">
		    			<li class="col-xs-12 ymo-nopadding">
		    				<div class="col-xs-6 ymo-bloc-left ymo-nopadding">
			        			<p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','company name, inc.') ?>
	                            </p>
		        			</div>
		        			<div class="col-xs-6 ymo-bloc-right ymo-nopadding">
			        			<p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: <strong>1234567890</strong>
	                            </p>
		        			</div>
		    			</li>
		    			<li class="col-xs-12 ymo-nopadding">
		    				<div class="col-xs-6 ymo-bloc-left ymo-nopadding">
			        			<p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','company adress, zip code') ?>
	                            </p>
		        			</div>
		        			<div class="col-xs-6 ymo-bloc-right ymo-nopadding">
			        			<p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','date') ?>: <strong>12th <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','october') ?> 2013</strong>
	                            </p>
		        			</div>
		    			</li>
		    			<li class="col-xs-12 ymo-nopadding">
		    				<div class="col-xs-6 ymo-bloc-left ymo-nopadding">
			        			<p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','country') ?>
	                            </p>
		        			</div>
		        			<div class="col-xs-6 ymo-bloc-right ymo-nopadding">
			        			<p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','payment due') ?>: <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
	                            </p>
		        			</div>
		    			</li>
		    			<li class="col-xs-12 ymo-nopadding">
		    				
		        			<div class="col-xs-6 ymo-bloc-right ymo-nopadding">
			        			<p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','status') ?>: <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','unpaid') ?></span>
	                            </p>
		        			</div>
		    			</li>
		    		</ul>
			        	
		        	<table class="table table-responsive">
		        		<thead>
	                        <tr>
	                            <th><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','item') ?></th>
	                            <th><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','description') ?></th>
	                            <th><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','unit cost') ?></th>
	                            <th><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','quantity') ?></th>
	                            <th class="text-right"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','cost') ?> (USD)</th>
	                        </tr>
                        </thead>
                        <tbody>
	                        <tr>
	                            <td class="ymo-item">1</td>
	                            <td class="ymo-item-description"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','one year premium license') ?></td>
	                            <td class="ymo-item-unit">25.00$</td>
	                            <td>
                                    <select class="form-control form-sm">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
	                            </td>
	                            <td class="ymo-item-cost">25.00$</td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-item">1</td>
	                            <td class="ymo-item-description"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','one year premium license') ?></td>
	                            <td class="ymo-item-unit">25.00$</td>
	                            <td>
                                    <select class="form-control form-sm">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
	                            </td>
	                            <td class="ymo-item-cost">25.00$</td>
	                        </tr>
	                    </tbody>
                        <tfoot>
	                        <tr>
	                            <td colspan="4">
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','sub total') ?>:
	                            </td>
	                            <td class="text-right">
	                                25.00$
	                            </td>
	                        </tr>
	                        <tr>
	                            <td colspan="4">
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','shipping') ?>:
	                            </td>
	                            <td class="text-right">
	                                5.75$
	                            </td>
	                        </tr>
	                        <tr>
	                            <td colspan="4">
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','total amount') ?> (USD):
	                            </td>
	                            <td class="text-right">
	                                <strong>30.75$</strong>
	                            </td>
	                        </tr>
                        </tfoot>
		        	</table>
			        	
		        </div>
				
			</div>
		</div>
			
		<div class="col-xs-12 ymo-footer-right ymo-nopadding">
			<div class="col-xs-12 ymo-menu-right ymo-nopadding">
                <button type="button" class="btn ymo-blue-gradient"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','back') ?></button>
                <button type="button" class="btn ymo-blue-gradient"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','save') ?></button>
                
				<ul class="list-inline">
	                <li class="active">
	                    <a class="ymo-icon-save active">
	                        <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','pdf export') ?>
	                    </a>
	                </li>
	            </ul>
			</div>
		</div>
			
	</div>
</div>